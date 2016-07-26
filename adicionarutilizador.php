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



	<title>EITV | Adicionar Utilizadores</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whiteformcenter">

		<h2>Adicionar um novo utilizador</h2>

		<form method="post" id="alterarvideo">


			<p>Número Funcionário <input type="number" name="numerofuncionario" min="2" class="form-control" placeholder="Número Funcionário" /></p>


			<p>Nome Utilizador <input type="text" name="nomeutilizador" class="form-control" placeholder="Nome Utilizador"/></p>


			<p>Password <input type="password" name="password" class="form-control" placeholder="Password"/></p>


			<p>Nivel de Acesso <input type="number" name="niveldeacesso" max="5" min="<?php if($_SESSION['nivel']==5)
				{
					echo "5";
				}
				else
				{
					echo $_SESSION['nivel']+1;
				}
				?>" class="form-control" placeholder="Nivel de Acesso"/></p>
			</p>


			<p>Email<input type="email" name="email" class="form-control" placeholder="Email"/></p>
		</p>


		<p><input name="submeter" type="submit" class="btn btn-primary"/></p>
	</form>


<?php
if (isset($_POST['submeter'])) {
	$igual=false;

	$numero_funcionario = $_POST['numerofuncionario'];

	$sqlverificar = "SELECT num_funcionario from tb_utilizadores";

	$resultado = $conn2->query($sqlverificar);

	if ($resultado->num_rows > 0) {

		while ($rownumero = $resultado->fetch_assoc()){
			if ($numero_funcionario==$rownumero['num_funcionario']) {
				$igual=true;
			}
		}
		if ($igual==false) {
			$nome_utilizador = utf8_encode($_POST['nomeutilizador']);
			$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
			$nivel_de_acesso = $_POST['niveldeacesso'];
			$email = $_POST['email'];

			$sqlupdate = "INSERT INTO `bdeitv`.`tb_utilizadores` (`num_funcionario`, `nome_utilizador`, `user_pass`, `nivel_utilizador`, `email_funcionario`) VALUES (".$numero_funcionario.", '".$nome_utilizador."', '".$password."', '".$nivel_de_acesso."', '".$email."');";
		//echo $sqlupdate;
			$conn->query($sqlupdate);
			$conn->close();
			header('Location: listarutilizadores.php');
		}
		else{
			echo "<p>Número de Funcionário já existente</p>";
		}
	}
	$conn2->close();

}
?>
</div>
<?php
include('footer.php');
?>
</body>
</html>