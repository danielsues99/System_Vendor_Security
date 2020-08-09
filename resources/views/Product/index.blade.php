@extends('layouts.productnavbar')

@section('content')

    <div class="container" class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            @foreach( $arrayproducts as $product )
            <tbody>
                <td>{{$product['category']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['mark']}}</td>
                <td>{{$product['model']}}</td>
                <td>{{$product['imagen']}}</td>
                <td>{{$product['cost']}}</td>
                <td>{{$product['description']}}</td>
                <td><a class="btn btn-warning" href="{{ url('products/'.$product['id'].'/edit') }}">&#9998<span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
                <td><form action="{{action('ProductController@destroy', $product->id)}}" method="POST" style="display:inline">
                    {{ method_field('delete') }}
                    @csrf
                    <button class='btn btn-danger'>
                        &#10006 Eliminar
                    </button>
                </form></td>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection