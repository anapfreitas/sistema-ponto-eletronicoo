<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPonto extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcionario_id',
        'data',
        'horario_entrada',
        'horario_saida',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
