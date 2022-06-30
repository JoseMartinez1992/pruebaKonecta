<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::where('status',0)->get();

        return view('products.index', [
            'products' => $products
        ]);
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
        Products::create([
            'name' => $request->name,
            'reference' => $request->reference,
            'price' => $request->price,
            'weight' => $request->weight,
            'category' => $request->category,
            'status' => 0,
            'stock' => $request->stock,
        ]);

        return redirect('/products')->with('success', 'Producto Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $product = Products::findOrFail($request->id)->update([
            'name' => $request->name,
            'reference' => $request->reference,
            'price' => $request->price,
            'weight' => $request->weight,
            'category' => $request->category,
            'stock' => $request->stock,
        ]);

        return redirect('/products')->with('success', 'Producto Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
    public function delete(int $id){
        Products::findOrFail($id)->update(['status' => 1]);

        return redirect('/products')->with('success', 'Producto Eliminado');
    }
    public function getProduct(int $id){
        $product = Products::findOrFail($id);

        return response()->json([
            'status' => 200,
            'product' => $product,
        ]);
    }
    public function avalaibleProducts(){
        $products = Products::where('status',0)->where('stock','>',0)->get();

        return view('sales.selectProduct', ['products' => $products]);
    }
}
