<?php

namespace App\Http\Controllers;

use App\Models\EspacoLia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoEspacoController extends Controller
{
    public function index(){
        $espacos = EspacoLia::all();
        if(session()->has('reservaEspaco')){
            return view('user.espacoLia.escolherEspaco', ['espacos'=> $espacos]);
        }
        return view('user.espacoLia.criarReserva');
    }

    public function criaCarrinho(Request $request) {
        $espacos = EspacoLia::all();

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

        return $espacos;

        return view('user.espacoLia.escolherEspaco', ['espacos'=> $espacos]);
    }

    public function cancelarReserva(){
        session()->pull('reservaEspaco');

        return view('user.espacoLia.criarReserva');
    }

    public function adicionarEspacoCarrinho($id){
        $espaco = EspacoLia::find($id);

        $totalCusto = session()->get('reservaEspaco.custo');

        if(session()->has('reservaEspaco.espacos')){
            $espacos = session()->pull('reservaEspaco.espacos');
            foreach($espacos as $espaco){
                if($espaco->id == $id){
                    array_splice($espacos, $espaco->id);
                } else {
                    session()->push('reservaEspaco.espacos', $espaco);
                }
            }
        } else {
            session()->push('reservaEspaco.espacos', $espaco);
        }
    }
}
