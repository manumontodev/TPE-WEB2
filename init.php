<?php
include_once './app/models/config.php';
include_once './app/helpers/db.helper.php';

include_once './app/models/categoria.model.php';
include_once './app/models/producto.model.php';
include_once './app/models/sesion.model.php';

DatabaseHelper::crearDbSiNoExiste(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$categoriaModel = new CategoriaModel(); //INSTANCIAMOS PARA EJECUTAR EL _DEPLOY DEL CONSTRUCTOR Y CREAR LAS TABLAS
if (isset($categoriaModel)) {
    $productoModel = new ProductoModel();
}
$sesionModel = new SesionModel();
