<?php

declare(strict_types=1);

namespace Database\Factories\Modules\Invoices;

use App\Domain\Enums\StatusEnum;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        $company = CompanyFactory::new()->create();

        return [
            'id' => Uuid::uuid4(),
            'number' => $this->faker->uuid(),
            'date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'status' => StatusEnum::cases()[array_rand(StatusEnum::cases())],
            'company_id' => $company->id,
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Invoice $invoice) {
            $numberOfProducts = $this->faker->numberBetween(1, 5);
            ProductFactory::new()->count($numberOfProducts)->create()
                ->each(function (Product $product) use ($invoice) {
                    InvoiceProductLineFactory::new()->create([
                        'id' => Uuid::uuid4(),
                        'product_id' => $product->id,
                        'invoice_id' => $invoice->id,
                        'quantity' => $this->faker->numberBetween(1, 100),
                    ]);
                });
        });
    }
}
