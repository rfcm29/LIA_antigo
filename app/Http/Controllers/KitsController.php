<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\estado_reserva;
use App\Models\Itens;
use App\Models\Kits;
use App\Models\Reserva;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

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
        $kit = Kits::find($id);
        $kit->kits;
        $kit->itens;
        $kit->Estado_kit;
        $kit->Categoria;

        //return $kit->itens;
        return view('admin.kits.show', ['kit' => $kit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kit = Kits::find($id);
        $kit->kits;
        $kit->itens;
        $kit->Estado_kit;
        $kit->Categoria;
        $categorias = Categoria::all();

        return view('admin.kits.edit', ['kit' => $kit, "categorias" => $categorias]);
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
        $kit = Kits::find($id);
        $itens = $kit->itens;
        $kits = $kit->kits;

        request()->validate([
            'descricao' =>'required',
            'preco' => 'required',
            'categoria' => 'required'
        ]);

        //editar ou eliminar items do kit
        foreach($itens as $item){
            if($request->editarItens){
                $request->validate([
                    'editarItens.*.descricao' => 'required'
                ]);
            $eliminarItem = true;
                foreach($request->editarItens as $key => $editarItem){
                    if($item->id == $key){
                        $eliminarItem = false;
                        $item->update([
                            'descricao' => $editarItem['descricao'],
                            'modelo' => $editarItem['modelo'],
                            'serial_number' => $editarItem['serial_number'],
                            'ref_ipvc' => $editarItem['ref_ipvc']
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

        //editar ou eliminar kits do kit
        foreach($kits as $kitUpdate){
            if($request->editarKits){
                $request->validate([
                    'editarKits.*' => 'required|exists:kits,lia_code'
                ]);
                $removerKit = true;
                foreach($request->editarKits as $key => $editarKit){
                    if($kitUpdate->id == $key){
                        $removerKit = false;
                    }
                }
                if($removerKit){
                    $kitUpdate->id_kit = null;
                    $kitUpdate->save();
                }
            } else {
                $kitUpdate->id_kit = null;
                $kitUpdate->save();
            }
        }

        if($request->itens || $request->kits){
            $request->validate([
                'itens.*.descricao' => 'required',
                'kits.*' => 'required|exists:kits,lia_code'
            ]);

            if($request->itens){
                foreach ($request->itens as $item) {
                    Itens::create([
                        'descricao' => $item['descricao'],
                        'modelo' => $item['modelo'],
                        'serial_number' => $item['serial_number'],
                        'ref_ipvc' => $item['ref_ipvc'],
                        'id_kit' => $id
                    ]);
                }
            }

            if($request->kits){
                foreach ($request->kits as $_item) {
                    $data = Kits::where('lia_code', $_item)->first();
                    $data->id_kit = $id;
                    $data->save();
                }
            }
        }

        $kit->update([
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'preco' => $request->preco
        ]);
        $kit->save();

        //return $request;

        return redirect('/admin/kits/' . $id);
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
        $kitsDisponiveis = collect();

        if(session()->has('reserva')){
            foreach ($kits as $kit) {

                if($kit->reserva->isEmpty()){
                    $kitsDisponiveis->push($kit);
                } else{
                    $reservas = Reserva::whereBetween('data_inicio', [session()->get('reserva.dataInicio'), session()->get('reserva.dataFim')])
                                        ->orWhereBetween('data_fim', [session()->get('reserva.dataInicio'), session()->get('reserva.dataFim')])
                                        ->orWhere([
                                            ['data_inicio', '<=', session()->get('reserva.dataInicio')],
                                            ['data_fim', '>=', session()->get('reserva.dataFim')]
                                        ])->get();
                    if($reservas->isNotEmpty()){
                        foreach($reservas as $reserva){
                            $kitDisponivel = true;
                            foreach($kit->reserva as $reservaKit){
                                if($reserva->id == $reservaKit->id && ($reserva->estado == 1 || $reserva->estado == 2 || $reserva->estado == 4)){
                                    $kitDisponivel = false;
                                }
                            }
                            if($kitDisponivel){
                                $kitsDisponiveis->push($kit);
                            }
                        }
                    }else {
                        $kitsDisponiveis->push($kit);
                    }
                }
            }
            return view('user.categoria', ['kits' => $kitsDisponiveis]);
        }

        return view('user.categoria', ['kits' => $kits]);
    }

    public function showKit($id)
    {
        $kit = Kits::find($id);
        $itens = Kits::find($id)->itens;
        $kits = Kits::find($id)->kits;
        $categoria = Kits::find($id)->Categoria;

        //return $itens;
        return view('user.produto', ['kit' => $kit, 'kits' => $kits, 'itens' => $itens, 'categoria' => $categoria]);
    }

}
