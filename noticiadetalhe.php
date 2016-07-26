<?php
session_start();
?>
<?php
include('conectarbd.php');
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



	<title>EITV | Noticias</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whiteformcenter">

		<?php
		$id=$_GET['id'];
		$sqlselect = "SELECT * FROM `bdeitv`.`tb_noticias` WHERE id_noticia=".$id;
		$result=$conn2->query($sqlselect);
		$row = $result->fetch_assoc();
		$titulo = $row['titulo_noticia'];
		$texto = $row['texto_noticia'];
		$data = $row['data_noticia'];

		
		echo "<h2>".$titulo."</h2><br>";
		echo "<p>".$texto."</p><br>";
		echo "<p>".$data."</p>";
	?>
	</div>
	<?php
	include('footer.php');
	?>
</body>
</html>