@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar Clientes</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('clientes.update',$cliente)}}" novalidate >

            @csrf
            @method('PATCH')
            
            <h5>Carnet de Identidad:</h5>
            <input type="text"  name="ci" value="{{$cliente->ci}}" class="focus border-primary  form-control" >
            @error('ci')
            <p>DEBE INGRESAR BIEN EL CI</p>
            @enderror

            <h5>Nombre Completo:</h5>
            <input type="text"  name="nombre" value="{{$cliente->nombre}}" class="focus border-primary  form-control" >

            @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
            @enderror

            <h5>Telefono:</h5>
            <input type="text" name="telefono" value="{{$cliente->telefono}}"  class="focus border-primary  form-control" >


            @error('telefono')
                <p>DEBE INGRESAR BIEN SU TELEFONO</p>
            @enderror

            <h5>Email:</h5>
            <input type="text" name="email" value="{{$cliente->email}}" class="focus border-primary  form-control" >


            @error('email')
                <p>DEBE INGRESAR BIEN SU EMAIL</p>
            @enderror
            
            <br>
            <br>

            <button  class="btn btn-danger btn-sm" type="submit">Guardar</button>
            <a href="{{route('clientes.index')}}"class="btn btn-warning text-white btn-sm">Volver</a>
        </form>

    </div>
</div>
@stop