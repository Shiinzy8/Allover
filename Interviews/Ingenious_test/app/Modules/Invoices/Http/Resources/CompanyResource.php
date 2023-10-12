<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Http\Resources;

use App\Modules\Invoices\Models\Company;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var $this Company */
        return [
            'Name' => $this->name,
            'Street Address' => $this->street,
            'City' => $this->city,
            'Zip code' => $this->zip,
            'Phone' => $this->phone,
        ];
    }
}
