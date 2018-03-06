
<?php

include 'security.php';

//sitio
//url
//categoria
//imagenID
//pwd

$sitio     = $_POST["sitio"];
$url       = $_POST["url"];
$categoria = $_POST["categoria"];
$psswd     = $_POST["psswd"];

$file_name     = $_FILES["imagenID"]["name"];
$file_type     = $_FILES["imagenID"]["type"];
$file_size     = $_FILES["imagenID"]["size"];
$file_tmp_name = $_FILES["imagenID"]["tmp_name"];
$file_error    = $_FILES["imagenID"]["error"];

//echo "<br>" . $sitio . "<br>" . $url . "<br>" . $categoria . "<br>" . $psswd . "<br><br>";

echo "<br><table border=1>";
echo "<tr><td>&nbsp;&nbsp; Sitio          &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $sitio .         "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; URL            &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $url .           "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; Categoria      &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $categoria .     "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp;                &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . "        " .     "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; Imagen         &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $file_name .     "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; Type           &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $file_type .     "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; Size           &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $file_size .     "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; Tmp Name       &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $file_tmp_name . "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; Error          &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $file_error .    "&nbsp;</td></tr>";
echo "</table>";

echo "<br>";


//---------------------------------------------------------
// VALIDA PASSWORD


$p = "AJrDNnrUfBGvPNQfZ3pvgg==";
$key  = "T4m4n10D13c1s31s";

$psswd_enc = Security::encrypt($psswd, $key);

//echo "enc: " . $psswd_enc . "<br><br>";

if($p != $psswd_enc) {

	echo "PASSWORD INCORRECTO";
	echo "<br><br><b><a href=index.php>Subir</a></b>";
	return;
	
}



//---------------------------------------------------------


//$target_dir = "files/";
//$target_dir = "/home/u879398462/files/";
//$target_dir = "/opt/lampp/htdocs/projects/subirImagen/images/";
$target_dir = getcwd() . "/images/"; //   /opt/lampp/htdocs/projects/subirImagen  +  /images/


$target_file = $target_dir . basename($_FILES["imagenID"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

echo "<br><table border=1>";
echo "<tr><td>&nbsp;&nbsp; target_file   &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $target_file .                "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; imageFileType &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $imageFileType .              "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; size          &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . $_FILES["imagenID"]["size"] . "&nbsp;</td></tr>";
echo "<tr><td>&nbsp;&nbsp; Dir           &nbsp;&nbsp;</td><td>&nbsp;&nbsp;" . getcwd() .                    "&nbsp;</td></tr>";
echo "</table>";

echo "<br><br>";


// Check if image file is a actual image or fake image
/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
*/

// Check if file already exists
if (file_exists($target_file)) {
    echo "<b>Sorry, file already exists.</b><br>";
    $uploadOk = 0;
} else 

// Check file size , 5 Ks - 5000
if ($_FILES["imagenID"]["size"] > 500000) {
	echo "<b>Sorry, your file is too large. " . $_FILES["imagenID"]["size"] . "</b><br>";
    $uploadOk = 0;
} else 

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	echo "<b>Sorry, only JPG, JPEG, PNG & GIF files are allowed. " . $imageFileType . "</b><br>";
    $uploadOk = 0;
} else 

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imagenID"]["tmp_name"], $target_file)) {
        echo "<b>The file &nbsp; <<<<< &nbsp;&nbsp; <font color=\"green\">". basename( $_FILES["imagenID"]["name"]). "</font> &nbsp;&nbsp; >>>>> &nbsp; has been uploaded.</b>";
        echo "<br><br><br>";
        
        echo "<a href=\"" . $url . "\"><img src=\"images/" . basename($_FILES["imagenID"]["name"]) . "\" 		alt=\"" . $sitio . "\"  style=\"width:50px;height:50px;\"></a>";
        
        echo "<br>";
        
        //-------------------------
        
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
$table_name="sitios";
*/
		
        //ob_start();
        
        mysql_connect($host, $username, $password) or die("cannot connect");
        
        mysql_select_db($db_name) or die("cannot select DB");
        
      
        $sitio     = stripslashes($sitio);
        $sitio     = mysql_real_escape_string($sitio);
        
        $url       = stripslashes($url);
        $url       = mysql_real_escape_string($url);
        
        $categoria = stripslashes($categoria);
        $categoria = mysql_real_escape_string($categoria);
        
        $file_name = stripslashes($file_name);
        $file_name = mysql_real_escape_string($file_name);

        
        $sql="INSERT INTO " . $table_name . " (`SITIO`,`URL`,`IMAGEN_PATH`,`CATEGORIA`,`FECHA_ALTA`) VALUES ('$sitio','$url','$file_name','$categoria',now());";
        
        
        if (!mysql_query($sql))
        {
        	die('Error: ' . mysql_error());
        	
        }
        
        
        //ob_end_flush();
        
        
        //-------------------------
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


echo "<br><br><b><a href=subir.php>Subir</a></b>";

?>


