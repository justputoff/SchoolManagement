<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Transaction;
use App\Models\Student;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'student')->get();
        return view('pages.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $students = Student::all();
        return view('pages.transactions.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'payment_proof' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'details.*.type' => 'required|string|max:255',
            'details.*.description' => 'required|string|max:255',
            'details.*.amount' => 'required|numeric',
            'details.*.status' => 'required|string|max:255',
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'student_id' => $request->student_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'transaction_date' => $request->transaction_date,
            'payment_method' => $request->payment_method,
        ]);
        
        
        if ($request->hasFile('payment_proof')) {
            $transaction->update(['payment_proof' => $request->file('payment_proof')->store('payment_proofs', 'public')]);
        }
        
        foreach ($request->details as $detail) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'type' => $detail['type'],
                'description' => $detail['description'],
                'amount' => $detail['amount'],
                'status' => $detail['status'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        $students = Student::all();
        return view('pages.transactions.edit', compact('transaction', 'students'));
    }

    public function show(Transaction $transaction)
    {
        return view('pages.transactions.show', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'payment_proof' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'details.*.type' => 'required|string|max:255',
            'details.*.description' => 'required|string|max:255',
            'details.*.amount' => 'required|numeric',
            'details.*.status' => 'required|string|max:255',
        ]);

       $transaction->update([
            'student_id' => $request->student_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'transaction_date' => $request->transaction_date,
            'payment_method' => $request->payment_method,
        ]);

        if ($request->hasFile('payment_proof')) {
            if ($transaction->payment_proof) {
                Storage::delete('public/' . $transaction->payment_proof);
            }
            $transaction->update(['payment_proof' => $request->file('payment_proof')->store('payment_proofs', 'public')]);
        }

        TransactionDetail::where('transaction_id', $transaction->id)->delete();

        foreach ($request->details as $detail) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'type' => $detail['type'],
                'description' => $detail['description'],
                'amount' => $detail['amount'],
                'status' => $detail['status'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->payment_proof) {
            Storage::delete('public/' . $transaction->payment_proof);
        }
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}