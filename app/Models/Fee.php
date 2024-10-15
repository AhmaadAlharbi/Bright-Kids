<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;



    protected $fillable = ['title', 'amount', 'description', 'year'];

    public function feeInvoices()
    {
        return $this->hasMany(FeeInvoice::class);
    }
}
