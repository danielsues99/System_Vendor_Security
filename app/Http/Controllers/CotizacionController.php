<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;
use App\Customer;
use App\Product;
use App\CotizacionProducto;
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
        $arraycotizacion = Cotizacion::findOrFail($id);
		return view('Cotizacion.show')->with('arraycotizacion',$arraycotizacion);
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
    public function catalog(){
        $arraycotizacions = Cotizacion::all();
        $producto = Product::all();
        return view ("Cotizacion.show",compact('arraycotizacions','producto'));
    }
    public function cotproducto(Request $request)
    {
        $products	=	Product::all();
        $cotizacion = DB::table('cotizacions')
        ->select('id','document_customer', 'description', 'date')
        ->where('id', $request->id)
        ->first();
        if ($cotizacion){
            return view('Cotizacion.select', compact('cotizacion','products'));
        }
        else{
            return redirect('/cotizacions/create')->withSuccess('IT WORKS!');     
        }
    }
    public function storeproduct_cotizacion(Request $request) //metodo para guardar porductos en cotizacion
    {
        try{
            $prod_cotizacion = new CotizacionProducto;
            $prod_cotizacion->doc_customer = $request->doc_customer;
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
}
