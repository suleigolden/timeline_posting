<?php
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');
include_once("database_connection.php");

$my_businessID = '1';

$all_product .='';
    $queryinfo = mysqli_query($connecdata,"SELECT * FROM products WHERE business_ID= '$my_businessID' ORDER BY product_id DESC");
    while($getBasicinfo = $queryinfo->fetch_array()){
    $bPoroduct_Id = $getBasicinfo["product_id"];
    $userUniqueID = $getBasicinfo["business_ID"];
    $pName = $getBasicinfo["Product_Name"];
    $pDescription = $getBasicinfo["Product_Description"];
    $getphoto = $getBasicinfo["photo"];

$get_Description = trim($pDescription);

$get_Description = preg_replace('~(\\r\
|\
){2,}|$~', "\\00", $get_Description);

$get_Description = nl2br($get_Description);

$get_Description = preg_replace('/(.*?)\\001/s', "<p>$1</p>\
", $get_Description);


$all_product .='<div id="statusMaindivdeleting'.$bPoroduct_Id.'" class="listing-content-inner" style="border:1px #CCC solid; padding: 10px;">
      <div class="row" style="text-align: center;">
      <p id="statusdeleting'.$bPoroduct_Id.'" style="color:green;"></p>
       <button  class="btn btn-outline" style="font-size:11px; background-color: #d9534f; margin-right:9px; float: right;" onClick="delte_product(\''.$bPoroduct_Id.'\',\''.$userUniqueID.'\');"><i class="fa fa-trash"></i> Delete product</button>

          <img src="'.$getphoto.'" style="width: 50%;" alt="">
      </div>
      <div class="row" style="padding: 14px;">
           <p>'.$get_Description.'</p>
       </div>
  </div>';
  }
  echo $all_product;

?>