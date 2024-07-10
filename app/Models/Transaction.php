<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'student_id', 'description', 'amount', 'transaction_date', 'payment_method', 'payment_proof'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    // public function billing()
    // {
    //     return $this->belongsTo(Billing::class);
    // }
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}