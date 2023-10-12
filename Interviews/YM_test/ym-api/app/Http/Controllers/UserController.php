<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected CompanyService $companyService,
    ) {}

    public function register(Request $request): JsonResponse
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        if ($this->userService->createFromRequest($request)) {
            return response()->json(['message' => 'Successfully created!'], JsonResponse::HTTP_CREATED);
        }

        return response()->json(['message' => 'Failed!'], JsonResponse::HTTP_CONFLICT);
    }

    public function signIn(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|string|exists:users',
            'password' => 'required|string',
        ]);

        if (! $token = Auth::setTTL(7200)->attempt($request->only(['email', 'password']))) {
            return response()->json(['message' => 'Unauthorized!'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'bearer_token' => $token,
            'expires_in' => Auth::factory()->getTTL()
        ]);
    }

    public function recoveryPassword(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|string|exists:users',
        ]);

        if ($this->userService->generateEmailToken($request->get('email'))) {
            return response()->json(['message' => 'Email sent!']);
        }

        return response()->json(['message' => 'Failed!'], JsonResponse::HTTP_CONFLICT);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => 'required|string|exists:users',
            'email_token' => 'required|string|exists:users',
            'password' => 'required|string',
        ]);

        if ($this->userService->updatePassword(
            $request->get('email'),
            $request->get('email_token'),
            $request->get('password')
        )) {
            return response()->json(['message' => 'Successfully updated!'], JsonResponse::HTTP_OK);
        }

        return response()->json(['message' => 'Failed!'], JsonResponse::HTTP_CONFLICT);
    }

    public function companiesShow(): JsonResponse
    {
        return response()->json(['companies' => $this->userService->getAllCompanies(Auth::user())]);
    }

    public function companiesAdd(Request $request): JsonResponse
    {
        $this->validate($request, [
            'title' => 'required|string|unique:companies',
            'phone' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user();
        $company = $this->companyService->createFromRequest($request);

        if (! $company) {
            return response()->json(['message' => 'Failed!'], JsonResponse::HTTP_CONFLICT);
        }

        $this->userService->attachCompany($user, $company);

        return response()->json(['companies' => $this->userService->getAllCompanies($user)]);
    }
}
