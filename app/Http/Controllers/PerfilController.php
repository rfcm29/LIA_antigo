<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PerfilController extends Controller
{
    public function index($id){
        $user = User::find($id);
        return view("user.perfil", ['user'=>$user]);
    }
}
