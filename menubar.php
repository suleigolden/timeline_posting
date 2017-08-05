<?php
error_reporting(E_ALL);
error_reporting(E_ERROR);
ini_set('display_errors', '1');

	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Post</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <link rel="icon" type="image/ico" href="images/logo.png" />
    
	<script type="text/javascript" src="../files/js/datepicker.js"></script>
     <link href="../files/css/datepicker.css" rel="stylesheet" type="text/css" />
    <style>
       .forumdiv{
			width:100%;
			background-color:#FFF;
			padding:7px;
			border-radius:2px;
			margin-top:9px;
			border:1px #CCC solid;
		}
		.forumdivPost{
			color:#000;
			font-size:16px;
		}
		.forumdate{
			font-size:12px;
		}
		.frposimgpara{
			text-align:center;
		}
		.frposimg{
			width:50%;
			height: auto;
			width: auto;
			max-width: 100%;
			max-height: 260px;
		}
    </style>
  </head>

  <body>

    <div id="wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="../family9naijaAdmin"> Admin</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
		  <li><a href="logout_two"><i class="fa fa-power-off"></i> Log Out</a></li>
			 
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
	  