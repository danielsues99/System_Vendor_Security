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
        try{
            $prod_cotizacion = new CotizacionProducto;
            $prod_cotizacion->id_customer = $request->id_customer;
            $prod_cotizacion->id_cotizacion = $request->id_cotizacion;
            $prod_cotizacion->products = $request->prod;
            $prod_cotizacion->quantity = $request->quantity;
            $prod_cotizacion->save();
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
        $cotizaciones = CotizacionProducto::all();
        $print = DB::table('cotizacion_productos')
        ->select('id_cotizacion','doc_customer', 'quantity')
        ->where('id', $request->id)
        ->first();
        echo $cotizaciones;
        echo $print;
        //if ($print){
            //return view('Cotizacion.select', compact('print'));
        //}
        //else{
            //return redirect('/cotizacions/create')->withSuccess('IT WORKS!');     
        //}
        return view ("Cotizacion.print",compact('cotizaciones'));
    }
    
    public function cotproducto(Request $request)
    {
        $products	=	Product::all();
        $cotizacion = DB::table('cotizacions')
        ->select('id','id_customer','document_customer', 'description', 'date')
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
