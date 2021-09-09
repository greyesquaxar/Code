<html>
<head>
    <title>Agregar</title>
    <link rel="stylesheet" type="text/css" href="estilos.css" >
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $actividad=$_POST['actividad'];
            $notas=$_POST['notas'];

            include("conexion.php");
            $sql="insert into bitacora(actividad, notas) 
            values('".$actividad."', '".$notas."') ";

            $resultado=mysqli_query($conexion,$sql);
            if($resultado){
                echo " <script language='JavaScript'> 
                    alert('Los datos fueron ingresados correctamente a la BD');
                    location.assign('index.php');
                    </script>";
            }else{
                echo " <script language='JavaScript'> 
                alert('Los datos no fueron ingresados a la BD');
                location.assign('index.php');
                </script>";
            }
            mysqli_close($conexion);

            
        }else{

        }
    ?>

    <h1>Agregar nuevo registro</h1>
    <form action = "<?=$_SERVER['PHP_SELF']?>" method = "post">
        <label>Actividad:</label>
        <input type="text" name="actividad"> <br>
        <label>Notas:</label>
        <input type="text" name="notas"> <br>
        <input type="submit" name="enviar" value="Agregar">
        <a href="index.php">Regresar</a>
    </form>
</body>
</html>