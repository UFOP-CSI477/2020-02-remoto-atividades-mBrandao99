<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassagemStoreRequest;
use App\Models\Passagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passagems = Auth::user()->passagems;
        return view('profile.index', ['passagems' => $passagems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PassagemStoreRequest $request)
    {
        $request->merge(["user_id" => Auth::user()->id]);
        Passagem::create($request->all());
        return redirect()->route('profile.index')->withSuccess('Passagem comprada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passagem  $passagem
     * @return \Illuminate\Http\Response
     */
    public function show(Passagem $passagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Passagem  $passagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Passagem $passagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Passagem  $passagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passagem $passagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passagem  $passagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passagem $passagem)
    {
        $passagem->delete();
        return redirect()->route('passagems.index')->withSuccess('Passagem cancelada com sucesso!');
    }

}
