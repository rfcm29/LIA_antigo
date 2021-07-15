<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{
    public function index($id){
        $user = User::find($id);
        return view('user.perfil.userInfo', ['user'=>$user]);
    }

    public function getReservas($id){
        $user = User::find($id);
        $reservas = $user->Reservas;
        foreach($reservas as $reserva){
            $reserva->kits;
        }

        return view('user.perfil.reservas', ['reservas' => $reservas]);
    }
}
