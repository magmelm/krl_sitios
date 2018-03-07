<?php 

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$table_name="test.sitios";

/*
$host="mysql.hostinger.mx"; // Host name
$username="u879398462_emywa"; // Mysql username
$password="HhFXVfdcP3Cy"; // Mysql password
$db_name="u879398462_aqyge"; // Database name
$table_name="sitios";
*/

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