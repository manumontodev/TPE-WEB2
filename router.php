<?php
require_once 'init.php';
require_once './app/controllers/categoria.controller.php';
require_once './app/controllers/sesion.controller.php';
require_once './app/controllers/producto.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', BASE_URL . 'login');


$action = 'inicio'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case "inicio":
        $controller = new CategoriaController();
        $controller->showListaCategorias();
        break;
    case "artista":
        $controller = new CategoriaController();
        $controller->showCategoria($params[1]);
        break;
    case "login":
        $controller = new SesionController();
        $controller->showLogin();
        break;
    case "auth":
        $controller = new SesionController();
        $controller->auth();
        break;
    case "logout":
        $controller = new SesionController();
        $controller->logout();
        break;
    case "registerurl":
        $controller = new SesionController();
        $controller->showRegister();
        break;
    case "registrar":
        $controller = new SesionController();
        $controller->register();
        break;
    case "addArtista":
        $controller = new CategoriaController();
        $controller->addCategoria();
        break;
    case "removeArtista":
        $controller = new CategoriaController();
        $controller->removeCategoria($params[1]);
        break;
    case "editArtista":
        $controller = new CategoriaController();
        $controller->editCategoria($params[1]);
        break;
    default:
        echo "404 Page Not Found";
        break;
}
