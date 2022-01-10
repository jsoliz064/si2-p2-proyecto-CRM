@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
@stop

@section('content')
<br>
<div class="container " style="background-color: rgb(255, 255, 255)">
    <div class="row justify-content-center border rounded-top">
        <div class="col">
            {{-- datos --}}
            <div class="row border"> 
                <div class="col">
                    <div class="row">
                        <h3 class="font-weight-bold px-2">DATOS PERSONALES</h3>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Carnet de Identidad: </h5>
                        <h5>{{$cliente->ci}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Nombre Completo: </h5>
                        <h5>{{$cliente->nombre}}</h5>
                    </div>

                    <div class="row">
                        <h5 class="font-weight-bold px-2">Telefono: </h5>
                        <h5>{{$cliente->telefono}}</h5>
                    </div>
                    <div class="row">
                        <h5 class="font-weight-bold px-2">Email: </h5>
                        <h5>{{$cliente->email}}</h5>
                    </div>
                    <div class="row">
                        <a href="{{route('clientes.index')}}"class="btn btn-warning text-white btn-sm m-2">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<br>
<br>
@stop