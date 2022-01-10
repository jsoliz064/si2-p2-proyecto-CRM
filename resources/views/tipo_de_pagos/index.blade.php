@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/cruds.css')}}">
</head>

<div class="container-fluid mt--7">
    <div class="card">
        <div class="card-body">
          <div align="center">
            <form method="post" action="{{route('tipo_de_pagos.store')}}"  novalidate >
                @csrf
                <h4><B>REGISTRAR TIPO DE PAGO</B></h4>
    
                <div class="cbp-mc-daniel">
                  <input type="text" placeholder="Escriba el tipo de pago" name="nombre" class="focus border-primary  form-control" >
                  @error('nombre')
                  <div class="text-danger">
                    Debe rellenar este campo.
                  </div>
                  @enderror
                </div>
                
                <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
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
                          <h3 class="mb-0"><b>LISTA</b></h3>
                        </div>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="clientes">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de creacion</th>
                                <th scope="col" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tipo_de_pagos as $tipo_de_pago)
                            {{-- @php  $usuario = App\Models\User::find($user->id);  @endphp --}}
                            <tr>
                              <td>{{$tipo_de_pago->id}}</td>
                              <td>{{$tipo_de_pago->nombre}}</td>
                              <td>{{$tipo_de_pago->created_at}}</td>
                              <td class="text-right">
                                <form  action="{{route('tipo_de_pagos.destroy',$tipo_de_pago)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-primary btn-sm" href="{{route('tipo_de_pagos.edit',$tipo_de_pago)}}">Editar</a>
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
