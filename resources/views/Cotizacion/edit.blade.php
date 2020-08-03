@extends('layouts.cotizacionnavbar')

@section('content')

    <div class="row" style="margin-top:20px">
 	<div class="col-md-offset-3 col-md-6">
 		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Actualizar datos de Cotización
				</h3>
            </div>
            <div class="panel-body" style="padding:30px">
                <form action="{{ url('cotizacions/'.$cotizacion['id']) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                    @csrf
                    {{-- TODO: Protección contra CSRF --}}
                    <div class="form-group">
                        <h5><label for="description">Descripción de la cotización</label></h5>
                        <textarea name="description" id="description" class="form-control" rows="3" required>{{$cotizacion['description']}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input name="date" autocomplete="on" required type="date" class="form-control" id="fecha" value="{{$cotizacion['date']}}">
                    </div>
 					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Actualizar
						</button>
					</div>
                 {{-- TODO: Cerrar formulario --}}
                </form>
            </div>

@endsection