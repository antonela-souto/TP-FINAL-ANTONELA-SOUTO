<?php
session_start();
extract($_REQUEST);
if (!isset($_SESSION['usuario_logueado']))
    header("location:index.php");
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
    <div class="container-fluid">
       <?php require("menu.php");?>
       <div class= "p-1 mb-2 bg-dark-subtle">
       <h1>Panel de Noticias</h1>
       </div>
     <!-- Código que imprime las noticias -->  
       <?php
            if(isset($mensaje))
                print("<h3 style='color:#cc00ff'>".$mensaje."</h3>");
       ?>
       <a href="noticias_nueva.php" class="btn btn-success">Crear nueva noticia</a>
    </div>
    <table class="table mt-3">
        <tr>
            <th>Título</th>
            <th>Copete</th>
            <th>Autor</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    <?php
        require("conexion.php");
        $conexion = mysqli_connect($server_db, $usuario_db, $password_db)
            or die("No se puede conectar con el servidor");
        mysqli_select_db($conexion, $base_db)
            or die("No se puede seleccionar la base de datos");
         $instruccion="select * from noticias  order by fecha desc";
        
             $consulta=mysqli_query($conexion,$instruccion) or die("no puedo consultar");
       
             $nfilas=mysqli_num_rows($consulta);
        for($i=0;$i<$nfilas;$i++)
        {
            $resultado=mysqli_fetch_array($consulta);
            print('
            <tr>
                <td>'.trim($resultado['titulo']).'</td>
                <td>'.substr($resultado['copete'],0,50).'...</td>
                <td>'.trim($resultado['autor']).'</td>
                <td>'.trim($resultado['fecha']).'</td>
                <td><a href="noticias_editar.php?id_noticia='.$resultado['id_noticia'].'" class="btn btn-secondary">editar</a></td>
                <td><a href="noticias_borrar.php?id_noticia='.$resultado['id_noticia'].'&imagen='.$resultado['imagen'].'" class="btn btn-danger" onclick="return confirm(&quot; Desea eliminar? &quot;)">borrar</a></td>
            </tr>
            
            ');
        }
        mysqli_close($conexion);
    ?>
    </table>
</body>

</html>