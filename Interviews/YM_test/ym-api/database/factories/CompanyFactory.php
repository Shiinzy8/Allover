<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'description' => $this->faker->text,
        ];
    }
}
