<?php

namespace App\Services;

use App\Enums\TransactionType;
use App\Models\Transaction;

class TransactionService
{
    public function paginate($from, $to)
    {
        $type = request('type');
        $perPage = request('perPage', 10);
        return Transaction::latest('id')
            ->whereDate('spend_date', '>=', $from)
            ->whereDate('spend_date', '<=', $to)
            ->when($type, function ($q) use ($type) {
                $q->where('type', $type);
            })
            ->paginate($perPage);
    }

    public function store(array $input)
    {
        return Transaction::create($input);
    }

    public function report($from, $to)
    {
        $incomes = Transaction::latest('id')
            ->whereDate('spend_date', '>=', $from)
            ->whereDate('spend_date', '<=', $to)
            ->where('type', TransactionType::income)
            ->get();
        $expenses = Transaction::latest('id')
            ->whereDate('spend_date', '>=', $from)
            ->whereDate('spend_date', '<=', $to)
            ->where('type', TransactionType::expense)
            ->get();
        return ['incomes' => $incomes, 'expenses' => $expenses];
    }
}
