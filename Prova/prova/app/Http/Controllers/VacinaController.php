<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinaStoreRequest;
use App\Http\Requests\VacinaUpdateRequest;
use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacinas = Vacina::orderBy('nome')->get();
        return view('vacinas.index', ['vacinas' => $vacinas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vacinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacinaStoreRequest $request)
    {
        Vacina::create($request->all());
        return redirect()->route('vacinas.index')->withSuccess('Vacina cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function show(Vacina $vacina)
    {
        return view('vacinas.show', ['vacina' => $vacina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacina $vacina)
    {
        return view('vacinas.edit', ['vacina' => $vacina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function update(VacinaUpdateRequest $request, Vacina $vacina)
    {
        $vacina->fill($request->all());
        $vacina->save();
        return redirect()->route('vacinas.index')->withSuccess('Vacina alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacina $vacina)
    {
        if ($vacina->registros->count() > 0) {
            return redirect()->route('vacinas.index')->withWarning('Exclusão não permitida! Existem registros associadas.');
        }

        $vacina->delete();
        return redirect()->route('vacinas.index')->withSuccess('Vacina excluída com sucesso!');
    }
}
