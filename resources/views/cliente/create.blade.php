@extends('layouts.app')

@section('content')
<div class="container-fluid mt--8">
    <div class="card">
        <div class="card-body">
            <div align="center">
                <h1>Registrar Cliente</h1>
            </div>
            <form method="post" action="{{route('clientes.store')}}" novalidate >
                @csrf
                <h5>Nombre Completo:</h5>
                <input type="text"  name="nombre" class="focus border-primary  form-control" >
                @error('nombre')
                <p>DEBE INGRESAR BIEN SU NOMBRE</p>
                @enderror


                <h5>Telefono:</h5>
                <input type="text" name="telefono"  class="focus border-primary  form-control" >


                @error('telefono')
                    <p>DEBE INGRESAR BIEN SU TELEFONO</p>
                @enderror

                <h5>Email:</h5>
                <input type="text" name="email"  class="focus border-primary  form-control" >


                @error('email')
                    <p>DEBE INGRESAR BIEN SU EMAIL</p>
                @enderror

                <div class="form-group">
                    <h5>Sexo:</h5>
                    <select name="sexo" id="select-sexo"  class="focus border-primary  form-control">
                        <option >Elegir una Opcion</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>

                    @error('sexo')
                        <p>DEBE INGRESAR BIEN SU SEXO</p>
                    @enderror
                </div> 

                <div class="form-group">
                    <h5>Estado:</h5>
                    <select name="estado" id="select-estado"  class="focus border-primary  form-control">
                        <option >Elegir una Opcion</option>
                        <option value="Disponible">Disponible</option>
                        <option value="No Disponible">No Disponible</option>
                    </select>

                    @error('estado')
                        <p>DEBE INGRESAR BIEN EL DATO</p>
                    @enderror
                </div>
                
                <br>
                <div align="center">
                    <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
                    <a href="{{route('clientes.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
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


