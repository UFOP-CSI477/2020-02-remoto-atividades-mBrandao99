<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipamento_id',
        'user_id',
        'descricao',
        'datalimite',
        'tipo',
    ];

    // 1 Registro -> 1 Equipamento
    public function equipamento() {
        return $this->belongsTo(Equipamento::class);
    }

    // 1 Registro -> 1 User
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getTipoAttribute($value)
    {
        switch($value) {
            case 1:
                return('Preventiva');
            case 2:
                return('Corretiva');
            case 3:
                return('Urgente');
            default:
                return('Desconhecido');
        }
    }

    // public function getDatalimiteAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    // public function setFirstNameAttribute($value)
    // {
    //     $this->attributes['datalimite'] = Carbon::parse($value)->format('Y-m-d');
    // }
}
