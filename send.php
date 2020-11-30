<?php
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'PHPMailer/src/OAuth.php';

	$SEND_MAIL = 'franksotourbe@gmail.com';
	$SEND_PASS = 'franksotourbe123';

	include("fpdf/fpdf.php");
	include("data.php");
	include("functions.php");
	if(conectarBase($host, $usuario, $clave, $base)){
		$con=mysqli_connect($host, $usuario, $clave) or die ("Error al conectar!");
		$db=mysqli_select_db($con, $base);
		session_start();
		$valor= $_SESSION['valor'];
		$consulta = "examenes.id_examen";
		if($consulta){
			$all = "SELECT * FROM examenes WHERE $consulta = $valor";
			$get = mysqli_query($con, $all);
			if($get){
				if(!empty($_POST["p-glucosa"]) && !empty($_POST["p-urea"]) &&
					  !empty($_POST["p-acido_urico"]) && !empty($_POST["p-creatinina"]) &&
					  !empty($_POST["p-colesterol"]) && !empty($_POST["p-colesterol_b"]) &&
					  !empty($_POST["p-colesterol_m"]) && !empty($_POST["p-trigliceridos"]) &&
					  !empty($_POST["p-calcio"]) && !empty($_POST["p-hierro"]) &&
					  !empty($_POST["p-potasio"]) && !empty($_POST["p-sodio"]) &&
					  !empty($_POST["p-bilirrubina"])){
						$glucosa = $_POST["p-glucosa"];
						$urea = $_POST["p-urea"];
						$acido_urico = $_POST["p-acido_urico"];
						$creatinina = $_POST["p-creatinina"];
						$colesterol = $_POST["p-colesterol"];
						$colesterol_b = $_POST["p-colesterol_b"];
						$colesterol_m = $_POST["p-colesterol_m"];
						$trigliceridos = $_POST["p-trigliceridos"];
						$calcio = $_POST["p-calcio"];
						$hierro = $_POST["p-hierro"];
						$potasio = $_POST["p-potasio"];
						$sodio = $_POST["p-sodio"];
						$bilirrubina = $_POST["p-bilirrubina"];
						while($row = mysqli_fetch_array($get)){
							// create document
							$pdf = new FPDF();
							$pdf->AddPage();

							// add text
							$pdf->SetFont('Arial', "" , 16);
							$pdf->Cell(0, 10,"Informacion Personal", 0, 1);
							$pdf->Ln();

							$pdf->SetFont('Arial', "" , 12);
							$pdf->Cell(0, 10,"Nombre: " . $row["nombre"], 0, 1);
							$pdf->Cell(0, 10,"Apellido: " . $row["apellido"], 0, 1);
							$pdf->Cell(0, 10,"Genero: " . $row["genero"], 0, 1);
							$pdf->Cell(0, 10,"Edad: " . $row["edad"], 0, 1);
							$pdf->Ln();

							$pdf->SetFont('Arial', "" , 16);
							$pdf->Cell(0, 10,"Resultados", 0, 1);
							$pdf->Ln();

							$pdf->SetFont('Arial', "" , 12);
							$pdf->Cell(0, 10,"Glucosa: " . $row["glucosa"] . " --> " . $glucosa, 0, 1);
							$pdf->Cell(0, 10,"Urea: " . $row["urea"] . " --> " . $urea, 0, 1);
							$pdf->Cell(0, 10,"Acido Urico: " . $row["acido_urico"] . " --> " . $acido_urico, 0, 1);
							$pdf->Cell(0, 10,"Creatinina: " . $row["creatinina"] . " --> " . $creatinina, 0, 1);
							$pdf->Cell(0, 10,"Colesterol: " . $row["colesterol"] . " --> " . $colesterol, 0, 1);
							$pdf->Cell(0, 10,"HDL: " . $row["colesterol_b"] . " --> " . $colesterol_b, 0, 1);
							$pdf->Cell(0, 10,"LDL: " . $row["colesterol_m"] . " --> " . $colesterol_m, 0, 1);
							$pdf->Cell(0, 10,"Trigliceridos: " . $row["trigliceridos"] . " --> " . $trigliceridos, 0, 1);
							$pdf->Cell(0, 10,"Calcio: " . $row["calcio"] . " --> " . $calcio, 0, 1);
							$pdf->Cell(0, 10,"Hierro: " . $row["hierro"] . " --> " . $hierro, 0, 1);
							$pdf->Cell(0, 10,"Potasio: " . $row["potasio"] . " --> " . $potasio, 0, 1);
							$pdf->Cell(0, 10,"Sodio: " . $row["sodio"] . " --> " . $sodio, 0, 1);
							$pdf->Cell(0, 10,"Bilirrubina: " . $row["bilirrubina"] . " --> " . $bilirrubina, 0, 1);
							$pdf->Ln();

							// output file
							// $pdf->Output('D', $row["nombre"] . '.pdf');
							$mail = new PHPMailer\PHPMailer\PHPMailer();
							$mail->isSMTP();

							$mail->SMTPDebug = 0;
							$mail->Host = 'smtp.gmail.com';
							$mail->Port = 587;
							$mail->SMTPSecure = 'tls';
							$mail->SMTPAuth = true;
							$mail->Username = $SEND_MAIL;
							$mail->Password = $SEND_PASS; 

							$mail->setFrom($SEND_MAIL, 'Laboratorio', 0);
							$mail->addAddress($SEND_MAIL);
							$mail->AddReplyTo($SEND_MAIL, "Laboratorio");
							$mail->Subject = "Resultado del Exámen Médico";
							$mail->Body = "Hola jeje";

							$mail->SMTPKeepAlive = true;   
							$mail->Mailer = “smtp”;

							if(!$mail->send()){
								echo "<script>alert('Error al enviar el e-mail. <br> Error: " . $mail->ErrorInfo . "');";
								echo "window.location = 'seleccion.php';</script>";
							}else{
								echo "<script>alert('E-mail enviado! :D');";
								echo "window.location = 'index.html';</script>";
							}
						}
				}else{
					echo "<script>alert('Error! Debe llenar todos los campos!');";
					echo "window.location = 'seleccion.php';</script>";
				}
			}else{
				echo "failed: " . mysqli_error($con);
			}
		}else{
			echo "failed: " . mysqli_error($con);
		}
	}else{
		echo "<p>Error! <br> No se puede conectar a la base de datos!</p>";
	}
?>