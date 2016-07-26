<!DOCTYPE html>
<html>
<?php
session_start()
?>
<head>
	<title>Logout</title>
</head>
<body>
	<?php
	unset($_SESSION['nome']);
	unset($_SESSION['id']);
	unset($_SESSION['nivel']);
	session_destroy();
	?>
	<?php
	header('Location: login.php');
	?>
</body>
</html>