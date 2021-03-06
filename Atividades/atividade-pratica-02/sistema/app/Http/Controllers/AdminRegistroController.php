<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroStoreRequest;
use App\Models\Equipamento;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Http\Request;

class AdminRegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $registros = Registro::orderBy('datalimite')->get();
        return view('admin.registros.index', ['registros' => $registros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipamentos = Equipamento::orderBy('nome')->get();
        $users = User::orderBy('nome')->get();
        return view('admin.registros.create', ['equipamentos' => $equipamentos, 'users' => $users]);
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
        session()->flash('data', ['success', 'Manutenção cadastrada com sucesso!']);
        return redirect()->route('admin.registros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        return view('admin.registros.show', ['registro' => $registro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        $equipamentos = Equipamento::orderBy('nome')->get();
        $users = User::orderBy('nome')->get();
        return view('admin.registros.edit', ['registro' => $registro, 'equipamentos' => $equipamentos, 'users' => $users]);
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

        session()->flash('data', ['success', 'Manutenção atualizada com sucesso!']);
        return redirect()->route('admin.registros.index');
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
        session()->flash('data', ['success', 'Manutenção excluída com sucesso!']);
        return redirect()->route('admin.registros.index');
    }
}
