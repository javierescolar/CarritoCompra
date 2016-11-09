<?php

Class Producto {
    
    private $id;
    private $name;
    private $description;
    private $price;
    private $image;
    private $timesSold;
    
    function __construct($name = null,$description = null,$price = null,$image = null) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getPrice() {
        return $this->price;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function getTimesSold() {
        return $this->timesSold;
    }

    function setTimesSold($timesSold) {
        $this->timesSold = $timesSold;
    }

        
    static function showProducts($bd){
        $select = "SELECT * FROM productos";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Producto');
        $productos = $sentencia->fetchAll();
        return $productos;
    }
    
    static function getProductById($bd,$id){
        $select = "SELECT * FROM productos WHERE id = ".$id;
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $sentencia->setFetchMode( PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Producto');
        $producto = $sentencia->fetch();
        return $producto;
    }
}
?>
