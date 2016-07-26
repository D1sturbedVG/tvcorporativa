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



	<title>EITV | Alterar um Utilizador</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whiteformcenter">

		<?php
		if(isset($_GET['id'])){

			$id=$_GET['id'];


			$sql="SELECT * FROM tb_utilizadores WHERE id_user=".$id;
			$result=$conn->query($sql);
			$row = $result->fetch_assoc();
			$password=$row['user_pass'];
			$nivel=$row['nivel_utilizador'];
			if ($_SESSION['nivel']<$nivel || $_SESSION['id'] == $id) {
			?>

			<h2>Alterar um utilizador</h2>

			<form method="post" id="alterarvideo">


				<p>Número Funcionário <input type="number" value="<?php echo utf8_decode($row['num_funcionario'])?>" name="numerofuncionario" min="1" class="form-control" placeholder="Número Funcionário" /></p>


				<p>Nome Utilizador <input type="text" value="<?php echo utf8_decode($row['nome_utilizador'])?>" name="nomeutilizador" class="form-control" placeholder="Nome Utilizador"/></p>

				<?php if($_SESSION['id']==$row['id_user']){?>
				<p>Password <input type="password" value="" name="password" class="form-control" placeholder="Password"/></p>
				<?php
			}
				?>

				<?php
				if ($_SESSION['id']<$_GET['id']) {
					echo "<p>Restaurar Password <input type='checkbox' name='resetpass'/></p>";
				}
				?>


				<p>Nivel de Acesso <input type="number" value="<?php echo utf8_decode($row['nivel_utilizador'])?>" name="niveldeacesso" max="2" min="<?php if($_SESSION['nivel']==2){echo "2";}else if($_SESSION['id']==$row['id_user']){echo $_SESSION['nivel'];}else{echo $_SESSION['nivel']+1;}?>" class="form-control" placeholder="Nivel de Acesso"/>
				</p>


				<p>Email<input type="email" value="<?php echo utf8_decode($row['email_funcionario'])?>" name="email" class="form-control" placeholder="Email"/></p>
			</p>


			<p><input name="submeter" type="submit" class="btn btn-primary"/></p>
		</form>


	<?php
}
else{
	echo "<h2>Não tem permissões para alterar este utilizador!</h2>";
}
}
?>
	</div>


<?php
if (isset($_POST['submeter'])) {
	$numero_funcionario = $_POST['numerofuncionario'];
	$nome_utilizador = utf8_encode($_POST['nomeutilizador']);
	$nivel_de_acesso = $_POST['niveldeacesso'];
	$email = $_POST['email'];

	if (isset($_POST['resetpass'])) {
		$password=password_hash('123', PASSWORD_DEFAULT);;
		
	}
	else if (isset($_POST['password'])) {
		$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
	}


	$sqlupdate = "UPDATE `bdeitv`.`tb_utilizadores` SET `num_funcionario` = '".$numero_funcionario."', `nome_utilizador` = '".$nome_utilizador."', `user_pass` = '".$password."', `nivel_utilizador` = '".$nivel_de_acesso."', `email_funcionario` = '".$email."' WHERE `tb_utilizadores`.`id_user` ='".$_GET['id']."';";
		//echo utf8_decode($sqlupdate);
	$conn->query($sqlupdate);
	$conn->close();
	header('Location: listarutilizadores.php');
}
?>
<?php
include('footer.php');
?>

</body>
</html>