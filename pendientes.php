<?php
require_once("./src/conexion.php");
session_start();
if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
} 
$usuario = $_SESSION['usuario'];


$sql = "SELECT * from usuarios where usuario = '$usuario'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();   
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@200&family=Signika+Negative&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>

    <title>Tareas Pendientes</title>
    <style>
        /**Modal*/
        .modal-container {
            opacity: 0;
            visibility: hidden;
            position: fixed;
            z-index: 1000;
            width: 100%;
            height: 160%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ventana {
            width: 40%;
            height: 50%;
            background: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            position: relative;
            border-radius: 10px;
            transition: transform 1s;
            transform: translateY(-35%);
            border-radius: 10px;
            /*overflow: hidden*/;
        }

        .close {
            position: absolute;
            top: 5px;
            right: 5px;
            display: inline-block;
            width: 25px;
            height: 25px;
            background: red;
            color: white;
            line-height: 25px;
            cursor: pointer;
            border-radius: 50%;
        }

        .ventana-close {
            transform: translateY(-200%);
        }

        .ventana  img {
            height: 100%;
        }
        .navegacion a {
            text-decoration: none;
        }
        
        table {
            height: 10rem;
            background-color: rgb(211, 208, 208);
            border-collapse: collapse;
            font-size: 12pt;
            font-family: arial;
            width: 100%;
                
        }
                
        table th {
            text-align: center;
            padding: 10;
            background: #3d7ba8;
            color: #fff;
            height: 3rem
        }

        table tr:nth-child(odd) {
            background: #fff;
        }

        table td{
            text-align: center;
            padding: 10px;
        }
    </style>
    
</head>

<body>
           
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="lista.php">
                    <img src="./img/proyectoLogo.png" alt="logo proyecto">
                </a>


                <nav id="navegacion" class="navegacion">
                    <a style="color: white;">Bienvenido <?php echo utf8_decode($row['usuario']); ?></a>
                    <a href="lista.php">Inicio</a>
                    <a href="./src/salirsesion.php" onclick="return ConfirmSession()">Cerrar Sesión</a>


                </nav>
            </div>
        </div>
    </header>

    <h2 style="text-align:center; margin-top:3rem;">Lista de Tareas</h2>
    <br>
    <a href="tareas.php"><input class="btn btn-info" type="button" value="Asignar Tarea"></a>   
    <input class= "btn btn-info" id="imprimir" type="submit" value="Informe">
     

    <section id="tabla">
        <br>
        <table>


            <tr>
                <th>titular</th>
                <!-- style="width: 20%;" -->
                <th>Codigo</th>
                <th>Direccion</th>
                <th>Mz</th>
                <th>Villa</th>
                <th>Actividad</th>
                <th>Estado</th>
            </tr>
            <?php
                
                $sql="SELECT * from actividades";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                
                <td><?php echo $mostrar['titular']?></td>
   
                <td><?php echo $mostrar['codigo']?></td>
                <td><?php echo $mostrar['direccion']?></td>
                <td><?php echo $mostrar['mz']?></td>
                <td><?php echo $mostrar['villa']?></td>
                <td><?php echo $mostrar['actividad']?></td>
                <td><?php echo $mostrar['estado']?></td>
                
            </tr>

            <?php
            }

            ?>
        </table>
    </section>

    <br>
    <br>
    <br>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="#">¿Quienes somos?</a>
                <a href="#">Terminos y Condiciones</a>
                <a href="#">Contacto</a>
            </nav>
            <p class="copyright">Todos los Derechos Reservados 2022 &copy; </p>
        </div>
    </footer>


<script src="./js/modal.js?v=<?= $rand ?>"></script>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#imprimir");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.getElementById("tabla"); // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
            .set({
                margin: 1,
                filename: 'documento.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 5, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a4",
                    orientation: 'portrait' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err));
    });
});
</script>

</body>

</html>
