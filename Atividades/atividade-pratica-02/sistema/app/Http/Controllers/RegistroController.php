<?php

namespace App\Http\Controllers;

use App\Models\Registro;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $registros = Registro::orderBy('datalimite')->get();
        return view('registros.index', ['registros' => $registros]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        return view('registros.show', ['registro' => $registro]);
    }
}
