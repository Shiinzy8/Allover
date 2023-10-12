<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(
        protected UserRepository $repository,
    ) {}

    public function createFromRequest(Request $request): User|null
    {
        return User::factory()->create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => app('hash')->make($request->get('password')),
        ]);
    }
    public function generateEmailToken(string $email): bool
    {
        return $this->repository->generateEmailToken($email);
    }

    public function updatePassword(string $email, string $emailToken, string $newPassword): bool
    {
        return $this->repository->updatePassword($email, $emailToken, $newPassword);
    }

    public function getAllCompanies(User $user): Collection
    {
        return $user->companies->map(function($company) {
            return [
                'title' => $company->title,
                'phone' => $company->phone,
                'description' => $company->description,
            ];
        });
    }

    public function attachCompany(User $user, Company $company): void
    {
        $user->companies()
            ->attach($company, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
