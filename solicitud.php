<?php
	include("data.php");
	include("functions.php");
	if(conectarBase($host, $usuario, $clave, $base)){
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Solicitud</title>
	</head>
	<body>
		<section class="w2">
			<h3>Ingrese datos personales</h3>
			<form method="post" action="estado.php" id="my_form">
				<div class="inf">
					<div>
						<p>Nombre:</p>
						<input type="text" name="nombre" id="nombre">
					</div>
					<div>
						<p>Apellido:</p>
						<input type="text" name="apellido">
					</div>
					<div>
						<p>Género:</p>
						<select name="genero">
							<option value="" disabled selected></option>
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>
							<option value="Otro">Otro</option>
						</select>
					</div>
					<div>
						<p>Edad:</p>
						<input type="text" name="edad">
					</div>
				</div>
				<h3>Ingrese datos:</h3>
				<div class="inf">
					<div class="inf2 infpadding">
						<p>Glucosa:</p>
						<p>Urea:</p>
						<p>Ácido Úrico:</p>
						<p>Creatinina:</p>
						<p>Colesterol:</p>
						<p>HDL:</p>
						<p>LDL:</p>
						<p>Triglicéridos:</p>
						<p>Calcio:</p>
						<p>Hierro:</p>
						<p>Potasio:</p>
						<p>Sodio:</p>
						<p>Bilirrubina:</p>
					</div>
					<div class="inf2 infpadding">
						<input type="text" name="glucosa">
						<input type="text" name="urea">
						<input type="text" name="acido_urico">
						<input type="text" name="creatinina">
						<input type="text" name="colesterol">
						<input type="text" name="colesterol_b">
						<input type="text" name="colesterol_m">
						<input type="text" name="trigliceridos">
						<input type="text" name="calcio">
						<input type="text" name="hierro">
						<input type="text" name="potasio">
						<input type="text" name="sodio">
						<input type="text" name="bilirrubina">
					</div>
					<div class="inf2 infpadding">
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mg/dL</p>
						<p>mEq/litro</p>
						<p>mEq/litro</p>
						<p>mg/dL</p>
					</div>
				</div>
				<h5><strong>Verifique que todos los campos esten llenos (*)</strong></h5>
				<div class="buttons">
					<a href="index.html">Regresar</a>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">Enviar</a>
				</div>
			</form>
		</section>
	</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="./js/bootstrap.bundle.min.js"></script>
</html>

<?php
	}else{
		echo "<script>alert('Error! No se puede conectar a la base de datos!');";
		echo "window.location = 'index.html';</script>";
	}
?>