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
        "sensor1",
        "sensor2",
        "sensor3",
        "descroption",
    ] ;
}
