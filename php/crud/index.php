<html>
<head>
    <title>Bitacora</title>
    <link rel="stylesheet" type="text/css" href="estilos.css" >
</head>
<body>
    
<?php
    include("conexion.php");
    $sql="select * from bitacora";
    $resultado = mysqli_query($conexion, $sql);
?>

    <h1>Bitacora de residentes en Quaxar</h1>
    <a href="agregar.php">Nuevo registro</a><br><br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Fecha</th>
                <th>Actividad</th>
                <th>Notas</th>
                <th>Acciones</th>
            </tr>

        </thead>
        <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($resultado)){
            ?>
            
            <tr>
                <td> <?php echo $filas['id'] ?></td>
                <td> <?php echo $filas['fecha'] ?></td>
                <td> <?php echo $filas['actividad'] ?></td>
                <td> <?php echo $filas['notas'] ?></td>
                <td> 
<?php echo "<a href='editar.php?id=".$filas['id']."' >EDITAR</a> "; ?>
                    -
<?php echo "<a href='eliminar.php?id=".$filas['id']."' >ELIMINAR</a> "; ?>     
                </td>

            </tr>
            <?php
                }
            ?>
        </tbody>

    </table>
    <?php
        mysqli_close($conexion);
    ?>
</body>
</html>