<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'receipt_id',
        'Debit',
        'credit',
        'description',
    ];

    // Optionally, define relationships if necessary
    public function receipt()
    {
        return $this->belongsTo(ReceiptStudent::class);
    }
}
