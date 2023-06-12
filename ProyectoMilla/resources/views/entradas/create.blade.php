@extends('layouts.app')

@section('content')
    <h1 class="text-center">Producto</h1>
    <h5 class="text-center">Formulario para crear entradas</h5>
    <hr>
    <br>
    <br>
    <div class="container col-12 justify-content-center">
        <div class="card" style="background-color:#cfe2ff; border-radius:1rem; padding: 20px">
            <form action="/entradas/store" method="POST" >
                @csrf
            <div class="row col">
                <div class="col-6" style="margin-top: 10px">
                    Producto
                    <select name="id_producto" class="form-control">
                        @foreach ($producto as $item)
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_producto')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6" style="margin-top: 10px">
                    Proveedor
                    <select name="id_proveedor" class="form-control">
                        @foreach ($proveedor as $item)
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_proveedor')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6" style="margin-top: 10px">
                    Bodega
                    <select name="id_bodega" class="form-control">
                        @foreach ($bodega as $item)
                            <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_bodega')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6" style="margin-top: 10px">
                    Fecha
                    <input type="date" class="form-control" name="fecha">
                    @error('fecha')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6">
                    Precio de adquisición
                    <input type="text" class="form-control" name="precio_adquisicion">
                    @error('precio_adquisicion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6">
                    Cantidad
                    <input type="text" class="form-control" name="cantidad">
                    @error('cantidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            
               
                <div class="col-12 mt-2">
                    <button class="btn btn-primary" style="margin: 20px auto;">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/CRUD.js')}}"></script>
@endsection