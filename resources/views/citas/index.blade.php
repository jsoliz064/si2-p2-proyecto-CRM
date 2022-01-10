@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/select.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
</head>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                          <h3 class="mb-0"><b>CITAS PENDIENTES</b></h3>
                        </div>
                        <div align="right" class="col-md-4">
                            <button class="btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#addModal" 
                            type="button"  name="button"> 
                           Crear Cita
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    @if ($citas)
                        <div class="card-group">
                            @foreach ($citas as $cita)
                            <div class="card ">
                              
                                <div class="card-body">
                                <i class="fas fa-pen-square fa-10x" style="color: rgb(86, 67, 131)" ></i>
                                <h5 class="card-title">Asunto: {{$cita->asunto}}</h5>
                                <p class="card-text">Descripcion: {{$cita->descripcion}}</p>

                                <p class="card-text"> Cliente: {{DB::table('clientes')->where('id',$cita->idCliente)->value('nombre')}}</p>
                                <p class="card-text">Fecha: {{$cita->fecha}}</p>
                                <p class="card-text">Hora de inicio: {{$cita->horaInicio}}</p>
                                <p class="card-text">Hora de fin: {{$cita->horaFin}}</p>
                                @csrf

                                <form  action="{{route('citas.destroy',$cita)}}" method="post">
                                    @csrf
                                @method('delete')
                                 
                                  <a class="btn btn-info btn-sm" href="{{route('citas.edit',$cita)}}">Ver o Editar</a> 
                                  <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                  value="Borrar">Eliminar</button>
                              </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div align="center" class="d-flex justify-content-center">
                            
                                {!! $citas->links("pagination::bootstrap-4") !!}
                            
                        </div>

                    @else
                    
                    @endif
                       
                      
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
        
</div>

<!--Agregue el formulario-->
<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Crear Cita</h4>
        </div>
        <div class="modal-body">
          <form  action="{{route('citas.store')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                
              </div>
              <div class="form-group">
                <label> Asunto: </label>
                <input type="text" class="form-control" name="asunto">
              </div>
             
              <div class="form-group">
                  <label> Descripción: </label>
                  <input type="text" class="form-control" name="descripcion">
                </div>

                <div class="form-group">
                    <label>Fecha: </label>
                    <input type="date" class="form-control" name="fecha">
                  </div>

                  <div class="form-group">
                    <label> Hora Inicio: </label>
                    <input type="time" class="form-control" name="horaInicio">
                  </div>
                 
                  <div class="form-group">
                    <label> Hora Fin: </label>
                    <input type="time" class="form-control" name="horaFin">
                  </div>
                
                  <div class="form-group">
                <h5>Cliente:</h5>
            <select name = "idCliente" id="idCliente" class="mi-selector form-control" onchange="habilitar()" >
                <option value="">Seleccione el cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">
                            {{$cliente->nombre}}
                        </option>
                    @endforeach
            </select>
                  </div>

         {{--    <h5>Empleado:</h5>
            <select name = "idUser" id="idUser" class="form-control" onchange="habilitar()" >
                <option value="">Seleccione el empleado</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
            </select> --}}

                  <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </form>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

@endsection

@push('js')
  <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="{{asset('js/mi-script.js')}}"></script>
  <script>
    $(document).ready(function() {
     $('#clientes').DataTable();
    } );
  </script>
@endpush 
