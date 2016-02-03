<?php 
include('login_handler.php'); 
$tec=$_COOKIE['User'];
$regMessage="";
$regMessage1="";
$sql2="SELECT * FROM auth WHERE user='$tec' AND nivel='$admin'";
$sqlquery2=mysql_query($sql2) or die(mysql_error());
if (mysql_num_rows($sqlquery2) == 0){
	header("location:index.php");
}else{
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
<div id="principal">
<img src="logo2.png" style="margin-top: 50px; margin-left: 50px" alt="" />
<p align="center"><font color="white">
<?php
	/*$noticias = file_get_contents("noticias.txt");
	echo $noticias . "<br>";*/
?>
</font>
<?php
if (!(isset($_COOKIE['User']))){
	header("Location: index.php");
}else{
$tec=$_COOKIE['User'];
$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$id_equip = substr($host, 3,4);
date_default_timezone_set('GMT');
$current_date = gmDate("d-m-Y H:i:s");

if (($_SERVER['REQUEST_METHOD'])=='POST'){
	if(isset($_POST['listAudit'])){
		header("location:auditList.php");
		$sql=mysql_query("SELECT * FROM auditlist");
	}
}
echo "<table id='tablelist'>";
echo "<tr>";
echo "<td><label>Técnico:</label></td>";
echo "<td><label style='color:#FFFFFF;'>". $tec ."</label></td><br>"; 
echo "<td><label>Data/Hora:</label></td>";
echo "<td><label style='color:#FFFFFF;'>".$current_date."</label></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label>Computer Name:</label></td>";
echo "<td><label style='color:#FFFFFF;'>". $host ."</label></td><br>"; 
echo "</tr>";
echo "</table>";

?>
<br/>
<?php echo $regMessage."<br>";
echo $regMessage1;
?>
<br/>
<?php
$sqlist="SELECT * FROM auditlist ORDER BY ID ASC";
$resultlist=mysql_query($sqlist)or die(mysql_error());
	echo "<table class='list'>";
	echo "<tr style='color:white; background:#2B547E'>";
	echo "<td>Téc.</td><td>Loja</td><td>ID Equip.</td><td>Data</td><td>Inc.</td><td>Sup. PinPad</td><td>PinPad Fixos</td><td>Borrachas Cabos PinPad</td><td>Borrachas Postes Operador</td><td>Parafusos Lim. Mov. Display Operador</td><td>Obs</td><td>Sup. PinPad</td><td>PinPad Fixos</td><td>Braçadeiras Display Cliente</td><td>Pés Dos Trios</td><td>Obs</td><td>Local Inst. OK</td><td>Bastidor</td><td>Sala Condições Gerais</td>";
	echo "</tr>";
while($listar=mysql_fetch_array($resultlist)){
	$id=$listar['ID'];
	$tecnic=$listar['user'];
	$loja=$listar['loja'];
	$equip=$listar['id_equip'];
	$data=$listar['data'];
	$incidente=$listar['incidente'];
	$c_sup_pp=$listar['c_sup_pp'];
	$c_pp_fix=$listar['c_pp_fix'];
	$c_bc_pp=$listar['c_bc_pp'];
	$c_bpo=$listar['c_bpo'];
	$c_plmdo=$listar['c_plmdo'];
	$c_obs=$listar['c_obs'];
	$tb_sup_pp=$listar['tb_sup_pp'];
	$tb_pp_fix=$listar['tb_pp_fix'];
	$tb_bdc=$listar['tb_bdc'];
	$tb_pdt=$listar['tb_pdt'];
	$tb_obs=$listar['tb_obs'];
	$s_liOK=$listar['s_liOK'];
	$s_b=$listar['s_b'];
	$s_scg=$listar['s_scg'];
	echo "<tr style='background:#E0E6F8'>";
	echo "<td>$tecnic</td><td>$loja</td><td>$equip</td><td>$data</td><td>$incidente</td><td>$c_sup_pp</td><td>$c_pp_fix</td><td>$c_bc_pp</td><td>$c_bpo</td><td>$c_plmdo</td><td>$c_obs</td><td>$tb_sup_pp</td><td>$tb_pp_fix</td><td>$tb_bdc</td><td>$tb_pdt</td><td>$tb_obs</td><td>$s_liOK</td><td>$s_b</td><td>$s_scg</td>";
	echo "</tr>";
}
	echo "</table>";
?>



<table style="top:-10px; position:relative;">
<br/>
<form method="POST">
<td><input type="submit" value="Sair" class="button" name="btnSair" /></td>
<?php
/*$sql2="SELECT * FROM auth WHERE user='$tec' AND nivel='$admin'";
$sqlquery2=mysql_query($sql2) or die(mysql_error());
	if (mysql_num_rows($sqlquery2) == 1) {
		echo "<td><input type='submit' value='Listar Registos' class='button' name='listAudit' /></td>";
	}*/
}
mysql_close();
?>
</form>
</table>
</div>
<div>

<?php
}
?>
</div>
</body>
</html>