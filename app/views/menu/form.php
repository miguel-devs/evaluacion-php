<input type="hidden" name="token" value="<?= $token; ?>" readonly/>

<div class="mt-2">
                <div><label>Menú padre</label></diV>
                <div>
                    <select class="form-select" name="menu_padre_id" aria-label="Default select example">
                          <option selected >Selecciona una opción</option>

                           <?php foreach ($menusPadre as $menuPadre) {?>
                            <option value="<?=$menuPadre['id'];?>" <?=($menu["menu_padre_id"] == $menuPadre["id"]) ? "Selected" : "";?>><?=$menuPadre['nombre'];?></option>

                           <?php }?>
                    </select>
                </div>
 </div>
 <div class="mt-2">
                 <div><label>Nombre</label></div>
                 <div><input name="nombre" class="form-control"  value="<?=$menu["nombre"];?>" required ></div>
 </div>
 <div class="mt-2">
                 <div><label>Descripción</label></div>
                 <div>
                    <textarea name="descripcion"  class="form-control"  required><?=$menu["descripcion"];?></textarea>
                 </div>
 </div>
