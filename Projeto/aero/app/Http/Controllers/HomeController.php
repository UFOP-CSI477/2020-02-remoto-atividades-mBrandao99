<?php

namespace App\Http\Controllers;

use App\Models\Aeroporto;
use App\Models\Voo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $estados = Config::get('estados');
        $aeroportos = Aeroporto::orderBy('nome')->get();
        $voos = Voo::orderBy('saida')->get();
        return view('home', ['aeroportos' => $aeroportos, 'estados' => $estados, 'voos' => $voos]);
    }

    public function search(Request $request)
    {

        $voos = Voo::orderBy('saida')->get();

        $voos = $voos->filter(function ($voo) use ($request) {

            $cidade_saida = $voo->aeroportoSaida->cidade_id;
            $cidade_chegada = $voo->aeroportoChegada->cidade_id;
            $saida = Carbon::createFromFormat('d/m/Y H:i', $voo->saida);
            $chegada = Carbon::createFromFormat('d/m/Y H:i', $voo->chegada);

            if($request->cidade_saida_id != -1 && $request->cidade_saida_id != $cidade_saida)
                return false;

            if($request->cidade_chegada_id != -1 && $request->cidade_chegada_id != $cidade_chegada)
                return false;

            if($request->data_saida != null && $request->data_saida != $saida->format('d/m/Y'))
                return false;

            if($request->data_chegada != null && $request->data_chegada != $chegada->format('d/m/Y'))
                return false;

            if($request->horario_saida != null && $request->horario_saida != $saida->format('H:i'))
                return false;

            if($request->horario_chegada != null && $request->horario_chegada != $chegada->format('H:i'))
                return false;

            return true;
        });


        $estados = Config::get('estados');
        $aeroportos = Aeroporto::orderBy('nome')->get();
        return view('home', ['aeroportos' => $aeroportos, 'estados' => $estados, 'voos' => $voos]);
    }

    public function showVoo(Voo $voo)
    {
        $comprada = false;

        if(Auth::user()){
            if(Auth::user()->passagems->where('voo_id', $voo->id)->count() > 0)
                $comprada = true;
        }

        $dataChegada = Carbon::createFromFormat('d/m/Y H:i', $voo->chegada);
        $dataSaida = Carbon::createFromFormat('d/m/Y H:i', $voo->saida);

        $tempo_estimado = $dataChegada->diff($dataSaida)->format('%Hh%im');

        return view('voos.info', ['voo' => $voo, 'tempo_estimado' => $tempo_estimado, 'comprada' => $comprada]);
    }
}
