<?php

declare(strict_types=1);

namespace Tests\Feature\Module\Invoice\Http\Controllers\Api;

use App\Domain\Enums\StatusEnum;
use App\Modules\Invoices\Models\InvoiceProductLine;
use Database\Factories\Modules\Invoices\InvoiceFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testShowInvoice(): void
    {
        $uuid = Uuid::uuid4();
        $response = $this->getJson(route('invoices.show', ['invoice' => $uuid]));
        $response->assertStatus(404);

        $invoice = InvoiceFactory::new()->create();

        $response = $this->getJson(route('invoices.show', ['invoice' => $invoice]));
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'Invoice number',
                'Invoice date',
                'Due date',
                'Company' => [
                    'Name',
                    'Street Address',
                    'City',
                    'Zip code',
                    'Phone',
                ],
                'Billing Company' => [
                    'Name',
                    'Street Address',
                    'City',
                    'Zip code',
                    'Phone',
                    'Email address'
                ],
                'Products' => [
                    '*' => [
                        'Name',
                        'Quantity',
                        'Unit Price',
                        'Total',
                    ],
                ],
                'Total price',
            ]
        ]);

        $invoiceProductPrices = InvoiceProductLine::all();
        $total = 0;

        foreach ($invoiceProductPrices as $invoiceProductPrice) {
            $total += (int) ($invoiceProductPrice->quantity * $invoiceProductPrice->product->price);
        }

        $jsonResponse = json_decode($response->getContent(), true);
        $this->assertEquals($total, Arr::get($jsonResponse, 'data.Total price'));
    }

    public function testApproveInvoice(): void
    {
        $uuid = Uuid::uuid4();
        $response = $this->postJson(route('invoices.approve', ['invoice' => $uuid]));
        $response->assertStatus(404);

        $invoice = InvoiceFactory::new()->state(['status' => StatusEnum::DRAFT])->create();

        $response = $this->postJson(route('invoices.approve', ['invoice' => $invoice]));
        $response->assertStatus(200);

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::APPROVED,
        ]);

        // try to approve the invoice twice
        $response = $this->postJson(route('invoices.approve', ['invoice' => $invoice]));
        $response->assertStatus(422);

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::APPROVED,
        ]);

        // try to reject the invoice after approve
        $response = $this->postJson(route('invoices.reject', ['invoice' => $invoice]));
        $response->assertStatus(422);

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::APPROVED,
        ]);
    }

    public function testRejectInvoice(): void
    {
        $uuid = Uuid::uuid4();
        $response = $this->postJson(route('invoices.reject', ['invoice' => $uuid]));
        $response->assertStatus(404);

        $invoice = InvoiceFactory::new()->state(['status' => StatusEnum::DRAFT])->create();

        $response = $this->postJson(route('invoices.reject', ['invoice' => $invoice]));
        $response->assertStatus(200);

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::REJECTED,
        ]);

        // try to reject the invoice twice
        $response = $this->postJson(route('invoices.reject', ['invoice' => $invoice]));
        $response->assertStatus(422);

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::REJECTED,
        ]);

        // try to approve the invoice after reject
        $response = $this->postJson(route('invoices.approve', ['invoice' => $invoice]));
        $response->assertStatus(422);

        $this->assertDatabaseHas('invoices', [
            'id' => $invoice->id,
            'status' => StatusEnum::REJECTED,
        ]);
    }
}

