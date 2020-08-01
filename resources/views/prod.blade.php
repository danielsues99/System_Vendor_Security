<html>
<head>
    <title>Formulario con Combobox</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet" >
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.js"></script>
</head>
<body>
 
<div class="container col-md-4 col-md-offset-4">
 
    <form>
        <div class="btn-group" role="group" aria-label="...">
            <h2>Productos</h2>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Seleccione una opción
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    @foreach($products as $product)
                    <li><a href="{{$product->id}}">{{$product->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
 
        <div class="form-group">
            <h2>Checkboxes</h2>
            @foreach($products as $product)
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="{{$product->id}}">
                    {{$product->name}}
                </label>
            </div>
            @endforeach
        </div>
       
 
    </form>
</div>
</body>
</html>