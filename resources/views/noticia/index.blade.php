@extends('layouts.app')

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                          <h3 class="mb-0"><b>TABLERO DE NOTICIAS</b></h3>
                        </div>
                        <div align="right" class="col-md-4">
                            <a href="{{route('noticias.create')}}" class="btn btn-primary">Nueva Noticia</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="clientes">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Fecha</th>

                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($noticias as $noticia)
                            {{-- @php  $usuario = App\Models\User::find($user->id);  @endphp --}}
                            <tr>
                              <td>{{$noticia->id}}</td>
                              <td>{{$noticia->descripcion}}</td>
                              <td>{{$noticia->hora}}</td>
                              <td>{{$noticia->fecha}}</td>
                             
                             
                              <td class="text-right">
                                <form  action="{{route('noticias.destroy',$noticia)}}" method="post">
                                  @csrf
                                  @method('delete')
                                   
                                    <a class="btn btn-info btn-sm" href="{{route('noticias.edit',$noticia)}}"> Editar</a> 
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
