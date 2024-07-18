<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Account $account)
    {
        $validated = $request->validate([
            'amount' => 'required',
        ]);

        $validated['datetime'] = now();

        $payment = $account->payments()->create($validated);

        $account = $account->fresh();

        $totalCharges = $account->charges->sum('amount');

        $remainingBalance = $totalCharges;
        foreach ($account->payments as $payment) {
            $remainingBalance -= $payment->amount;
            $remainingBalance = $remainingBalance < 0 ? 0 : $remainingBalance;
            $payment->remaining_balance = $remainingBalance;
        }

        return view('templates._payments-list', compact('account', 'totalCharges', 'remainingBalance'));
    }
}
