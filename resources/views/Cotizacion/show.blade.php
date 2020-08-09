@extends('layouts.cotizacionnavbar')

@section('content')


    <div class="row" style="margin-top:20px">
		{{--Lista de cotizaciones--}}
	<div class="container" class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
				<th>#</th>
                <th>Documento</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Productos</th>
                <th>Editar</th>
                <th>Eliminar</th>
			</thead>
			@foreach( $arraycotizacions as $cotizacion )
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