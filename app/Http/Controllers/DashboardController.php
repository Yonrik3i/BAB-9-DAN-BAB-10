<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction; // Pastikan untuk mengimpor model Transaction

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalTransactions = Transaction::count();
        return view('layouts.admin', compact('totalTransactions'));
    }
    
}

