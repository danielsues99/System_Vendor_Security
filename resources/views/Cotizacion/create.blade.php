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
                <form action="{{ url('/cotizacions') }}" method="POST">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                    @csrf
					{{-- TODO: Protección contra CSRF --}}
					<h5>Información del cliente</h5>
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
				<div class="form-group">
                    <h5><label for="description">Descripción de la cotización</label></h5>
                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Por ejemplo: Forma de pago..." required></textarea>
                </div>
				<div class="form-group">
                    <label for="date">Fecha</label>
                    <input name="date" autocomplete="on" required type="date" class="form-control" id="fecha">
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
						Crear cotización
					</button>
				</div>
				 {{-- TODO: Cerrar formulario --}}
				</form>
            </div>

@endsection