<?php 
include_once("menubar.php");
?>
<script>
function _(el){
  return document.getElementById(el);
}
function delte_product(productid, userid){
    var currentproduct =  productid; 
    var busnID =  userid;
    var hr = new XMLHttpRequest();
    var url = "delete_product.php";
    var vars = "producttodelete="+currentproduct+"&userbusinessID="+busnID;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        if(return_data =="true"){
          _("statusMaindivdeleting"+productid).innerHTML ='<label style="color:green;">product Deleted successful</label>';
        }else{
          _("statusdeleting"+productid).innerHTML = return_data;
        }
      
      }
    }
    
    hr.send(vars); 
    _("statusdeleting"+productid).innerHTML = "processing deleting...";
 

      }
function getallproducts_product(){
    var busnID =  "1";
    var hr = new XMLHttpRequest();
    var url = "get_my_products.php";
    var vars = "userbusinessID="+busnID;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        _("myproductscontainer").innerHTML = return_data;
        _("loadingimg").style.display = "none";
        _("myproductscontainer_one").innerHTML = "";
      }
    }
    
    hr.send(vars); 
    _("loadingimg").style.display = "block";
    _("myproductscontainer_one").innerHTML = "processing Your Products........";
 
  }
function check_productdeatils(pName,pDescription){
  var getpN = pName.replace(/ /g,"");
  var cntpN = getpN.length;
  var getpD = pDescription.replace(/ /g,"");
  var cntpD = getpD.length;


  if(pName =="" || pName ==" " || cntpN ==0 || cntpN < 1){
      return "pNameNull";
  }else if(pDescription =="" || pDescription ==" " || cntpD ==0 || cntpD < 1){
      return "pDescriptionNull";
  }else{
    return "true";
  }
}
function save_product_details(){
    var pName = _("prooductname").value;
    var pDescription = _("productdescription").value;
    var pPhoto = _("insert_productPhotoName").value;
    var busnID = '1';//_("ubusinessID").value;
    var hr = new XMLHttpRequest();
    var url = "save_product.php";
    var vars = "productName="+pName+"&Description="+pDescription+"&pImage="+pPhoto+"&userbusinessID="+busnID;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
         _("prooductname").value = "";
         _("productdescription").value = "";
        //ajax_json_gallery('PhotoBusinessGallery');
      document.getElementById("statusimage_feedback").innerHTML = return_data;
      getallproducts_product();
      }
    }
    
    hr.send(vars); 
    document.getElementById("statusimage_feedback").innerHTML = '<label style="color:green; font-size:12px;">saving data......</label>';
  }

function upload_photo_product(){
  var pName = _("prooductname").value;
  var pDescription = _("productdescription").value;
  var checkpprodect = check_productdeatils(pName,pDescription);


if(checkpprodect =="pNameNull"){
  _("statusimage_feedback").innerHTML = '<label style="color:F00; font-size:12px;">Erro... Product Name can Not be empty!</label>';
}else if(checkpprodect =="pDescriptionNull"){
  _("statusimage_feedback").innerHTML = '<label style="color:F00; font-size:12px;">Erro... Product Description can Not be empty!</label>';
}else{

  var file = _("userphoto").files[0];
  var formdata = new FormData();
  formdata.append("userphoto", file);
  var ajax_img = new XMLHttpRequest();
  _("progressBar").style.display = "block";
  ajax_img.upload.addEventListener("progress", progressHandler, false);
  ajax_img.addEventListener("load", completeHandler, false);
  ajax_img.addEventListener("error", errorHandler, false);
  ajax_img.addEventListener("abort", abortHandler, false);
  ajax_img.open("POST", "save_product_image.php");
  ajax_img.send(formdata);
}

}
function progressHandler(event){
  //_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
  _("progressBar").value = Math.round(percent);
  var upload_percentage = Math.round(percent);
  if(upload_percentage < 100){
  _("statusimage_feedback").innerHTML = '<label style="color:green; font-size:12px;">'+Math.round(percent)+'% uploaded... please wait</label>';
  }else{
      _("statusimage_feedback").innerHTML = '<label style="color:green; font-size:12px;">'+Math.round(percent)+'% Completed</label>';
  }

}

function completeHandler(event){
  var img = event.target.responseText;
  if(img=="Erro_uplaoding_img_1"){
    _("statusimage_feedback").innerHTML = '<label style="color:F00; font-size:12px;">Erro uplaoding Photo... please select a photo and try again</label>';
    _("new_status_photo").innerHTML = "";
    _("progressBar").style.display = "none";
  }else{
     //_("pictureframeimg").innerHTML = "<img src='PhotoBusinessGallery/"+img+"'>";
     //ajax_json_gallery('PhotoBusinessGallery');
     _("progressBar").style.display = "none";
     _("insert_productPhotoName").value =img;
     save_product_details();
      _("setphoto").style.display = "none";
	  _("userphoto").value = null;
  }
 
  _("progressBar").value = 0;
}
function errorHandler(event){
  _("statusimage_feedback").innerHTML = '<label style="color:green;">Erro uplaoding Photo... please try again</label>';
}
function abortHandler(event){
  _("statusimage_feedback").innerHTML = '<label style="color:green;">Erro uplaoding Photo... please try again</label>';
}



