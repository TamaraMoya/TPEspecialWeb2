{include file="header.tpl"}

<div class="col-md-7 col-lg-8 container d-flex justify-content-center">
    <h1 class="m-3 ">Modificar Producto</h1>

    <form class="row" action="modificarProducto/{$perfume->id_producto}" method="POST" enctype="multipart/form-data">
        <div class="col-12">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="{$perfume->nombre}" name="nombre" required="">
        </div>

        <div class="col-md-5">
            <label class="form-label">Marca</label>
            <select name="marca" class="form-select" aria-label="Default select example" required="">
                <option selected>{$perfume->marca}</option>
                {foreach from=$marcas item=$marca}
                    <option value="{$marca->marca}">{$marca->marca}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-4">
            <label class="form-label">Tipo</label>
            <select class="form-select" name="tipo" required="">
                <option value="{$perfume->tipo}">Tipo</option>
                <option>EdP</option>
                <option>EdT</option>
                <option>EdC</option>
            </select>
        </div>

        <div class="row g-3">
            <div class="col-6">
                <label class="form-label">Tamaño</label>
                <input type="text" class="form-control" name="tamanio" placeholder="Tamaño" value="{$perfume->tamanio}">
            </div>
        </div>

        <div class="col-6">
            <label class="form-label">Genero</label>
            <input type="text" class="form-control" name="genero" placeholder="Genero" value="{$perfume->genero}">
        </div>

        <div class="col-6">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" value="{$perfume->precio}" placeholder="Precio"
                required="">
        </div>
        <div class="my-3">
            <input type="file" name="imagen" id="imageToUpload" class="form-control">
        </div>
        <div>
            <button type="submit" class="col-2 btn btn-outline-warning my-4">Modificar</button>
        </div>
    </form>
</div>

{include file="footer.tpl"}