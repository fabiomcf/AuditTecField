<?php
$host="localhost";
$user="root";
$pass="";
$dbname="TecFieldBD";

//Conecta à BD
$dbconnect=mysql_connect($host,$user,$pass)or die ("Unable to connect to database");

//Selecionar a BD
$dbfound=mysql_select_db($dbname,$dbconnect)or die (mysql_error());


?>
