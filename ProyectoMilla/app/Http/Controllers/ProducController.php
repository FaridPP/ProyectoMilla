<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
            "categoria.nombre as categoria"
        )->join("categoria", "categoria.codigo", "=", "productos.categoria")->get();

        return view('/products/show')->with(['productos' => $productos]);
    }

    public function create()
    {
        $categoria = Branch::all();

        return view('/products/create')->with(['categoria' => $categoria]);
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'categoria' => 'required'
        ]);

        Product::create($data);

        return redirect('/products/show');
    }

    public function edit(Product $product)
    {
        //Listar las marcas
        $categoria = Branch::all();

        //Mostrar la vista
        return view('products/update')->with(['categoria' => $categoria, 'producto' => $product]);
    }

    public function update(Request $request, Product $product)
    {

        $data = request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'categoria' => 'required'
        ]);

        $product->nombre = $data['nombre'];
        $product->precio = $data['precio'];
        $product->categoria = $data['categoria'];
        $product->updated_at = now();

        //Guardar la informacion (actualizar)
        $product->save();

        //Redireccionar 
        return redirect('/products/show');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json(array('res' => true));
    }
}
