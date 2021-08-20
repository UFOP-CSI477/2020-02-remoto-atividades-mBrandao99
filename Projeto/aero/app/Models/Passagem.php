<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'voo_id',
        'user_id',
        'classe',
    ];

    // 1 Passagem -> 1 Voo
    public function voo() {
        return $this->belongsTo(Voo::class);
    }

    // 1 Passagem -> 1 User
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getClasseAttribute() {
        switch($this->classe){
            case 1:
                return "Primeira";
            case 2:
                return "Executiva";
            case 3:
                return "Economica";
        }
    }
}
