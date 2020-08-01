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
</div>
@endsection