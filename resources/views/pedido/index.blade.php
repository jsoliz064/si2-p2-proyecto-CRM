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
                          <h3 class="mb-0"><b>LISTA DE PEDIDOS</b></h3>
                        </div>
                        <div align="right" class="col-md-4">
                            <a href="{{route('pedidos.create')}}" class="btn btn-primary">Registrar Pedido</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="clientes">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha y hora</th>
                                <th scope="col">Total</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                            {{-- @php  $usuario = App\Models\User::find($user->id);  @endphp --}}
                            <tr>
                              <td>{{$pedido->id}}</td>
                              <td>{{DB::table('clientes')->where('id',$pedido->id_cliente)->value('nombre')}}</td>
                              <td>{{$pedido->created_at}}</td>
                              <td>{{$pedido->total}} bs</td>
                              <td>{{$pedido->estado}}</td>
                              <td class="text-right">
                                <form  action="{{route('pedidos.destroy',$pedido)}}" method="post">
                                  @csrf
                                  @method('delete')
                                  
                                    <a class="btn btn-success btn-sm" href="{{route('pedido.pago.create',$pedido)}}">completado</a> 

                                    <a class="btn btn-info btn-sm" href="{{route('pedidos.edit',$pedido)}}">Editar</a> 
                                    <button class="btn btn-sm boton"  onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                    value="Borrar"><i class="fas fa-trash-alt text-red"></i></button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
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
