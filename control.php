<?php 
include('login_handler.php'); 
$regMessage="";
$tec=$_COOKIE['User'];
$sql2="SELECT * FROM auth WHERE user='$tec' AND nivel='$admin'";
$sqlquery2=mysql_query($sql2) or die(mysql_error());
if (mysql_num_rows($sqlquery2) == 0){
	header("location:index.php");
}else{
if (($_SERVER['REQUEST_METHOD'])=='POST'){
	if(isset($_POST['Reg'])){
		$sql=mysql_query("SELECT * FROM auth");
		if(isset($_COOKIE['User'])){
			$user=mysql_real_escape_string($_POST['username']);
			$pass=mysql_real_escape_string(md5($_POST['password']));
			$email=mysql_real_escape_string($_POST['email']);
			$nivel=mysql_real_escape_string($_POST['nivel']);
			if (empty($user) or empty($pass) or empty($email)){
				$regMessage="Não foi possivel criar o utilizador";
			}else{
				$dbinsert="INSERT INTO auth (user,pass,email,nivel) VALUES ('$user','$pass','$email','$nivel')";
				$dbresult=mysql_query($dbinsert);
				if ($dbresult){
					$regMessage="Utilizador criado com sucesso";
				}
			}
		}else $regMessage="Não foi possivel criar o utilizador";
	}
}
mysql_close();
?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<meta name="description" content="Base de dados PHP" />
<meta name="keywords" content="BD,Base de dados" />
<meta name="author" content="Fábio Ferreira" />
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<img src="logo2.png" style="margin-top: 50px; margin-left: 100px" alt="" />
<br/>
<br/>
<br/>
<p>
<div id="layout" style="margin-top:-100px">
<form method="POST" id="frmLogin">
<br/>
<label>Username:</label><input class="txt" style="margin-left:10px; margin-top:50px" type="text" name="username"/>
<br/>
<br/>
<label>Password:</label><input class="txt" style="margin-left:15px" type="password" name="password"/>
<br/>
<br/>
<label>E-mail:</label><input class="txt" style="margin-left:30px " type="text" name="email"/>
<br/>
<br/>
<select name="nivel" class="txt" >
<option value="1" selected>User</option>
<option value="2">Admin</option>
</select>
<br/>
<br/>
<input class="button" type="submit"  value="Registar" name="Reg" />
<br/>
<input class="button" type="submit"  value="Sair" name="btnSair" />
<br/>
<?php echo $regMessage ?>
</form>
</div>

<div>
<h6>Direitos Reservados @ Fábio Ferreira DSS Fujitsu @ fabio.ferreira@fsc-itps.com</h6>
</div>
<?php
}
?>
</body>
</html>