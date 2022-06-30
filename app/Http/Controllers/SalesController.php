<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sales.index', [
            'product_sale' => [],
            'products' => [],
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
        $validate_stock = Products::where('id',$request->id_product)->where('stock','>=',$request->quantity)->first();
        if($validate_stock !=''){
            $new_stock = $validate_stock->stock - $request->quantity;
            $total_sale = $request->price * $request->quantity;
            $sale = Sales::create([
                'id_product' => $request->id_product,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total_price' => $total_sale,
            ]);

            Products::findOrFail($request->id_product)->update(['stock' => $new_stock]);

        }else{
            return back()->withErrors(['error' => 'No queda stock suficiente']);
        }

        return view('inicio', ['success' => 'Venta aprobada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
    public function getSale(Request $request, int $id){
        $product = Products::where('id', $id)->where('status', 0)->first();

        return view('sales.index', ['product_sale' => $product, 'quantity' => $request->quantity]);
    }
}
