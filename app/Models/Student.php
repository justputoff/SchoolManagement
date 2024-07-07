<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'name', 'address', 'phone', 'email', 'cabang',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'student_packages')->withPivot('status');
    }
}
