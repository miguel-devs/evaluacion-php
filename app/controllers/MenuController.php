<?php
namespace App\controllers;

use App\lib\Controller;
use App\lib\CsrfToken;
use App\lib\FlashMessage;
use App\models\Menu;
use App\models\MenuPadre;

class MenuController extends Controller
{
    private $menu;
    private $menuPadre;
    protected $csrfToken;

    public function __construct()
    {
        $this->menuPadre = new MenuPadre;
        $this->menu = new Menu;
        $this->csrfToken = new CsrfToken;

    }
    public function index()
    {
        $title = "Ver menús";

        $listarOpcionesCatalogo = $this->menu->listarOpcionesCatalogo();
        $menus = $this->menu->getMenus();
        require_once "app/views/menu/index.php";
    }
    public function create()
    {
        $token = $this->csrfToken->generateToken();

        $title = "Crear menú";
        $menu = array("id" => "", "nombre" => "", "menu_padre_id" => "", "descripcion" => "");

        $menusPadre = $this->menuPadre->getMenusPadre();
        $listarOpcionesCatalogo = $this->menu->listarOpcionesCatalogo();
        require_once "app/views/menu/create.php";
    }
    public function store()
    {
        $FlashMessage = new FlashMessage;
        $this->csrfToken->verifyToken();

        $menuPadre = $this->post("menu_padre_id");
        $nombre = $this->post("nombre");
        $descripcion = $this->post("descripcion");

        if ($nombre && $descripcion) {
            $this->menu->registerMenu($menuPadre, $nombre, $descripcion);
            $FlashMessage->createMessage("Su registro ha sido creado con exito", "success");
            header('Location: /');
        } else {
            $FlashMessage->createMessage("Por favor, complete los campos requeridos", "danger");
            header('Location: /crear');
        }
    }
    public function edit($id)
    {
        $token = $this->csrfToken->generateToken();

        $title = "Editar menú";

        $listarOpcionesCatalogo = $this->menu->listarOpcionesCatalogo();
        $menusPadre = $this->menuPadre->getMenusPadre();
        $menu = $this->menu->getMenu($id);

        require_once "app/views/menu/edit.php";
    }
    public function update($id)
    {
        $this->csrfToken->verifyToken();
        $menuPadre = $this->post("menu_padre_id");
        $nombre = $this->post("nombre");
        $descripcion = $this->post("descripcion");

        $FlashMessage = new FlashMessage;

        if ($id && $nombre && $descripcion) {
            $this->menu->updateMenu($id, $menuPadre, $nombre, $descripcion);
            $FlashMessage->createMessage("Su registro ha sido actualizado con exito", "success");
            header("Location: /editar/$id");
        } else {
            $FlashMessage->createMessage("Por favor, complete los campos requeridos", "danger");
            header("Location: /editar/$id");
        }
    }

    public function delate()
    {
        $this->csrfToken->verifyToken();
        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        if ($id) {
            $this->menu->delateMenu($id);
            $FlashMessage = new FlashMessage;
            $FlashMessage->createMessage("Su registro ha sido eliminado con exito", "success");
        }
        header('Location: /');
    }

    public function show($id)
    {
        $title = "Visualización del menú";
        $menu = $this->menu->getMenu($id);
        $listarOpcionesCatalogo = $this->menu->listarOpcionesCatalogo();
        require_once "app/views/menu/show.php";
    }
}
