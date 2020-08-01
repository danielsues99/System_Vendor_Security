@extends('layouts.cotizacionnavbar')

@section('content')

    <div class="row" style="margin-top:20px">
 	<div class="col-md-offset-3 col-md-6">
 		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Cotizar
				</h3>
            </div>
            <div class="panel-body" style="padding:30px">
                <form>
                    <input type="hidden" name="_method" value="GET">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                    @csrf
					{{-- TODO: Protección contra CSRF --}}
					<ul class="list-group">
						<h5>Información del cliente</h5>
						<li class="list-group-item list-group-item-info">Nombre: {{$user->name}}</li>
						<li class="list-group-item list-group-item-info">Documento: {{$user->document}}</li>
						<li class="list-group-item list-group-item-info">E-mail: {{$user->email}}</li>
						<li class="list-group-item list-group-item-info">Teléfono: {{$user->phone}}</li>
						<li class="list-group-item list-group-item-info">Dirección: {{$user->address}}</li>
						<li class="list-group-item list-group-item-info">Ciudad: {{$user->city}}</li>
					  </ul>
                 {{-- TODO: Cerrar formulario --}}
				</form>
				<div class="form-group">
                    <h5><label for="description">Descripción de la cotización</label></h5>
                    <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                </div>
				<div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input value="2020-08-01" name="fecha" autocomplete="off" required="" type="date" class="form-control" id="fecha">
                </div>
            </div>

@endsection