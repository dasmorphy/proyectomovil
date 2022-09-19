<?php
    include ("conexion.php");
    $id = $_GET['id'];
    $eliminar = "DELETE FROM lecturas  WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $eliminar);
    if($eliminar){
        echo '<script>';
		echo 'alert("Lectura Eliminada!");';
		echo 'window.location.href="../lista.php";';
	    echo '</script>';
    }
?>