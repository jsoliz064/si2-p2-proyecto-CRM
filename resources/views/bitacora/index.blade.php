@extends('layouts.app')

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                          <h3 class="mb-0"><b>HISTORIAL</b></h3>
                        </div>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="clientes">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Accion</th>
                                <th scope="col">Implicado</th>
                                <th scope="col">ID implicado</th>
                                <th scope="col">Fecha y Hora</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bitacoras as $bitacora)
                            {{-- @php  $usuario = App\Models\User::find($user->id);  @endphp --}}
                            <tr>
                              <td>{{$bitacora->user}}</td>
                              <td>{{$bitacora->accion}}</td>
                              <td>{{$bitacora->implicado}}</td>
                              <td>{{$bitacora->id_implicado}}</td>
                              <td>{{$bitacora->created_at}}</td>

                              <td class="text-right">
                                  <div class="dropdown">
                                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-ellipsis-v"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <form  action="{{route('clientes.destroy',$bitacora)}}" method="post">
                                          @csrf
                                          @method('delete')
                                            <a class="dropdown-item" href="{{route('clientes.edit',$bitacora)}}">Ver o Editar</a>
                                            <button class="dropdown-item" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" 
                                            value="Borrar">Eliminar</button>
                                        </form>
                                      </div>
                                  </div>
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
