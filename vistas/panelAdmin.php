<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">

        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

        <title>Carrito</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include 'vistas/partials/nav.php';
        ?>
        <div class="container">

            <div class="row main">

                <div class="panel-heading">
                    <div class="panel-title text-center">

                        <h1 class="title">Javi Productos</h1>
                        <hr />
                    </div>
                </div> 
            </div> 
            <form action="index.php" method="POST">
                <div class="form-group">
                    <input type="submit" class="btn btn-default col-md-4" name="ultimasCompras" value="Últimas Compras">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-default col-md-4" name="mejoresClientes" value="Mejores Clientes">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-default col-md-4" name="productosMasVendidos" value="Productos Más Vendidos">
                </div>
                
            </form>
            <?php
            if (isset($_POST['ultimasCompras'])){
                include 'vistas/partials/tablaUltimasCompras.php';
            } else if (isset($_POST['mejoresClientes'])){
                include 'vistas/partials/tablaMejoresClientes.php';
            } else if (isset($_POST['productosMasVendidos'])){
                include 'vistas/partials/tablaProductosMasVendidos.php';
            } 
            ?>
        </div> 
        <script src="js/jquery-1.12.1.min"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/main.js"></script> 
    </body>
</html>



