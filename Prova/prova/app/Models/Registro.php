<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pessoa_id',
        'unidade_id',
        'vacina_id',
        'doses',
        'data',
    ];

    // 1 Registro -> 1 Pessoa
    public function pessoa() {
        return $this->belongsTo(Pessoa::class);
    }

    // 1 Registro -> 1 Unidade
    public function unidade() {
        return $this->belongsTo(Unidade::class);
    }

    // 1 Registro -> 1 Vacina
    public function vacina() {
        return $this->belongsTo(Vacina::class);
    }

}
