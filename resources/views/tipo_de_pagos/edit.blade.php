@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/cruds.css')}}">
</head>

<div class="container-fluid mt--7">
    <div class="card">
        <div class="card-body">
          <div align="center">
            <form method="post" action="{{route('tipo_de_pagos.update',$tipoDePago)}}"  novalidate >
                @csrf
                @method('PATCH')
                <h4><B>EDITAR TIPO DE PAGO</B></h4>
    
                <div class="cbp-mc-daniel">
                  <input type="text" value="{{$tipoDePago->nombre}}" name="nombre" class="focus border-primary  form-control" >
                  @error('nombre')
                  <div class="text-danger">
                    Debe rellenar este campo.
                  </div>
                  @enderror
                </div>
                
                <button  class="btn btn-danger btn-sm" type="submit">Actualizar</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

@push('js')
  <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
    $(document).ready(function() {
     $('#clientes').DataTable();
    } );
  </script>
@endpush
