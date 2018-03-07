<?php 

$database = include('config.php');

$host=$database["host"];
$username=$database["username"];
$password=$database["password"];
$db_name=$database["db_name"];
$table_name=$database["table_name"];

$id_sitio = $_POST["id_sitio"];

//echo "ID SITIO: " . $id_sitio;

// Connect to server and select databse.
mysql_connect($host, $username, $password) or die('cannot connect');
mysql_select_db($db_name) or die('cannot select DB');



$sql="update " . $table_name . " set visitas = visitas + 1 where id_sitio = " . $id_sitio . ";";

if (!mysql_query($sql))
{
	die('Error: ' . mysql_error());
}

header('Location: '.$_POST["sitio"]);

?>