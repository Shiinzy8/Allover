<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class UuidCasting implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return ($value instanceof UuidInterface) ? $value : Uuid::fromString($value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return ($value instanceof UuidInterface) ? $value->toString() : $value;
    }
}
