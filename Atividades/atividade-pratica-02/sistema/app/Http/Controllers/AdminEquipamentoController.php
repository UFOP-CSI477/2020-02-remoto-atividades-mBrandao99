<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipamentoStoreRequest;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminEquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $equipamentos = Equipamento::orderBy('nome')->get();
        return view('admin.equipamentos.index', ['equipamentos' => $equipamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipamentoStoreRequest $request)
    {
        Equipamento::create($request->all());
        session()->flash('data', ['success', 'Equipamento cadastrado com sucesso!']);
        return redirect()->route('admin.equipamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function show(Equipamento $equipamento)
    {
        return view('admin.equipamentos.show', ['equipamento' => $equipamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipamento $equipamento)
    {
        return view('admin.equipamentos.edit', ['equipamento' => $equipamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function update(EquipamentoStoreRequest $request, Equipamento $equipamento)
    {
        $equipamento->fill($request->all());
        $equipamento->save();

        session()->flash('data', ['success', 'Equipamento atualizado com sucesso!']);
        return redirect()->route('admin.equipamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipamento $equipamento)
    {
        if ($equipamento->registros->count() > 0) {
            session()->flash('data',['danger', 'Exclusão não permitida! Existem registros associadas.']);
        } else {
            $equipamento->delete();
            session()->flash('data',['success', 'Equipamento excluído com sucesso!']);
        }

        return redirect()->route('admin.equipamentos.index');
    }
}
