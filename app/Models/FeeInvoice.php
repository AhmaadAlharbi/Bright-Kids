<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_date',
        'student_id',
        'level_id',
        'classroom_id',
        'fee_id',
        'amount',
        'description'
    ];

    protected $casts = [
        'invoice_date' => 'datetime',  // This will convert 'invoice_date' to a Carbon instance
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }

    // public function studentAccounts()
    // {
    //     return $this->hasMany(StudentAccount::class);
    // }
    public function student_accounts()
    {
        return $this->hasMany(StudentAccount::class, 'fee_invoice_id'); // Adjust the foreign key if necessary
    }
    public function payments()
    {
        return $this->hasMany(StudentAccount::class, 'fee_invoice_id');
    }
}
