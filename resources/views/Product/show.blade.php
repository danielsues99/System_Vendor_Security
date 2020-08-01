@extends('layouts.inicionavbar')

@section('content')

    <div class="row">

        <div class="col-sm-4">

            <img src="{{$product['imagen']}}" class="img-responsive" style="max-height:400px" style="max-width:3000px"/>

        </div>
        <div class="col-sm-8">
            <h2>
                {{$product['name']}}
            </h2>
            <p>
                <strong>Categoría:</strong> {{$product['category']}}
            </p>
            <p>
                <strong>Marca:</strong> {{$product['mark']}}
            </p>
             <p>
                <strong>Modelo:</strong> {{$product['model']}}
            </p>
            <p>
                <strong>Precio:</strong> {{$product['cost']}} <strong> $ COP</strong>
            </p> 
            <p>
                <strong>Descripción:</strong> {{$product['description']}}
            </p>
            <a href="{{ url('/productos') }}">
                <button type="button" class="btn btn-warning">
                    <span class="glyphicon glyphicon-chevron-left"></span> Volver al listado
                </button>
            </a>    
        </div>
    </div>

@stop