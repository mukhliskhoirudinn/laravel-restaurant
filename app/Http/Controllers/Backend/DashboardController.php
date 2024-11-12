<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransactions = Transaction::count();
        $totalSuccessful = Transaction::where('status', 'success')->count();
        $totalPending = Transaction::where('status', 'pending')->count();
        $totalFailed = Transaction::where('status', 'failed')->count();
        $recentTransactions = Transaction::latest()->take(5)->get();

        return view('backend.dashboard.index', [
            'totalTransactions' => $totalTransactions,
            'totalSuccessful' => $totalSuccessful,
            'totalPending' => $totalPending,
            'totalFailed' => $totalFailed,
            'recentTransactions' => $recentTransactions,
        ]);
    }
}
