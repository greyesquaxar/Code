<?php
    include("conexion.php");
?>
<html>
<head>
    <title>Editar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css" >
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $id=$_POST['id'];
            $actividad=$_POST['actividad'];
            $notas=$_POST['notas'];

            //update
            $sql="update bitacora set actividad='".$actividad."',
            notas='".$notas."' where id='".$id."' ";
            $resultado=mysqli_query($conexion,$sql);


            if($resultado){
                echo "<script language='JavaScript'>
                alert('Los datos se actualizaron correctamente');
                location.assign('index.php');
                </script>";  
            }else{
                echo "<script language='JavaScript'>
                alert('Los datos no se actualizaron');
                location.assign('index.php');
                </script>";  
            }

            mysqli_close($conexion);

        }else{
            $id=$_GET['id'];
            $sql="select * from bitacora where id='".$id."' ";
            $resultado=mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc($resultado);
            $actividad=$fila["actividad"];
            $notas=$fila["notas"];

            mysqli_close($conexion);
        
    ?>
    <h1>Editar bitacora</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Actividad:</label>
        <input type="text" name="actividad" 
        value="<?php echo $actividad; ?>"> <br>

        <label>Notas:</label>
        <input type="text" name="notas" 
        value="<?php echo $notas; ?>"> <br>

        <input type="hidden" name="id"
        value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="index.php">Regresar</a>

    </form>
    <?php
        }
    ?>
</body>
</html>