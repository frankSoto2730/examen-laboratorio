<?php
	function conectarBase ($host, $usuario, $clave, $base){
		$con=mysqli_connect($host, $usuario, $clave) or die ("Error al conectar!");
		if(mysqli_select_db($con, $base)){
			return true;
		}else{
			return false;
		}
	}
?>