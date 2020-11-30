<?php
	include("data.php");
	include("functions.php");
	if(conectarBase($host, $usuario, $clave, $base)){
		$con=mysqli_connect($host, $usuario, $clave) or die ("Error al conectar!");
		$db=mysqli_select_db($con, $base);
		if(!empty($_POST["examenes"])){
			session_start();
			$_SESSION['valor'] = $_POST["examenes"];
			$valor = $_POST["examenes"];
			$consulta = "examenes.id_examen";
			if($consulta){
				$all = "SELECT * FROM examenes WHERE $consulta = $valor";
				$get = mysqli_query($con, $all);
					if($get){
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Resultados</title>
	</head>
	<body>
		<section class="w4">
			<h3>Ingrese los resultados del exámen:</h3>
			<form method="post" action="send.php" id="my_form">
				<div class="inf">
					<div class='ml'><p>ID:<?php echo($valor) ?></p></div><br>
					<?php
						while($row = mysqli_fetch_array($get)){ 
							echo("<div class='ml'><p>Nombre:</p></div> " . $row["nombre"] . "<br>");
							echo("<div class='ml'><p>Apellido:</p></div> " . $row["apellido"] . "<br>");
							echo("<div class='ml'><p>Género:</p></div> " . $row["genero"] . "<br>");
							echo("<div class='ml'><p>Edad:</p></div> " . $row["edad"]);
					?>
				</div>
				<div class="inf">
					<div class="inf2">
						<div><p>Glucosa:</p></div>
						<div><p>Urea:</p></div>
						<div><p>Ácido Úrico:</p></div>
						<div><p>Creatinina:</p></div>
						<div><p>Colesterol:</p></div>
						<div><p>HDL:</p></div>
						<div><p>LDL:</p></div>
						<div><p>Triglicéridos:</p></div>
						<div><p>Calcio:</p></div>
						<div><p>Hierro:</p></div>
						<div><p>Potasio:</p></div>
						<div><p>Sodio:</p></div>
						<div><p>Bilirrubina:</p></div>
					</div>
					<div class="inf2">
						<?php
								echo($row["glucosa"] . "<br>");
								echo($row["urea"] . "<br>");
								echo($row["acido_urico"] . "<br>");
								echo($row["creatinina"] . "<br>");
								echo($row["colesterol"] . "<br>");
								echo($row["colesterol_b"] . "<br>");
								echo($row["colesterol_m"] . "<br>");
								echo($row["trigliceridos"] . "<br>");
								echo($row["calcio"] . "<br>");
								echo($row["hierro"] . "<br>");
								echo($row["potasio"] . "<br>");
								echo($row["sodio"] . "<br>");
								echo($row["bilirrubina"]);
							}
						?>
					</div>
					<div class="inf2">
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
						<p>-> Resultado: </p>
					</div>
					<div class="inf2">
						<select name="p-glucosa">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-urea">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-acido_urico">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-creatinina">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-colesterol">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-colesterol_b">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-colesterol_m">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-trigliceridos">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-calcio">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-hierro">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-potasio">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-sodio">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
						<select name="p-bilirrubina">
							<option value="" disabled selected></option>
							<option value="Bajo">Bajo</option>
							<option value="En el rango">En el rango</option>
							<option value="Alto">Alto</option>
						</select>
					</div>
					<div class="inf2">
						<p>Promedio: 74-106 mg/dL</p>
						<p>Promedio: 17-49 mg/dL</p>
						<p>Promedio: 4,2-8 mg/dL</p>
						<p>Promedio: 0,6-1,3 mg/dL</p>
						<p>Promedio: <=200 mg/dL</p>
						<p>Promedio: >40 mg/dL</p>
						<p>Promedio: 0-130 mg/dL</p>
						<p>Promedio: <=150 mg/dL</p>
						<p>Promedio: 8,6-10,2 mg/dL</p>
						<p>Promedio: 65-170 mg/dL</p>
						<p>Promedio: 3,5-5,1 mEq/litro</p>
						<p>Promedio: 136-146 mEq/litro</p>
						<p>Promedio: <=1,2 mg/dL</p>
					</div>
				</div>
			</form>
			<div>
				<div class="buttons">
					<a href="index.html">Regresar</a>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">Verificar</a>
				</div>
			</div>
		</section>
	</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="./js/bootstrap.bundle.min.js"></script>
</html>

<?php
				}else{
					echo "failed: " . mysqli_error($con);
				}
			}else{
				echo "failed" . mysqli_error($con);
			}
		}else{
			echo "<script>alert('Error! Debe seleccionar un exámen!');";
			echo "window.location = 'seleccion.php';</script>";
		}
	}else{
		echo "<p>Error! <br> No se puede conectar a la base de datos!</p>";
	}
?>