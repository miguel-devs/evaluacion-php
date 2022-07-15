<?php
namespace App\lib;

class CsrfToken
{

    public function generateToken()
    {
        return $_SESSION["token"] = bin2hex(random_bytes(32));
        
    }


    public function verifyToken()
    {
        if (!isset($_POST["token"]) || !isset($_SESSION["token"])) {exit();}
        if ($_POST["token"] != $_SESSION["token"]) {
            require "app/views/errors/419.php";
            exit();
        }
    }

}
