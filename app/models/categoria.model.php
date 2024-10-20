<?php
include_once 'config.php';

class CategoriaModel
{

    private $db;

    public function __construct()
    {

        $this->db = new PDO(
            "mysql:host=" . DB_HOST .
                ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );
        $this->_deploy();
    }

    function _deploy()
    {
        $query = $this->db->query('SHOW TABLES LIKE "categoria"');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
        CREATE TABLE `categoria` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `nombre` varchar(100) DEFAULT NULL,
            `descripcion` int(11) NOT NULL,
            `oferta` tinyint(1) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY (`nombre`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
END;
            $this->db->query($sql);

            $this->addCategoria('Bad Bunny', 'Descripción 1', 25, 'Puerto Rico');
            $this->addCategoria('Arcangel', 'Descripción 2', 30, 'Puerto Rico');
        }
    }





    function getCategorias()
    {
        $query = $this->db->prepare('SELECT * from categoria');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function getCategoria($id)
    {
        $query = $this->db->prepare('SELECT * from categoria WHERE id = ?');
        $query->execute([$id]);
        $categoria = $query->fetch(PDO::FETCH_OBJ);

        return $categoria;
    }

    function getProductosPorCategoria($nombreCategoria)
    {
        $query = $this->db->prepare('SELECT * FROM producto JOIN categoria ON producto.categoria = categoria.nombre WHERE categoria.nombre = ?');
        $query->execute([$nombreCategoria]);
        $canciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $canciones;
    }

    function addCategoria($nombre, $descripcion, $oferta)
    {
        $query = $this->db->prepare('INSERT INTO categoria (nombre, descripcion, oferta) VALUES (?, ?, ?)');
        $query->execute([$nombre, $descripcion, $oferta]);

        return $this->db->lastInsertId();
    }

    function removeCategoria($id)
    {
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        $query->execute([$id]);
    }

    function editCategoria($id, $nombre, $descripcion, $oferta)
    {
        $query = $this->db->prepare('UPDATE categoria SET nombre = ?, descripcion = ?, oferta = ? WHERE id = ?');
        $realizado = $query->execute([$nombre, $descripcion, $oferta, $id]);

        return $realizado;
    }
}
