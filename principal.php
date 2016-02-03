<?php 
include('login_handler.php'); 
$regMessage="";
$regMessage1="";
$tec=$_COOKIE['User'];
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
<img src="logo2.png" style="margin-left: 50px" alt="" />
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
	if(isset($_POST['btnSave'])){
		$sql=mysql_query("SELECT * FROM auditlist");
		$incidente=mysql_real_escape_string($_POST['incid']);
		if ((empty($incidente)) or !((isset($_POST['opCSP']) AND $_POST['opCSP'] != "")) or !(isset($_POST['opCPF']) AND $_POST['opCPF'] != "") or !(isset($_POST['opCBCP']) AND $_POST['opCBCP'] != "") or !(isset($_POST['opCBPO']) AND $_POST['opCBPO'] != "") or !(isset($_POST['opCPL']) AND $_POST['opCPL'] != "") or !(isset($_POST['opTBSP']) AND $_POST['opTBSP'] != "") or !(isset($_POST['opTBPF']) AND $_POST['opTBPF'] != "") or !(isset($_POST['opTBBDC']) AND $_POST['opTBBDC'] != "") or !(isset($_POST['opTBPDT']) AND $_POST['opTBPDT'] != "") or !(isset($_POST['opSLIOK']) AND $_POST['opSLIOK'] != "") or !(isset($_POST['opSB']) AND $_POST['opSB'] != "")){
			$regMessage="<font color='red'>Favor preencher todos os campos obrigatórios!</font>";
		}else{
			$opcsp=mysql_real_escape_string($_POST['opCSP']);
			$opcpf=mysql_real_escape_string($_POST['opCPF']);
			$opcbcp=mysql_real_escape_string($_POST['opCBCP']);
			$opcbpo=mysql_real_escape_string($_POST['opCBPO']);
			$opcpl=mysql_real_escape_string($_POST['opCPL']);
			$cobs=mysql_real_escape_string($_POST['CObs']);
			$optbsp=mysql_real_escape_string($_POST['opTBSP']);
			$optbpf=mysql_real_escape_string($_POST['opTBPF']);
			$optbbdc=mysql_real_escape_string($_POST['opTBBDC']);
			$optbpdt=mysql_real_escape_string($_POST['opTBPDT']);
			$tbobs=mysql_real_escape_string($_POST['TBObs']);
			$opsliok=mysql_real_escape_string($_POST['opSLIOK']);
			$opsb=mysql_real_escape_string($_POST['opSB']);
			$sscg=mysql_real_escape_string($_POST['SSCG']);
			$dbinsert="INSERT INTO auditlist (user,loja,id_equip,data,incidente,c_sup_pp,c_pp_fix,c_bc_pp,c_bpo,c_plmdo,c_obs,tb_sup_pp,tb_pp_fix,tb_bdc,tb_pdt,tb_obs,s_liOK,s_b,s_scg) VALUES ('$tec','$host','$id_equip','$current_date','$incidente','$opcsp','$opcpf','$opcbcp','$opcbpo','$opcpl','$cobs','$optbsp','$optbpf','$optbbdc','$optbpdt','$tbobs','$opsliok','$opsb','$sscg')";
			$dbresult=mysql_query($dbinsert);
			if ($dbresult){
				$regMessage="<font color='white'>Registo Gravado com Sucesso!</font>";
			}
			
			$to  = 'joao.freire@jeronimo-martins.pt'; //. ', ';
			//$to .= 'fabio.ferreira@fsc-itps.com';
			$from="From:joao.freire@jeronimo-martins.pt";
			$subject="Auditoria Técnica Field";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//$headers .= 'To: fabio.ferreira@fsc-itps.com' . "\r\n";
			$headers .= 'From: Mail System <joao.freire@jeronimo-martins.pt>' . "\r\n";
			$headers .= 'Cc: ' . "\r\n";
			//$headers .= 'Bcc: ' . "\r\n";
			
			
			$message="<html>
				<body>
				<table class='list'>
				<tr style='color:red; background:#E0F2F7'>
				<td>Téc.</td><td>Loja</td><td>ID Equip.</td><td>Data</td><td>Inc.</td><td>Sup. PinPad</td><td>PinPad Fixos</td><td>Borrac. Cab. PinPad</td><td>Borrac. Post. Operador</td><td>Parafusos Lim. Mov. Display Oper.</td><td>Obs</td><td>Sup. PinPad</td><td>PinPad Fixos</td><td>Braçad. Display Cli.</td><td>Pés Dos Trios</td><td>Obs</td><td>Local Inst. OK</td><td>Bastidor</td><td>Sala Condiç. Gerais</td>
				</tr>
				<tr style='background:#EFF8FB'>
				<td>$tec</td><td>$host</td><td>$id_equip</td><td>$current_date</td><td>$incidente</td><td>$opcsp</td><td>$opcpf</td><td>$opcbcp</td><td>$opcbpo</td><td>$$opcpl</td><td>$cobs</td><td>$optbsp</td><td>$optbpf</td><td>$optbbdc</td><td>$optbpdt</td><td>$tbobs</td><td>$opsliok</td><td>$opsb</td><td>$sscg</td>
				</tr>
				</table>";
				
				$sendmail=mail($to,$subject,$message,$headers);	
			/*if ($sendmail) {
				$addMessage2="<font color='white'>Mail enviado com sucesso</font>";
			}*/
		}
	}
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
echo "<td><label>Loja:</label></td>";
echo "<td><label style='color:#FFFFFF;'>". $host ."</label></td><br>"; 
echo "<td><label>N.º Incidente:</label></td>";
echo "<form method='POST' id='frmLogin'>";
echo "<td><input class='txt' type='text' name='incid' /><label style='color:red; font:9'>*</label></td>";
echo "</tr>";
echo "<tr>";
echo "<td><label>ID Equipamentos:</label></td>";
echo "<td><label style='color:#FFFFFF;'>".$id_equip."</label></td>";
echo "<td></td>";
echo "<td><label style='font: 8px/1.5 Verdana, Arial, Helvetica, sans-serif;color:#FFFFFF;'>(Ex.:IN-204580)</label></td>";
echo "</tr>";
echo "</table>";
?>
<br/>
<?php echo $regMessage."<br>";
echo $addMessage2;
?>
<br/>

