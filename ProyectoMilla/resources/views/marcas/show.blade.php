@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de marcas</h5>
    <hr>

    <div class="container">
        <div>
            <a class="btn btn-primary" href="/marcas/create">Agregar marca</a> 
        </div>
        <section style="margin-top: 20px;">
            <table class="table table-content text-center ">
                    <thead class="table-primary">
                        <td>C&oacute;digo</td>
                        <td>Nombre</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($marcas as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>
                                @if(Auth::user()->role == "admin")
                                <a class="btn btn-info btn-sm" href="/marcas/edit/{{$item->codigo}}">Modificar</a>
                                <button class="btn btn-danger btn-sm" url="/marcas/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
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