const myModalEl = document.getElementById('modal')

myModalEl.addEventListener('show.bs.modal', event => {
 var btn = event.relatedTarget;
 document.getElementById("modalTitulo").innerHTML = "Eliminar Registro";
 
 const id = btn.dataset.id;
   const form =`<input type="hidden" name="id" value="${id}" >
                <button type="submit" class="btn btn-primary" >Aceptar</button>
                `;
 document.getElementById("modalForm").innerHTML = form;
})