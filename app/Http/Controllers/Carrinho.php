<?php

namespace App\Http\Controllers;

use App\Models\Kits;
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

    public function adicionaItem($id){
        $kit = Kits::find($id);

        if(session()->has('reserva.kits')){
            $kitExiste = false;
            foreach(session()->get('reserva.kits') as $kitControl){
                if($kit->id == $kitControl->id){
                    $kitExiste = true;
                }
            }
            if($kitExiste == false){
                session()->push('reserva.kits', $kit);
            }
            else{
                return back()->withErrors(['Item já adicionado']);
            }
        }
        else {
            session()->push('reserva.kits', $kit);
        }

        return back();
    }

    public function removeKit($id){
        $kits = session()->pull('reserva.kits');
        foreach ($kits as $kit) {
            if($kit->id == $id){
                array_splice($kits, $kit->id);
            }
            else {
                session()->push('reserva.kits', $kit);
            }
        }

        return back();
    }
}
