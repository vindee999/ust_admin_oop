<?php 

session_start();
include '../libs/database.php';
include '../libs/config.php';

$db = new Database;

if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "select * from admin where email = '$email' and password = '$password'";
	$res = $db->select($query);
	if($res){
		$_SESSION['email'] = $email;
		header('Location:index.php');
	}else{
		echo "Incorrect email or password";
	}

}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Simple Login Form</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>
<form class="box login" method="post" action="login.php">
	<fieldset class="boxBody">
	  <label>Email</label>
	  <input type="text" name="email" tabindex="1" placeholder="Email" required>
	  <label>Password</label>
	  <input type="password" name="password" tabindex="2" placeholder="Password" required>
	</fieldset>
	<footer>
	  <input type="submit" class="btnLogin" name="login" value="Login" tabindex="4">
	</footer>
</form>

</body>
</html>
