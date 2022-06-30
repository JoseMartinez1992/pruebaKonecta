@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <h2>Ventas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre Producto</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($errors->any())

                    <div class="alert alert-danger">
                        <ul style="list-style:none">
                            <li>{{$errors->first()}}</li>
                            <li><a class="btn btn-info" href="/products/avalaibles">Volver</a></li>
                        </ul>
                    </div>
                    @endif
                    @if (isset($product_sale))
                        <tr>
                            <td>{{$product_sale['name']}}</td>
                            <td>{{$product_sale['reference']}}</td>
                            <td>{{$product_sale['price']}}</td>
                            <td>{{$quantity}}</td>
                            <td></td>
                        </tr>
                    @else
                    <tr>
                        <td colspan="4">
                            <h5>No hay productos seleccionados</h5>
                        </td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th>{{ $product_sale['price'] * $quantity }}</th>
                        <th>
                            <form action="{{ route('sales.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id_product" value="{{ $product_sale['id'] }}">
                                <input type="hidden" name="quantity" value="{{ $quantity }}">
                                <input type="hidden" name="price" value="{{ $product_sale['price'] }}">
                                <button type="submit" class="btn btn-primary">Comprar</button>
                            </form>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
