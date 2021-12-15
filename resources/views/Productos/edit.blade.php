@extends('layouts.app')

@section('content')
<div class="container-fluid mt--8">
    <div class="card">
        <div class="card-body">
            <div align="center">
                <h1>Editar Producto</h1>
            </div>
            <form method="post" action="{{route('productos.update',$producto)}}" novalidate >
                @csrf
                @method('PATCH')
                <h5>Nombre del Producto:</h5>
                <input type="text"  name="nombre" value="{{$producto->nombre}}" class="focus border-primary  form-control" >
                @error('nombre')
                <p>DEBE INGRESAR BIEN SU NOMBRE</p>
                @enderror


                <h5>Precio por Mayor:</h5>
                <input type="number" name="precio_mayor" value="{{$producto->precio_mayor}}" class="focus border-primary  form-control" >


                @error('precio_mayor')
                    <p>DEBE INGRESAR BIEN EL DATO</p>
                @enderror

                <h5>Precio por Unidad:</h5>
                <input type="number" name="precio_unidad"  value="{{$producto->precio_unidad}}" class="focus border-primary  form-control" >


                @error('precio_unidad')
                    <p>DEBE INGRESAR BIEN EL DATO</p>
                @enderror

                
                <br>
                <div align="center">
                    <button  class="btn btn-danger btn-sm" type="submit">Actualizar</button>
                    <a href="{{route('productos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
                </div>
            </form>

        </div>
    </div>
</div>
<br>
@stop

@push('js')
  <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
  
@endpush
