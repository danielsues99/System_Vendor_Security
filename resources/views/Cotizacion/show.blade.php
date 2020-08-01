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
                <form action="" method="POST">
                    <input type="hidden" name="_method" value="PUT">
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
					<div class="form-group text-center">
						<button type="submit" class="btn btn-warning style="padding:8px 100px;margin-top:25px;">
							Añadir productos
						</button>
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