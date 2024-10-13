<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'fee_type_id',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'due_date',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function feeType()
    {
        return $this->belongsTo(FeeType::class);
    }
}
