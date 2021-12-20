@extends('layouts.app')

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">

            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            
                @include('admin.roles.partials.form')

            {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
            <a href="{{route('admin.roles.index')}}"class="btn btn-warning mt-2">Volver</a>
            {!! Form::close() !!}
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
