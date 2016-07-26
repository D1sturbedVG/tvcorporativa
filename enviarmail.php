<?php
##$to = "miguelfexreme@gmail.com";
##$subject = "Test mail";
##$message = "Hello! This is a simple email message.";
##$from = "miguelalexandre_francisco@hotmail.com";
##$headers = "From: $from";
##ini_set('SMTP','localhost');
##ini_set('smtp_port',25);
##mail($to,$subject,$message,$headers);
##echo "Mail Sent.";
##ini_set('sendmail_from',$from)
?>

<?php
    ##ini_set("SMTP", "aspmx.l.google.com");
    ##ini_set("sendmail_from", "miguelfexreme@gmail.com");

    ##$message = "The mail message was sent with the following mail setting:\r\nSMTP=aspmx.l.google.com\r\nsmtp_port=25\r\nsendmail_from=miguelfexreme@gmail.com";

    ##$headers = "From: miguelfexreme@gmail.com";


    ##mail("miguelfexreme@gmail.com", "Testing", $message, $headers);
    ##echo "Check your email now....<BR/>";
?>

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

	<!-- jQuery Version 1.11.1 -->
	<script src="js/jquery.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="TV Corporativa EITV">
	<meta name="author" content="Miguel Francisco">

	<title>EITV | Enviar E-Mail</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="body">

	<div class="whiteformcenter">

		<h2>Enviar E-Mail</h2>

		<?php
		$id=$_GET['id'];
		$sqlselect = "SELECT email_funcionario FROM `bdeitv`.`tb_utilizadores` WHERE id_user=".$id;
		$result=$conn2->query($sqlselect);
		$row = $result->fetch_assoc();
		$email = $row['email_funcionario'];
		$sender = $_SESSION['email'];
		?>

		<form method="post" id="enviarmail">

			<p>Recipiente <input type="text" name="recipiente" value="<?php echo $email;?>" class="form-control" placeholder="email" readonly/></p>

			<p>Mensagem<textarea class="form-control" name="mensagem" rows="6"></textarea></p>

			<p>O seu email <input type="text" name="sender" value="<?php echo $sender; ?>" class="form-control" placeholder="O seu email" readonly/></p>

			<p><input name="submeter" type="submit" class="btn btn-primary"/></p>

		</form>

		<?php
		if (isset($_POST['submeter'])) {
			$igual=false;

			$recipiente = utf8_encode($_POST['recipiente']);

			$mensagem = utf8_encode($_POST['mensagem']);

			$sender = utf8_encode($_POST['sender']);
			

			$sql = $recipiente."<br>".$mensagem."<br>".$sender;
			echo $sql;
			//$conn->query($sql);
			//$conn->close();
			//header('Location: listarnoticias.php');

		}
		?>
	</div>
	<?php
	include('footer.php');
	?>
</body>
</html>