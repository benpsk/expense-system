<?php

namespace App\Models;

use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'amount', 'spend_date'];

    protected function casts(): array
    {
        return [
            'spend_date' => 'datetime:Y-m-d',
            'type' => TransactionType::class,
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }

    protected function spendDate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }
}
