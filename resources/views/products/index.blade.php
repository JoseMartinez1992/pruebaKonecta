@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div>
                <h1>Gestionar Productos</h1>
            </div>
            <!-- Botón que abre el modal-->
            <div style="margin-bottom: 10px;">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">Crear Productos</button>
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
                            <td>
                                <form action="{{ route('products.delete', $product->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" onclick="return confirm('¿Desea eliminar?')" style="background: white"><i class="fas fa-trash fa-lg"></i></button>
                                </form>
                            </td>
                            <td>
                                <button type="button" class="updatebtn" value="{{ $product->id }}" style="background: white"><i class="fas fa-edit fa-lg"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@include('products.modalCreate')
@include('products.modalEdit')

@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click','.updatebtn', function(){
            var id = $(this).val();
            $('#update').modal('show');
            $.ajax({
                type: 'GET',
                url: "product/"+id,
                success: function (response) {
                    $('#name').val(response.product.name);
                    $('#reference').val(response.product.reference);
                    $('#price').val(response.product.price);
                    $('#weight').val(response.product.weight);
                    $('#category').val(response.product.category);
                    $('#stock').val(response.product.stock);
                    $('#id').val(id);
                }
            })
        })
    });
</script>
@endsection
