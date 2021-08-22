<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'fabricante',
        'doses',
    ];

    // 1 Vacina -> N Registros
    public function registros() {
        return $this->hasMany(Registro::class);
    }
}
