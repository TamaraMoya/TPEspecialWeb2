{include 'header.tpl'}

<div class="mt-5 w-25 mx-auto">
    <form method="POST" action="validar">
        <div class="form-group">
            <label>Email</label>
            <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" required class="form-control" id="password" name="contrasenia">
        </div>

        {if $error} 
            <div class="alert alert-danger mt-3">
                {$error}
            </div>
        {/if}
        <div class="  d-flex justify-content-center">
        <button type="submit" class="btn btn-warning mt-3 shadow">Loguear</button>
        </div>
    </form>
</div>

{include file='footer.tpl'}