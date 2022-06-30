@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div>
                <h1>Seleccione un producto para comprar</h1>
            </div>
            <!--Tabla con lista de productos -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Producto</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->reference }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->stock }}</td>
                            <form action="{{ route('sales.search', $product->id) }}" method="GET">
                            <td><input type="number" name="quantity" id="quantity" style="width: 60px;" required></td>
                            <td>
                                    @method('GET')
                                    @csrf
                                    <button type="submit" class="btn btn-primary" value="{{ $product->id }}">Comprar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
