<?php
include ("conexion.php");

$titular=$_POST["usuarios"];
$lectura = $_POST["lectura"];
$direccion = $_POST["direccion"];
$mz = $_POST ["mz"];
$villa = $_POST["villa"];
$fecha = $_POST["fecha"];


$insertar = "INSERT INTO  actividades (titular, lectura, direccion, mz, villa, fecha) VALUES 
('$titular','$lectura', '$direccion', '$mz', '$villa', '$fecha')";

$resultado = mysqli_query($conexion, $insertar);

if ($resultado){
    echo '<script>';
    echo 'alert("Tarea Registrada!");';
    echo 'window.location.href="../registro.php";';
    echo '</script>';
    
    
}
?>
