<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasPendentes = Reserva::where('estado', 1)->get();
        foreach($reservasPendentes as $reserva){
            $reserva->kits;
            $reserva->getUser;
            $reserva->estadoReserva;
        }

        $reservas = Reserva::where('estado', '<>', 1)->get();
        foreach($reservas as $reserva){
            $reserva->kits;
            $reserva->getUser;
            $reserva->estadoReserva;
        }

        //return $reservas;

        return view('admin.reservas.index', ['reservasPendentes' => $reservasPendentes, 'reservas' => $reservas]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);
        $reserva->kits;
        $reserva->getUser;
        $reserva->estadoReserva;

        //return $reserva;

        return view('admin.reservas.show', ['reserva' => $reserva]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->estado = 2;
        $reserva->save();

        return redirect('/admin/reservas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        $reserva->estado = 3;
        $reserva->save();

        return redirect('/admin/reservas');
    }
}
