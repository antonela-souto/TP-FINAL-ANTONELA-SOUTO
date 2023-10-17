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
<!-- logo del diario y barra de navegación -->
    <div class="container-fluid">
        <?php // require("menu.php"); 
        ?>
       
        <div class="d-flex justify-content-center bg-body-tertiary">
            <div class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="d-flex justify-content-start pe-5">
            <img src="./images/BL-Logo-FB.png" alt="Logo" height="100">

        </div>
                <ul class="nav">

                    <li>
                        <a class="nav-link active text-dark align-self-center" aria-current="page"
                        href="javascript:history.back()">Noticias</a>
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
<!-- muestra el detalle de la noticia seleccionada -->
        <div class="d-flex justify-content-center bg-secondary-subtle">
            <?php
            extract($_REQUEST);
            require("admin/conexion.php");
            $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
                or die("No se puede conectar con el servidor");
            mysqli_select_db($conexion, $base_db)
                or die("No se puede seleccionar la base de datos");
            $instruccion = "select * from noticias  where id_noticia=" . $id_noticia;

            $consulta = mysqli_query($conexion, $instruccion) or die("no puedo consultar");

            $nfilas = mysqli_num_rows($consulta);
            for ($i = 0; $i < $nfilas; $i++) {
                $resultado = mysqli_fetch_array($consulta);
                print('
            <div class="col-5">
                <div class="card">
                <img src="imagenes_subidas/' . $resultado['imagen'] . '" class="card-img-top" alt="' . $resultado['titulo'] . '">
                    <div class="card-body">
                            <h5 class="card-title">' . $resultado['titulo'] . '</h5>
                        <p class="card-text">' . ($resultado['copete']) . '</p>
                        <p class="card-text">' . ($resultado['cuerpo']) . '</p>
                        <p class="card-text">' . substr($resultado['autor'], 0, 40) . '</p>
                        <p class="card-text">' . substr($resultado['fecha'], 0, 40) . '</p>
                        <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                    </div>
                 </div>
            </div>





           
            
            ');
            }
            mysqli_close($conexion);
            ?>
        </div>

        <footer>

            <nav class="barra navbar bg-body-secondary">
                <div class="d-flex justify-content-start p-3">

                    <a class="navbar-brand" href= "https://www.unlpam.edu.ar">
                        <img src="./images/logounlpam.png" alt="unlpam"  width="100" height="60">
                    </a>
                    <a class="navbar-brand" href="#">
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

</body>

</html>