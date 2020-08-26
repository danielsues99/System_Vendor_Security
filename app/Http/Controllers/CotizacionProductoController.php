<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;
use App\Customer;
use App\Product;
use App\CotizacionProducto;
use DB;

class CotizacionProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //capturo dato para actualizar status de cotizacion
        $validatedData = $request->validate([
            'status' => 'required',
        ]);
        Cotizacion::whereId($request->id_cotizacion)->update($validatedData);
        try{
            for ($i = 0; $i < count($request->input('prod')); $i++) {
                $prod_cotizacion = new CotizacionProducto;
                $prod_cotizacion->id_cotizacion = $request->id_cotizacion;
                $prod_cotizacion->id_customer = $request->id_customer;
                $prod_cotizacion->products = $request->input('prod')[$i];
                $prod_cotizacion->quantity = $request->input('cantidad')[$i];
                $prod_cotizacion->save();
            }
            
            return redirect('/cotizaciones');
            }
            catch(\App\Exceptions\NotFoundmonException $e)
            {
                return $e->getMessage();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generar(Request $request){
        //Creando consulta de los datos para generar cotizacion
        $print = DB::table('cotizacion_productos')
            ->join('cotizacions', 'cotizacions.id', '=', 'cotizacion_productos.id_cotizacion')
            ->join('customers', 'customers.id', '=', 'cotizacions.id_customer')
            ->join('products', 'cotizacion_productos.products', '=', 'products.name')
            ->select('products.mark','products.model','products.cost','cotizacion_productos.id_cotizacion', 'cotizacion_productos.products', 'cotizacion_productos.quantity','cotizacions.description', 'cotizacions.date', 'customers.*')
            ->where('cotizacion_productos.id_cotizacion', $request->id)
            ->get();
        if ($print){
            return view('Cotizacion.print', compact('print'));
        }
        else{
            return redirect('/cotizacions/create')->withSuccess('Consulta inválida!');     
        }
    }
    
    public function cotproducto(Request $request)
    {
        $products	=	Product::all();
        $cotizacion = DB::table('cotizacions')
        ->select('id','id_customer', 'description', 'date')
        ->where('id', $request->id)
        ->first();
        if ($cotizacion){
            return view('Cotizacion.select', compact('cotizacion','products'));
        }
        else{
            return redirect('/cotizacions/create')->withSuccess('IT WORKS!');     
        }
    }
}
