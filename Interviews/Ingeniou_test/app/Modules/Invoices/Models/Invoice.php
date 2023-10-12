<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Domain\Enums\StatusEnum;
use App\Modules\Invoices\Casts\UuidCasting;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

/**
 * @property Uuid $id
 * @property StatusEnum $status
 * @property string $number
 * @property CarbonImmutable $date
 * @property CarbonImmutable $due_date
 */
class Invoice extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'number',
        'date',
        'due_date',
        'company_id',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'id' => UuidCasting::class,
    ];

    protected $dates = [
        'date',
        'due_date',
        'created_at',
        'updated_at',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'invoice_product_lines')
            ->using(InvoiceProductLine::class)
            ->withPivot('quantity');
    }

    public function getPrice(): int
    {
        $total = 0;
        $this->products->map(function (Product $item) use (&$total) {
            $total += (int) ($item->price * $item->pivot->quantity ?? 0);
        });

        return $total;
    }
}
