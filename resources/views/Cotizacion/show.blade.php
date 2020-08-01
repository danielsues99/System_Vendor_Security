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
				<div>
					<h5>Añada los productos</h5>
				</div>
				<form action="cotizacions/create" method="GET">
					<div class="btn-group" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="false">
								Seleccione una opción
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								@foreach($products as $product)
								<input type="checkbox" id="item" name="{{$product->name}}">
								<label for="item">{{$product->name}}</label>
								<br>
								<div class="form-group">
								{{-- TODO: Completa el input para cantidad --}}
								<input type="number" min="1" name="quantity" id="quantity" class="form-control">
								</div>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Añadir productos
						</button>
					</div>
				</form>
				
            </div>

@endsection