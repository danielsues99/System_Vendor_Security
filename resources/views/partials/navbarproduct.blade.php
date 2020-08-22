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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                        <li class="nav-item {{ Request::is('Producto') && ! Request::is('Product/create')? 'active' : ''}}">
                            <a class="nav-link" href="{{url('/products')}}">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                Catálogo
                            </a>
                        </li>
                        <li class="nav-item {{  Request::is('Product/create') ? 'active' : ''}}">
                            <a class="nav-link" href="{{url('/products/create')}}">
                                <span>&#10010</span> Agregar
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