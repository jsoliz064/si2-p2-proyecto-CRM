@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/cruds.css')}}">
</head>

<div class="container-fluid mt--7">
    <div class="card">
        <div class="card-body">
          <div align="center">
            <form method="post" action="{{route('documentos.update',$documento)}}"  novalidate >
                @csrf
                @method('PATCH')
                <h4><B>DIRECTORIO</B></h4>
    
                <div class="cbp-mc-daniel">
                  <input type="text" value="{{$documento->nombre}}"  name="nombre" class="focus border-primary  form-control" >
                  @error('nombre')
                    <p>DEBE INGRESAR BIEN EL DATO</p>
                  @enderror
                </div>
                
                <button  class="btn btn-danger btn-sm" type="submit">Actualizar Nombre</button>
            </form>
            <br>
            <form action="{{route('documentos-hojas.store2',$documento)}}" method="POST" enctype="multipart/form-data" >
              @csrf
              
              <input type="file" name="url" id="url" accept="image/*" class="form-control" >
              @error('url')
                  <small class="text-danger">{{$message}}</small>
              @enderror
              <button type="submit" class="btn btn-success mt-4">Agregar Archivo</button>
          </form>
          </div>
        </div>
      </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                          <h3 class="mb-0"><b>LISTA DE ARCHIVOS</b></h3>
                        </div>
                        <div align="right" class="col-md-4">
                          
                      </div>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="clientes">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">URL</th>
                                <th scope="col">Fecha de creacion</th>
                                <th scope="col" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hojaDocumentos as $hojaDocumento)
                            {{-- @php  $usuario = App\Models\User::find($user->id);  @endphp --}}
                            <tr>
                              <td>{{$hojaDocumento->id}}</td>
                              <td>{{$hojaDocumento->url}}</td>
                              <td>{{$hojaDocumento->created_at}}</td>
                              <td class="text-right">
                                <form  action="{{route('documentos-hojas.destroy',$hojaDocumento)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-primary btn-sm" href="{{route('documentos-hojas.show',$hojaDocumento)}}">Ver archivo</a>
                                    <button class="btn btn-sm boton"  onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                    value="Borrar"><i class="fas fa-trash-alt text-red"></i></button>
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
<br>
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
