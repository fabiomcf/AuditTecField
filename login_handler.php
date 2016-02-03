<?php
// $Start Menu Login
include ('connect.php');
ob_start();
$errorMessage="";
$logMessage="";
$passMessage="";
$notMessage="";
$addMessage2="";
$admin="2";
if (isset($_POST['Log'])){
	$valida = $_POST['Log'];
}
if (isset($valida)){
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string(md5($_POST['password']));
	$sql="SELECT * FROM auth WHERE user='$username' AND pass='$password'";
	$sqlquery=mysql_query($sql);
		if (mysql_num_rows($sqlquery) == 1) {
			gravarCookie();
			header("Location: principal.php");
		} else $logMessage = "<font color='white'><p align='center'>User ou Pass errada!</p></font>";
}
if (isset($_POST['logout'])){
	apagarCookie();
	header("location: " . $_SERVER['REQUEST_URI']);
}

if (isset($_POST['regUser'])){
	if (isset($_COOKIE['User'])){
		header("Location: control.php");
	}else header("location:index.php");
}

if (isset($_POST['btnSair'])){
	header("Location: principal.php");
}

function gravarCookie(){
	$user=mysql_real_escape_string($_POST['username']);
	$expirar = time()+60*30;
	setcookie('User',$user,$expirar);
}
function apagarCookie(){
	setcookie('User','');
}

ob_end_flush();
// $End Menu Login
?>