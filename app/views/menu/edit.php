<?php include "app/views/layout/bodyTop.php"; ?>

<div class="mt-5 bg-white w-100 h-75 border border-dark border-opacity-25 p-3 position-relative" >
   <h4 class="text-center"><?=$title;?></h4>
     <div class="container" >
     <form action="/actualizar/<?=$id;?>" method="POST">  
         <?php include("app/views/menu/form.php"); ?>
         <div class="position-absolute bottom-0 start-0 p-5">
         <a href="/" class="btn btn-primary bottom absolute ">Cancelar</a>
         </div>
         <div class="position-absolute bottom-0 end-0 p-5">
          <button type="submit" class="btn btn-primary bottom absolute">Actualizar</button>
         </div>
     </form>
     </div>
 </div> 

<?php include "app/views/layout/bodyBottom.php"; ?>