<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Modules\Invoices\Casts\UuidCasting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

/**
 * @property Uuid $id
 * @property string $name
 * @property int $price
 * @property string $currency
 */
class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'price',
        'currency',
    ];

    protected $casts = [
        'id' => UuidCasting::class,
    ];

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class, 'invoice_product_lines')
            ->using(InvoiceProductLine::class)
            ->withPivot('quantity');
    }

    public function getPrice(int $quantity): int
    {
        return (int) ($this->price * $quantity);
    }
}
