<?php
session_start();
?>
<?php
include('conectarbd.php');
?>
<?php
if($_SESSION['nome']==null){
	header('Location: login.php');
}
$sql = "SELECT COUNT(*) as total FROM `tb_videos` WHERE aceite = 0";
$result=$conn->query($sql);
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>

	<!-- jQuery Version 1.11.1 -->
	<script src="js/jquery.js"></script>s

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




	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="TV Corporativa EITV">
	<meta name="author" content="Miguel Francisco">



	<title>EITV | Alterar Videos</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body class="body">

	<?php
	include('navbar.php');
	?>

	<div class="whiteformcenter">

		<?php
		if(isset($_GET['id']) && $_SESSION['nivel']<=1){

			$id=$_GET['id'];

			$sql="SELECT * FROM tb_videos WHERE id_video=".$id;
			$result=$conn->query($sql);
			$row = $result->fetch_assoc();
			$caminho_antigo = $row['caminho_video'];
			?>
			<div>
				<form method="post" id="alterarvideo">


					<p>Titulo Video<input type="text" value="<?php echo utf8_decode($row['titulo_video'])?>" name="titulovideo" class="form-control" placeholder="Titulo" /></p>


					<p>Caminho Video <input type="text" value="<?php echo utf8_decode($row['caminho_video'])?>"  name="caminhovideo" class="form-control" placeholder="Caminho"/></p>


					<p>Data Inserido <input type="date('Y-m-d H:i:s')" value="<?php echo utf8_decode($row['data_inserido'])?>" name="datainserido" class="form-control" placeholder="Data" readonly/></p>


					<p>Inserido por <input type="text" value="<?php echo utf8_decode($row['inserido_por'])?>" name="inseridopor" class="form-control" placeholder="Inserido Por" readonly/></p>


					<p>Aceite <input type="checkbox" name="aceite"
						<?php
						if($row['aceite']>=1) {
							echo "checked ";
						}
						?> />
					</p>


					<p><input name="submeter" type="submit" class="btn btn-primary"/></p>
				</form>
			</div>

			<?php
		}
		else{
			echo "<h2>Não tem permissões para alterar este video</h2>";
		}
		?>

		<?php
		if (isset($_POST['submeter'])) {
			$id_video=$_GET['id'];
			$titulo_video = utf8_encode($_POST['titulovideo']);
			$caminho_video = utf8_encode($_POST['caminhovideo']);
			$data_inserido = utf8_encode($_POST['datainserido']);
			$inserido_por = utf8_encode($_POST['inseridopor']);
			if (isset($_POST['aceite'])) {
				$aceite=1;
			}
			else{
				$aceite=0;
			}
			if ($caminho_antigo != $caminho_video) {
				rename("videos/".$caminho_antigo, "videos/".$caminho_video);
			}
			$sqlupdate = "UPDATE bdeitv.tb_videos SET titulo_video = '".$titulo_video."', caminho_video = '".$caminho_video."', data_inserido = '".$data_inserido."', inserido_por = '".$inserido_por."', aceite = '".$aceite."' WHERE tb_videos.id_video = ".$id_video.";";
		//echo $sqlupdate;
			$conn->query($sqlupdate);
			$conn->close();
			header('Location: listarvideos.php');
		}
		?>

	</div>
	<?php
	include('footer.php');
	?>

</body>
</html>