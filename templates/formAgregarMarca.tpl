{include file="header.tpl"}


<div class="col-md-7 col-lg-8 container d-flex justify-content-center">
    <h1 class="m-3 ">Agregar Marcas</h1>
    <form class="row" action="agregarMarca" method="POST">
        <div class="col-8">
            <label class="form-label ">Marca</label>
            <input type="text" class="form-control text-uppercase" name="marca" required="">
        </div>
        <div class="col-8">
            <label class="form-label">Origen</label>
            <input type="text" class="form-control" name="origen">
        </div>
        <div class="col-6 mb-3">
            <label class="form-label">Cruelty Free</label>
            <select class="form-select" name="crueltyFree" required>
                
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>

        <div>
            <button type="submit" class="col-2 btn btn-outline-warning my-4">Agregar</button>
        </div>
    </form>
</div>