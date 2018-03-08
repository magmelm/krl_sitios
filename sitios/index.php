

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<meta charset="utf-8"><title>krl - sitios</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"> 
<script src="js/jquery.js"></script> 
<script src="js/likeaboss.js"></script>  

<style type="text/css">
body{
	/*line-height:50px;*/
	/*font-family:Helvetica;*/
	perspective:400;
	/*margin-top: 0px;*/
	margin: 5px;
	padding: 0px;
	/*background-color: #eeeeee;*/
}
img{
	border:3px double lightgray;
	-webkit-transition:5s;
	/*position: relative;*/
	/*top:25px;*/
	/*top:10px;*/
	z-index:1;
	height:60px;
	width:60px;
	background-color: #eeeeee;
}
img:hover{
	-webkit-transition:.1s;
	border-color:#313131;
	box-shadow:0 0 20px black;
	-webkit-animation:5s losquiero;
	-webkit-transform:scale(1.3);
	z-index:2;
}
@-webkit-keyframes losquiero{
	0%{border-color: lightgray;}
	50%{border-color:#313131;}
	0%{border-color: lightgray;}
}

.divLogos{
	/*align: center;*/
	align-content: center;
	background-color: #ffffff;
}

#parent4 {
    position: fixed;
    border: 1px solid blue;
    background-color: rgba(33,66,99,0.5);    

    width: 100%;
    /*height: 40px;*/
    bottom: 0;
    left: 0;
    right: 0;
    align-content: center;
    align-items: center;
}

A:link   {text-decoration:none;color:#000000;cursor:default;font-family:arial;font-size:10pt;font-weight:bold;}
A:visited{text-decoration:none;color:#000000;cursor:default;font-family:arial;font-size:10pt;font-weight:bold;}
A:active {text-decoration:none;color:#000000;cursor:default;font-family:arial;font-size:10pt;font-weight:bold;}
A:hover  {text-decoration:none;color:#ffffff;cursor:default;font-family:arial;font-size:10pt;font-weight:bold;}


</style>

<script type="text/javascript">
	
function go(id_sitio, sitio) {

	//alert("INI: " + id_sitio + "\nSITIO: " + sitio);	

    var form = document.createElement("form");
    form.setAttribute("method", "POST");
    form.setAttribute("action", "go.php");

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", "id_sitio");
    hiddenField.setAttribute("value", id_sitio);

    form.appendChild(hiddenField);

    var hiddenField2 = document.createElement("input");
    hiddenField2.setAttribute("type", "hidden");
    hiddenField2.setAttribute("name", "sitio");
    hiddenField2.setAttribute("value", sitio);

    form.appendChild(hiddenField2);
    
    
    document.body.appendChild(form);
    
    form.submit();	


	

}
	
</script>

</head>
<body>

<div class="divLogos">

<?




$database = include('config.php');

$host=$database["host"];
$username=$database["username"];
$password=$database["password"];
$db_name=$database["db_name"];
$table_name=$database["table_name"];

$orden="";

if (isset($_GET["o"])) {
	$orden=$_GET["o"];
}


$sql="SELECT id_sitio, sitio, url, imagen_path, categoria FROM " . $table_name . " order by visitas desc, id_sitio asc";

if($orden=="A-Z") {
	$sql="SELECT id_sitio, sitio, url, imagen_path, categoria FROM " . $table_name . " order by sitio asc";
} else if($orden=="Z-A") {
	$sql="SELECT id_sitio, sitio, url, imagen_path, categoria FROM " . $table_name . " order by sitio desc";
} else if($orden=="#") {
	$sql="SELECT id_sitio, sitio, url, imagen_path, categoria FROM " . $table_name . " order by visitas desc, id_sitio asc";
} else {
	$sql="SELECT id_sitio, sitio, url, imagen_path, categoria FROM " . $table_name . " order by visitas desc, id_sitio asc";
}


// Connect to server and select databse.
mysql_connect($host, $username, $password) or die('cannot connect');
mysql_select_db($db_name) or die('cannot select DB');

//echo 'SQL>>>'.$sql."<<<";

$result=mysql_query($sql);

while ($row = mysql_fetch_assoc($result)) {

	echo  "<a href=\"javascript:void(0);\" onclick=\"go(" . $row['id_sitio'] . ", '".$row['url']."');\"><img src=\"images/".$row['imagen_path']."\" alt=\"".$row['sitio']."\"></a>\n";

}

mysql_free_result($result);

?>





</div>

	<br>
	<div id="parent4"> 
		<table width="100%" border="0">
			<tr>
				<td align="center"><a href="index.php?o=#">#</a>&nbsp;</td>
				<td align="center"><a href="index.php?o=A-Z">A-Z</a>&nbsp;</td>
				<td align="center"><a href="index.php?o=Z-A">Z-A</a>&nbsp;</td>
				<td align="center"><a href="subir.php">+</a>&nbsp;</td>
			</tr>
		</table> 
	</div>
	
</body>
</html>



