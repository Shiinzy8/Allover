<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(2)->create();
        $companies = Company::factory(10)->create();

        $users->each(function ($user) use ($companies) {
            $randomCount = rand(1, 10);
            $randomCompanies = $companies->random($randomCount);
            $user->companies()->attach($randomCompanies, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        });
    }
}
