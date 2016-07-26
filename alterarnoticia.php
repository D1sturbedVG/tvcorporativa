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
?>
<?php
include('navbar.php');
?>
<!DOCTYPE html>
<html>
<head>

	<!-- jQuery Version 1.11.1 -->
	<script src="js/jquery.js"></script>

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



	<title>EITV | Alterar Noticia</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whiteformcenter">
	<?php if ($_SESSION['nivel']<=1) {?>

		<h2>Alterar uma Noticia</h2>

		<?php
		$id=$_GET['id'];
		$sqlselect = "SELECT * FROM `bdeitv`.`tb_noticias` WHERE id_noticia=".$id;
		$result=$conn2->query($sqlselect);
		$row = $result->fetch_assoc();
		$datanoticia = $row['data_noticia'];

		 ?>

		<form method="post" id="alterarvideo">


			<p>Titulo da noticia <input type="text" maxlenght="50" name="titulo_noticia" value="<?php echo utf8_decode($row['titulo_noticia']);?>" class="form-control" placeholder="Titulo" /></p>


			<p>Resumo da noticia <input type="text" maxlenght="50" name="resumo_noticia" value="<?php echo utf8_decode($row['resumo']);?>" class="form-control" placeholder="Resumo"/></p>


			<p>Noticia<textarea class="form-control" name="texto_noticia" rows="6"><?php echo utf8_decode($row['texto_noticia']);?></textarea></p>


			<p><input name="submeter" type="submit" class="btn btn-primary"/></p>



		</form>
	<?php
	}
	else{
		echo "<h2>Não tem permissões para alterar esta noticia.</h2>";
	}
	?>



		<?php
		if (isset($_POST['submeter'])) {
			$igual=false;

			$titulonoticia = utf8_encode($_POST['titulo_noticia']);

			$resumonoticia = utf8_encode($_POST['resumo_noticia']);

			$textonoticia = utf8_encode($_POST['texto_noticia']);

			date_default_timezone_set("Europe/Lisbon");
			

			$sql = "UPDATE `bdeitv`.`tb_noticias` SET `titulo_noticia` = '".$titulonoticia."', `resumo` = '".$resumonoticia."', `texto_noticia` = '".$textonoticia."' WHERE `tb_noticias`.`id_noticia` ='".$_GET['id']."';";
			//echo $sql;
			$conn->query($sql);
			$conn->close();
			header('Location: listarnoticias.php');

		}
		?>
	</div>
	<?php
	include('footer.php');
	?>
</body>
</html>