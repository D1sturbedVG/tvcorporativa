<?php
session_start();
if ($_SESSION['nome']==null) {
	header('Location: login.php');
}
?>
<?php
include('conectarbd.php');
?>
<?php
include('navbar.php');
?>
<!DOCTYPE html>
<html>
<head>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- CSS -->
	<link href="style.css" rel="stylesheet">

	<!-- jquery -->
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>


	<!-- para temporizador em tempo real-->
	<script type="text/javascript" src="date_time.js"></script>

	<!-- jQuery Version 1.11.1 -->
	<script src="js/jquery.js"></script>

	<script src="jquery.min.js" type="text/javascript"></script>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="TV Corporativa EITV">
	<meta name="author" content="Miguel Francisco">


	<title>EITV | Upload de Videos</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whitebodycenter">
		<p>
			<?php
			if(isset($_POST['submit'])){
				$inseridopor = $_SESSION['nome'];
				$nomevideo = $_POST['nomevideo'];
				$name = $_FILES["file"]["name"];
				$size = $_FILES['file']['size'];
				$type = $_FILES['file']['type'];
				$tmp_name = $_FILES['file']['tmp_name'];
				$error = $_FILES['file']['error'];
				$sqlselect = "SELECT caminho_video FROM `bdeitv`.`tb_videos`";
				$resultado = $conn2->query($sqlselect);
				$igual=false;

				if ($_SESSION['nivel']<=1) {
					$aceite=1;
				}
				else{
					$aceite=0;
				}

				if ($resultado->num_rows > 0) {

					while ($rowcaminho = $resultado->fetch_assoc()){
						if ($name==$rowcaminho['caminho_video']) {
							$igual=true;
						}
					}
					if ($type=="video\mp4" || $type=="video\flv" || $type=="video\webm"){
						if (isset ($name) && $igual==false) {
							$location = 'videos\';
							if  (move_uploaded_file($tmp_name, "videos\".$name)){
								date_default_timezone_set("Europe/Lisbon");
								$datavideo = date('Y-m-d H:i:s');
								$size = formatSizeUnits($size);
								$sql = "INSERT INTO `bdeitv`.`tb_videos` (`caminho_video`, `titulo_video`, `tamanho`,`data_inserido`,`inserido_por`,`aceite`) VALUES ('".$name."' ,'".$nomevideo."' ,'".$size."' ,'".$datavideo."' ,'".$inseridopor."' ,'".$aceite."');";
								echo $sql;
								$conn->query($sql);
								header('Location: listarvideos.php');
							}
							else{
								echo "Houve um erro ao enviar o ficheiro";
								echo $error;
							}
						}
						else{
							echo 'Nome Inválido';
						}
					}
					else{
						echo "Extenção Inválida";
					}
				}
				else{
					echo utf8_decode("Tem de submeter um ficheiro");
				}
			}
			?>
		</p>
	</div>
	<?php
	include('footer.php');
	?>
	<?php

	function formatSizeUnits($size){
		if ($size >= 1073741824)
		{
			$size = number_format($size / 1073741824, 2) . ' GB';
		}
		else if ($size >= 1048576)
		{
			$size = number_format($size / 1048576, 2) . ' MB';
		}
		else if ($size >= 1024)
		{
			$size = number_format($size / 1024, 2) . ' KB';
		}
		else if ($size > 1)
		{
			$size = $size . ' bytes';
		}
		else if ($size == 1)
		{
			$size = $size . ' byte';
		}
		else
		{
			$size = '0 bytes';
		}
		return $size;
	}
	?>
</body>
</html>