<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'mascota_id',
        'fecha_creacion',
    ];
}
