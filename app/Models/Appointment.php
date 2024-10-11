<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'child_name',
        'father_name',
        'mother_name',
        'dob',
        'visit_date_time',
        'father_phone',
        'mother_phone',
        'father_workplace',
        'mother_workplace',
        'status',
        'branch'
    ];
}