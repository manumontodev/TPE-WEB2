<?php
include_once './app/helpers/sesion.helper.php';

class CategoriaView
{


    function showListaCategorias($categorias)
    {

        require './templates/categoriasList.phtml';
        if (SesionHelper::isAdmin()) {
            require './templates/categoriaAgregar.phtml';
        }
        require("templates/footer.phtml");
    }

    function showCategoria($categoria, $productos)
    {
        require './templates/categoriaInfo.phtml';
        require './templates/productoList.phtml';

        if (SesionHelper::isAdmin()) {
            require './templates/categoriaEditar.phtml';
        }

        require("templates/footer.phtml");
    }

    function showError($error)
    {
        require './templates/error.phtml';
    }
}
