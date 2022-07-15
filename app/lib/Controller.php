<?php
namespace App\lib;

class Controller
{
    public function post($data)
    {
        return $data = isset($_POST[$data]) ? $_POST[$data] : null;
    }
}