<label class='titulo'>Checkouts</label>
<table>
<tr>
<td><label class='lbldados'>Suportes PINPAD<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl" name="opCSP" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" class="dados" name="opCSP" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>PINPAD Fixos<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl"  name="opCPF" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" name="opCPF" class="dados" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Borrachas Cabos PINPAD<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl" name="opCBCP" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" class="dados" name="opCBCP" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Borrachas Postes Operador<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl" name="opCBPO" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" name="opCBPO" class="dados" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Parafusos Lim. Mov. Display Operador<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl" name="opCPL" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" class="dados" name="opCPL" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Observações</label></td><td><textarea rows="4" cols="30" name="CObs" class="table"></textarea></td>
</tr>
<br/>
</table>
<label class='titulo' style="top:-100px; position:relative;">Trios / Balcões</label>
<br/>
<table style="top:-80px; position:relative;">
<tr>
<td><label class='lbldados'>Suportes PINPAD<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl" name="opTBSP" class="dados" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" class="dados" name="opTBSP" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>PINPAD Fixos<label style="color:red; font:9">*</label></label></td><td><input type="radio" name="opTBPF" class="lbl" value="Sim"><label class="lbl">Sim</label></td><td></input><input type="radio" name="opTBPF" class="dados" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Braçadeiras Display Clientes<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl" name="opTBBDC" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" class="dados" name="opTBBDC" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Pés Dos Trios<label style="color:red; font:9">*</label></label></td><td><input type="radio" name="opTBPDT" class="lbl" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" class="dados" name="opTBPDT" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Observações</label></td><td><textarea rows="3" cols="25" name="TBObs" class="table"></textarea></td>
</tr>
<br/>
</table>
<label class='titulo' style="top:-170px; position:relative;">Servidor</label>
<br/>
<table style="top:-100px; position:relative;">
<tr>
<td><label class='lbldados'>Local Instalação OK<label style="color:red; font:9">*</label></label></td><td><input type="radio" class="lbl" name="opSLIOK" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" class="dados" name="opSLIOK" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Bastidor<label style="color:red; font:9">*</label></label></td><td><input type="radio" name="opSB" class="lbl" value="Sim"><label class="lbl">Sim</label></input></td><td><input type="radio" name="opSB" class="dados" value="Não"></td><td><label class="dados">Não</label></input></td>
</tr>
<br/>
<tr>
<td><label class='lbldados'>Sala Condições Gerais</label></td><td><textarea rows="3" cols="25" name="SSCG" class="table"></textarea></td>
</tr>
<br/>
</table>
<table style="top:-100px; position:relative;">
<br/>
<td><input type="submit" value="Gravar" class="button" name="btnSave"/></td>
<td><input type="submit" value="Sair" class="button" name="logout" /></td>
<?php
$sql2="SELECT * FROM auth WHERE user='$tec' AND nivel='$admin'";
$sqlquery2=mysql_query($sql2) or die(mysql_error());
	if (mysql_num_rows($sqlquery2) == 1) {
		echo "<td><input type='submit' value='Registar Utilizador' class='button' name='regUser' /></td>";
		echo "<td><input type='submit' value='Listar Registos' class='button' name='listAudit' /></td>";
	}
}
mysql_close();
?>
</form>
</table>
</div>
<div>
</div>
</body>
</html>