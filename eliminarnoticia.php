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



	<title>EITV | Eliminar Noticia</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body class="body">

<div class="whiteformcenter">

	<?php
	if(isset($_GET['id']) && $_SESSION['nivel']<=1){
		
		$id=$_GET['id'];
		$sql="DELETE FROM tb_noticias WHERE id_noticia=".$id;
		//echo $sql;
		$conn->query($sql);
		$conn->close();
		header('Location: listarnoticias.php');
		
	}
	?>

</body>
</html>