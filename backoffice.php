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
<?php
include('navbar.php');
?>

<!DOCTYPE html>


<html>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="TV Corporativa EITV">
  <meta name="author" content="Miguel Francisco">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8" /> 
<head>
	<title>EITV | Painel de Controlo</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whitebodycenter">
	<?php  echo "<h2>Sessão iniciada como ".utf8_decode($_SESSION['nome'])."</h2>";
	?>
		<dl>
			<ul class="list-group">
			  <a href="listarvideos.php"><li class="list-group-item">Videos</li></a>
			  <br>
			<?php
			if ($_SESSION['nivel']<=1) {
				?>

			  <a href="videospendentes.php"><li class="list-group-item">Videos Pendentes <span class="label label-primary"><?php echo $data['total']; ?></span></li></a>
			  <br>

			  	<?php
				}?>
			  <a href="listarutilizadores.php"><li class="list-group-item">Utilizadores</li></a>
			  <br>
			  <a href="listarnoticias.php"><li class="list-group-item">Notícias</li></a>
			  <br>
			  <a href="logout.php"><li class="list-group-item">Logout</li></a>
			</ul>
		</dl>
	</div>
<?php
include('footer.php');
?>

</body>
</html>