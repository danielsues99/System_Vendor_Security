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
							<label for="id_cotizacion">Numero de cotización:</label>
              <input type="text" name="id_cotizacion" id="id_cotizacion" readonly class="form-control" value="{{$cotizacion->id}}" required>
              <br>
          </ul>
            <input type="hidden" name="doc_customer" id="doc_customer" readonly class="form-control" value="{{$cotizacion->document_customer}}" required>
            <h5>Seleccione productos</h5>
            <div class="container" class="table-responsive">
              <table class="table table-hover">
                <thead class="thead-dark">
                    <th>Choose</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Costo</th>
                    {{--<th>Guardar</th>--}}
                </thead>
              @foreach( $products as $product )
                <tbody>
                  <input type="hidden" name="prod" value="<?=$product['name']?>" >
                  <th>
                    <input type="Radio" name="seleccionado" id="seleccionado" value="1" onkeyup="habilitar()">
                  </th>
                  <td>{{$product['name']}}</td>
                  <td>{{$product['mark']}}</td>
                  <td>{{$product['model']}}</td>
                  <td>{{$product['cost']}}</td>
                  {{--<td>
                    <form action="{{ url('/cotizacion_producto') }}" method="POST">
                      <a class="btn btn-info">
                      <button type="submit" id="boton">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      </button></a>
                    </form>
                  </td>--}}
                </tbody>
              @endforeach 
              </table>
              <p>Cantidad</p>  
              <input type="number" name="quantity" id="quantity" class="form-control" min="1">
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