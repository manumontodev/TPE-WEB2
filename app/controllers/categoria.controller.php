<?php
include_once './app/models/categoria.model.php';
include_once './app/views/categoria.view.php';
include_once './app/helpers/sesion.helper.php';

class CategoriaController
{

    private $view;
    private $model;


    function __construct()
    {
        $this->view = new CategoriaView();
        $this->model = new CategoriaModel();
    }

    function showListaCategorias()
    {
        $categorias = $this->model->getCategorias();
        $this->view->showListaCategorias($categorias);
    }

    function showCategoria($id)
    {
        $categoria = $this->model->getCategoria($id);
        $productos = $this->model->getProductosPorCategoria($categoria->nombre);
        $this->view->showCategoria($categoria, $productos);
    }



    function addCategoria()
    {
        SesionHelper::verify();
        $nombre = $_POST['categoria-name'];
        $desc = $_POST['categoria-desc'];
        $oferta = $_POST['categoria-oferta'];

        if (empty($nombre) || empty($desc) || empty($oferta)) {
            $this->view->showError("Debes completar todos los datos");
            return;
        }

        $id = $this->model->addCategoria($nombre, $desc, $oferta);
        if ($id) {
            header("Location: " . BASE_URL);
        } else {
            $this->view->showError("Error al insertar categoria");
        }

        header("Location: " . BASE_URL);
    }

    function removeCategoria($id)
    {
        SesionHelper::verify();
        $this->model->removeCategoria($id);

        header("Location: " . BASE_URL);
    }

    function editCategoria($id)
    {
        SesionHelper::verify();
        $nombre = $_POST['categoria-name'];
        $desc = $_POST['categoria-desc'];
        $oferta = $_POST['categoria-oferta'];

        if (empty($nombre) || empty($desc) || empty($oferta)) {
            $this->view->showError("Debes completar todos los datos");
            return;
        }
        $realizado = $this->model->editCategoria($id, $nombre, $desc, $oferta);
        if ($realizado) {
            header("Location: " . BASE_URL);
        } else {
            $this->view->showError("Error al editar categoria");
        }
    }
}
