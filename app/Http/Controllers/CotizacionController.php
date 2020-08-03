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
        $cotizaciones	=	Cotizacion::limit('3')->orderBY('id','DESC')->get();
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
        try{
            $cotizacion = new Cotizacion;
            $cotizacion->document_customer = $request->document_customer;
            $cotizacion->description = $request->description;
            $cotizacion->date = $request->date;
            $cotizacion->save();
            return redirect('/cotizacions');
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
        $cotizacion = Cotizacion::findOrFail($id);
		return view('/Cotizacion/edit')->with('cotizacion',$cotizacion);
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
        $validatedData = $request->validate([
            'description' => 'required',
            'date' => 'required',
        ]);
        Cotizacion::whereId($id)->update($validatedData);

        return redirect('/cotizacions')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->delete();
        return redirect('/cotizacions');
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
        ->select('id','name', 'document', 'email', 'phone', 'address', 'city')
        ->where('document', $request->customerdocument)
        ->first();
        if ($user){
            return view('Cotizacion.create', compact('user','products'));
        }
        else{
        return redirect('/customers/create')->withSuccess('IT WORKS!');     
    }
    }

}
