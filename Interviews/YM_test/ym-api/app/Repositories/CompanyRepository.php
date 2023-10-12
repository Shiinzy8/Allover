<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository
{
    public function getAllCompanies(): Collection
    {
        return Company::all();
    }
}
