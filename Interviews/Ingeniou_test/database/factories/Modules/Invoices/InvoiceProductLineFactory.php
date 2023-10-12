<?php

declare(strict_types=1);

namespace Database\Factories\Modules\Invoices;

use App\Modules\Invoices\Models\InvoiceProductLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class InvoiceProductLineFactory extends Factory
{
    protected $model = InvoiceProductLine::class;

    public function definition(): array
    {
        return [
            'id' => Uuid::uuid4(),
            'quantity' => $this->faker->numberBetween(1,100),
        ];
    }
}
