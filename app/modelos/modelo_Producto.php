<?php

class Modelo_Producto {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_perfumes;charset=utf8', 'root', '');
    }

    function traerProductos() {
        $query = $this->db->prepare("SELECT * FROM perfumes");
        $query->execute();

        $perfumes = $query->fetchAll(PDO::FETCH_OBJ);
        return $perfumes;
    }

    function agregarProducto($nombre, $marca, $tipo, $tamanio, $genero, $precio, $imagen = null) {
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->cargarImagen($imagen);

        $query = $this->db->prepare("INSERT INTO perfumes (nombre, marca, tipo, tamanio, genero, precio, imagen) VALUES (?, ?, ?, ?, ?, ?,?)");
        $query->execute([$nombre, $marca, $tipo, $tamanio, $genero, $precio, $pathImg]);

        return $this->db->lastInsertId();
    }

    private function cargarImagen($imagen){
        $target = 'imagenes/' . uniqid() . '.jpg';
        move_uploaded_file($imagen, $target);
        return $target;
    }

    function eliminarProducto($id){
        $query = $this->db->prepare('DELETE FROM perfumes WHERE id_producto= ?');
        $query->execute([$id]);
    }

    function traerProducto($id){
        $query = $this->db->prepare("SELECT * FROM perfumes WHERE id_producto= ?");
        $query->execute([$id]);

        $perfume = $query->fetch(PDO::FETCH_OBJ);
        return $perfume;
    }

    function modificarProducto($nombre, $marca, $tipo, $tamanio, $genero, $precio, $imagen = null, $id) {
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->cargarImagen($imagen);
            
        $query = $this->db->prepare("UPDATE perfumes SET nombre= ?, marca = ?, tipo = ?, tamanio = ?, genero = ?, precio = ?, imagen = ? WHERE id_producto = ?");
        $query->execute([$nombre, $marca, $tipo, $tamanio, $genero, $precio, $pathImg, $id]);
    }
        
    function modificarProductoSinImg($nombre, $marca, $tipo, $tamanio, $genero, $precio, $id){
        $query = $this->db->prepare("UPDATE perfumes SET nombre= ?, marca = ?, tipo = ?, tamanio = ?, genero = ?, precio = ? WHERE id_producto = ?");
        $query->execute([$nombre, $marca, $tipo, $tamanio, $genero, $precio, $id]);
    } 

    function traerProdMarca($marca) {
        $query = $this->db->prepare("SELECT * FROM perfumes WHERE marca=?");
        $query->execute([$marca]);

        $perfumes = $query->fetchAll(PDO::FETCH_OBJ);
        return $perfumes;
    }
}