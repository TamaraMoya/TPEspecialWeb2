{include file="header.tpl"}

<div class="col-md-7 col-lg-8 container d-flex justify-content-center">
<h1 class="m-3 ">Modificar Marcas</h1>
    <form class="row" action="modificarMarca/{$marca->id_marca}" method="POST">
        <div class="col-8">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="{$marca->marca}" placeholder="marca" name="marca"
                required="">
        </div>
        <div class="col-8">
            <label class="form-label">Origen</label>
            <input type="text" class="form-control" value="{$marca->origen}" name="origen">
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">Cruelty Free</label>
            <select class="form-select" name="crueltyFree" required>
                
                <option value="1">Si</option>
                <option value="0">No</option>
            </select>
        </div>
        <div>
            <button type="submit" class="col-2 btn btn-outline-warning my-4">Modificar</button>
        </div>
    </form>
</div>

{include file="footer.tpl"}