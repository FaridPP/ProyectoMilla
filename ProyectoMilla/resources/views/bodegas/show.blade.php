@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de Bodegas</h5>
    <hr>
    <div class="container">
        <div>
            <a class="btn btn-primary" href="/bodegas/create">Agregar bodega</a> 
            <form class="row row-cols-lg-auto g-3 align-items-center" style="margin-top: 10px;" action="/bodegas/content/" method="POST">
                @csrf
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Bodegas</label>
                    <select class="form-select" id="inlineFormSelectPref" name="id_bodegas">
                        @foreach ($bodegas as $item)
                        <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ver</button>
                  </div>
            </form>
        </div>
        <section style="margin-top: 20px;">
            <table class="table">
                    <thead class="table-primary">
                        <td>C&oacute;digo</td>
                        <td>Nombre</td>
                        <td>ubicacion</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($bodegas as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->ubicacion}}</td>
                            <td>
                                @if(Auth::user()->role == "admin")
                                <a class="btn btn-info btn-sm" href="/bodegas/edit/{{$item->codigo}}">Modificar</a>
                                <button class="btn btn-danger btn-sm" url="/bodegas/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
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