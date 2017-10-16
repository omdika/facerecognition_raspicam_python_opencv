<!DOCTYPE html>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="<?php echo base_url(); ?>assets/css/home/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/home/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/home/css/bootstrap-table.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/home/css/weather-icons" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/home/css/style.css" rel="stylesheet">
       
        <title>
            Settopbox247
        </title><!--Icons-->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/css/login/box_fvicon.png" type="image/x-icon">
        <script src="<?php echo base_url(); ?>assets/css/home/js/lumino.glyphs.js"></script>
        
    </head>
    <body>
        <!-- header -->
     <div class="wrapper">  
        <header>
            <nav class="navbar navbar-default navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="index.html"><img src="<?php echo base_url(); ?>assets/css/home/images/logo.png" style="max-width:233px;"></a>
                    </div>

                    <div aria-expanded="false" class="navbar-collapse collapse" id="navbar"
                    style="height: 1px;">
                        <ul class="nav navbar-nav navbar-right menu-right">
                          <li class=""><a title="Log out" href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-sign-out"></i> </a></li>
                            
                          </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- =============================================== -->

        <div class="container-fluid" style="margin-top:30px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <h3 style="rgb(72, 72, 70); font-weight: bold; font-size: 25px;">
                            <!-- Dashboard -->
                        </h3>
                    </div>
                </div>
            </div>
        </div>

<!-- ======================panel cek========================= -->

        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-6">
			  <a id="user">
            <div class="weather-3 pn centered">
              <!--<a href="<?php //echo base_url('admin/users'); ?>">-->
             <!-- <a id="user">-->
                 <i class="fa fa-child"></i>
                <div class="info">
                    <div class="row">
                        <h3 class="centered">Manage User</h3>
                    </div>
                </div>
                <!--</a>-->
            </div>
            </a>
          </div>
             <div class="col-xs-12 col-md-6 col-lg-6" onclick="ganti();" >
                <div class="weather-3 pn centered" id="sim" >
                  <!--<a href="#SIMULATION" id="sim">
                    <i class="fa fa-toggle-off"></i> <i class="fa fa fa-toggle-on"></i>
                    <div class="info" id="1">
                        <div class="row">
                          <h3  class="centered" onclick="active();" >Activate</h3>
                        </div>
                    </div>
                    </a>-->
                </div>
              </div>
          </div>
   
                      
</div>
     
        <div class="footer">

            <div class="pull-right hidden-xs-md">
                 <b>Version</b> 0.0.0 
            </div>
                <strong>2017 &copy; SettopBox. Brought to you by <a href="http://solusi247.com">Solusi 247</a></strong>
        </div>
        
        <!-- =============================================== -->
<!--<i class="fa fa fa-toggle-on"></i>-->

        <script src="<?php echo base_url(); ?>assets/css/home/js/jquery-latest.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/css/home/js/bootstrap.min.js" type="text/javascript"></script> 
      
    </body>
</html>
<script>
  
  $(document).ready(function() {
		cek();
	});
  
  /*function active(){
    $('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa fa-toggle-on"></i><div class="info" id="1"><div class="row">                          <h3  class="centered">Deactivate</h3></div></div></a>');
    $('#user').attr("href","<?php //echo base_url('admin/users'); ?>");
  }
  
  function deactive(){
    $('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa-toggle-off"></i><div class="info" id="1"><div class="row">                          <h3  class="centered" onclick="active();" >Activate</h3></div></div></a>');
    
  }*/
  
  function cek(){
      $.ajax({
          type:"GET",
          url: "<?php echo base_url() ?>home/aktif",
          dataType: 'json',
          success: function(response) {
           // alert(response);
          if (response == "activated"){
            console.log(response);
            /*$('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa fa-toggle-on"></i><div class="info" id="1"><div class="row">                          <h3  class="centered" onclick="ganti();">Deactivate</h3></div></div></a>');*/
            $('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa fa-toggle-on"></i><div class="info" id="1"><div class="row">                          <h3  class="centered">Deactivate</h3></div></div></a>');
          } else {
            $('#user').attr("href","<?php echo base_url('admin/users'); ?>");
            /*$('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa-toggle-off"></i><div class="info" id="1"><div class="row">                          <h3  class="centered" onclick="ganti();" >Activate</h3></div></div></a>');*/
            $('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa-toggle-off"></i><div class="info" id="1"><div class="row">                          <h3  class="centered">Activate</h3></div></div></a>');
            
          }
         
        }
      });
  }
  
  function ganti() {
    $.ajax({
          type:"GET",
          url: "<?php echo base_url() ?>home/tukar",
          dataType: 'json',
          success: function(response) {
           // alert(response);
          if (response == "activated"){
            console.log(response);
            /*$('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa fa-toggle-on"></i><div class="info" id="1"><div class="row">                          <h3  class="centered" onclick="ganti();">Deactivate</h3></div></div></a>');*/
            $('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa fa-toggle-on"></i><div class="info" id="1"><div class="row">                          <h3  class="centered">Deactivate</h3></div></div></a>');
            $('#user').removeAttr("href");
          } else {
            $('#user').attr("href","<?php echo base_url('admin/users'); ?>");
            /*$('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa-toggle-off"></i><div class="info" id="1"><div class="row">                          <h3  class="centered" onclick="ganti();">Activate</h3></div></div></a>');*/
            $('#sim').html('<a href="#SIMULATION" id="sim"><i class="fa fa-toggle-off"></i><div class="info" id="1"><div class="row">                          <h3  class="centered">Activate</h3></div></div></a>');
            
          }
         
        }
      });
  }
  
  

</script>
