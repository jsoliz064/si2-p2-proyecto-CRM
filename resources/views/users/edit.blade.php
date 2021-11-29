@extends('layouts.app')

@section('content')
@include('layouts.headers.guest')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

<div class="card">
<div class="card-body">
    
    <form method="post" action="{{ route('admin.users.update', $user) }}" >
        @csrf
        @method('PATCH') 

        <div class="form-group col-md-6">
            <label for="name">Ingrese el nombre de usuario</label>
            <input  name="name" type="text" class="form-control" value="{{old('name', $user->name)}}" id="name">
            @error('name')
                <small>{{$message}}</small>
                <br><br>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="check_password">Nueva contraseña</label>
            <input type="password" name="password" class="form-control" value="{{old('password')}}" id="passwordInput" placeholder="Escriba si modificara ">
            @error('password')
                <small>{{$message}}</small>
                <br><br>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="name">Nuevo email</label>
            <input   type="text" name="email" class="form-control" value="{{old('email', $user->email)}}" id="email">
            @error('email')
                <small>{{$message}}</small>
                <br><br>
            @enderror
        </div>
        
        <label for="name">Seleccione un Rol</label>
        <select name="roles" class="form-control col-md-6" id="select-roles" >
            <option value=0 >Seleccione Rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name}}</option>
                @endforeach 
        </select>

        {{-- {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary mt-2']) !!} --}}
        <button type="submit" class="btn btn-primary mt-2">Actualizar Usuario</button>
        <a href="{{route('admin.users.index')}}"class="btn btn-warning mt-2">Volver</a> 
    </form>  

</div>
</div>        


<script> 
var contra = document.getElementById('passwordInput');

function cambiarEstado(){
    if(contra.disabled == true){
        contra.disabled = false
    if(contra.disabled == false){
        contra.disabled = true
        contra.value = ''
    }
}
</script>


@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush