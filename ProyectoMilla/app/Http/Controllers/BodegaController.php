<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Salida;
use App\Models\Entrada;
use Illuminate\Http\Request;
use App\Models\BodegaProducto;

class BodegaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $bodegas = Bodega::select(
            "Bodegas.codigo",
            "Bodegas.nombre",
            "Bodegas.ubicacion"
        )->get();

        return view('/bodegas/show')->with(['bodegas' => $bodegas]);
    }

    public function create(){
        return view('/bodegas/create');
    }

    public function store(Request $request){

        $data = request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required'
        ]);
        Bodega::create($data);

        return redirect('/bodegas/show');
    }

    public function edit(Bodega $bodega){
        return view('/bodegas/update')->with(['bodega'=>$bodega]);
    }

    public function update(Request $request, Bodega $bodega){
        $data = request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required'
        ]);

        $bodega->nombre = $data['nombre'];
        $bodega->ubicacion = $data['ubicacion'];

        $bodega->save();

        return redirect('/bodegas/show');
    }

    public function destroy($id){
        Entrada::where('id_bodega', $id)->delete();
        Salida::where('id_bodega', $id)->delete();
        BodegaProducto::where('id_bodega', $id)->delete();
        Bodega::destroy($id);

        return response()->json(array('res' => true));
    }
}
