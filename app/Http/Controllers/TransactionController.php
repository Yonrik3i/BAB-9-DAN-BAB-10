<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $totalTransactions = $transactions->count(); // Menghitung jumlah data transaksi
        
        return view('manajemen', compact('transactions', 'totalTransactions')); // Mengirimkan data total transaksi ke tampilan manajemen
    }    

    public function create()
    {
        return view('input');
    }

    public function store(Request $request)
    {
        $request->validate([
            'balance_sheet' => 'required',
            'laba_rugi' => 'required',
            'arus_kas' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image')->store('images');

        Transaction::create([
            'balance_sheet' => $request->balance_sheet,
            'laba_rugi' => $request->laba_rugi,
            'arus_kas' => $request->arus_kas,
            'image' => $image,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        return view('edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'balance_sheet' => 'required',
            'laba_rugi' => 'required',
            'arus_kas' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
            $transaction->update([
                'balance_sheet' => $request->balance_sheet,
                'laba_rugi' => $request->laba_rugi,
                'arus_kas' => $request->arus_kas,
                'image' => $image,
            ]);
        } else {
            $transaction->update($request->only(['balance_sheet', 'laba_rugi', 'arus_kas']));
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}

