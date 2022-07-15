<?php include "app/views/layout/bodyTop.php";?>

<div class="container-fluid mt-5">
<h4 class="text-center"><?=$title;?></h4>
<div class="bg-black d-flex justify-content-end">
<a href="/crear" class="btn btn-primary m-2" >Nuevo</a>
</div>
<div class="table-responsive">
  <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Menú Padre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acciones</th>


    </tr>
  </thead>
  <?php foreach ($menus as $menu) {?>

    <tr>
      <th scope="row"><?=$menu["id"];?></th>
      <td><?=$menu["nombre"];?></td>
      <td><?=$menu["nombre_menu_padre"];?></td>
      <td><?=$menu["descripcion"];?></td>

      <td>
      <a class="btn btn-primary bottom absolute" href="editar/<?=$menu["id"];?>">Editar</a>
      <button id="btn-delate" type="button" class="btn btn-danger mr-2 ml-2" data-id="<?=$menu["id"];?>" data-bs-toggle="modal" data-bs-target="#modal">Eliminar</button>

    </td>
    </tr>

  <?php }?>
  </table>

  <?php if (!$menus) {
    echo "<p class='text-center'>Por el momento, no hay menus registrados</p>";
}?>
</div>
  </div>

<?php include "app/views/layout/bodyBottom.php"; ?>