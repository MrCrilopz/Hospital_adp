<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novelty extends Model
{
    //use HasFactory;
    protected $fillable = ['observation', 'appointment_id'];

}
