<?php
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');
include_once("database_connection.php");

$pName = htmlentities($_POST["productName"]);
$pDescription = htmlentities($_POST["Description"]);
$pPhoto = htmlentities($_POST["pImage"]);
$set_businessID = htmlentities($_POST["userbusinessID"]);

$set_pPhoto = "PhotoProductsImages/".$pPhoto."";

if( !empty($pName) || !empty($pDescription) || !empty($pPhoto) || !empty($set_businessID) ){

	$sqlcommand = "INSERT INTO products VALUES ('','$set_businessID','$pName','$pDescription','$set_pPhoto')";
  if(mysqli_query($connecdata,$sqlcommand)){
  	echo '<label style="color:green;">Product Info Save successful</label>';
  }else{
  	echo '<label style="color:#F00;">Error..... please try again</label>';
  }
   
 
}else{
	 echo '<label style="color:#F00;">Error.. Product Name, Product Description and Photo can not be Empty!</label>';
}



?>