<?php

namespace App\Http\Controllers;

use App\Models\EspacoLia;
use App\Models\ItemEspaco;
use Illuminate\Http\Request;

class EspacoLiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espacos = EspacoLia::all();;

        return view('admin.espacoLia.index', ['espacos' => $espacos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.espacoLia.create');
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
            'descricao' => 'required',
            'preco' => 'required|numeric'
        ]);

        if($request->items){
            $request->validate([
                'itens.*.items' => 'required'
            ]);

            $espaco = EspacoLia::create([
                'descricao' => $request->descricao,
                'preco' => $request->preco
            ]);

            foreach($request->items as $item){
                ItemEspaco::create([
                    'espaco_id' => $espaco->id,
                    'descricao' => $item
                ]);
            }
            return redirect('/admin/espacoLia');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $espaco = EspacoLia::find($id);
        $espaco->Items;

        return view('admin.espacoLia.show', ['espaco' => $espaco]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $espaco = EspacoLia::find($id);
        $items = $espaco->Items;

        return view('admin.espacoLia.edit', ['espaco' => $espaco]);
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
        $espaco = EspacoLia::find($id);
        $items = $espaco->Items;

        $request->validate([
            'descricao' => 'required',
            'preco' => 'required|numeric'
        ]);

        foreach($items as $item){
            if($request->editarItems){
                $request->validate([
                    'editarItems.*' => 'required'
                ]);
            $eliminarItem = true;
                foreach($request->editarItems as $key => $editarItem){
                    if($item->id == $key){
                        $eliminarItem = false;
                        $item->update([
                            'descricao' => $editarItem
                        ]);
                        $item->save();
                    }
                }
                if($eliminarItem){
                    $item->delete();
                }
            } else {
                $item->delete();
            }
        }

        if($request->items){
            $request->validate([
                'itens.*.items' => 'required'
            ]);

            foreach($request->items as $item){
                ItemEspaco::create([
                    'espaco_id' => $espaco->id,
                    'descricao' => $item
                ]);
            }
        }

        $espaco->update([
            'descricao' => $request->descricao,
            'preco' => $request->preco
        ]);
        $espaco->save();

        return redirect('/admin/espacoLia/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
