<?php

namespace App\Http\Controllers;

use App\Models\Voo;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function passagemVoo()
    {
        $voos = Voo::get();
        return view('relatorios.passagemsvoos', ['voos' => $voos]);
    }
}
