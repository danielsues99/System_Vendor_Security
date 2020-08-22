@extends('layouts.cotizacionnavbar')

@section('content')


    <div class="row" style="margin-top:20px">
		{{--Lista de cotizaciones--}}
	<div class="container" class="table-responsive">
        {{--Consulta datos del cliente--}}
        <?php
                foreach($print as &$cotizacion) {
                $cotizacion = get_object_vars($cotizacion);
                $id = $cotizacion['id_cotizacion'];
                $nombre = $cotizacion['name'];
                $documento = $cotizacion['document'];
                $telefono = $cotizacion['phone'];
                $email = $cotizacion['email'];
                $direccion = $cotizacion['address'];
                $ciudad = $cotizacion['city'];
                break;
        ?>
        <?php }
         ?>
        <div class="container">
            <h4 align="center">Cotización de Servicio # {{$id}}</h4><br>
            <div class="panel-body" style="padding:30px">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info"><b> Nombre del Cliente: </b> {{$nombre}}</li>
                    <li class="list-group-item list-group-item-info"><b> Documento: </b> {{$documento}}</label></li>
                    <li class="list-group-item list-group-item-info"><b> Teléfono: </b> {{$telefono}}</li>
                    <li class="list-group-item list-group-item-info"><b> E-mail: </b> {{$email}}</li>
                    <li class="list-group-item list-group-item-info"><b> Dirección: </b> {{$direccion}}</li>
                    <li class="list-group-item list-group-item-info"><b> Ciudad: </b> {{$ciudad}}</li>
                </ul>
            </div>
        <table class="table table-hover">
            <thead class="thead-dark">
				<th>Producto</th>
                <th>Referencia</th>
                <th>Cantidad</th>
                <th>Costo Unidad</th>
                <th>Total</th>
            </thead>
            <?php
                foreach($print as &$cotizacion) {
                $cotizacion = get_object_vars($cotizacion);
                $producto = $cotizacion['products'];
                $modelo = $cotizacion['model'];
                $cantidad = $cotizacion['quantity'];
                $precio = $cotizacion['cost'];
                $total = $precio * $cantidad;
            ?>
            <tbody>
                <td>{{$producto}}</td>
                <td>{{$modelo}}</td>
                <td>{{$cantidad}}</td>
                <td>{{$precio}}</td>
                <td>{{$total}}</td>
            </tbody>
            <?php } ?>
        </table>
    </div>
</div>
@endsection