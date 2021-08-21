<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Voo  $voo
    * @return \Illuminate\Http\Response
    */
   public function edit()
   {
       $user = Auth::user();
       return view('auth.edit', ['user' => $user]);
   }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->email, 'email')],
            'cpf' => ['required', 'string', 'size:14', Rule::unique('users')->ignore(Auth::user()->cpf, 'cpf')],
        ]);

        User::whereId(Auth::user()->id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'cpf' => $request['cpf'],
        ]);

        return redirect()->route('home')->withSuccess('Dados cadastrais atualizados com sucesso!');
    }
}
