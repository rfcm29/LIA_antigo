<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoEspacoController extends Controller
{
    public function index(){
        return view('user.espacoLia.criarReserva');
    }
}
