<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;


    protected $fillable = [
        'date',
        'type',
        'fee_invoice_id',
        'student_id',
        'Debit',
        'credit',
        'description'
    ];
    protected $casts = [
        'date' => 'datetime',  // This will convert 'date' to a Carbon instance
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // public function feeInvoice()
    // {
    //     return $this->belongsTo(FeeInvoice::class);
    // }
    public function feeInvoice()
    {
        return $this->belongsTo(FeeInvoice::class, 'fee_invoice_id');
    }
}
