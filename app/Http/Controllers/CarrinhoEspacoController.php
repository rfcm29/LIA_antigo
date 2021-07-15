<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoEspacoController extends Controller
{
    public function index(){
        if(session()->has('reservaEspaco')){
            return view('user.espacoLia.escolherEspaco');
        }
        return view('user.espacoLia.criarReserva');
    }

    public function criaCarrinho(Request $request) {
        $request->validate([
            'dataInicio' => 'required',
            'dataFim' => 'required',
            'motivo' => 'required',
        ]);

        $reserva = [
            "user" => Auth::id(),
            "dataInicio" => $request->dataInicio,
            "dataFim" => $request->dataFim,
            "descricao" => $request->motivo,
            "custo" => 0
        ];

        session()->put('reservaEspaco', $reserva);

        return view('user.espacoLia.escolherEspaco');
    }

    public function cancelarReserva(){
        session()->pull('reservaEspaco');

        return view('user.espacoLia.criarReserva');
    }
}
