<?php

namespace App\Enums;

enum TransactionType: string
{
    case income = 'Income';
    case expense = 'Expense';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
