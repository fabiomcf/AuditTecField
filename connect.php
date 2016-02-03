<?php
$host="localhost";
$user="root";
$pass="";
$dbname="TecFieldBD";

//Conecta à BD
$dbconnect=mysql_connect($host,$user,$pass)or die ("Não foi possível conectar-se a BD");

//Selecionar a BD
$dbfound=mysql_select_db($dbname,$dbconnect)or die (mysql_error());


?>