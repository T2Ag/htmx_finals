<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id')->get();
        return view('pages.accounts', compact('students'));
    }

    public function account()
    {
        $accounts = Account::with('student')->orderBy('id')->get();

        return view('templates._accounts-list', compact('accounts'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'student_id' =>'required',
            'section' =>'required',
            'remarks' =>'required',

        ]);

        if($validator->fails()) {
            $accounts = Account::orderBy('id');
            return view('templates._accounts-error', ['errors' => $validator->errors(), 'accounts' => $accounts]);

        };

        Account::create($request->all());

        $accounts = Account::with('student')->orderBy('id')->get();

        return view('templates._accounts-list', compact('accounts'));
    }

    public function edit(Account $account)
    {
        $account = Account::with('student')->findOrFail($account->id);
        $students = Student::orderBy('last_name')->get();
    
        return view('account.edit', compact('account', 'students'));
    }

    public function update(Request $request, Account $account)
    {
        $fields = $request->validate([
            'student_id' =>'required',
            'section' =>'required',
            'remarks' =>'required',
        ]);

        $account->update($fields);

        $accounts = Account::with('student')->orderBy('id')->get();

        return view('templates._accounts-list', compact('accounts'));
    }

    public function show(Account $account)
    {
        $account = Account::with(['student', 'payments', 'charges'])->findOrFail($account->id);

        $totalCharges = $account->charges->sum('amount');

        $remainingBalance = $totalCharges;
        foreach ($account->payments as $payment) {
            $remainingBalance -= $payment->amount;
            $remainingBalance = $remainingBalance < 0 ? 0 : $remainingBalance;
            $payment->remaining_balance = $remainingBalance;
        }
    
        return view('account.index', compact('account', 'totalCharges', 'remainingBalance'));
    }

    public function destroy(Account $account) {

        $account->delete();

        $accounts = Account::with('student')->orderBy('id')->get();

        return view('templates._accounts-list', compact('accounts'));
    }
}
