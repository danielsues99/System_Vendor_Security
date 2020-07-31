@extends('layouts.productnavbar')

@section('content')

    <div class="row" style="margin-top:20px">
 	<div class="col-md-offset-3 col-md-6">
 		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">
					<span class="glyphicon glyphicon-film" aria-hidden="true"></span>
					Actualizar datos de Producto
				</h3>
            </div>
            <div class="panel-body" style="padding:30px">
                <form action="{{ url('products/'.$product['id']) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                    @csrf
                    {{-- TODO: Protección contra CSRF --}}
    
                    <div class="form-group">
						{{-- TODO: Completa el input para categoria de producto --}}
						<label for="category" id="category">Categoria</label>
                        <select name="category" class="custom-select" value="{{$product['category']}}" required>
                            <option value="{{$product['category']}}">{{$product['category']}}</option>
							<option value="Alarma">Alarma</option>
                            <option value="Cámara">Cámara</option>
                            <option value="Control de Acceso">Control de Accceso</option>
                            <option value="Videoportero">Videoportero</option>
						  </select>
					</div>
                    <div class="form-group">
    					<label for="name">Nombre</label>
    					<input type="text" name="name" id="name" class="form-control" value="{{$product['name']}}">
					</div>
 					<div class="form-group">
						{{-- TODO: Completa el input para la marca --}}
                        <label for="mark">Marca</label>
                        <input type="text" name="mark" id="mark" class="form-control" value="{{$product['mark']}}">
					</div>
                    <div class="form-group">
						{{-- TODO: Completa el input para el modelo --}}
                        <label for="model">Modelo</label>
                        <input type="text" name="model" id="model" class="form-control" value="{{$product['model']}}">
					</div>
					<div class="form-group">
    					<label for="imagen">Imagen</label>
    					<input type="text" name="imagen" id="imagen" class="form-control" value="{{$product['imagen']}}">
					</div>
					<div class="form-group">
    					<label for="cost">Precio</label>
    					<input type="number" name="cost" id="cost" class="form-control" value="{{$product['cost']}}">
					</div>
					<div class="form-group">
						<label for="description">Descripción</label>
						<textarea name="description" id="description" class="form-control" rows="3" >{{$product['description']}}</textarea>
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