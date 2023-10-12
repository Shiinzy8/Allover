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

        // try to get not existing invoice
        $response = $this->getJson(route('invoices.show', ['invoice' => $uuid]));
        $response->assertStatus(404);

        $invoice = InvoiceFactory::new()->create();

        // try to get existing invoice
        $response = $this->getJson(route('invoices.show', ['invoice' => $invoice]));
        $jsonResponse = json_decode($response->getContent(), true);
        $response->assertStatus(200);
        $this->assertEquals($invoice->getPrice(), Arr::get($jsonResponse, 'data.Total price'));
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
    }

    public function testApproveInvoice(): void
    {
        $invoice = InvoiceFactory::new()->state(['status' => StatusEnum::DRAFT])->create();

        // try to approve for the  invoice first time
        $response = $this->postJson(route('invoices.approve', ['invoice' => $invoice]));
        $response->assertStatus(200);
        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => StatusEnum::APPROVED,]);

        // try to approve the invoice twice
        $response = $this->postJson(route('invoices.approve', ['invoice' => $invoice]));
        $response->assertStatus(422);
        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => StatusEnum::APPROVED,]);

        // try to reject the invoice after approve
        $response = $this->postJson(route('invoices.reject', ['invoice' => $invoice]));
        $response->assertStatus(422);
        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => StatusEnum::APPROVED,]);
    }

    public function testRejectInvoice(): void
    {
        $invoice = InvoiceFactory::new()->state(['status' => StatusEnum::DRAFT])->create();

        // try to reject for the first time
        $response = $this->postJson(route('invoices.reject', ['invoice' => $invoice]));
        $response->assertStatus(200);
        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => StatusEnum::REJECTED,]);

        // try to reject the invoice twice
        $response = $this->postJson(route('invoices.reject', ['invoice' => $invoice]));
        $response->assertStatus(422);
        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => StatusEnum::REJECTED,]);

        // try to approve the invoice after reject
        $response = $this->postJson(route('invoices.approve', ['invoice' => $invoice]));
        $response->assertStatus(422);
        $this->assertDatabaseHas('invoices', ['id' => $invoice->id, 'status' => StatusEnum::REJECTED,]);
    }
}