</script>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>New Product Post</h1>
          </div>
        </div>

        <div class="row" style="margin-left:20%;">

            <div class="col-md-8">
				<article style="margin-bottom:10px; padding:9px; border-radius:3px; border:1px #027db3 dashed; background-color:#FFF;">
              <form id="upload_form" enctype="multipart/form-data" method="post">
                      
              <div style="" >
				 <input type="hidden" id="ubusinessID" value="1">
				 <input type="hidden" id="insert_productPhotoName" value="">
                  <div class="raw">
                   <div class="form-group">
						<label class="control-label">Product Name</label>
					   <input type="text" id="prooductname" placeholder="Product Name" class="form-control">
					  </div>
					  <div class="form-group">
						  <label class="control-label">Product Description</label>
						   <textarea class="form-control" id="productdescription" placeholder="Product Description" rows="3" maxlength="500"></textarea>
					   </div>
					 <div class="form-group" >
					<input type="hidden" name="imagehide" id="imagehide" value="" />
						<label id="textarea_feedback" style="margin-left:10px;"></label>
						<p  id="errmsg"></p></br>
								  <img src="" id="setphoto" style="display:none; width:10%; margin-top:-39px; " />
                    </div>
					<div class="form-group" style="margin-top:-19px;">
								  <label btn btn-success><a class="ajax-link " style=" width:20%;"><i class="fa fa-camera"></i> photo</a></label>
								 <input type="file" name="userphoto" id="userphoto" accept="image/*" onchange="uploadphoto()" style=" margin-top:-18px; margin-left:-1px;  opacity: 0; width:70px;"/>
								</div>

						<label id="videolabel"></label>
                  </div>   
                 
                   <div class="form-group">
                  </br></br>
					  <input type="button" class="btn btn-success btn-block btn-flat" value="Save Product" onclick="upload_photo_product();">
					  <progress id="progressBar" value="0" max="100" style="display:none; width:300px; background-color: #33cc5b;"></progress>
					  <h3 id="statusimage_feedback"></h3>
					  <h4 id="new_status_photo"></h4>
					  <p id="loaded_n_total"></p>
				</div>
                
                
                </div>
                                      
               
              </form> 
                </hr>
               </article>
			   <div class="row">
				<script>getallproducts_product()</script>
				  <img id="loadingimg" style="width: 17%; display: none;" src="img/loadingprocess.gif">
					<p id="myproductscontainer_one"></p>
				</div>
				<div class="row" id="myproductscontainer">
  

				</div>
			  
            </div>

            <div class="col-md-4">
               

            </div>

        </div>
       
		
      </div>

    </div>

   <script src="js_two/ajax.js"></script>
    <script src="js_two/main.js"></script>
    
  <script type="text/javascript">
function delete_reply(posttype,id){
	
	 var u = posttype;
	 var idd = id;
	 
    if(u != ""){
		//alert("yyy"+idd+"__"+u);
     	_("replycomment"+idd).innerHTML = 'Deleting...';
		var ajax = ajaxObj("POST", "delete_post.php");
		ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
				
          var id_value =  _("replycomment"+idd).innerHTML = ajax.responseText; 

		  var valid_extensions = /(.jpg|.jpeg|.gif|.!)$/i;   
  		 if(valid_extensions.test(id_value)){
			 
			  var id_value =  _("replycomment"+idd).innerHTML = ajax.responseText; 
		  
           	 //document.getElementById(message_label).value = "Error.. please try again";
 		  }
 		 else
 		 {
  		  //alert('Invalid File')
  		 }
		   
       }
        }
        ajax.send("deletepost="+idd);
	}
	
}

</script>
<script src="js_two/jquery-2.1.0.min.js"></script>
<script src="js_two/jquery-ui.min.js"></script>
<script type="text/javascript">
$('#userphoto').change( function(event) {
    var tmppath = URL.createObjectURL(event.target.files[0]);
    var size = parseFloat($("#userphoto")[0].files[0].size / 1024).toFixed(2);
       
	   if(size > 1999){
		    $("#setphoto").fadeIn("slow").attr('src',URL.createObjectURL(event.target.files[0]));
		   $("#errmsg").html('<label style="color:#F00; font-size:12px;">Your Photo is larger than 1mb.</label>');
		   document.getElementById("userphoto").value = null;
	    }else if(size < 1999){
			
	      $("#setphoto").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
		  $("#errmsg").html('<label style="font-size:12px;">What would you like to say about this picture?</label>');
		  $("#imagehide").val("imageyes");
		  document.getElementById("imagehide").value = 'imageyes';
		}

});

</script>

  </body>
</html>