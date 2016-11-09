<!DOCTYPE html>
<?php
require_once 'clases/BD.php';
require_once 'clases/Collection.php';
require_once 'clases/Usuario.php';
require_once 'clases/Producto.php';
require_once 'clases/Carrito.php';
require_once 'clases/Estadisticas.php';
require_once 'clases/Sesion.php';

try {
    $session = new Sesion();
} catch (Exception $ex) {
    $error = "Error de sesiones... " . $ex->getMessage();
    include 'vistas/error.php';
    die();
}

try {
    $bd = BD::getConexion();
} catch (Exception $ex) {
    $error = "Error de sesiones... " . $ex->getMessage();
    include 'vistas/error.php';
    die();
}



if ($session->checkSesion('usuario')) {
    $usuario = $session->getSesion('usuario');
    if (isset($_POST['salir'])) {
        $session->destroy();
        include 'vistas/login.php';
    } else if (isset($_POST['volver'])) {
        $productos = Producto::showProducts($bd);
        include 'vistas/productos.php';
    } else if (isset($_POST['anadirCarro'])) {
        $productoSeleccionados = $_POST['producto'];
        $usuario->addProductsCart($bd,$productoSeleccionados);
        $usuario->getCart()->persiste($bd);
        $productos = Producto::showProducts($bd);
        echo "<script> alert('product/s added to cart!');</script>";
        include 'vistas/productos.php';
    } else if (isset($_POST['listarCarrito'])) {
        $cart = (!empty($usuario->getCart())) ? $usuario->getCart()->getProducts()->getObjects() : 0;
        include 'vistas/carrito.php';
    } else if (isset($_POST['comprar'])) {
        $usuario->buyCart($bd);
        $cart = $usuario->getCart()->getProducts()->getObjects();
        $mensaje = "<h3>Muchas gracias por realizar la compra con nosotros :) vuelva pronto</h3>";
        include 'vistas/resumenCompra.php';
    } else if (isset($_POST['regresar'])) {
        $usuario->setCart(new Carrito());
        $productos = Producto::showProducts($bd);
        include 'vistas/productos.php';
    } else if (isset($_POST['ultimasCompras'])) {
        $ultimasCompras = Estadisticas::get10LastBuys($bd);
        include 'vistas/panelAdmin.php';
    } else if (isset($_POST['mejoresClientes'])) {
        $mejoresClientes = Estadisticas::get10BestCustomers($bd);
        include 'vistas/panelAdmin.php';
    } else if (isset($_POST['productosMasVendidos'])) {
        $productosMasVendidos = Estadisticas::get5BestSellers($bd);
        include 'vistas/panelAdmin.php';
    } else {
        if ($usuario->getPerfil() == 1) {
            include 'vistas/panelAdmin.php';
        } else {
            $productos = Producto::showProducts($bd);
            include 'vistas/productos.php';
        }
    }
} else {
    if (isset($_POST['login'])) {
        $usuario = Usuario::checkUserCredentials($bd, $_POST['username'], $_POST['password']);
        if ($usuario) {
            $session->setSesion('usuario', $usuario);
            if ($usuario->getPerfil() == 1) {
                include 'vistas/panelAdmin.php';
            } else {
                $productos = Producto::showProducts($bd);
                include 'vistas/productos.php';
            }
        } else {
            $mensaje = "<p class='mensaje'>user not found</p>";
            include 'vistas/login.php';
        }
    } else if (isset($_POST['formRegistro'])) {
        include 'vistas/registro.php';
    } else if (isset($_POST['registrarse'])) {
        $newUser = new Usuario($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password']);
        try {
            $newUser->persiste($bd);
            $mensaje = "<p>user created</p>";
            include 'vistas/login.php';
        } catch (Exception $ex) {
            $mensaje = $ex;
            include 'vistas/login.php';
            die();
        }
    } else {
        include 'vistas/login.php';
    }
}
?>
