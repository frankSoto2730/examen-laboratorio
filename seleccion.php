<?php
	include("data.php");
	include("functions.php");
	if(conectarBase($host, $usuario, $clave, $base)){
		$con = mysqli_connect($host, $usuario, $clave) or die ("Error al conectar!");
		$db = mysqli_select_db($con, $base);
		$names = "SELECT * FROM examenes";
		$get = mysqli_query($con, $names);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Selección</title>
	</head>
	<body>
		<section class="w3">
			<h3>Seleccione un exámen:</h3>
			<div class="inf">
				<p>Exámen de: </p>
				<form method="post" action="resultados.php" id="my_form">
					<select name="examenes" class="examenes">
						<option value="" disabled selected></option>
						<?php
							if($get){
								while($row = mysqli_fetch_array($get)){ 
									echo("<option value=' " . $row['id_examen'] . " '>" . $row["nombre"] . " " . $row["apellido"] . "</option>");
								} 
							}else{
								echo "failed: " . mysqli_error($con);
							}
						?>
					</select>
				</form>
			</div>
			<div>
				<div class="buttons">
					<a href="index.html">Regresar</a>
					<a href="javascript:{}" onclick="document.getElementById('my_form').submit();">Verificar</a>
				</div>
			</div>
		</section>
	</body>
</html>

<?php
	}else{
		echo "<script>alert('Error! No se puede conectar a la base de datos!');";
		echo "window.location = 'index.html';</script>";
	}
?>