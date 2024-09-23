<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionReportHandler extends Controller
{
    public function __invoke(Request $request, TransactionService $service)
    {
        $from = $request->from ?? today()->subMonth()->format('Y-m-d');
        $to = $request->to ?? today()->format('Y-m-d');
        $transaction = $service->report($from, $to);
        return view('transaction/report', compact('from', 'to', 'transaction'));
    }
}
