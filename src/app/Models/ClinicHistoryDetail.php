<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicHistoryDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'temperatura',
        'peso',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'fecha_hora',
        'alimentacion',
        'habitad',
        'observacion',
        'colaborador_id',
        'historia_clinica_id'
    ];
}
