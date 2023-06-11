@extends('layouts.app')

@section('content')
    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de productos</h5>
    <hr>
    <div class="container">
        <div>
            <a class="btn btn-primary" href="/products/create">Agregar producto</a> 
        </div>
        <section style="margin-top: 20px;">
            <table class="table">
                    <thead class="table-primary">
                        <td>C&oacute;digo</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Categoria</td>
                        <td>Marcas</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($productos as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->precio}}</td>
                            <td>{{$item->categoria}}</td>
                            <td>{{$item->marcas}}</td>
                            <td>
                                @if(Auth::user()->role == "admin")
                                <a class="btn btn-info btn-sm" href="/products/edit/{{$item->codigo}}">Modificar</a>
                                @endif
                                <button class="btn btn-danger btn-sm" url="/products/destroy/{{$item->codigo}}"  token="{{csrf_token()}}">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
        
                </tbody>
              </table>
        </section>
    </div>

@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/CRUD.js')}}"></script>
@endsection