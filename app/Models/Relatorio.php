<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcionario_id',
        'periodo_inicio',
        'periodo_fim',
        'total_horas_trabalhadas',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
