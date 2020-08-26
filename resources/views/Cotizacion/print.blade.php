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
                $descripcion = $cotizacion['description'];
                $fecha = $cotizacion['date'];
                break;
        ?>
        <?php }
         ?>
        <div class="container">
            <span class="badge badge-pill badge-success">{{$fecha}}</span>
            <h4 align="center">Cotización de Servicio # {{$id}}</h4><br><br>
            <ul class="list-group list-group-flush">
                <h5 align="center">Información del cliente</h5>
                <li class="list-group-item"><b> Nombre del Cliente: </b> {{$nombre}}</li>
                <li class="list-group-item"><b> Documento: </b> {{$documento}}</li>
                <li class="list-group-item"><b> Teléfono: </b> {{$telefono}}</li>
                <li class="list-group-item"><b> E-mail: </b> {{$email}}</li>
                <li class="list-group-item"><b> Dirección: </b> {{$direccion}}</li>
                <li class="list-group-item"><b> Ciudad: </b> {{$ciudad}}</li><br><br>
            </ul>
        <table class="table table-hover">
            <thead class="thead-dark">
				<th>Producto</th>
                <th>Referencia</th>
                <th>Cantidad</th>
                <th>Costo Unidad</th>
                <th>Total</th>
            </thead>
            <?php
                $subtotal = 0;
                $cantidadproductos = 0;
                foreach($print as &$cotizacion) {
                $cotizacion = get_object_vars($cotizacion);
                $producto = $cotizacion['products'];
                $modelo = $cotizacion['model'];
                $cantidad = $cotizacion['quantity'];
                $precio = $cotizacion['cost'];
                $total = $precio * $cantidad;
                $subtotal = $subtotal + $total;
                $cantidadproductos = $cantidadproductos + $cantidad;
            ?>
            <tbody>
                <td>{{$producto}}</td>
                <td>{{$modelo}}</td>
                <td>{{$cantidad}}</td>
                <td><b>$</b> {{$precio}}</td>
                <td><b>$</b> {{$total}}</td>
            </tbody>
            <?php }
                $iva = $subtotal * 0.19;
                $preciototal = $subtotal - $iva;
            ?>
            <tbody>
            <td><b>Sub-Total:</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>$</b> {{$subtotal}}</td>
            </tbody>
            <tbody>
                <td><b>IVA 19%:</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>$</b> {{$iva}}</td>  
            <tbody>
            <tbody>
                <td><b>Total:</b></td>
                <td></td>
                <td>{{$cantidadproductos}}</td>
                <td></td>
                <td><b>$ {{$preciototal}}</b></td>  
            <tbody><br>
        </table>
        <div class="container-fluid">
            <h5 align="center">Condiciones del Servicio</h5>
            <li class="list-group-item">{{$descripcion}}</li><br><br>
        </div>
        <address align="center">
            danielsuescun1520@gmail.com<br>
            Teléfono: +573187706969<br>
            Bogotá, Colombia
        </address>
        <footer align="center">
            <p>Autor: Daniel Suescún A.</p>
            <p><a href="mailto:danielsuescun1520@gmail.com">danielsuescun1520@gmail.com</a></p>
        </footer>
    </div>
</div>
@endsection