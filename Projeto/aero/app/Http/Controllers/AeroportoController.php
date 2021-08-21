<?php

namespace App\Http\Controllers;

use App\Http\Requests\AeroportoStoreRequest;
use App\Models\Aeroporto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AeroportoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aeroportos = Aeroporto::orderBy('nome')->get();
        return view('aeroportos.index', ['aeroportos' => $aeroportos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Config::get('estados');
        return view('aeroportos.create', ['estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AeroportoStoreRequest $request)
    {
        Aeroporto::create($request->all());
        return redirect()->route('aeroportos.index')->withSuccess('Aeroporto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aeroporto  $aeroporto
     * @return \Illuminate\Http\Response
     */
    public function show(Aeroporto $aeroporto)
    {
        return view('aeroportos.show', ['aeroporto' => $aeroporto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aeroporto  $aeroporto
     * @return \Illuminate\Http\Response
     */
    public function edit(Aeroporto $aeroporto)
    {
        $estados = Config::get('estados');
        $cidades = collect(Config::get('cidades'))->where('UF', $aeroporto->estado_id);
        return view('aeroportos.edit', ['aeroporto' => $aeroporto, 'estados' => $estados, 'cidades' => $cidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aeroporto  $aeroporto
     * @return \Illuminate\Http\Response
     */
    public function update(AeroportoStoreRequest $request, Aeroporto $aeroporto)
    {
        $aeroporto->fill($request->all());
        $aeroporto->save();
        return redirect()->route('aeroportos.index')->withSuccess('Aeroporto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aeroporto  $aeroporto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aeroporto $aeroporto)
    {
        if($aeroporto->voosSaida->count() > 0 || $aeroporto->voosChegada->count() > 0){
            return redirect()->route('aeroportos.index')->withWarning('Exclusão não permitida! Existem registros associadas.');
        }

        $aeroporto->delete();
        return redirect()->route('aeroportos.index')->withSuccess('Aeroporto excluído com sucesso!');
    }
}
