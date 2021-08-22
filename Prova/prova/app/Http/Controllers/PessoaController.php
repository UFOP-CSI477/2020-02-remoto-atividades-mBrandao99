<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaStoreRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;
class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        return view('pessoas.index', ['pessoas' => $pessoas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaStoreRequest $request)
    {
        Pessoa::create($request->all());
        return redirect()->route('pessoas.index')->withSuccess('Pessoa cadastrada com sucesso!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        return view('pessoas.show', ['pessoa' => $pessoa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', ['pessoa' => $pessoa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaStoreRequest $request, Pessoa $pessoa)
    {
        $pessoa->fill($request->all());
        $pessoa->save();
        return redirect()->route('pessoas.index')->withSuccess('Pessoa alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        if ($pessoa->registros->count() > 0) {
            return redirect()->route('pessoas.index')->withWarning('Exclusão não permitida! Existem registros associadas.');
        }

        $pessoa->delete();
        return redirect()->route('pessoas.index')->withSuccess('Pessoa excluída com sucesso!');
    }
}
