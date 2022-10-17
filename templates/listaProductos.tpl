{include file="header.tpl"}

<div class="container">
    <div class=" row d-flex justify-content-center">
        <form class="col-5" action="filtrar" method="POST">
            <div class=" input-group mb-5 g-3">
                <button class="btn btn-outline-warning" type="submit">Filtrar</button>
                <select class="form-select" name="marca" aria-label="Example select with button addon">
                    <option selected>Seleccione una marca...</option>
                    {foreach from=$marcas item=$marca}
                        <option value="{$marca->marca}">{$marca->marca}</option>
                    {/foreach}
                </select>
            </div>
        </form>
        {if isset($smarty.session.USER_EMAIL)}
        <div class="col-3">
            <a type='submit' href="formAgregarProd" class="btn btn-outline-warning">Agregar un Producto</a>
        </div>
        <div class="col-3">
            <a type='submit' href="formAgregarMarca" class="btn btn-outline-warning">Agregar una Marca</a>
        </div>
        {/if}
    </div>
</div>


{foreach from=$perfumes item=$perfume}
    <div class="container col-7  shadow p-3 mb-5 bg-body rounded">
        <div class="col-6 list-group w-auto list-group-item list-group-item-action">
            <a href="mostrarDetalle/{$perfume->id_producto}" class="d-flex gap-3 nav-link " aria-current="true">
                <img src="{$perfume->imagen}" alt="{$perfume->nombre}" width="140" height="140" class="align-self-stretch">
                <div class="d-flex gap-2 w-100 justify-content-between align-items-start">
                    <div class="row col-4">
                        <h4 class="badge text-bg-secondary">{$perfume->marca}</h4>
                        <h3 class="mb-0">{$perfume->nombre}</h3>
                    </div>
                    <div class="fs-4">
                        <p class="mb-1">{$perfume->tipo}</p>
                        <p class="mb-1">{$perfume->genero}</p>
                        <p class="mb-1">{$perfume->tamanio}ml.</p>
                    </div>
                    <p class="opacity-50 text-nowrap fs-3">${$perfume->precio}</p>
                </div>
                {if isset($smarty.session.USER_EMAIL)}
                <div class="d-grid gap-2 d-flex justify-content-end">
                    <a type='submit' href="formModificarProd/{$perfume->id_producto}"
                        class="btn btn-outline-warning">Modificar</a>
                    <a type='submit' href="eliminarProducto/{$perfume->id_producto}"
                        class="btn btn-outline-danger">Eliminar</a>
                </div>
                {/if}
            </a>
        </div>
    </div>
{/foreach}





{include file="footer.tpl"}