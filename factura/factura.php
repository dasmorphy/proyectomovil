<?php
	$subtotal 	= 0;
	$iva 	 	= 12;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;
	date_default_timezone_set('America/Guayaquil');
    $fecha_actual = date("d-m-Y");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>
    <link rel="stylesheet" href="style.css">
	
	<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>
	
</head>
<body>
<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					
				</div>
			</td>
			<td class="info_empresa">
				
				<div >
					
					<span class="h2">Sistema de Ventas </span>
					
					<p>Guayaquil-Ecuador</p>
					<p>Teléfono: 0987654321</p>
					<p>Email: info@proyecto.com</p>
				</div>
				<?php
					
				 ?>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">Factura</span>
					<p>No. Factura: 001-012225</p>
					<p>Vendedor: Registros SA</p></p>
					
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
			
		
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					
					<table class="datos_cliente">
					<?php
						include ("../src/conexion.php");
						$lectura= $_GET ["lectura"];
						$sql="SELECT * from lecturas WHERE lectura='$lectura'";
						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_array($result)){
					?>
						<tr>
							<!-- codigo vivienda -->
							<td><label>Codigo: <?php echo $mostrar['codigo']; ?></p></p></td> 
							<td><label>Dirección: <?php echo $mostrar['direccion']; echo ' Mz ', $mostrar ['mz']; echo ' Villa ', $mostrar ['villa']; ?></p></td>
							

						</tr>
						<tr>
							<!-- titular -->
							<td><label>Nombre: <?php echo $mostrar['titular']; ?></p></td>
							<td><label>Fecha: <?= $fecha_actual ?></p></td>


							<!-- campo fecha actual -->
							
						</tr>
					<?php
					}
					?>
					</table>
				</div>
			</td>

		</tr>

		





	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="100px">titular</th>
					<th width="50px">Lectura</th>

					<th class="textcenter" width="150px">P.Unitario</th>
					<th class="textcenter" width="150px">Iva</th>
					<th class="textcenter" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">

				<?php
					include ("../src/conexion.php");
					$lectura= $_GET ["lectura"];
					$sql="SELECT * from lecturas WHERE lectura='$lectura'";
					$result=mysqli_query($conexion,$sql);
					while($mostrar=mysqli_fetch_array($result)){
				?>
					<tr>
						<td class="textcenter"><?php echo $mostrar['titular']; ?></td>
						<td class="textcenter"><?php echo $mostrar['lectura']; ?></td>
						

						<td class="textcenter">0.50</td>
						<td class="textcenter">0.10</td>
						<td class="textcenter">0.40</td>
					</tr>
				<?php
							
					}
							
				?>
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span>SUBTOTAL Q.</span></td>
					<td class="textright"><span>0.50</span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>IVA (<?php echo $iva; ?> %)</span></td>
					<td class="textright"><span>0.10</span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span>TOTAL Q.</span></td>
					<td class="textright"><span>0.40</span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por su compra!</h4>
	</div>
		
		<input type="submit" id="btnguardar" value="Descargar">
</div>



<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnguardar");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
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

