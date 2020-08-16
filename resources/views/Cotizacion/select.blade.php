@extends('layouts.cotizacionnavbar')

@section('content')

  <div class="row" style="margin-top:20px">
 	<div class="col-md-offset-3 col-md-8">
 		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Agregar productos
				</h3>
            </div>
            <div class="panel-body" style="padding:30px">
                <form action="{{ url('/cotizacion_producto') }}" method="POST">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                    @csrf
					{{-- TODO: Protección contra CSRF --}}
					<h5>Información de cotización</h5>
					<ul class="list-group"> 
             <input type="hidden" name="id_customer" id="id_customer" readonly class="form-control" value="{{$cotizacion->id_customer}}" required><label for="id_cotizacion">Numero de cotización:</label>
              <input type="text" name="id_cotizacion" id="id_cotizacion" readonly class="form-control" value="{{$cotizacion->id}}" required>
              <br>
          </ul>
            <h5>Seleccione productos</h5>
            <div class="container" class="table-responsive">
              <table class="table table-bordered">
                <thead class="thead-dark">
                    <th>&#10004</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </thead>
              @foreach( $products as $product )
                <tbody>
                  <th>
                    <input type="checkbox" name="prod[]" id="prod[]" value="{{$product['name']}}" onclick="cantidad[].disabled = !this.checked">
                  </th>
                  <td>{{$product['name']}}</td>
                  <td>{{$product['mark']}}</td>
                  <td>{{$product['model']}}</td>
                  <td>{{$product['cost']}}</td>
                  <td><input type="number" placeholder="Cantidad" name="cantidad[]" id="cantidad[]" disabled></td>
                </tbody>
              @endforeach 
              </table>
          </div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-warning" style="padding:8px 100px;margin-top:25px;">
						Agregar productos
					</button>
				</div>
				 {{-- TODO: Cerrar formulario --}}
				</form>
            </div>

@endsection