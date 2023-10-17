<?php

session_start();
if (isset($_SESSION['usuario_logueado'])) {
    header("location:home.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="../lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
<!-- Página para que el usuario, ingrese al sitio administrativo de las noticias del diario -->
    <body class="bg-dark-subtle d-flex justify-content-center align-items-center vh-100">
        <?php

                
        if (isset($mensaje)) {
            print("<p>" . $mensaje . "</p>");

        }
        ?>
        <form action="login.php" method="post">
            <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
                <div class="d-flex justify-content-center">
                    <img src="../images/login-icon.svg" alt="login-icon" style="height: 7rem" />
                </div>
                <div class="text-center fs-1 fw-bold">Login</div>
                <div class="input-group mt-4">
                    <div class="input-group-text bg-info">
                        <img src="../images/username-icon.svg" alt="username-icon" style="height: 1rem" />
                    </div>
                    <input class="form-control bg-light" type="text" id="usuario" name="usuario" placeholder="Usuario"
                        required />
                </div>
                <div class="input-group mt-1">
                    <div class="input-group-text bg-info">
                        <img src="../images/password-icon.svg" alt="password-icon" style="height: 1rem" />
                    </div>
                    <input class="form-control bg-light" type="password" placeholder="Password" id="password"
                        name="password" required />
                </div>

            </div>
            <div>
                <input type="submit" class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" id="enviar"
                    name="enviar" value="Ingresar" />
           </div>
        </form>
    </body>

    
</body>

</html>