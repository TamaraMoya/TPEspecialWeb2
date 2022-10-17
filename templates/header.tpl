<!doctype html>
<html lang="en">

<head>
  <base href="{BASE_URL}">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfumeria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div >
    <header class="d-flex align-items-center justify-content-around py-3 mb-4 border-bottom ">
      <a href="listar" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-decoration-none">
        <img src="imagenes/logoTP.jpg" alt="Logo-tp" width="300" height="88">
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="listar" class="nav-link fs-5 link-secondary">Perfumes</a></li>
        <li><a href="listarMarcas" class="nav-link fs-5 link-secondary">Marcas</a></li>
      </ul>

      <div class="col-md-3 text-end">
        {if !isset($smarty.session.USER_EMAIL)}
          <a href='login' type="button" class="btn btn-outline-warning me-2">Login</a>
        {else if isset($smarty.session.USER_EMAIL)}
          <a href='logout' type="button" class="btn btn-outline-warning me-2">Logout ({$smarty.session.USER_EMAIL})</a>
        {/if}
      </div>
    </header>
  </div>






</body>