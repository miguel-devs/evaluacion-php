<?php
namespace App\lib;

class FlashMessage
{

    public function createMessage($mensaje, $tipo)
    {
        $_SESSION["mensaje"] = $mensaje;
        $_SESSION["tipo"] = $tipo;
    }

    public function messageSession()
    {

        if (isset($_SESSION["mensaje"]) && !empty($_SESSION["mensaje"])) {
            $mensaje = $_SESSION["mensaje"];
            $tipo = $_SESSION["tipo"];
            echo '<div class="position-fixed bottom-0 end-0  p-1">
                     <div id="myAlert" class="w-100 mr-2  alert alert-' . $tipo . ' d-flex align-items-center" role="alert">
                          <div><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="margin-right:5px;"></button>' . $mensaje . '</div>
                     </div>
             </div>';

            echo "<script>
               function cerrarModal(){
                const alert = bootstrap.Alert.getOrCreateInstance('#myAlert')
                alert.close();
              }
              setTimeout(cerrarModal, 5000);
               </script>";
            unset($_SESSION['mensaje']);
        }
    }
}
