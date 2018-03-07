


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>



<head>

<meta charset="utf-8"><title>krl - sitios</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"> 
<script src="js/jquery.js"></script> 
<!-- script src="http://sitios.krl.mx/js/jquery.js"></script --> 
<script src="js/likeaboss.js"></script> 
<!-- script src="http://sitios.krl.mx/js/likeaboss.js"></script --> 

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

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$table_name="test.sitios"; // Database name	

/*
$host="mysql.hostinger.mx"; // Host name
$username="u879398462_emywa"; // Mysql username
$password="HhFXVfdcP3Cy"; // Mysql password
$db_name="u879398462_aqyge"; // Database name
$table_name="sitios"; // Database name	
*/


// Connect to server and select databse.
mysql_connect($host, $username, $password) or die('cannot connect');
mysql_select_db($db_name) or die('cannot select DB');


$sql="SELECT id_sitio, sitio, url, imagen_path, categoria FROM " . $table_name . " order by visitas desc";

//echo 'SQL>>>'.$sql."<<<";

$result=mysql_query($sql);

//echo  "<br>";

while ($row = mysql_fetch_assoc($result)) {

	//echo  "<a href=\"".$row['url']."\"><img src=\"images/".$row['imagen_path']."\" alt=\"".$row['sitio']."\"></a>\n";
	echo  "<a href=\"javascript:void(0);\" onclick=\"go(" . $row['id_sitio'] . ", '".$row['url']."');\"><img src=\"images/".$row['imagen_path']."\" alt=\"".$row['sitio']."\"></a>\n";

}

mysql_free_result($result);

?>




<div id="parent4"> 

<table width="100%" border="0"><tr><td align="right"><a href="subir.php">+</a>&nbsp;</td></tr></table> 
</div>

</div>
</body>
</html>



