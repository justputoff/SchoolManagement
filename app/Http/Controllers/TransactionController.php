<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Transaction;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index($billing)
    {
        $billing = Billing::find($billing);
        $transactions = Transaction::with('user', 'student')->where('billing_id', $billing->id)->get();
        return view('pages.transactions.index', compact('transactions', 'billing'));
    }

    public function create($billing)
    {
        $students = Student::all();
        $billing = Billing::find($billing); 
        return view('pages.transactions.create', compact(['students', 'billing']));
    }

    public function store(Request $request, Billing $billing)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        Transaction::create([
            'user_id' => Auth::id(),
            'student_id' => $request->student_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'transaction_date' => $request->transaction_date,
            'billing_id' => $billing->id,
        ]);

        return redirect()->route('transactions.index', $billing->id)->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        $students = Student::all();
        return view('pages.transactions.edit', compact('transaction', 'students'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update([
            'student_id' => $request->student_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('billings.index')->with('success', 'Transaction deleted successfully.');
    }
}