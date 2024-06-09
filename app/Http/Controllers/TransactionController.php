<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $totalTransactions = $transactions->count(); // Count the number of transactions

        return view('transactions.index', compact('transactions', 'totalTransactions'));
    }

    public function create()
    {
        return view('transactions.create');
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

    public function print()
    {
        // Query data dari database
        $transactions = Transaction::all();
    
        // Membuat objek Dompdf dengan opsi
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Mengatur HTML yang akan dicetak
        $html = "<html><body>";
        $html .= "<h1>Daftar Transaksi Keuangan</h1>";
        $html .= "<table border='1' cellspacing='0' cellpadding='10'>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th>ID</th>";
        $html .= "<th>Balance Sheet</th>";
        $html .= "<th>Laporan Laba Rugi</th>";
        $html .= "<th>Laporan Arus Kas</th>";
        $html .= "<th>Gambar</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
    
        foreach ($transactions as $transaction) {
            $html .= "<tr>";
            $html .= "<td>" . $transaction->id . "</td>";
            $html .= "<td>" . $transaction->balance_sheet . "</td>";
            $html .= "<td>" . $transaction->laba_rugi . "</td>";
            $html .= "<td>" . $transaction->arus_kas . "</td>";
            $html .= "<td><img src='" . asset('storage/' . $transaction->image) . "' alt='Image' width='100'></td>";
            $html .= "</tr>";
        }
    
        $html .= "</tbody>";
        $html .= "</table>";
        $html .= "</body></html>";
    
        // Memasukkan HTML ke Dompdf
        $dompdf->loadHtml($html);
    
        // Mengatur ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');
    
        // Render PDF
        $dompdf->render();
    
        // Output PDF ke browser
        return $dompdf->stream("transactions.pdf", array("Attachment" => false));
    }
}
