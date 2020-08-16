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
            for ($i = 0; $i <= count($request->input('prod')); $i++) {
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
        $documento = DB::table('cotizacions')
        ->select('document_customer')
        ->where('id', '=', $request->id)
        ->get();
        //consulta de datos de cliente para generar cotizacion
        $cliente = DB::table('customers')
        ->select('name','document','phone','email','address','city')
        ->where('document', '=', $documento)
        ->get();
        //Consultar datos de cotizacion
        $cotizacion = DB::table('cotizacions')
        ->select('description','date')
        ->where('id', '=', $request->id)
        ->get();
        //Consulta de productos
        $products = DB::table('cotizacion_productos')
        ->select('products','quantity')
        ->where('document_customer', '=', $request->document_customer)
        ->get();
        echo $documento;
        
        //if ($print){
            //return view('Cotizacion.select', compact('print'));
        //}
        //else{
            //return redirect('/cotizacions/create')->withSuccess('IT WORKS!');     
        //}*/
        //return view ("Cotizacion.print");
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
