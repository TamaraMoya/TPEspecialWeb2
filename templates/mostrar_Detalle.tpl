{include file="header.tpl"}

<div class="card mb-3 container " style="max-width: 540px;">
    <div class="row g-0 d-flex justify-content-center">
        <div class="col-4 pt-3">
            <img src="{$perfume->imagen}" class="img-fluid rounded-start" alt="{$perfume->nombre}">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h1 class="card-title">{$perfume->nombre}</h1>
                <h2 class="badge text-bg-secondary">{$perfume->marca}</h2>
                <p class="card-text fs-4">{$perfume->tipo}</p>
                <p class="card-text fs-4">{$perfume->genero}</p>
                <p class="card-text fs-4">{$perfume->tamanio}ml.</p>
                <h3 class="text-end pb-4">${$perfume->precio}</h3>
                <div class="d-grid gap-2 d-flex justify-content-end">
                    <a type='submit' href="formModificarProd/{$perfume->id_producto}"
                        class="btn btn-outline-warning">Modificar</a>
                    <a type='submit' href="eliminarProducto/{$perfume->id_producto}"
                        class="btn btn-outline-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container d-flex justify-content-center">
    <a type='submit' href="listar" class="btn btn-lg btn-outline-warning">Volver</a>
</div>


{include file="footer.tpl"}