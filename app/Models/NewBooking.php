<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        "patient_id",
        "doctor_id",
        "description",
        "temp",
        "heart",
        "spo2",
        "status",
    ] ;
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
