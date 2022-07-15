<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitulo"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Estas seguro que deseas eliminar este registro
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <form action="/eliminar" method="POST">
        <input type="hidden" name="token" value="<?=$_SESSION["token"]?>" readonly/>

        <div id="modalForm">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>