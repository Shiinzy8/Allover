<?php

declare(strict_types=1);

namespace Database\Factories\Modules\Invoices;

use App\Modules\Invoices\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'id' => Uuid::uuid4(),
            'name' => $this->faker->word(),
            'street' => $this->faker->word(),
            'city' => $this->faker->word(),
            'zip' => $this->faker->numberBetween(10000,99999),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ];
    }
}
