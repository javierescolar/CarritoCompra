<?php

Class Carrito {

    private $id;
    private $idUser;
    private $products;

    function __construct($idUser = null) {
        $this->idUser = $idUser;
        $this->products = new Collection;
    }

    function getId() {
        return $this->id;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function getProducts() {
        return $this->products;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setProducts($products) {
        $this->products = $products;
    }

    function persiste($bd) {
        if ($this->id) {
            $sentencia = $bd->prepare("DELETE FROM carroproductos WHERE idCart = " . $this->id);
            $sentencia->execute();
            foreach ($this->products->getObjects() as $product) {
                $sentencia = $bd->prepare("INSERT INTO carroproductos(idCart,idProduct) VALUES(:idCart,:idProduct)");
                $sentencia->execute([":idCart" => $this->id, ":idProduct" => $product->getId()]);
            }
        } else {
            $select = "INSERT INTO carros(idUser) VALUES(:idUser)";
            $sentencia = $bd->prepare($select);
            $result = $sentencia->execute([":idUser" => $this->idUser]);
            if ($result) {
                $this->id = $bd->lastInsertId();
                foreach ($this->products->getObjects() as $product) {
                    $sentencia = $bd->prepare("INSERT INTO carroproductos(idCart,idProduct) VALUES(:idCart,:idProduct)");
                    $sentencia->execute([":idCart" => $this->id, ":idProduct" => $product->getId()]);
                }
            }
        }
        return $result;
    }

    function addProduct($bd,$idProduct, $units) {
        $i = 0;
        $product = Producto::getProductById($bd,$idProduct);
        while ($i < $units) {
            $this->products->add($product);
            $i++;
        }
    }

    static function checkCartUser($bd,$idUser) {
        $sentencia = $bd->prepare("SELECT * FROM carros WHERE idUser = $idUser  AND finalized = 0 LIMIT 1");
        $sentencia->execute();
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Carrito');
        $carro = $sentencia->fetch();
        if($carro){
             $sentencia = $bd->prepare("SELECT * FROM carroproductos WHERE idCart = ".$carro->getId());
             $sentencia->execute();
             $products = $sentencia->fetchAll();
             foreach ($products as $idProduct){
                 $product = Producto::getProductById($bd,$idProduct['idProduct']);
                 $carro->getProducts()->add($product);
             }
            
        }
        return $carro;
    }
    
    
    
     

}
