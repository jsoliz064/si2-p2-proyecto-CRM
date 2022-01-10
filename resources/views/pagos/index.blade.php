@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/cruds.css')}}">
</head>

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                          <h3 class="mb-0"><b>HISTORIAL DE PAGOS</b></h3>
                        </div>
                        {{--  <div align="right" class="col-md-4">
                            <a href="{{route('clientes.create')}}" class="btn btn-primary">Registrar Cliente</a>
                        </div>  --}}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="clientes">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Tipo de Pago</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Fecha</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $pago)
                            @php  $pedido = App\Models\Pedido::find($pago->id_pedido);  @endphp
                            <tr>
                              <td>{{$pago->id}}</td>
                              <td>{{DB::table('clientes')->where('id',$pedido->id_cliente)->value('nombre')}}</td>
                              <td>{{DB::table('tipo_de_pagos')->where('id',$pago->id_tipopago)->value('nombre')}}</td>
                              <td>{{DB::table('pedidos')->where('id',$pago->id_pedido)->value('total')}}</td>
                              <td>{{$pago->created_at}}</td>
                              <td class="text-right">
                                <form  action="{{route('pagos.destroy',$pago)}}" method="post">
                                  @csrf
                                  @method('delete')
                                    <a class="btn btn-success btn-sm" href="{{route('pagos.show',$pago)}}">Generar Factura</a> 
                                    <a class="btn btn-info btn-sm" href="{{route('pedidos.edit',$pago->id_pedido)}}">Ver pedido</a> 
                                    <button class="btn btn-sm boton"  onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                    value="Borrar"><i class="fas fa-trash-alt text-red"></i></button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>
    </div>
    @if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
    @endif
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
