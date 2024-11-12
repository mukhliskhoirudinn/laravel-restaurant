<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // validasi input
        $data = $request->validate([
            'code'      => 'required|max:255',
            'rate'      => 'required|in:1,2,3,4,5',
            'comment'   => 'nullable|max:255'
        ]);

        // cek ada atau tidak transaksinya
        $transaction = Transaction::where('code', $data['code'])->first();

        if (!$transaction) {
            return redirect()->back()->with('error', 'Transaction not found');
        }

        // cek sudah ada reviewnya
        $review = Review::where('transaction_id', $transaction->id)->first();

        if ($review) {
            return redirect()->back()->with('error', 'Transaction already sent');
        }

        try {
            Review::create([
                'transaction_id' => $transaction->id,
                'rate'           => $data['rate'],
                'comment'        => $data['comment']
            ]);

            return redirect()->back()->with('success', 'Review has been sent');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }
}
