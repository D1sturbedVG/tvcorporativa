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



	<title>EITV | Adicionar Noticia</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whiteformcenter">

		<h2>Adicionar uma nova Noticia</h2>

		<form method="post" id="alterarvideo">


			<p>Titulo da noticia <input type="text" name="titulo_noticia" class="form-control" placeholder="Titulo" maxlength="50" /></p>


			<p>Resumo da noticia <input type="text" name="resumo_noticia" class="form-control" placeholder="Resumo" maxlength="50"/></p>


			<p>Noticia<textarea class="form-control" name="texto_noticia" rows="6"></textarea></p>


			<p><input name="submeter" type="submit" class="btn btn-primary"/></p>



		</form>


		<?php
		if (isset($_POST['submeter'])) {
			$igual=false;

			$titulonoticia = utf8_encode($_POST['titulo_noticia']);

			$resumonoticia = utf8_encode($_POST['resumo_noticia']);

			$textonoticia = utf8_encode($_POST['texto_noticia']);

			date_default_timezone_set("Europe/Lisbon");
			$datanoticia = date('Y-m-d H:i:s');

			$sql = "INSERT INTO `bdeitv`.`tb_noticias` (`titulo_noticia`, `resumo`, `texto_noticia`, `data_noticia`) VALUES ('".$titulonoticia."', '".$resumonoticia."', '".$textonoticia."', '".$datanoticia."');";
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