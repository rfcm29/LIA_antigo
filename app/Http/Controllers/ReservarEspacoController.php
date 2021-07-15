<?php

namespace App\Http\Controllers;

use App\Models\ReservarEspaco;
use Illuminate\Http\Request;

class ReservarEspacoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = ReservarEspaco::all();
        foreach($reservas as $reserva){
            $reserva->Espacos;
            $reserva->getUser;
        }

        return view('admin.reservaEspaco.index', ['reservas' => $reservas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservarEspaco  $reservarEspaco
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = ReservarEspaco::find($id);
        $reserva->getUser;
        $reserva->Espacos;

        return view('admin.reservaEspaco.show', ['reserva' => $reserva]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservarEspaco  $reservarEspaco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservarEspaco  $reservarEspaco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservarEspaco  $reservarEspaco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
