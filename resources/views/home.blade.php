@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">{{ __('Centro de Administración') }}</div>
                <div >
                    <div class="form-group text-center">
                        <a href="{{ url('/customers') }}"><button type="submit" class="btn btn-info btn-block" style="padding:8px 100px;margin-top:25px;">
                            Clientes
                        </button></a>
                    </div>
                    <div class="form-group text-center">
                        <a href="{{ url('/products') }}"><button type="submit" class="btn btn-info btn-block" style="padding:8px 100px;margin-top:25px;">
                            Productos
                        </button></a>
                    </div>
                    <div class="form-group text-center">
                        <a href="{{ url('/cotizaciones') }}"><button type="submit" class="btn btn-info btn-block" style="padding:8px 100px;margin-top:25px;">
                            Cotizaciones
                        </button></a>
                    </div>
                </div>           
        </div>
    </div>
</div>
@endsection
