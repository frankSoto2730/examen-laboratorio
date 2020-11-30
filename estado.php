<?php
	include("data.php");
	include("functions.php");
	if(conectarBase($host, $usuario, $clave, $base)){
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Estado</title>
	</head>
	<body>
		<?php
			if(isset($_POST["nombre"], $_POST["apellido"], $_POST["edad"], 
					 $_POST["glucosa"], $_POST["urea"], $_POST["acido_urico"], 
					 $_POST["creatinina"], $_POST["colesterol"], $_POST["colesterol_b"], 
				     $_POST["colesterol_m"], $_POST["trigliceridos"], $_POST["calcio"], 
				     $_POST["hierro"], $_POST["potasio"], $_POST["sodio"], 
				     $_POST["bilirrubina"]) 
						&&
					 !empty($_POST["genero"]) 
						&&
					 $_POST["nombre"] != "" && $_POST["apellido"] != "" && 
					 $_POST["edad"] != "" && $_POST["glucosa"] != "" && 
					 $_POST["urea"] != "" && $_POST["acido_urico"] != "" && 
					 $_POST["creatinina"] != "" && $_POST["colesterol"] != "" &&
					 $_POST["colesterol_b"] != "" && $_POST["colesterol_m"] != "" &&
					 $_POST["trigliceridos"] != "" && $_POST["calcio"] != "" &&
					 $_POST["hierro"] != "" && $_POST["potasio"] != "" &&
					 $_POST["sodio"] != "" && $_POST["bilirrubina"] != "")
						{
							$nombre = $_POST["nombre"];
							$apellido = $_POST["apellido"];
							$genero = $_POST["genero"];
							$edad = $_POST["edad"];
							$glucosa = $_POST["glucosa"];
							$urea = $_POST["urea"];
							$acido_urico = $_POST["acido_urico"];
							$creatinina = $_POST["creatinina"];
							$colesterol = $_POST["colesterol"];
							$colesterol_b = $_POST["colesterol_b"];
							$colesterol_m = $_POST["colesterol_m"];
							$trigliceridos = $_POST["trigliceridos"];
							$calcio = $_POST["calcio"];
							$hierro = $_POST["hierro"];
							$potasio = $_POST["potasio"];
							$sodio = $_POST["sodio"];
							$bilirrubina = $_POST["bilirrubina"];

							$insertar = "INSERT INTO examenes (id_examen, nombre, apellido, genero, edad, glucosa, urea, acido_urico, creatinina, colesterol, colesterol_b, colesterol_m, trigliceridos, calcio, hierro, potasio, sodio, bilirrubina) VALUES ('0', '$nombre', '$apellido', '$genero', '$edad', '$glucosa', '$urea', '$acido_urico', '$creatinina', '$colesterol', '$colesterol_b', '$colesterol_m', '$trigliceridos', '$calcio', '$hierro', '$potasio', '$sodio', '$bilirrubina')";

							$con=mysqli_connect($host, $usuario, $clave) or die ("Error al conectar!");

							$db=mysqli_select_db($con, $base);

							if(mysqli_query($con, $insertar)){
								function function_alert($message){  
    								echo "<script>alert('$message');";
    								echo "window.location = 'index.html';</script>"; 
								} 
								function_alert("Solicitud Enviada! :D"); 
							}else{
								echo "Error: ". mysqli_error($con) . "<br>";
								echo "<a href ='solicitud.php'>Regresar</a>";
							}
			}else{
				echo "<script>alert('Error! Debe llenar todos los campos!');";
				echo "window.location = 'solicitud.php';</script>";
			}
		?>
	</body>
</html>

<?php
	}else{
		echo "<p>Error! <br> No se puede conectar a la base de datos!</p>";
	}
?>