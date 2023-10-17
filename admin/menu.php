<!-- barra de navegación del sitio administrativo-->

<div class="d-flex flex-row-reverse bg-body-tertiary">

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php"><h5>Inicio</h5></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="noticias.php"><h5>Noticias</h5></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="usuarios.php"><h5>Usuarios</h5></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php"><h5>Salir</h5></a>
        </li>
        <li class="nav-item">
            <?php
            print("<a class='nav-link disabled'>" . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "</a>");
            ?>
        </li>
    </ul>

</div>