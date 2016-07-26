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


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="TV Corporativa EITV">
	<meta name="author" content="Miguel Francisco">



	<title>EITV | Eliminar Utilizador</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body class="body">

	<div class="whiteformcenter">

		<?php
		if(isset($_GET['id']) && ($_SESSION['nivel']<$nivel || $_SESSION['id'] == $id)){
			$id=$_GET['id'];
			$sqlverificar="SELECT * FROM tb_utilizadores WHERE id_user=".$id;
			$result=$conn2->query($sqlverificar);
			$row = $result->fetch_assoc();
			$nivel=$row['nivel_utilizador'];
			if ($_SESSION['nivel']<$nivel || $_SESSION['id'] == $id) {
				$sql="DELETE FROM tb_utilizadores WHERE id_user=".$id;
				$conn->query($sql);
				$conn->close();
			
			if ($_SESSION['id']==$id) {
				header('Location: logout.php');
			}
			else{
				header('Location: listarutilizadores.php');
			}
			}
			else
			{
				echo "Não tem permissões para eliminar este utilizador!";
			}

		}
		?>

	</body>
	</html>