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



	<title>EITV | Alterar/Eliminar Administradores</title>

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
				<h2>Todos os Utilizadores</h2>
			</td>
		</tr>
		<tr>
			<td colspan="9">
				<a href="adicionarutilizador.php"><p>Adicionar um Utilizador</p></a>
			</td>
		</tr>

		<?php

		$sql = "SELECT * from tb_utilizadores";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {?>
			<tr>
				<th>id</th>
				<th>Número Funcionário</th>
				<th>Nome do Utilizador</th>
				<th>Nível de acesso</th>
				<th>Email</th>
			</tr>
			<?php
			while ($row = $result->fetch_assoc()) {
				?>
				<tr>

					<td><?php echo "<span class='label label-primary'>".$row['id_user']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['num_funcionario']."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".utf8_decode($row['nome_utilizador'])."</span>"?></td>
					<td><?php echo "<span class='label label-primary'>".$row['nivel_utilizador']."</span>"?></td>
					<td><span class='label label-primary'><?php echo $row['email_funcionario']?></span></td>
					<?php
					if (($_SESSION['nivel'] < $row['nivel_utilizador']) || ($_SESSION['id']==$row['id_user'])){
						?>
						<td><a href='alterarutilizador.php?id=<?php echo $row['id_user']?>'><span class="label label-primary"><span class="glyphicon glyphicon-edit"></span></span></a></td>
						<?php
						if ($row['id_user']!='1'){
							?>
							<td><a href='eliminarutilizador.php?id=<?php echo $row['id_user']?>' onClick="return confirm('Eliminar utilizador?')"><span class="label label-danger"><span class="glyphicon glyphicon-trash"></span></span></a></td>
							<?php
						}
						?>
						<?php
					}?>

				</tr>
				<?php
			}
		}
		else{
			?>
			<tr>
				<td colspan='9'>
					<h1>Lamentamos,</h1>
					<p>não existem utilizadores com nivel mais baixo que o seu.</p>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
</body>
<?php
include('footer.php');
?>
</html>