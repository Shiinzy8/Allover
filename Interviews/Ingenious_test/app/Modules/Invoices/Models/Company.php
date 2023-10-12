<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Modules\Invoices\Casts\UuidCasting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;

/**
 * @property Uuid $id
 * @property string $name
 * @property string $street
 * @property string $city
 * @property string $zip
 * @property string $phone
 * @property string $email
 */
class Company extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'street',
        'city',
        'zip',
        'phone',
        'email',
    ];

    protected $casts = [
        'id' => UuidCasting::class,
    ];

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
