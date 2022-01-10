@extends('layouts.app')

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row row justify-content-center m-2">
                        <h2 class="font-weight-bold">REALIZAR PEDIDO</h2>
                    </div>
                     
                    <form method="post" action="{{route('detalle_pedidos.store')}}" novalidate >
                        @csrf 
                        <div class="row justify-content-center"> 
                            <div class="col-4"><h5>Cliente:</h5></div>        
                            <div class="col-4"><h5>Producto:</h5></div>
                            <div class="col-4"><h5>Cantidad:</h5></div>

                            <div class="col-2"></div>
                        </div>
        
                        <div class="row justify-content-center align-items-center"> 
                            <div class="col-4">
                                <select name="id_cliente" class="form-control" onchange="habilitar()" >
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                </select>
                            </div>        
                           
                            <div class="col-4">
                                <select name="id_producto" id="id_producto" class="form-control" onchange="habilitar()" >
                                    <option value="">Seleccione una opción</option>
                                        @foreach ($productos as $producto)
                                            <option value="{{$producto->id}}">
                                                {{$producto->nombre}} - Stock: {{$producto->stock}}
                                            </option>
                                        @endforeach
                                </select>
                                @error('id_producto')
                                    <div class="text-danger">
                                        Debe elijir una opción.
                                    </div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <input type="number"  name="cantidad"  class="focus border-primary  form-control">
                                @error('cantidad')
                                    <div class="text-danger">
                                        Debe rellenar este campo.
                                    </div>
                                @enderror
                            </div>   
                           
                            <div class="col-2 align-items-center">
                                <button  class="btn btn-primary btn-sm" type="submit">Añadir</button>
                            </div>
                        </div>  
                    </form>
                    
                    <div class="row row justify-content-center my-4">
                        <h3>DETALLE</h3>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">Producto</th>
                              <th scope="col">Precio/Unidad</th>
                              <th scope="col">Cantidad</th>
                              <th scope="col">Importe</th>
                              <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($detalle_pedidos as $detalle_pedido)
                                <tr>
                                    <td>{{DB::table('productos')->where('id',$detalle_pedido->id_producto)->value('nombre')}}</td>
                                    <td>{{DB::table('productos')->where('id',$detalle_pedido->id_producto)->value('precio_unidad')}}</td>
                                    <td>{{$detalle_pedido->cantidad}}</td>
                                    <td>{{$detalle_pedido->importe}}</td>
                                    <td>
                                        <form action="{{route('detalle_pedidos.destroy',$detalle_pedido)}}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                          value="Borrar"><i class="fas fa-times"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="font-weight-bold">MONTO TOTAL</td>
                                <td class="font-weight-bold">{{$pedido->total}}</td>
                            </tr>
                        </tbody> 
                    </table> 
                </div>
                <div class="row justify-content-end mt-4">
                    <div align="center" class="col">
                        <form action="{{route('pedidos.destroy', $pedido)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm m-2" onclick="return confirm('¿ESTA SEGURO DE BORRAR?')" 
                            value="Borrar">Cancelar Pago</button> 
                            <a class="btn btn-success btn-sm m-2" href="{{route('pedidos.index')}}">Terminar</a> 
                          </form>
                    </div>
                   
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