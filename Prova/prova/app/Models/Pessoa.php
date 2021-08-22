<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cidade',
        'bairro',
        'data_nascimento',
    ];

    // 1 Pessoa -> N Registros
    public function registros() {
        return $this->hasMany(Registro::class);
    }
}
