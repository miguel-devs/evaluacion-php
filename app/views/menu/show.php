<?php include "app/views/layout/bodyTop.php";?>

<div class="mt-5 bg-white w-100 h-75 border border-dark border-opacity-25  position-relative" >
<div class="bg-black d-flex justify-content-end">
<a href="/" class="btn btn-primary m-2" >Menus</a>
</div>
   <h4 class="text-center"><?=$title;?></h4>
     <div class="container w-100 h-100  d-flex justify-content-center align-items-center" >
              <h4><?=$menu["descripcion"];?></h4>
     </div>
 </div>

<?php include "app/views/layout/bodyBottom.php";?>