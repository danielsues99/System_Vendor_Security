<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products	=	Product::all();
		return view ('Product.index')->with('arrayproducts', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//EGuardamos la info que enviamos en el create
    {
        try{
            $product = new Product;
            $product->category = $request->category;
            $product->name = $request->name;
            $product->mark = $request->mark;
            $product->model = $request->model;
            $product->imagen = $request->imagen;
            $product->cost = $request->cost;
            $product->description = $request->description;
            $product->save();
            return redirect('/products');
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
        $product = Product::findOrFail($id);
		return view('/Product/edit')->with('product',$product);
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
            'category' => 'required',
            'name' => 'required',
            'mark' => 'required',
            'model' => 'required',
            'imagen' => 'required',
            'cost' => 'required',
            'description' => 'required',
        ]);
        Product::whereId($id)->update($validatedData);

        return redirect('/products')->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
