@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de contenido de bodega</h5>
    <hr>
    <div class="container">
        <section style="margin-top: 20px;">
            <table class="table">
                    <thead class="table-primary">
                        <td>Codigo</td>
                        <td>Bodega</td>
                        <td>Producto</td>
                        <td>cantidad</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($productos as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->bodega}}</td>
                            <td>{{$item->producto}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td>
                                @if(Auth::user()->role == "admin")
                                <a class="btn btn-info btn-sm" href="/bodegas/content/edit/{{$item->codigo}}">Modificar</a>
                                <button class="btn btn-danger btn-sm" url="/bodegas/content/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
                                @endif
                                
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