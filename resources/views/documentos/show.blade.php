@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/cruds.css')}}">
</head>

<div class="container-fluid mt--7">
    <div class="card">
        <div class="card-body">
          <div align="center">
                <img src="{{asset($hojaDocumento->url)}}" alt="">
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
