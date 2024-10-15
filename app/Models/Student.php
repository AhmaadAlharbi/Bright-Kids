<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'parents_id',
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'grade',
        'enrollment_date',
        'student_email',
        'student_phone',
        'profile_picture',
        'address',
        'medical_info',
        'notes',
    ];
    public function parents()
    {
        return $this->belongsTo(Parents::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);  // Assuming there's a 'classrooms' table
    }
    public function documents()
    {
        return $this->hasMany(StudentDocument::class);
    }

    public function studentAccounts()
    {
        return $this->hasMany(StudentAccount::class);
    }

    public function feeInvoices()
    {
        return $this->hasMany(FeeInvoice::class);
    }
}
