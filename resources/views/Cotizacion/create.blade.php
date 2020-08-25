@extends('layouts.cotizacionnavbar')

@section('content')

    <div class="row" style="margin-top:20px">
 	<div class="col-md-offset-3 col-md-6">
 		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Crear nueva cotización
				</h3>
            </div>
            <div class="panel-body" style="padding:30px">
                <form action="{{ url('/cotizacions') }}" method="POST">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                    @csrf
					{{-- TODO: Protección contra CSRF --}}
					<input type="hidden" name="id_customer" id="id_customer" readonly class="form-control" value="{{$customer->id}}" required>
					<div class="table-responsive-md">
						<table class="table" border="1">
						  <thead class="thead-dark">
							<tr>
							  <h5 align="center">Información del cliente</h5>
							  <th>Nombre</th>
							  <th>Documento</th>
							  <th>Telefono</th>
							  <th>E-mail</th>
							  <th>Dirección</th>
							  <th>Ciudad</th>
							</tr>
						  </thead>
						  <tbody>
							<tr>
							  <td>{{$customer->name}}</td>
							  <td>{{$customer->document}}</td>
							  <td>{{$customer->phone}}</td>
							  <td>{{$customer->email}}</td>
							  <td>{{$customer->address}}</td>
							  <td>{{$customer->city}}</td>
							</tr>
						  </tbody>
						</table>
						<br>
					  </div>
				<div class="form-group">
                    <h5><label for="description">Descripción de la cotización</label></h5>
                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Por ejemplo: Forma de pago, descripción del servicio ..." required></textarea>
                </div>
				<div class="form-group">
                    <h5><label for="date">Fecha</label></h5>
                    <input name="date" autocomplete="on" required type="date" class="form-control" id="fecha">
				</div>
				<div class="form-group">
                    <input type="hidden" name="status" autocomplete="on" required type="status" class="form-control" id="status" value="1">
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