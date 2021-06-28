<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function contactos(){
        return view('user.contactos');
    }

    function carrinho(){
        return view('user.carrinho');
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('admin.dashboard');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'user_type' => 1,
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    function check(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    function logout(){
        session()->flush();
        Auth::logout();

        return redirect("login");
    }

    function dashboard(){
        return view('admin.dashboard');
    }
}
