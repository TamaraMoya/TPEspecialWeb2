{include file="header.tpl"}

<div class="container">
    {if isset($smarty.session.USER_EMAIL)}
        <div class="col-3 mb-3">

            <a type='submit' href="formAgregarMarca" class="btn btn-outline-warning">Agregar una Marca</a>
        </div>
    {/if}
    <table class=" table table-light table-striped">
        <thead>
            <tr>
                <th scope="col-3">Marca</th>
                <th scope="col-3">Origen</th>
                <th scope="col-2">Cruelty Free</th>
                <th scope="col-2"></th>
                <th scope="col-2"></th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$marcas item=$marca}
                <tr>
                    <td>{$marca->marca}</td>
                    <td>{$marca->origen}</td>
                    <td>{if ({$marca->crueltyFree}==1)}
                            Si
                        {else}
                            No
                        {/if}</td>

                    {if isset($smarty.session.USER_EMAIL)}
                        <td><a type='button' href="eliminarMarca/{$marca->id_marca}" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                        <td><a type='button' href="formModificarMarca/{$marca->id_marca}"
                                class="btn btn-outline-warning">Modificar</a></td>
                    {/if}
                </tr>
            {/foreach}

        </tbody>
    </table>
</div>