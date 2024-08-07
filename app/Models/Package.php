<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'level', 'description',
    ];

    public function prices()
    {
        return $this->hasMany(PackagePrice::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
