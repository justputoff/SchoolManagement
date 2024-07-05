<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data total
        $totalClasses = 10;
        $totalTeachers = 15;
        $totalStudents = 200;
        $totalPackages = 5;

        // Mengambil data untuk chart bulanan
        $studentsPerMonth = [
            1 => 20, 2 => 25, 3 => 30, 4 => 35, 5 => 40, 6 => 45,
            7 => 50, 8 => 55, 9 => 60, 10 => 65, 11 => 70, 12 => 75
        ];

        // Menyiapkan data untuk chart
        $months = [];
        $studentCounts = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = 'Bulan ' . $i;
            $studentCounts[] = $studentsPerMonth[$i] ?? 0;
        }

        return view('dashboard', compact('totalClasses', 'totalTeachers', 'totalStudents', 'totalPackages', 'months', 'studentCounts'));
    }
}
