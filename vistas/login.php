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
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">Javi Productos</h1>
                        <hr />
                    </div>
                </div> 
                <div class="form main-login main-center">
                    <form class="form-horizontal" method="post" action="index.php">

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>
                        <?php echo (isset($mensaje))?$mensaje:''; ?>
                        <div class="form-group ">
                             <input type="submit" name="login" class="btn btn-default btn-lg btn-block login-button" value="Sing In">
                        </div>
                        <div class="login-register">
                            <input type="submit" class="btn btn-link" name="formRegistro" value="Sing On">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="js/jquery-1.12.1.min"></script> 
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/main.js"></script> 
    </body>
</html>



