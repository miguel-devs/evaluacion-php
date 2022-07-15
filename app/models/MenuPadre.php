<?php
namespace App\models;
use App\database\DB;

class MenuPadre extends DB
{
    private $tabla = "menu_padre";

    public function getMenusPadre()
    {
        $query = $this->conexion()->prepare("SELECT * FROM $this->tabla");
        if ($query->execute()) {
            return $query->fetchAll();
        }
        $this->close();
    }
}
