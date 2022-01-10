@extends('layouts.app')

@section('content')


<div class="container-fluid mt--8">
    <div class="card">
        <div class="card-body">
            <div align="center">
                <h1>Registrar Pago</h1>
            </div>
            <form method="post" action="{{route('pedido.pago.store',$pedido)}}" novalidate >
                @csrf
                
                <div class="form-group">
                    <h5>Cliente:</h5>
                    <h3>{{App\Models\Cliente::find($pedido->id_cliente)->nombre}}</h3>
                </div>
                
                <div class="form-group">
                    <h5>Monto Total:</h5>
                    <h3>{{$pedido->total}}</h3>
                </div>

                <div class="form-group">
                    <h5>Tipo de Pago:</h5>
                    <select name = "id_tipopago" id="id_tipopago" class="form-control">
                        <option value="">Seleccione el tipo de pago</option>
                            @foreach ($tipo_de_pagos as $tipo_de_pago)
                                <option value="{{$tipo_de_pago->id}}">
                                    {{$tipo_de_pago->nombre}}
                                </option>
                            @endforeach
                    </select>
                </div>
                
                <br>
                <div align="center">
                    <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                    <a href="{{route('pedidos.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
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


