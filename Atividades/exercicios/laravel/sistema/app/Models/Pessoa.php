<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cidade_id'];

    // 1 Pessoa -> N Compras
    public function compras() {
        return $this->hasMany(Compra::class);
    }

    // 1 Pessoa -> 1 Cidade
    public function cidade() {
        return $this->belongsTo(Cidade::class);
    }
}
