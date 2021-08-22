<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function geral()
    {
        return view('geral');
    }

    public function admin()
    {
        return view('admin');
    }

    public function vacinadas()
    {
        return view('geral.vacinadas');
    }

    public function aplicacoes()
    {
        return view('geral.aplicacoes');
    }


}
