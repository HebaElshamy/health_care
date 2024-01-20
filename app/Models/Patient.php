<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        "name",
        "age",
        "no_id",
        "password",
        "phone",
        

    ];
    public function appointments()
    {
        return $this->hasMany(NewBooking::class, 'patient_id');
    }
}

