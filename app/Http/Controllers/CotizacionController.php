<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;
use App\Customer;
use App\Product;
use DB;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones	=	Cotizacion::all();
		return view ('Cotizacion.index')->with('arraycotizaciones', $cotizaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cotizacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
        $customer = Customer::findOrFail($id);
		return view('/cotizacion/index')->with('customer',$customer);
    }

     public function store(Request $request)
    {
        //
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

    public function infosession(Request $request)
    {
        $request->session()->put(['Daniel'=>'Administrador']);
        $request->session()->regenerate(); //Evitar ataques por session fixation
        return $request->session()->all();
        
    }
    //Consultamos los datos de usuario y producto para la cotizacion
    public function searchCustomer(Request $request)
    {
        $products	=	Product::all();
        $user = DB::table('customers')
        ->select('name', 'document', 'email', 'phone', 'address', 'city')
        ->where('document', $request->customerdocument)
        ->first();
        if ($user){
            return view('Cotizacion.create', compact('user','products'));
            //return view('Cotizacion.show')->with('user',$user);
        }
        else{
        return redirect('/customers/create')->withSuccess('IT WORKS!');     
    }
    }

}
