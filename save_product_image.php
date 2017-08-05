<?php
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');
include_once("database_connection.php");

$fileTmpLoc = $_FILES["userphoto"]["tmp_name"];
if (!$fileTmpLoc) { 
   echo "Erro_uplaoding_img_1";
    exit();
}

include_once("resize_photo.php");
//for ($i = 0; $i < count($_FILES['userphoto']['name']); $i++) {
	if(!empty($_FILES['userphoto']['name'])){
   $target_path = "PhotoProductsImages/";
        $validextensions = array("jpeg", "jpg", "png");  
        $ext = explode('.', basename($_FILES['userphoto']['name']));
        $file_extension = end($ext); 
        $picname = $_FILES["userphoto"]["name"];
		$NavFuncName = $_SESSION['Navigation_ID_NigerianBuinessBlueGapeUsersDrect'];
		$target_path = $target_path.'nb'.$NavFuncName . substr(md5(uniqid(rand(1,100))), 0, 14) . "." . $ext[count($ext) - 1];
        //$j = $j + 1;      
      
	   if (move_uploaded_file($_FILES['userphoto']['tmp_name'], $target_path)) {
			$target_fileq = $target_path;
			$resized_fileq = $target_path; 
			$wmaxq = 1000;
			$hmaxq = 2000;
                
				img_resizing($target_fileq, $resized_fileq, $wmaxq, $hmaxq, $file_extension);
				$current_photo = str_replace("PhotoProductsImages/","",$target_path);
            } else {
				$current_photo = "Erro_upload";
            }
			
		}else{
			$current_photo = "Erro_upload";
		}
    //}
if($current_photo != "Erro_upload" || $current_photo != "PhotoProductsImages/"){
	echo $current_photo;
	/**
	$userBus_ID = $_SESSION['Navigation_ID_NigerianBuinessBlueGapeUsersDrect'];
	$sqlcommand = "INSERT INTO products VALUES ('','$userBus_ID','newNull','newNull','$current_photo')";
    if(mysqli_query($connecdata,$sqlcommand)){
		echo $current_photo;
	}else{
		echo "Erro_uplaoding_img"; 
		//exit();
	}**/

    }else{
	echo "Erro uplaoding Photot... please try again";
	//exit();
}    


    ?>