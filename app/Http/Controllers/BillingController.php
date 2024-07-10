<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\User;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::with('user', 'package', 'payments')->get();
        return view('pages.billings.index', compact('billings'));
    }

    public function create()
    {
        $users = User::whereIn('role_id', [3, 4])->get();
        $packages = Package::all();
        return view('pages.billings.create', compact('users', 'packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'package_id' => 'required|exists:packages,id',
            'payment_date' => 'required|date',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Billing::create($request->all());

        return redirect()->route('billings.index')->with('success', 'Billing created successfully.');
    }

    public function edit($id)
    {
        $billing = Billing::findOrFail($id);
        $users = User::whereIn('role_id', [3, 4])->get();
        $packages = Package::all();
        return view('pages.billings.edit', compact('billing', 'users', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'package_id' => 'required|exists:packages,id',
            'payment_date' => 'required|date',
            'due_date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $billing = Billing::findOrFail($id);
        $billing->update($request->all());

        return redirect()->route('billings.index')->with('success', 'Billing updated successfully.');
    }

    public function destroy($id)
    {
        $billing = Billing::findOrFail($id);
        $billing->delete();

        return redirect()->route('billings.index')->with('success', 'Billing deleted successfully.');
    }

    public function showPayments($billingId)
    {
        $billing = Billing::with('payments.student', 'payments.package')->findOrFail($billingId);
        return view('pages.billings.payment.index', compact('billing'));
    }

    public function createPayment($billingId)
    {
        $billing = Billing::findOrFail($billingId);
        $students = Student::all();
        return view('pages.billings.payment.create', compact('billing', 'students'));
    }

    public function storePayment(Request $request, $billingId)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'package_id' => 'required|exists:packages,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'status' => 'required|string',
            'payment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'description' => 'nullable|string',
            'type' => 'required|string',
        ]);

        $billing = Billing::findOrFail($billingId);
        $data = $request->all();
        $data['billing_id'] = $billingId;
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('payment_proof')) {
            $data['payment_proof'] = $request->file('payment_proof')->store('payment_proofs', 'public');
        }

        $billing->payments()->create($data);

        return redirect()->route('payments.index', $billingId)->with('success', 'Payment added successfully.');
    }

    public function editPayment($billingId, $paymentId)
    {
        $billing = Billing::findOrFail($billingId);
        $payment = Payment::findOrFail($paymentId);
        $students = Student::all();
        return view('pages.billings.payment.edit', compact('billing', 'payment', 'students'));
    }

    public function updatePayment(Request $request, $billingId, $paymentId)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'package_id' => 'required|exists:packages,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'status' => 'required|string',
            'payment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'description' => 'nullable|string',
            'type' => 'required|string',
        ]);

        $payment = Payment::findOrFail($paymentId);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('payment_proof')) {
            // Hapus gambar lama jika ada
            if ($payment->payment_proof) {
                Storage::delete($payment->payment_proof);
            }
            $data['payment_proof'] = $request->file('payment_proof')->store('payment_proofs', 'public');
        }

        $payment->update($data);

        return redirect()->route('payments.index', $billingId)->with('success', 'Payment updated successfully.');
    }

    public function destroyPayment($billingId, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);

        // Hapus gambar jika ada
        if ($payment->payment_proof) {
            Storage::delete($payment->payment_proof);
        }

        $payment->delete();

        return redirect()->route('payments.index', $billingId)->with('success', 'Payment deleted successfully.');
    }

    public function show($billingId)
    {
        $billing = Billing::with('package')->findOrFail($billingId);
        return view('pages.billings.show', compact('billing'));
    }
}
