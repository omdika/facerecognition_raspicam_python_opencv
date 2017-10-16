<!DOCTYPE html>
<html lang="en">
<head>
<title>Settopbox247</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/select2.css" />
<link href="<?php echo base_url();?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery.gritter.css" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/css/login/box_fvicon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/multi-select.css">
<link href="<?php echo base_url(); ?>assets/css/admin/step.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/home.css" rel="stylesheet" type="text/css">

<style type="text/css">
  .search-input{
    margin-bottom: 10px !important;
  }
  .wordcloud {
        min-height: 250px;
        margin: 7px;
        padding: 0;
        page-break-after: always;
        page-break-inside: avoid;
        width: 100%;
      }
  
  
	div.gallery {
	    margin: 5px;
	    border: 0px solid #ccc;
	    float: left;
	    width: 180px;

	}

	div.gallery:hover {
	    border: 0px solid #777;
	}

	div.gallery img {
	    width: 100%;
	    height: auto;
	}

	div.desc {
	    padding: 15px;
	    text-align: center;
	}

	.widget-box1 {
	    background-color: rgba(255, 255, 255, 0.1);
	    border: 1px solid #DEDEDE;
	    /*width: 402px;
	    height: 321px;*/
	    overflow-y: scroll;
	    
	   }

#loader {
  position: absolute;
  left: 77%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}
  
</style>
<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>/assets/js/jquery.ui.custom.js"></script> 
</head>
<body>
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li><a href="<?php echo base_url();?>/admin/users"><img style="height: 22px;" src="<?php echo base_url();?>assets/css/login/digi_box.png" /></a></li>
    
    <!--<li><a href="<?php //echo base_url();?>User"><i class="icon icon-user"></i> <span class="text">User</span></a></li>
    <li class=""><a title="" href="<?php //echo base_url();?>Group"><i class="icon icon-group"></i> <span class="text">Group</span></a></li>-->
  </ul>
  <ul class="nav" style="float: right;margin-right: 20px;">
    <li><a href="<?php echo base_url();?>home/index"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
    <li class=""><a title="Log out" href="<?php echo base_url(); ?>admin/logout"><i class="icon icon-signout"></i> </a></li>
  </ul>
</div>