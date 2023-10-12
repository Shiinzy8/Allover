<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Http\Resources;

use App\Modules\Invoices\Models\Invoice;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var $this Invoice */
        return [
            'Invoice number' => $this->number,
            'Invoice date' => $this->date->format('d/m/Y'),
            'Due date' => $this->due_date->format('d/m/Y'),
            'Company' => new CompanyResource($this->company),
            'Billing Company' => new BillingCompanyResource($this->company),
            'Products' => ProductResource::collection($this->products),
            'Total price' => $this->getPrice(),
        ];
    }
}
