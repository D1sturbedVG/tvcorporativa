<?php
session_start();
if ($_SESSION['nome']==null) {
	header('Location: login.php');
}
?>
<?php
include('conectarbd.php');
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


	<title>EITV | Upload de Videos</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whitebodycenter">
		<h2>Adicionar um novo video</h2>
		<form action="upload_file.php" method="POST" enctype="multipart/form-data">
			<p><input type="text" name="nomevideo" class="form-control" placeholder="Nome do Video"/></p>
			<input type="file" name="file"><br>
			<input type="submit" class="btn btn-primary" name="submit" value="Submit">
		</form>
	</div>
	<?php
include('footer.php');
?>
</body>
</html>