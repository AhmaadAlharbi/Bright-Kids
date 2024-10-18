<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'level_id'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function feeInvoices()
    {
        return $this->hasMany(FeeInvoice::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
