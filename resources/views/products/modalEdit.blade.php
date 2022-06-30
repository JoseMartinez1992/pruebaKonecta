<!-- Modal para editar productos -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Actualizar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="country_name">Nombre del producto:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="country_name">Referencia del producto:</label>
                        <input type="text" class="form-control" name="reference" id="reference">
                    </div>
                    <div class="form-group">
                        <label for="country_name">Precio:</label>
                        <input type="number" class="form-control" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="country_name">Peso(gramos):</label>
                        <input type="number" class="form-control" name="weight" id="weight">
                    </div>
                    <div class="form-group">
                        <label for="country_name">Categoría del producto:</label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>
                    <div class="form-group">
                        <label for="country_name">Stock:</label>
                        <input type="number" class="form-control" name="stock" id="stock">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerra</button>
            </div>
        </form>
        </div>
    </div>
</div>
