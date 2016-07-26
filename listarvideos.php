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



	<title>EITV | Alterar/Eliminar Videos</title>

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
			<td colspan="8">
				<h2>Todos os Videos</h2>
			</td>
		</tr>
		<tr>
			<td colspan="9">
				<a href="upload.php"><p>Adicionar um Video</p></a>
			</td>
		</tr>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Titulo</th>
			<th>Tamanho</th>
			<th>Data</th>
			<th>Inserido Por</th>
		</tr>

		<?php

		$sql = "SELECT * from tb_videos order by data_inserido desc";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo "<span class='label label-primary'>".$row['id_video']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['caminho_video']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['titulo_video']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['tamanho']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['data_inserido']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".utf8_decode($row['inserido_por'])."</span>"?></td>
					<?php
					if ($_SESSION['nivel']<=1) {?>
						<td><a href='alterarvideo.php?id=<?php echo $row['id_video']?>'><span class="label label-primary"><span class="glyphicon glyphicon-edit"></span></span></a></td>
						<td><a href='puxarvideo.php?id=<?php echo $row['id_video']?>'><span class="label label-primary"><span class="glyphicon glyphicon-triangle-top"></span></span></a></td>
						<td><a href='eliminarvideo.php?id=<?php echo $row['id_video']?>' onClick="return confirm('Eliminar Video <?php echo $row['caminho_video']; ?>?')"><span class="label label-danger"><span class="glyphicon glyphicon-trash"></span></span></a></td>
						<?php
					}?>
				</tr>
				<?php
			}

		}
		else{
			echo "<tr><td colspan='9'>Não existem videos.<br>Insira um novo video clicando no botão acima.</td></tr>";
		}
		?>

	</table>
	<?php
	include('footer.php');
	?>
</body>
</html>