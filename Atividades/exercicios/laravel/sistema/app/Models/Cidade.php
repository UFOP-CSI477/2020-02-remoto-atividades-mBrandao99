<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'estado_id'];

    // 1 Cidade -> 1 Estado
    public function estado() {
        return $this->belongsTo(Estado::class);
    }

    // 1 Cidade -> N Pessoas
    public function pessoas() {
        return $this->hasMany(Pessoa::class);
    }
}
