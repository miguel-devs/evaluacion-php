<nav class="navbar navbar-expand-lg  navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Evaluación</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php foreach ($listarOpcionesCatalogo as $listarOpciondeCatalogo) {?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?=$listarOpciondeCatalogo["nombre"];?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php $subcatalogos = $listarOpciondeCatalogo["subCatalogo"];
    foreach ($subcatalogos as $subcatalogo) {?>
            <li><a class="dropdown-item" href="/ver/<?=$subcatalogo["id"];?>"><?=$subcatalogo["nombre"];?></a>
          </li>

            <?php }?>
            <?php if (!$subcatalogos) {?>
            <li><a class="dropdown-item" href="#"> Aun no hay registros</a></li>
            <?php }?>
          </ul>
        </li>
        <?php }?>
      </ul>
    </div>
  </div>
</nav>