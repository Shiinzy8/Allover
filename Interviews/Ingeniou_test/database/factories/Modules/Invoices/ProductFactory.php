<?php

declare(strict_types=1);

namespace Database\Factories\Modules\Invoices;

use App\Modules\Invoices\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'id' => Uuid::uuid4(),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'currency' => 'USD',
        ];
    }
}
