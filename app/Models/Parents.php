<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;
    protected $fillable = [
        'father_first_name',
        'father_last_name',
        'father_occupation',
        'father_phone',
        'father_email',
        'mother_first_name',
        'mother_last_name',
        'mother_occupation',
        'mother_phone',
        'mother_email',
        'home_address',
    ];
    // public function students()
    // {
    //     return $this->hasMany(Student::class, 'family_id');
    // }
}