<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .home {
      background-color: rgb(83, 209, 218) ;
      border: none;
      color: white;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
    }
    
    /* Darker background on mouse-over */
    .home:hover {
      background-color: rgb(73, 223, 110) ;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="{{ url('/home') }}"><button class="home"><i class="fa fa-home"></i> Administración </button></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            @if( Auth::check() )
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{  Request::is('Cotizacion/index') ? 'active' : ''}}">
                            <a class="nav-link" href="{{url('/cotizacions')}}">
                                <span>&#10010</span> Cotizar
                            </a>
                        </li>
                        <li class="nav-item {{  Request::is('Cotizacion/index') ? 'active' : ''}}">
                            <a class="nav-link" href="{{url('/cotizaciones')}}">
                                <span>&#9783</span> Cotizaciones
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item">
                            <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                    Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
        </div>
    </nav>
</body>
</html>