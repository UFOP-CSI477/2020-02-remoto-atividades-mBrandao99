<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Vacina;
use Illuminate\Http\Request;
use stdClass;

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
    public function inicial()
    {
        return view('inicial');
    }

    /**
     * Mostra a página inicial da área geral.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function geral()
    {
        return view('geral');
    }

    /**
     * Mostra a página inicial da área adiministrativa.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        return view('admin');
    }

    /**
     * Mostra a página do relatório de vacinadas.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function vacinadas()
    {
        $vacinadas = new stdClass();
        $vacinadas->dose_unica       =  ['nome' => 'Dose Única',    'total' => 0];
        $vacinadas->primeira_dose    =  ['nome' => 'Primeira Dose', 'total' => 0];
        $vacinadas->segunda_dose     =  ['nome' => 'Segunda Dose',  'total' => 0];
        $vacinadas->terceira_dose    =  ['nome' => 'Terceira Dose', 'total' => 0];
        $vacinadas->outros           =  ['nome' => 'Outros',        'total' => 0];

        $registros = Registro::get();
        foreach ($registros as $r) {
            switch($r->dose) {
                case  0: $vacinadas->dose_unica['total']    += 1; break;
                case  1: $vacinadas->primeira_dose['total'] += 1; break;
                case  2: $vacinadas->segunda_dose['total']  += 1; break;
                case  3: $vacinadas->terceira_dose['total'] += 1; break;
                default: $vacinadas->outros['total']        += 1;
            }
        }
        return view('geral.vacinadas', ['vacinadas' => $vacinadas]);
    }

    /**
     * Mostra a página do relatório de aplicações.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aplicacoes()
    {
        $aplicacoes = array();
        $total_geral = 0;
        $vacinas = Vacina::orderBy('nome')->get();

        foreach ($vacinas as $v) {
            $aplicacoes[$v->id] = ['nome' => $v->nome, 'total' => $v->registros->count()];
        }

        foreach ($aplicacoes as $a) {
            $total_geral += $a['total'];
        }

        return view('geral.aplicacoes', ['aplicacoes' => $aplicacoes, 'total_geral' => $total_geral]);
    }


}
