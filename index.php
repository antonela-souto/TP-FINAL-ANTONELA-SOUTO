<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIARIO BAJO LA LUPA</title>
    <link href="lib/bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- Logo y barra de navegación del diario -->
    <div class="container-fluid">
        <?php // require("menu.php"); 
        ?>
         <div class="d-flex justify-content-center">
            <img src="./images/BL-Logo-FB.png" alt="Logo" height="300">

        </div>
        <div class="d-flex justify-content-center bg-body-secondary">
            <div class="navbar navbar-expand-lg ">
                <ul class="nav">

                    <li>
                        <a class="nav-link active text-dark align-self-center" aria-current="page"
                            href="index.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark align-self-center" aria-current="page"
                            href="https://dolarhoy.com/">Dolar Hoy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark align-self-center" href="https://www.smn.gob.ar/">El Tiempo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark align-self-center" href="https://elpais.com/argentina/">El País</a>
                    </li>

                </ul>

            </div>
        </div>
         <!-- impresión de noticias -->      
        <div class="row">
            <?php
            require("admin/conexion.php");
            $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                or die("No se puede conectar con el servidor");
            mysqli_select_db($conexion, $base_db)
                or die("No se puede seleccionar la base de datos");
            $instruccion = "select * from noticias  order by fecha desc limit 10";

            $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

            $nfilas = mysqli_num_rows($consulta);
            for ($i = 0; $i < $nfilas; $i++) {
                $resultado = mysqli_fetch_array($consulta);
                print('
            <div class="col-3 mt-4">
                <div class="card mt-3" style="height: 35rem;">
                <img src="imagenes_subidas/' . $resultado['imagen'] . '" class="card-img-top" alt="' . $resultado['titulo'] . '"style="height: 15rem;">
                    <div class="card-body">
                            <h5 class="card-title"><u>' . substr($resultado['titulo'],0, 100) . '</u></h5>
                        <p class="card-text">' . substr($resultado['copete'],0, 40) . '...</p>
                        <p class="card-text">' . substr($resultado['autor'], 0, 40) . '</p>
                        <p class="card-text">' . substr($resultado['fecha'], 0, 40) . '</p>
                        <a href="ver_noticia.php?id_noticia=' . $resultado['id_noticia'] . '" class="btn btn-primary mt-3">Ver Noticia</a>
                    </div>
                 </div>
            </div>





           
            
            ');
            }
            mysqli_close($conexion);
            ?>
        </div>
<!-- pie de página -->
        <footer>

            <nav class="barra navbar bg-body-secondary">
                <div class="d-flex justify-content-start p-3">

                    <a class="navbar-brand" href= "https://www.unlpam.edu.ar">
                        <img src="./images/logounlpam.png" alt="unlpam"  width="100" height="60">
                    </a>
                    <a class="navbar-brand" href="https://github.com/antonela-souto/TP-FINAL-ANTONELA-SOUTO">
                        <img src="./images/logo-GitHub.png" alt="GitHub" width="110" height="60">
                    </a>
                    <a class="navbar-brand" href= "https://www.argentina.gob.ar/economia/conocimiento/argentina-programa">
                        <img src="./images/argentina-programa.png" alt="Argentina-Prog" width="160" height="60">
                    </a>

                </div>

                <h6 class="d-flex m-6">BAJO LA LUPA DIARIO  - ANTONELA SOUTO</h6>
            </nav>
            <div class= "d-flex justify-content-center bg-dark text-white pt-3">
                <p>ARGENTINA PROGRAMA - UNLPam © 2023 </p>
            </div>

        </footer>
    </div>
</body>

</html>