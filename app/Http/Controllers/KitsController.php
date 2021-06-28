<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Itens;
use App\Models\Kits;
use EstadoKit;
use Illuminate\Http\Request;

class KitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kits = Kits::all();
        return view('admin.kits.index',  ['kits' => $kits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.kits.create', ['categorias' => $categorias]);
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
            'lia_code' => 'required|unique:kits',
            'preco' => 'required',
            'categoria' => 'required'
        ]);

        if($request->itens || $request->kits){
            $request->validate([
                'itens.*.descricao' => 'required',
                'kits.*' => 'required|exists:kits,lia_code'
            ]);

            $kit = Kits::create([
                'descricao' => $request->descricao,
                'lia_code' => $request->lia_code,
                'preco' => $request->preco,
                'categoria' => $request->categoria,
                'estado_kit' => 1
            ]);

            if($request->itens){
                foreach ($request->itens as $item) {
                    Itens::create([
                        'descricao' => $item['descricao'],
                        'modelo' => $item['modelo'],
                        'serial_number' => $item['serial_number'],
                        'ref_ipvc' => $item['ref_ipvc'],
                        'id_kit' => $kit->id
                    ]);
                }
            }

            if($request->kits){
                foreach ($request->kits as $_item) {
                    $data = Kits::where('lia_code', $_item)->first();
                    $data->id_kit = $kit->id;
                    $data->save();
                }
            }

            return redirect('/admin/kits');
        }

        $kit = Kits::create([
            'descricao' => $request->descricao,
            'lia_code' => $request->lia_code,
            'preco' => $request->preco,
            'categoria' => $request->categoria,
            'estado_kit' => 1
        ]);

        return redirect('/admin/kits');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itens = Kits::find($id)->itens;
        $kits = Kits::find($id)->kits;
        $kit = Kits::find($id);
        $categoria = Kits::find($id)->Categoria;

        //return $itens;
        return view('admin.kits.show', ['kit' => $kit, 'kits' => $kits, 'itens' => $itens, 'categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itens = Kits::find($id)->itens;
        $kits = Kits::find($id)->kits;
        $kit = Kits::find($id);
        $categoria = Kits::find($id)->Categoria;

        //return $itens;
        return view('admin.kits.edit', ['kit' => $kit, 'kits' => $kits, 'itens' => $itens, 'categoria' => $categoria]);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kit1 = Kits::find($id)->kits;
        foreach($kit1 as $item){
            $item->id_kit = null;
            $item->save();
        }
        $kit = Kits::find($id);
        $kit->delete();

        return redirect('/admin/kits');
    }

    public function search(Request $request)
    {
        $kit = $request->kit;
        $data = Kits::where('lia_code', "LIKE", '%'.$kit.'%')
                        ->where('id_kit', null)->get();

        return response()->json(['success'=> $data]);
    }

    public function getKits($categoria){
        $kits = Kits::where('categoria', $categoria)->get();

        return view('user.categoria', ['kits' => $kits]);
    }

}
