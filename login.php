<?php
session_start();
?>
<?php
include('conectarbd.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

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

	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body class="body">
	<div class="whitebodycenter">
		<h2>Bem-Vindo à página de Login</h2>
		<form action="" method="post">
			<p>Utilizador <input type="number" name="numerofuncionario" class="form-control"/></p>
			<p>Password <input type="password" name="password" class="form-control"/></p>
			<p><input type="submit" value="Login" class="btn btn-primary"></p>
		</form>

		<?php
		if(isset($_POST['numerofuncionario'])){
			$sql = "SELECT * FROM `tb_utilizadores` WHERE `num_funcionario` LIKE '".$_POST['numerofuncionario']."';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					if (password_verify($_POST['password'],$row['user_pass'])==true) {
						$_SESSION['nome']=$row['nome_utilizador'];
						$_SESSION['nivel']=$row['nivel_utilizador'];
						$_SESSION['id']=$row['id_user'];
						$_SESSION['email']=$row['email_funcionario'];
						header('Location: backoffice.php');
					}
					else{
						echo "<p>Combinação errada de Número Funcionário/Password.</p>";
				}
			}
		}
		else{
			echo "<p>Combinação errada de Número Funcionário/Password.</p>";
		}
		$conn->close();
	}
	?>
</div>
<?php
include('footer.php');
?>
</body>
</html>