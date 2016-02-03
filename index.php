<?php include('login_handler.php'); ?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<meta name="description" content="Base de dados PHP" />
<meta name="keywords" content="BD,Base de dados" />
<meta name="author" content="Fábio Ferreira" />
<link href="style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<p>
<div id="layout">
<form method="POST" id="frmLogin">
<img src="logo2.png" style="margin-left:150px; width:200px;" alt="" />
<br/>
<label>Username:</label><input class="txt" style="margin-left:10px; margin-top:50px" type="text" name="username"/>
<br/>
<br/>
<label>Password:</label><input class="txt" style="margin-left:13px" type="password" name="password"/>
<br/>
<br/>
<input class="button" type="submit" style="margin-left:155px" value="LogIn" name="Log" />
<br/>
</form>
<?php echo $logMessage ?>
</div>
<h6>Copyrights @ Fábio Ferreira DSS Fujitsu </h6>
</body>
</html>