<!DOCTYPE html>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title> Settopbox247 </title>
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/css/login/box_fvicon.png" type="image/x-icon">
        <link href="<?php echo base_url(); ?>assets/css/login/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/login/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/login/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/login/login.css" rel="stylesheet">
        <script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script> 
        <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script> 
        </script>
    </head>
<body>
  
	<div class="page-content">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
			    <div class="login-container">
			         <div class="login-box">
			         	<div class="login-head">
			         		<img src="<?php echo base_url(); ?>assets/css/login/digi_box.png" />
			         		<div class="login-title"><!-- Sign in to start your session --></div>
			         	</div>
			         	<div class="login-body">
			         		<form method="post" action="<?php echo base_url(); ?>admin/login/validate_credentials">
			         			<div class="baciro-input-line">
			         				<input class="baciro-input" type="text" name="user_name" id="user_name" placeholder="Username" />
			         			</div>
			         			<div class="baciro-input-line">
			         				<input class="baciro-input" type="password" name="password" id="password" placeholder="Password" />
			         			</div>
			         			<div class="baciro-input-line">
			         				<button type="submit" class="baciro-button-alert">Sign in</button>
			         			</div>
			         			<div class="baciro-input-line">
			         				<div class="rememberme"><a href="<?php echo base_url();?>admin/signup">Sign Up!</a></div>
			         			</div>
			         			<!--<div class="baciro-input-line">
			         				<button type="button" class="baciro-button-grey" ><a href="admin/signup">Sign Up</a></button>
                                </div>-->
			         		</form>
			         	</div>
			         </div>       
			    </div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

</body>
<html>
