
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <h1> SistemaCRM</h1>
        </a>
      
        
  
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            
            <ul class="navbar-nav">

                

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Inicio') }}
                    </a>
                </li>
                
                

                {{--  desplegable  --}}

                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fas fa-user-shield" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Configuraciones') }}</span>
                    </a>
    
                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users text-black"></i> {{ __('Administrar Usuarios') }}
                                </a>
                            </li>
            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.roles.index') }}">
                                    <i class="fas fa-user-lock text-blue"></i> {{ __('Administrar Roles') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-user-tie text-blue"></i> {{ __('Registrar Empleado') }}
                                </a>
                            </li>
            
                            
                        </ul>
                    </div>
                </li>
    
               
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                      <i class="ni ni-bullet-list-67 text-default"></i>
                       <span class="nav-link-text">Tables</span> 
                    </a> 
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bitacora.index') }}">
                        <i class="fas fa-history text-green"></i> {{ __('Ver Bitacora') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reporte.hoy') }}">
                        <i class="fas fa-file-alt text-blue"></i> {{ __('Reportes') }}
                    </a>
                </li>
                
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('empleados.create') }}">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Registrar Empleado') }}
                    <a class="nav-link" href="{{route('clientes.index')}}">
                        <i class="fas fa-address-book text-blue"></i> {{ __('Registrar Cliente') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('productos.index')}}">
                        <i class="fas fa-store text-blue"></i> {{ __('Registrar Producto') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('documentos.index')}}">
                        <i class="fas fa-folder-plus text-blue"></i> {{ __('Registrar Documentos') }}
                    </a>
                </li>

                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{route('documentos.index')}}">
                        <i class="fas fa-folder-plus text-blue"></i> {{ __('Registrar Documentos') }}
                    </a> --}}
                    <a class="nav-link" id="theme-button"> 
                        <i class="fas fa-palette"></i> {{ __('Modo oscuro ') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
           {{-- <h6 class="navbar-heading text-muted">Documentation</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                       <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                       <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>
