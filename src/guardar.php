<?php
include ("./conexion.php");

$objetos =  json_decode($_POST["json"], true);

foreach($objetos['data'] as $objeto){
    $titular= $objeto["titular"];
    $codigo= $objeto["codigo"];
    $direccion= $objeto["direccion"];
    $mz= $objeto["mz"];
    $villa= $objeto["villa"];
    $fecha= $objeto["fecha"];
    $actividad= $objeto["actividad"];
    $estado= $objeto["estado"];



    $insertar = "INSERT INTO  actividades (titular,codigo, direccion, mz, villa, fecha, actividad, estado) VALUES 
    ('$titular', '$codigo', '$direccion', '$mz', '$villa', '$fecha', '$actividad', '$estado')";
    //var_dump($objeto);

    
    
}
$verificarcodigo = mysqli_query($conexion, "SELECT * FROM actividades where codigo = '$codigo'");


if (mysqli_num_rows($verificarcodigo) > 0){
    $mensaje = "El codigo ya tiene una tarea asignada";
    echo $mensaje;
    exit();
}else{
    $recibido = "Tarea asignada";
    echo $recibido;
    $resultado = mysqli_query($conexion,$insertar);
    
}

?>