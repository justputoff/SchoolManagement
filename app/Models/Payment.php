<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'user_id', 'package_id', 'amount', 'payment_date', 'status', 'payment_proof', 'billing_id', 'payment_method', 'description', 'type',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function billing()
    {
        return $this->belongsTo(Billing::class, 'billing_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
