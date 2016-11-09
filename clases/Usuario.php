<?php

class Usuario {

    private $id;
    private $name;
    private $email;
    private $username;
    private $password;
    private $cart;
    private $perfil;

    function __construct($name = null, $email = null, $username = null, $password = null, $perfil = null) {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->cart = new Carrito();
        $this->perfil = $perfil;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getCart() {
        return $this->cart;
    }

    function setCart($cart) {
        $this->cart = $cart;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function persiste($bd) {
        try {
            if ($this->id) {
                $select = "UPDATE usuarios SET name = :name,"
                        . " email = :email,"
                        . " username = :username,"
                        . " password = :password"
                        . " WHERE id = " . $this->id;
                $sentencia = $bd->prepare($select);
                $result = $sentencia->execute([
                    ":name" => $this->name,
                    ":email" => $this->email,
                    ":username" => $this->username,
                    ":password" => $this->password
                ]);
            } else {
                $select = "INSERT INTO usuarios(name,email,username,password,perfil) VALUES(:name,:email,:username,:password,0)";
                $sentencia = $bd->prepare($select);
                $result = $sentencia->execute([
                    ":name" => $this->name,
                    ":email" => $this->email,
                    ":username" => $this->username,
                    ":password" => $this->password
                ]);
                if ($result) {
                    $this->id = $bd->lastInsertId();
                }
            }
            return $result;
        } catch (PDOException $e) {
            switch ($e->getCode()) {
                case 23000:
                    $error = "Username ya en uso";
                    break;
                default :
                    $error = $e->getMessage();
            }

            throw new Exception($error);
        }
    }

    static function checkUserCredentials($bd,$username, $password) {
        $select = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
        $sentencia = $bd->prepare($select);
        $sentencia->execute([":username" => $username, ":password" => $password]);
        $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario');
        $usuario = $sentencia->fetch();
        //comprobamos si hay carritos abiertos
        if ($usuario) {
            $usuario->cart = Carrito::checkCartUser($bd,$usuario->getId());
        }

        return $usuario;
    }

    function addProductsCart($bd,$products) {
        $this->cart = new Carrito($this->id);
        foreach ($products as $idProduct => $units) {
            if ($units != 0) {
                $this->cart->addProduct($bd,$idProduct, $units);
            }
        }
    }

    function buyCart($bd) {
        $fecha = date('Y-m-d');
        $select = "UPDATE carros SET finalized = 1, datebuy = '$fecha' WHERE id = :idCart";
        $sentencia = $bd->prepare($select);
        return $sentencia->execute([":idCart" => $this->cart->getId()]);
    }

}
?>

