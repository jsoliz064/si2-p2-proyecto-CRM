@extends('layouts.app')

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                          <h3 class="mb-0"><b>CITAS PENDIENTES</b></h3>
                        </div>
                        <div align="right" class="col-md-4">
                            <a href="{{route('citas.create')}}" class="btn btn-primary">Registrar Cita</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    @if ($citas)
                        <div class="card-group">
                            @foreach ($citas as $cita)
                            <div class="card mx-2">
                                <img class="card-img-top" src="{{$cita->url}}" alt="Card image cap" width="20%" height="40%">
                                <div class="card-body">
                                <h5 class="card-title">{{$cita->asunto}}</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div align="center" class="d-flex justify-content-center">
                            
                                {!! $citas->links("pagination::bootstrap-4") !!}
                            
                        </div>

                    @else
                    <div align="center">
                        <p>vacio</p>
                    </div>
                    @endif
                       
                      
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
