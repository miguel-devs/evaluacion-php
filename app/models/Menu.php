<?php
namespace App\models;


class Menu extends MenuPadre
{

    private $tabla = "menu";

    public function getMenus()
    {
        $query = $this->conexion()->prepare("SELECT $this->tabla.id, $this->tabla.nombre, $this->tabla.descripcion,menu_padre.nombre as nombre_menu_padre FROM $this->tabla LEFT JOIN menu_padre  ON $this->tabla.menu_padre_id = menu_padre.id;");
        if ($query->execute()) {
            $result = $query->fetchAll();
            $this->close();
            return $result;
        }
    }
    

    public function getMenu($id)
    {
        $query = $this->conexion()->prepare("SELECT * FROM $this->tabla WHERE id = :id");
        $query->bindValue(':id', $id);
        if ($query->execute()) {
            $result = $query->fetch();
            $this->close();
            return $result;
        }

    }

    public function delateMenu($id)
    {
        $query = $this->conexion()->prepare("DELETE FROM $this->tabla WHERE id = :id");
        $query->bindValue(':id', $id);
        if ($query->execute()) {
            $result = $query->rowCount();
            $this->close();
            return $result;
        }
    }

    public function registerMenu($menuPadre, $nombre, $descripcion)
    {

        $query = $this->conexion()->prepare("INSERT INTO $this->tabla(nombre,menu_padre_id, descripcion) VALUES (?,?,?)");
        $query->bindValue(1, $nombre);
        $query->bindValue(2, $menuPadre);
        $query->bindValue(3, $descripcion);

        if ($query->execute()) {
            $result = $query->rowCount();
            $this->close();
            return $result;
        }
    }

    public function updateMenu($id, $menuPadre, $nombre, $descripcion)
    {

        $query = $this->conexion()->prepare("UPDATE $this->tabla SET nombre = :nombre, menu_padre_id= :menu_padre_id, descripcion= :descripcion WHERE id = :id");

        $query->bindValue(":nombre", $nombre);
        $query->bindValue(":menu_padre_id", $menuPadre);
        $query->bindValue(":descripcion", $descripcion);
        $query->bindValue(":id", $id);

        if ($query->execute()) {
            $result = $query->rowCount();
            $this->close();
            return $result;
        }
    }

    public function listarOpcionesCatalogo()
    {
        $opcionesCatalogo = $this->getMenusPadre();
        $subOpcionesCatalogo = array();
        foreach ($opcionesCatalogo as $opcionCatalogo) {
            $nombre = $opcionCatalogo["nombre"];
            $id = $opcionCatalogo["id"];

            $query = $this->conexion()->prepare("SELECT * FROM menu WHERE menu_padre_id = :id");
            $query->bindValue(':id', $id);
            $query->execute();
            $subOpcionesCatalogo = $query->fetchall();

            $subData = array();

            foreach ($subOpcionesCatalogo as $subOpcionCatalogo) {
                $subOpcionId = $subOpcionCatalogo["menu_padre_id"];
                if ($id == $subOpcionId) {
                    $subData[] = array("id" => $subOpcionCatalogo["id"], "nombre" => $subOpcionCatalogo["nombre"]);
                }
            }
            $data[] = array("id" => $id, "nombre" => $nombre, "subCatalogo" => $subData);
        }
        $this->close();
        return $data;
    }
}
