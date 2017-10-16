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
<script src="<?php echo base_url();?>/assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>/assets/js/jquery.ui.custom.js"></script> 
</head>
<body>
  
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li><a href="<?php echo base_url();?>/admin/users"><img style="height: 22px;" src="<?php echo base_url();?>assets/css/login/digi_box.png" /></a></li>
</div>
  
<div id="content">
  <div class="container-fluid">
     <div id="main-content">
       
        <div class="row-fluid">
            <div class="span6">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>User Register</h5>
                </div>
                <div class="widget-content nopadding">
                  <form action="<?php echo base_url();?>admin/create_member" method="post" class="form-horizontal">
                    <div class="control-group">
                      <label class="control-label">First Name </label>
                      <div class="controls">
                        <input class="span11" placeholder="First name" name="first_name" type="text" required>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Last Name</label>
                      <div class="controls">
                        <input class="span11" placeholder="Last name" name="last_name" type="text" required>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Email</label>
                      <div class="controls">
                        <input class="span11" placeholder="Email" name="email_address" onkeyup="email(this);" type="text" required>
                      </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label">Username</label>
                      <div class="controls">
                        <input class="span11" placeholder="Username" name="username" type="password" required>
                      </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label">Password</label>
                      <div class="controls">
                        <input class="span11" placeholder="Enter Password" name="password" type="password" required>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Password confirm</label>
                      <div class="controls">
                        <input class="span11" placeholder="Password confirm" name="password2" type="text" required>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-success">Register</button>
                      <a href="<?php echo base_url();?>admin/login" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
       
      </div>
  </div>
</div>
<!--<body>
  <div class="login-page">
    <div class="form">
<?php

//echo validation_errors();
?>  	
<div class="container login">
<?php
/*$attributes = array('class' => 'form-signin');   
echo form_open('admin/create_member', $attributes);
echo '<h2 class="form-signin-heading">Create an account</h2>';
echo form_input('first_name', set_value('first_name'), 'placeholder="First name"');
echo form_input('last_name', set_value('last_name'), 'placeholder="Last name"');
echo form_input('email_address', set_value('email_address'), 'placeholder="Email"');

echo form_input('username', set_value('username'), 'placeholder="Username"');
echo form_password('password', '', 'placeholder="Password"');
echo form_password('password2', '', 'placeholder="Password confirm"');

echo form_submit('submit', 'submit', 'class="btn btn-large btn-primary"');
echo form_close();*/
?>
</div>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>-->
<!--<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; SettopBox. Brought to you by <a href="http://solusi247.com">Solusi 247</a> </div>
</div>-->

<div class="footer">
    <div class="pull-right hidden-xs-md">
         <b>Version</b> 0.0.0 
    </div>
  <strong>&nbsp;&nbsp; 2017 &copy; SettopBox. Brought to you by <a href="http://solusi247.com">Solusi 247</a></strong>
</div>

<!--end-Footer-part-->


</body>   
</html>