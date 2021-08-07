<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Pessoa;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::orderBy('nome')->get();
        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        $produtos = Produto::orderBy('nome')->get();
        return view('compras.create', ['pessoas' => $pessoas, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Compra::create($request->all());
        session()->flash('mensagem', 'Compra cadastrada com sucesso!');
        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return view('compras.show', ['compra' => $compra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        $pessoas = Pessoa::orderBy('nome')->get();
        $produtos = Produto::orderBy('nome')->get();
        return view('compras.edit', ['compra' => $compra, 'pessoas' => $pessoas, 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        $compra->fill($request->all());
        $compra->save();

        session()->flash('mensagem', 'Compra atualizada com sucesso!');
        return redirect()->route('compras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        session()->flash('mensagem', 'Compra excluída com sucesso!');
        return redirect()->route('compras.index');
    }

    public function relPessoa()
    {
        $dados = Compra::groupBy('pessoa_id')->select('pessoa_id', DB::raw('count(*) as total'))->get();
        return view('compras.relatorios.pessoa', ['dados' => $dados]);
    }

    public function relProduto()
    {
        $dados = Compra::groupBy('produto_id')->select('produto_id', DB::raw('count(*) as total'))->get();
        return view('compras.relatorios.produto', ['dados' => $dados]);
    }

    public function relData()
    {
        $dados = Compra::groupBy('data')->select('data', DB::raw('count(*) as total'))->get();
        return view('compras.relatorios.data', ['dados' => $dados]);
    }
}
