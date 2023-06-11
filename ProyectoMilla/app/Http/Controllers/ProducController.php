<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Product;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\MarcaProducto;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProducController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productos = Product::select(
            "productos.codigo",
            "productos.nombre",
            "productos.precio",
            "categorias.nombre as categoria",
        )->join("categorias", "categorias.codigo", "=", "productos.id_categoria")->get();
        
        foreach ($productos as $producto) {
            $marcas = MarcaProducto::select("marcas.nombre as marca")
            ->join("marcas","marcas.codigo","=","marcasproductos.id_marca")
            ->where("marcasproductos.id_producto","=",$producto->codigo)
            ->pluck("marca")->toArray();

            $producto->marcas = implode(", ", $marcas);
        }
        return view('/products/show')->with(['productos' => $productos]);
    }

    public function create()
    {
        $categoria = Categoria::all();
        $marca = Marca::all();

        return view('/products/create')->with(['categoria' => $categoria, 'marca'=>$marca]);
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'id_categoria' => 'required'
        ]);
        $marcas = request()->validate([
            'marca' => 'required | array',
            'marca.*' => 'exists:marcas,codigo',
        ]);

        $Product = Product::create($data);

        foreach ($marcas['marca'] as $marcaId) {
            $Marcaproducto = new MarcaProducto();
            $Marcaproducto->id_producto = $Product->codigo;
            $Marcaproducto->id_marca = $marcaId;
            $Marcaproducto->save();
        }

        return redirect('/products/show');
    }

    public function edit(Product $product)
    {
        //Listar las marcas
        $categoria = Categoria::all();
        $marca = Marca::all();

        //Mostrar la vista
        return view('products/update')->with(['categoria' => $categoria, 'producto' => $product,'marca'=>$marca]);
    }

    public function update(Request $request, Product $product)
    {

        $data = request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'id_categoria' => 'required'
        ]);
        $marcas = request()->validate([
            'marca' => 'required | array',
            'marca.*' => 'exists:marcas,codigo',
        ]);

        $product->nombre = $data['nombre'];
        $product->precio = $data['precio'];
        $product->categoria = $data['categoria'];

        //Guardar la informacion (actualizar)
        $product->save();

        //Redireccionar 
        return redirect('/products/show');
    }

    public function destroy($id)
    {
        MarcaProducto::where('id_producto', $Id)->delete();
        Product::destroy($id);

        return response()->json(array('res' => true));
        
    }
}
