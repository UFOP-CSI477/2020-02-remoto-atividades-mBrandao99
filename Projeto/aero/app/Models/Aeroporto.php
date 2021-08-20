<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Aeroporto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade_id',
    ];

    public function getCidadeAttribute()
    {
        if (isset(Config::get('cidades')[$this->cidade_id])) {
            return Config::get('cidades')[$this->cidade_id]['nome'];
        }

        return "Cidade não encontrada";
    }

    public function getEstadoAttribute()
    {
        if (isset(Config::get('cidades')[$this->cidade_id])) {
            return Config::get('estados')[Config::get('cidades')[$this->cidade_id]['UF']]['nome'];
        }

        return "Estado não encontrado";
    }

    public function getEstadoIdAttribute()
    {
        if (isset(Config::get('cidades')[$this->cidade_id])) {
            return Config::get('cidades')[$this->cidade_id]['UF'];
        }

        return -1;
    }

    public function voosSaida() {
        return $this->hasMany(Voo::class, 'aeroporto_saida_id');
    }

    public function voosChegada() {
        return $this->hasMany(Voo::class, 'aeroporto_chegada_id');
    }

    // 1 Aeroporto -> N Voos
    // public function voosTodos() {
    //     return $this->voosSaida->merge($this->voosChegada);
    // }
}
