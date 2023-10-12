<?php

namespace App\Services;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyService
{
    public function __construct(
        protected CompanyRepository $repository,
    ) {}

    public function createFromRequest(Request $request): Company|null
    {
        return Company::factory()->create([
            'title' => $request->get('title'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
        ]);
    }
}
