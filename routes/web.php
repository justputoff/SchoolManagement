<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('registration', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('registration/create', [RegistrationController::class, 'create'])->name('registration.create');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('packages', [PackageController::class, 'store'])->name('packages.store');
    Route::get('packages/{package}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::put('packages/{package}', [PackageController::class, 'update'])->name('packages.update');
    Route::delete('packages/{package}', [PackageController::class, 'destroy'])->name('packages.destroy');

    Route::get('class_rooms', [ClassRoomController::class, 'index'])->name('class_rooms.index');
    Route::get('class_rooms/create', [ClassRoomController::class, 'create'])->name('class_rooms.create');
    Route::post('class_rooms', [ClassRoomController::class, 'store'])->name('class_rooms.store');
    Route::get('class_rooms/{classRoom}/edit', [ClassRoomController::class, 'edit'])->name('class_rooms.edit');
    Route::put('class_rooms/{classRoom}', [ClassRoomController::class, 'update'])->name('class_rooms.update');
    Route::delete('class_rooms/{classRoom}', [ClassRoomController::class, 'destroy'])->name('class_rooms.destroy');

    // Subject routes
    Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

    // Schedule routes
    Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
    Route::post('schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::get('schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

    // Student routes
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('students', [StudentController::class, 'store'])->name('students.store');
    Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Billing routes
    Route::get('billings', [BillingController::class, 'index'])->name('billings.index');
    Route::get('billings/create', [BillingController::class, 'create'])->name('billings.create');
    Route::post('billings', [BillingController::class, 'store'])->name('billings.store');
    Route::get('billings/{billing}/edit', [BillingController::class, 'edit'])->name('billings.edit');
    Route::put('billings/{billing}', [BillingController::class, 'update'])->name('billings.update');
    Route::delete('billings/{billing}', [BillingController::class, 'destroy'])->name('billings.destroy');
    Route::get('billings/{billing}/payments', [BillingController::class, 'showPayments'])->name('payments.index');
    Route::get('billings/{billing}/payments/create', [BillingController::class, 'createPayment'])->name('payments.create');
    Route::post('billings/{billing}/payments', [BillingController::class, 'storePayment'])->name('payments.store');
    Route::get('billings/{billing}/payments/{payment}/edit', [BillingController::class, 'editPayment'])->name('payments.edit');
    Route::put('billings/{billing}/payments/{payment}', [BillingController::class, 'updatePayment'])->name('payments.update');
    Route::delete('billings/{billing}/payments/{payment}', [BillingController::class, 'destroyPayment'])->name('payments.destroy');
    Route::get('billings/{billing}', [BillingController::class, 'show'])->name('billings.show');
    
    Route::get('registration', [RegistrationController::class, 'index'])->name('registration.index');
    Route::get('registration/{id}/edit', [RegistrationController::class, 'edit'])->name('registration.edit');
    Route::put('registration/{id}', [RegistrationController::class, 'update'])->name('registration.update');
    Route::delete('registration/{id}', [RegistrationController::class, 'destroy'])->name('registration.destroy');
    Route::get('registration/{id}', [RegistrationController::class, 'show'])->name('registration.show'); // Added show route

    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('transactions/{billing}', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});


require __DIR__.'/auth.php';
