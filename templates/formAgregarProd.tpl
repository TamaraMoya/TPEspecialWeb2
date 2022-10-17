{include file="header.tpl"}


<div class="col-md-7 col-lg-8 container d-flex justify-content-center">
    <h1 class="m-3 ">Agregar un Producto</h1>

    <form class="row" action="agregarProducto" method="POST" enctype="multipart/form-data">
        <div class="col-12 mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required="">
        </div>

        <div class="col-12 mb-3">
            <label class="form-label">Marca</label>
            <select name="marca" class="form-select" aria-label="Default select example" required="">
                <option disable selected value="">Selecciones la marca</option>
                {foreach from=$marcas item=$marca}
                    <option value="{$marca->marca}">{$marca->marca}</option>
                {/foreach}
            </select>
        </div>

        <div class="col-6 mb-3">
            <label class="form-label">Tipo</label>
            <select class="form-select" name="tipo" required="">
                <option disable selected value="">Tipo</option>
                <option>EdP</option>
                <option>EdT</option>
                <option>EdC</option>
            </select>
        </div>


        <div class="col-6 mb-3">
            <label class="form-label">Tamaño</label>
            <input type="text" class="form-control" name="tamanio" placeholder="Tamaño">
        </div>


        <div class="col-6 mb-3">
            <label class="form-label">Genero</label>
            <input type="text" class="form-control" name="genero" placeholder="Genero">
        </div>

        <div class="col-6 mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" placeholder="Precio" required="">
        </div>
        <div class="mb-3">
            <input type="file" name="imagen" id="imageToUpload" class="form-control">
        </div>

        <div>
            <button type="submit" class="col-2 btn btn-outline-warning my-4">Agregar</button>
        </div>
    </form>
</div>