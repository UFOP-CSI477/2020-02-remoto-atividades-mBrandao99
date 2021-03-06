<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'um'];

    // 1 Produto -> N Compras
    public function compras() {
        return $this->hasMany(Compra::class);
    }
}
