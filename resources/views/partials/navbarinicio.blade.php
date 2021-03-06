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
            <a href="{{ url('/inicio') }}"><button class="home"><i class="fa fa-home"></i> Inicio </button></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>          
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::is('Product') && ! Request::is('Product/catalog')? 'active' : ''}}">
                            <a class="nav-link" href="{{url('/productos')}}">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                Productos
                            </a>
                        </li>
                        <li>
                            <a class="nav-link">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                Contacto
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
</body>
</html>