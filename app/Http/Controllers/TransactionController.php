<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaction;
use App\Models\Transaction;
use App\Services\TransactionService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __construct(
        protected TransactionService $service
    )
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $from = $request->from ?? today()->subMonth()->format('Y-m-d');
        $to = $request->to ?? today()->format('Y-m-d');
        $services = $this->service->paginate($from, $to);
        return view('transaction/index', compact('services', 'from', 'to'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaction $request)
    {
        $input = $request->validated();
        $this->service->store($input);
        return to_route('transactions.index')->with('success', 'Transaction create success.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transaction/edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTransaction $request, Transaction $transaction)
    {
        $input = $request->validated();
        $transaction->update($input);
        return to_route('transactions.index')->with('success', 'Transaction update success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return back()->with('success', 'Transaction delete success.');
    }
}
