@extends('layouts.app')

@section('content')
<div class="container-fluid mt--8">
    <div class="card">
        <div class="card-body">
            <div align="center">
                <h1>Editar Pedido</h1>
            </div>
            <form method="post" action="{{route('pedidos.update',$pedido)}}" novalidate >
                @csrf
                @method('PATCH')
            
                <h5>Cliente:</h5>
                <select name = "nroCliente" id="nroCliente" value="{{$pedido->nroCliente}}" class="form-control" onchange="habilitar()" >
                    <option value="nulo">Seleccione un Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">
                                {{$cliente->nombre}}
                            </option>
                        @endforeach
                </select>
    
                @error('nroCliente')
                <p>DEBE INGRESAR EL CLIENTE</p>
                @enderror
    
                <h5>Importe:</h5>
                <input type="text"  name="importe" value="{{$pedido->importe}}" class="focus border-primary  form-control" >
    
                @error('importe')
                <p>DEBE INGRESAR BIEN EL IMPORTE</p>
                @enderror
    
                <br>
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


