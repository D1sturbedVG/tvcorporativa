<?php
session_start();
?>
<?php
if($_SESSION['nome']==null){
	header('Location: login.php');
}
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



	<title>EITV | Alterar/Eliminar Noticias</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body class="body">
	<?php
	include('navbar.php');
	?>
	<table class="table table-responsive tabelalistar">
		<tr>
			<td colspan="9">
				<h2>Todas as Noticias</h2>
			</td>
		</tr>
		<tr>
			<td colspan="9">
				<a href="adicionarnoticia.php"><p>Adicionar uma noticia</p></a>
			</td>
		</tr>
		<tr>
			<th>Id</th>
			<th>Titulo</th>
			<th>Resumo</th>
			<th>Data</th>
		</tr>

		<?php

		$sql = "SELECT * from tb_noticias order by data_noticia DESC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo "<span class='label label-primary'>".$row['id_noticia']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['titulo_noticia']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['resumo']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['data_noticia']."</span>"?></td>
					<?php
					if ($_SESSION['nivel']<=1) {?>
						<td><a href='alterarnoticia.php?id=<?php echo $row['id_noticia']?>'><span class="label label-primary"><span class="glyphicon glyphicon-edit"></span></span></a></td>
						<td><a href='puxarnoticia.php?id=<?php echo $row['id_noticia']?>'><span class="label label-primary"><span class="glyphicon glyphicon-triangle-top"></span></span></a></td>
						<td><a href='eliminarnoticia.php?id=<?php echo $row['id_noticia']?>' onClick="return confirm('Eliminar Noticia?')"><span class="label label-danger"><span class="glyphicon glyphicon-trash"></span></span></a></td>
						<?php
					}?>
				</tr>
				<?php
			}

		}
		else{
			echo "<tr><td colspan='9'>Não existem noticias.<br>Insira uma nova noticia clicando no botão acima.</td></tr>";
		}
		?>

	</table>
	<?php
	include('footer.php');
	?>
</body>
</html>