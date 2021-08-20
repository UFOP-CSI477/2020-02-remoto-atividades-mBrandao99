<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CidadeController extends Controller
{
    public function list(Request $request)
    {
        if(!is_null($request->estado)) {
            $cidades = collect(Config::get('cidades'))->where('UF', $request->estado);
            return response()->json(['data' => $cidades]);

        } else {
            $cidades = collect(Config::get('cidades'));
            return response()->json(['data' => $cidades]);
        }
    }
}
