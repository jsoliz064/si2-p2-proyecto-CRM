@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
</head>
<div class="container-fluid mt--8">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div align="center" class="col">
                    <h1>Registrar Pedidos</h1>
                </div>
            </div>
            <form method="post" action="{{route('pedidos.store')}}" novalidate >
                @csrf
                <div class="row">
                    <div class="col-4"></div>

                    <div class="col-4 my-4" align="center">
                        <select name = "nroCliente" id="nroCliente" class="mi-selector form-control">
                        <option value="nulo">Seleccione un Cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}">
                                    {{$cliente->nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4"></div>
                </div>
                <div class="row">
                    <div align="center" class="col">
                        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                        <a href="{{route('pedidos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
                    </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="{{asset('js/mi-script.js')}}"></script>
  
@endpush


