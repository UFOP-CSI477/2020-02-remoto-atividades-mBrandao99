<?php

namespace App\Models;

use Carbon\Carbon;
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
        'dose',
        'data',
    ];

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getDataAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

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
