<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Http\Resources;

use App\Modules\Invoices\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var $this Product */
        return [
            'Name' => $this->name,
            'Quantity' => $this->pivot->quantity ?? 0,
            'Unit Price' => $this->price,
            'Total' => $this->getPrice($this->pivot->quantity ?? 0),
        ];
    }
}
