@extends('layouts.app')

@section('content')
<div class="container-fluid mt--7">
    
    <div class="card">
        <div class="card-header">
            <div align="center">
                <h1><b>Crear un nuevo Rol</b></h1>
            </div>
        </div>
        
        <div class="card-body">
            {{-- la informacion del fomr se la envia al controlador "admin.roles.store" --}}
            {!! Form::open(['route' => 'admin.roles.store']) !!}

                @include('admin.roles.partials.form')
            
                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

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
    
