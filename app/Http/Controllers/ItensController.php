<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Itens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = Itens::all();

        return view('admin.itens.index', ['itens' => $itens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.itens.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'serial_number' => 'numeric|required',
            'ref_ipvc' => 'required',
            'categoria' => 'required|not_in:0'
        ]);


        Itens::create($request->all());

        return redirect('admin/itens');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Itens::findOrFail($id);

        return view('admin.itens.show', ['item' => $item]);
        //return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Itens::findOrFail($id);
        return view('admin.itens.edit', ['item' => $item]);
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
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required'
        ]);


        $item = Itens::find($id);
        $item->update($request->all());
        $item->save();

        return view('admin.itens.show', ['item' => $item]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Itens::find($id);
        $item->delete();
        return redirect('admin/itens');

    }
}
