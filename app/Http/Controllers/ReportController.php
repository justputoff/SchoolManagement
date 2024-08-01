<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('pages.reports.index', compact('payments'));
    }
}
