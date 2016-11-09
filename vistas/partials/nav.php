<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Javi Productos</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form action="index.php" method="POST">
                    <p class="btn btn-link">
                        <span class="glyphicon glyphicon-user"></span> <?php echo $usuario->getName(); ?>
                    </p>
                </form>
            </li>
            <?php
            if (isset($_POST['listarCarrito'])){
            ?>
            <li>
                <form action="index.php" method="POST">
                    <button class="btn btn-link" type="submit" name="volver">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Return
                    </button>
                </form>
            </li>
            <?php
            }
            if ($usuario->getPerfil() != 1){
            ?>
             <li>
                <form action="index.php" method="POST">
                    <button class="btn btn-link" type="submit" name="listarCarrito">
                        <span class="glyphicon glyphicon-shopping-cart"></span> <?php echo (empty($usuario->getCart()))? 0 :count($usuario->getCart()->getProducts()->getObjects()) ; ?>
                    </button>
                </form>
            </li>
            <?php
            }
            ?>
            <li>
                <form action="index.php" method="POST">
                    <button class="btn btn-link" type="submit" name="salir">
                        <span class="glyphicon glyphicon-log-out"></span> Exit
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

