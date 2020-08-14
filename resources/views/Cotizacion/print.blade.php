@extends('layouts.cotizacionnavbar')

@section('content')


    <div class="row" style="margin-top:20px">
		{{--Lista de cotizaciones--}}
	<div class="container" class="table-responsive">
        <table class="table table-hover">
            <ul class="list-group">
                <input type="hidden" name="id_customer" id="id_customer" readonly class="form-control" value="{{$user->id}}" required>
                
                <label for="name_customer">Nombre:</label>
                <input type="text" name="name_customer" id="name_customer" readonly class="form-control" value="{{$user->name}}" required>
                
                <label for="document_customer">Documento:</label>
                <input type="text" name="document_customer" id="document_customer" readonly class="form-control" value="{{$user->document}}" required>
                
                <label for="phone_customer">Teléfono:</label>
                <input type="text" name="phone_customer" id="phone_customer" readonly class="form-control" value="{{$user->phone}}" required>
                
                <label for="email_customer">E-mail:</label>
                <input type="text" name="email_customer" id="email_customer" readonly class="form-control" value="{{$user->email}}" required>
                
                <label for="address_customer">Dirección:</label>
                <input type="text" name="address_customer" id="address_customer" readonly class="form-control" value="{{$user->address}}" required>
                
                <label for="city_customer">Ciudad:</label>
                <input type="text" name="city_customer" id="city_customer" readonly class="form-control" value="{{$user->city}}" required>
          </ul>
            <thead class="thead-dark">
				<th>#</th>
                <th>ID</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Productos</th>
                <th>Editar</th>
                <th>Eliminar</th>
			</thead>
			@foreach( $cotizaciones as $cotizacion )
            <tbody>
				<td>{{$cotizacion['id']}}</td>
                <td>{{$cotizacion['document_customer']}}</td>
                <td>{{$cotizacion['description']}}</td>
				<td>{{$cotizacion['date']}}</td>
				<td>
                <a class="btn btn-info" href="{{ url('cotizacionproducto/'.$cotizacion['id']).'/select' }}">
						<i class="fa fa-pencil-square-o"></i>
					</a>
				</td>
				<td>
					<a class="btn btn-warning" href="{{ url('cotizacions/'.$cotizacion['id'].'/edit') }}">
						<i class="fa fa-edit"></i>
					</a>
				</td>
				<td><form action="{{action('CotizacionController@destroy', $cotizacion->id)}}" method="POST" style="display:inline">
                    {{ method_field('delete') }}
					@csrf
                    <button class='btn btn-danger'>
                        <i class="fa fa-trash"></i>
                    </button>
                </form></td>
			</tbody>
            @endforeach     
        </table>
    </div>
</div>
@endsection