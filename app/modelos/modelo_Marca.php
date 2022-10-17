<?php

class Modelo_Marca {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_perfumes;charset=utf8', 'root', '');
    
    }

    function traerMarcas() {
        $query = $this->db->prepare("SELECT * FROM marcas");
        $query->execute();

        $marcas = $query->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }

    function agregarMarca($marca, $origen, $crueltyFree){
            $query = $this->db->prepare("INSERT INTO marcas (marca, origen, crueltyFree) VALUES (?, ?, ?)");
            $query->execute([$marca, $origen, $crueltyFree]);
        
    }

    function traerMarca($id){
        $query = $this->db->prepare("SELECT * FROM marcas WHERE id_marca= ?");
        $query->execute([$id]);

        $marca = $query->fetch(PDO::FETCH_OBJ);
        return $marca;
    }

    function modificarMarca($marca, $origen, $crueltyFree, $id){
        $query = $this->db->prepare("UPDATE marcas SET marca= ?, origen = ?, crueltyFree = ? WHERE id_marca = ?");
        $query->execute([$marca, $origen, $crueltyFree, $id]);
   }

    function eliminarMarca($id) {
    $query = $this->db->prepare("DELETE FROM marcas WHERE id_marca= ?");
    $query->execute([$id]);
   }
    
}