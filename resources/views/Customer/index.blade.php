@extends('layouts.customernavbar')

@section('content')

    <div class="container" class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <th>Nombre</th>
                <th>Documento</th>
                <th>Tipo de Documento</th>
                <th>Teléfono</th>
                <th>E-mail</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            @foreach( $arraycustomers as $customer )
            <tbody>
                <td>{{$customer['name']}}</td>
                <td>{{$customer['document']}}</td>
                <td>{{$customer['typedocument']}}</td>
                <td>{{$customer['phone']}}</td>
                <td>{{$customer['email']}}</td>
                <td>{{$customer['address']}}</td>
                <td>{{$customer['city']}}</td>
                <td><a class="btn btn-warning" href="{{ url('customers/'.$customer['id'].'/edit') }}"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
                <td><form action="{{action('CustomerController@destroy', $customer->id)}}" method="POST" style="display:inline">
                    {{ method_field('delete') }}
                    @csrf
                    <button class='btn btn-danger'>
                        Eliminar
                    </button>
                </form></td>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection