<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    // 1 Equipamento -> N Registros
    public function registros() {
        return $this->hasMany(Registro::class);
    }

}
