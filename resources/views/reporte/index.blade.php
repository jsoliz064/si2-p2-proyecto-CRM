@extends('layouts.app')

@section('content')

<div class="container-fluid mt--7">
  
<div class="card">
  <div class="card-body">
    {{--  {!! Form::open(['route'=>'reporte.persona.fecha','method'=>'POST'])!!}  --}}
    <form method="post" action="{{route('reporte.fecha')}}" novalidate >
    @csrf
    <div class="row">
      <div class="col-12 col-md-3">
          <span>Seleccione una tabla</span>
          <div class="form-group">
            <select class="form-control" name="tabla" id="capacidad" onchange="this.nextElementSibling.value=this.value">
              <option value="{{$tabla}}">{{$tabla}}</option>
              <option value="productos">Productos</option>
              <option value="clientes">Clientes</option>
              <option value="empleados">Empleados</option>
              <option value="documentos">Documentos</option>
          </select>
          </div>
        </div>
        <div class="col-12 col-md-3">
            <span>Fecha inicial</span>
            <div class="form-group">
                <input class="form-control" type="date" value="{{$fechaini}}" name="fecha_ini" id="fecha_ini">
            </div>
        </div>
        <div class="col-12 col-md-3">
            <span>Fecha final</span>
            <div class="form-group">
                <input class="form-control" type="date" value="{{$fechafin}}" name="fecha_fin" id="fecha_fin">
            </div>
        </div>
        <div class="col-12 col-md-3 text-center mt-4">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">consultar</button>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <span>Total: <b> </b></span>
            <div class="form-group">
                <strong>{{$total}}</strong>
            </div>
        </div>
    </div>
  {{--    {!!Form::close()!!}  --}}
    </form>

      <table class="table table-striped" id="notaVentas" >

        <thead>

          <tr>
            <th scope="col">ID</th>
            <th scope="col">Datos</th>
            <th scope="col">Fecha y Hora</th>
            <th scope="col" width="20%"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($datos as $dato)

            <tr>
               <td>{{$dato->id}}</td>
               <td>{{$dato->nombre}}</td>
               <td>{{$dato->created_at}}</td>
               <td>
                <form  action="" method="post">
                  @csrf
                  @method('delete')
                   
                    <a class="btn btn-info btn-sm" href="">Ver o Editar</a> 
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                    value="Borrar">Eliminar</button>
                </form>
              </td>
            </tr>
  
            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
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