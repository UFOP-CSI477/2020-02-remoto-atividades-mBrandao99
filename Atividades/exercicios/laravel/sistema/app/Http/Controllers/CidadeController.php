<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index()
    {
        $cidades = Cidade::orderBy('nome')->get();
        return view('cidades.index', ['cidades' => $cidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('nome')->get();
        return view('cidades.create', ['estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cidade::create($request->all());
        session()->flash('mensagem', 'Cidade cadastrada com sucesso!');
        return redirect()->route('cidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        return view('cidades.show', ['cidade' => $cidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        $estados = Estado::orderBy('nome')->get();
        return view('cidades.edit', ['cidade' => $cidade, 'estados' => $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
        $cidade->fill($request->all());
        $cidade->save();

        session()->flash('mensagem', 'Cidade atualizada com sucesso!');
        return redirect()->route('cidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        if ($cidade->pessoas->count() > 0) {
            session()->flash('mensagem', 'Exclus??o n??o permitida! Existem pessoas associadas.');
        } else {
            $cidade->delete();
            session()->flash('mensagem', 'Cidade exclu??da com sucesso!');
        }

        return redirect()->route('cidades.index');
    }
}
