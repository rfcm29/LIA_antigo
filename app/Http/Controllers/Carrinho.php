<?php

namespace App\Http\Controllers;

use App\Models\Kits;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Carrinho extends Controller
{
    public function showCarrinho() {
        if(session()->has('reserva')){
            return view('user.carrinho.carrinho');
        }
        else{
            return view('user.carrinho.criarCarrinho');
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
            "descricao" => $request->descricao,
            "custo" => 0
        ];

        session()->put('reserva', $reserva);

        return view('user.carrinho.carrinho');
    }

    public function cancelaReserva() {
        session()->pull('reserva');

        return view('user.criarCarrinho');
    }

    public function adicionaItem($id){
        $kit = Kits::find($id);

        $totalCusto = session()->get('reserva.custo');

        if(session()->has('reserva.kits')){
            $kitExiste = false;
            foreach(session()->get('reserva.kits') as $kitControl){
                if($kit->id == $kitControl->id){
                    $kitExiste = true;
                }
            }
            if($kitExiste == false){
                session()->push('reserva.kits', $kit);
                $totalCusto += $kit->preco;
                session()->put('reserva.custo', $totalCusto);
            }
            else{
                return back()->withErrors(['Item já adicionado']);
            }
        }
        else {
            session()->push('reserva.kits', $kit);
            $totalCusto += $kit->preco;
            session()->put('reserva.custo', $totalCusto);
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

    public function confirmaReserva(){
        $kits = session()->get('reserva.kits');

        $reserva = Reserva::create([
            'descricao' => session()->get('reserva.descricao'),
            'user' => session()->get('reserva.user'),
            'data_inicio' => session()->get('reserva.dataInicio'),
            'data_fim' => session()->get('reserva.dataFim'),
            'custo' => session()->get('reserva.custo'),
            'estado' => 1
        ]);

        foreach($kits as $kit){
            $reserva->kits()->attach($kit->id);
        }

        session()->forget('reserva');

        return redirect('/');
    }
}
