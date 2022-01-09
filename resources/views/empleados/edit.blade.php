@extends('layouts.app')

@section('content')
<div class="container-fluid mt--8">
    <div class="card">
        <div class="card-body">
            <div align="center">
                <h1>Editar Usuario</h1>
            </div>
            <form method="post" action="{{route('empleados.update',$empleado)}}" novalidate >
                @csrf
                @method('PATCH')

                <h5>Carnet de Identidad:</h5>
                <input type="text"  name="ci" value="{{$empleado->ci}}" class="focus border-primary  form-control" >
                @error('ci')
                    <small class="text-danger">Campo Requerido</small>
                @enderror

                <h5>Nombre Completo:</h5>
                <input type="text"  name="nombre" value="{{$user->name}}" class="focus border-primary  form-control" >
                @error('nombre')
                    <small class="text-danger">Campo Requerido</small>
                @enderror


                <h5>Telefono:</h5>
                <input type="text" name="telefono"  value="{{$empleado->telefono}}" class="focus border-primary  form-control" >


                @error('telefono')
                    <p>DEBE INGRESAR BIEN SU TELEFONO</p>
                @enderror

                <div class="form-group">
                    <h5>Sexo:</h5>
                    <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                        <option value="{{$empleado->sexo}}">{{$empleado->sexo}}</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>

                    @error('sexo')
                        <small class="text-danger">Campo Requerido</small>
                    @enderror
                </div> 

                <h5>Email:</h5>
                <input type="text" name="email"  value="{{$user->email}}"class="focus border-primary  form-control" >

                @error('email')
                    <small class="text-danger">Campo Requerido</small>
                @enderror

                <h5>Nueva Contraseña:</h5>
                <input type="password" name="password" class="focus border-primary  form-control" >

                @error('password')
                    <small class="text-danger">Campo Requerido</small>
                @enderror
                
                <br>
                <div align="center">
                    <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                    <a href="{{route('empleados.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
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


