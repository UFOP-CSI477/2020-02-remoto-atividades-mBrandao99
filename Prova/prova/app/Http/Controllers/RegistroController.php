<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroStoreRequest;
use App\Models\Pessoa;
use App\Models\Registro;
use App\Models\Unidade;
use App\Models\Vacina;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registro::orderBy('data')->get();
        return view('registros.index', ['registros' => $registros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        $vacinas = Vacina::orderBy('nome')->get();
        $unidades = Unidade::orderBy('nome')->get();
        return view('registros.create', ['pessoas' => $pessoas, 'vacinas' => $vacinas, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroStoreRequest $request)
    {
        Registro::create($request->all());
        return redirect()->route('registros.index')->withSuccess('Registro cadastrado com sucesso!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        $vacinas = Vacina::orderBy('nome')->get();
        $unidades = Unidade::orderBy('nome')->get();
        return view('registros.edit', ['registro' => $registro, 'pessoas' => $pessoas, 'vacinas' => $vacinas, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(RegistroStoreRequest $request, Registro $registro)
    {
        $registro->fill($request->all());
        $registro->save();
        return redirect()->route('registros.index')->withSuccess('Registro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        $registro->delete();
        return redirect()->route('registros.index')->withSuccess('Registro excluído com sucesso!');
    }
}
