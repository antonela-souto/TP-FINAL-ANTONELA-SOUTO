
<!-- salir de la sesión -->
<?php
    session_start();
    session_destroy();
    header("location:index.php");
?>
