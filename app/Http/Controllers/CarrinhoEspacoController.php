<?php

namespace App\Http\Controllers;

use App\Models\EspacoLia;
use App\Models\ReservarEspaco;
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
            foreach($espacos as $espacoControl){
                if($espacoControl->id == $id){
                    array_splice($espacos, $espacoControl->id);
                }else if($espacoControl->id != $id){
                    array_splice($espacos, $espacoControl->id);
                    session()->push('reservaEspaco.espacos', $espaco);
                }
            }
        } else {
            session()->push('reservaEspaco.espacos', $espaco);
        }

        return back();
    }

    public function confirmarReserva(){
        $espacos = session()->get('reservaEspaco.espacos');

        $reserva = ReservarEspaco::create([
            'descricao' => session()->get('reservaEspaco.descricao'),
            'user' => session()->get('reservaEspaco.user'),
            'data_inicio' => session()->get('reservaEspaco.dataInicio'),
            'data_fim' => session()->get('reservaEspaco.dataFim'),
            'preco' => session()->get('reservaEspaco.custo')
        ]);

        foreach($espacos as $espaco){
            $reserva->Espacos()->attach($espaco->id);
        }

        session()->forget('reservaEspaco');

        return redirect('/');
    }
}
