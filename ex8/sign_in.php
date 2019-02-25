<?php
require_once 'db.php';


?>
<!DOCTYPE html>
<html>
<head>
<title>Lesson 6</title>

<meta charset="utf8">
</head>
<body>
<?php
if(!isset($_SESSION['logged_user']))
{
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
<label>Login</label>
<input type="text" name="username">
<label>Password</label>
<input type="password" name="password">
<input type="submit" value="sign in" name="sign_in">
<?php 
}
else 
{	echo $_SESSION['logged_user'];
	echo '<a href="?logout=true">Logout</a>';
}

if(isset($_GET['logout'])) {
	unset($_SESSION['logged_user']);
	header('Location: sign_in.php');
}
?>
<?php
$data = $_POST;
if(isset($data['sign_in'])) {
	$errors = array();
	if(trim($data['username']) == '') {
		$errors[] = 'Enter user name';
	}
	if(trim($data['password']) == '') {
		$errors[] = 'Enter user password';
	}
	
	$user = R::findOne('users', "login = ?", array($data['username']));
	if($user)
	{
		if(password_verify($data['password'], $user->password))
		{
			$_SESSION['logged_user'] = $user;
			header('Location: sign_in.php');
		}
		else 
		{
			$errors[] = ' Password is not correct';
		}
		
	}else {
		$errors[] = ' Username is not correct';
	}
	
	if(!empty($errors)) {
		
		echo '<div style="color:red;">'.array_shift($errors).'</div>';
	}
}




?>