<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Modules\Invoices\Casts\UuidCasting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Ramsey\Uuid\Uuid;

/**
 * @property Uuid $id
 * @property string $invoice_id
 * @property Invoice $invoice
 * @property string $product_id
 * @property Product $product
 * @property int $quantity
 */
class InvoiceProductLine extends Pivot
{
    use HasFactory;

    protected $table = 'invoice_product_lines';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'invoice_id',
        'product_id',
        'quantity',
    ];

    protected $casts = [
        'id' => UuidCasting::class,
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
