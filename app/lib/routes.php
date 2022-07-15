<?php

$router = new Bramus\Router\Router();

$router->setNamespace('\App\controllers');

$router->get("/", "MenuController@index");

$router->get("/crear", "MenuController@create");

$router->post("/guardar", "MenuController@store");

$router->get("/editar/{id}", "MenuController@edit");

$router->post("/actualizar/{id}", "MenuController@update");

$router->post("/eliminar", "MenuController@delate");

$router->get("/ver/{id}", "MenuController@show");

$router->run();
