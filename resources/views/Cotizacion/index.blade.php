@extends('layouts.cotizacionnavbar')

@section('content')


    <div class="row" style="margin-top:20px">
 	<div class="col-md-offset-3 col-md-6">
 		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Crear Cotización
				</h3>
			</div>
			 <div class="panel-body" style="padding:30px">
				<form action="{{ url('/cotizaciones') }}" method="POST">
				{{-- TODO: Abrir el formulario e indicar el método POST --}}
					@csrf
					{{-- TODO: Protección contra CSRF --}}
    				<div class="container mt-3">
                        <p>Ingrese número de identificación del cliente:</p>
						<div class="form-group">
							<label for="customerdocument"></label>
							<input type="number" name="customerdocument" id="customerdocument" class="form-control" type="text" placeholder="Search.."required>
						</div>
                        <div class="form-group text-center">
							<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
								Consultar
							</button>
						</div>
					  </div>
				 {{-- TODO: Cerrar formulario --}}
				</form>
				
			</div>		
		</div>		
	</div>
		{{--Lista de cotizaciones--}}
	<div class="container" class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
				<th>#</th>
                <th>Documento</th>
                <th>Descripción</th>
                <th>Fecha</th>
				<th>Añadir</th>
				<th>Generar</th>
                <th>Editar</th>
                <th>Eliminar</th>
			</thead>
			@foreach( $arraycotizaciones as $cotizacion )
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
					<a class="btn btn-success" href="{{ url('previa/'.$cotizacion['id']) }}">
						<i class="fa fa-print"></i>
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