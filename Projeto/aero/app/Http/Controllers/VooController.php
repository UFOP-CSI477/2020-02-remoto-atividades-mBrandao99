<?php

namespace App\Http\Controllers;

use App\Http\Requests\VooStoreRequest;
use App\Models\Aeroporto;
use App\Models\Empresa;
use App\Models\Voo;
use Illuminate\Http\Request;

class VooController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voos = Voo::orderBy('saida')->get();
        return view('voos.index', ['voos' => $voos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::orderBy('nome')->get();
        $aeroportos = Aeroporto::orderBy('nome')->get();
        return view('voos.create', ['empresas' => $empresas, 'aeroportos' => $aeroportos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VooStoreRequest $request)
    {
        // dd($request);
        Voo::create($request->all());
        return redirect()->route('voos.index')->withSuccess('Voo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voo  $voo
     * @return \Illuminate\Http\Response
     */
    public function show(Voo $voo)
    {
        return view('voos.show', ['voo' => $voo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voo  $voo
     * @return \Illuminate\Http\Response
     */
    public function edit(Voo $voo)
    {
        $empresas = Empresa::orderBy('nome')->get();
        $aeroportos = Aeroporto::orderBy('nome')->get();
        return view('voos.edit', ['voo' => $voo, 'empresas' => $empresas, 'aeroportos' => $aeroportos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voo  $voo
     * @return \Illuminate\Http\Response
     */
    public function update(VooStoreRequest $request, Voo $voo)
    {
        $voo->fill($request->all());
        $voo->save();
        return redirect()->route('voos.index')->withSuccess('Voo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voo  $voo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voo $voo)
    {

        if($voo->passagems->count() > 0) {
            return redirect()->route('voos.index')->withWarning('Exclusão não permitida! Existem registros associadas.');
        }

        $voo->delete();
        return redirect()->route('voos.index')->withSuccess('Voo excluído com sucesso!');
    }
}
