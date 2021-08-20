<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voo extends Model
{
    use HasFactory;

    protected $fillable = [
        'aeroporto_saida_id',
        'aeroporto_chegada_id',
        'empresa_id',
        'saida',
        'chegada',
        'primeira',
        'executiva',
        'economica',
    ];

    // 1 Voo -> 1 Empresa
    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

    // 1 Voo -> 1 Aeroporto saida
    public function aeroportoSaida() {
        return $this->belongsTo(Aeroporto::class, 'aeroporto_saida_id');
    }

    // 1 Voo -> 1 Aeroporto chegada
    public function aeroportoChegada() {
        return $this->belongsTo(Aeroporto::class, 'aeroporto_chegada_id');
    }

    // 1 Voo -> N passagens
    public function passagems() {
        return $this->hasMany(Passagem::class);
    }
}
