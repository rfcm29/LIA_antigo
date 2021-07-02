<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Carrinho extends Controller
{
    public function showCarrinho() {
        if(session()->has('reserva')){
            return view('user.carrinho');
        }
        else{
            return view('user.criarCarrinho');
        }
    }

    public function criaCarrinho(Request $request) {

        $request->validate([
            'dataInicio' => 'required',
            'dataFim' => 'required',
            'descricao' => 'required',
        ]);

        $reserva = [
            "user" => Auth::id(),
            "dataInicio" => $request->dataInicio,
            "dataFim" => $request->dataFim,
            "descricao" => $request->descricao
        ];

        session()->put('reserva', $reserva);

        return view('user.carrinho');
    }

    public function cancelaReserva() {
        session()->pull('reserva');

        return view('user.criarCarrinho');
    }
}
