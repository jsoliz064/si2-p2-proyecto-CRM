@extends('layouts.app')

@section('content')
<div class="container-fluid mt--8">
    <div class="card">
        <div class="card-body">
            <div align="center">
                <h1>Editar Cita</h1>
            </div>
            <form method="post" action="{{route('citas.update',$cita)}}" novalidate >
                @csrf
                @method('PATCH')
                <h5>Asunto:</h5>
                <input type="text"  name="asunto" value="{{$cita->asunto}}" class="focus border-primary  form-control" >
                @error('nombre')
                <p>DEBE INGRESAR BIEN SU NOMBRE</p>
                @enderror

                <h5>Descripción:</h5>
                <input type="text"  name="descripcion" value="{{$cita->descripcion}}" class="focus border-primary  form-control" >
                @error('nombre')
                <p>DEBE INGRESAR BIEN SU NOMBRE</p>
                @enderror

                <h5>Fecha:</h5>
                <input type="date"  name="fecha" value="{{$cita->fecha}}" class="focus border-primary  form-control" >
                @error('nombre')
                
                @enderror
                <h5>Hora de Inicio:</h5>
                <input type="time"  name="horaInicio" value="{{$cita->horaInicio}}" class="focus border-primary  form-control" >
                @error('nombre')
                
                @enderror

              
                <h5>Hora de Fin:</h5>
                <input type="time"  name="horaFin" value="{{$cita->horaFin}}" class="focus border-primary  form-control" >
                @error('nombre')
                
                @enderror
               
                <h5>Cliente:</h5>
                <select name = "idCliente" id="idCliente" value="{{$cita->idCliente}}" class="form-control" onchange="habilitar()" >
                    <option value="nulo">Seleccione un Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">
                                {{$cliente->nombre}}
                            </option>
                        @endforeach
                </select>
                
                <br>
                <div align="center">
                    <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                    <a href="{{route('citas.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
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


