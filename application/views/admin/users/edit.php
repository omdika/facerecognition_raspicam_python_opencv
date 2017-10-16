<?php $list_negara = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombi", "Comoros", "Congo (Brazzaville)", "Congo", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor (Timor Timur)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"); ?> 
     <?php
        $gender = $users[0]['gender'];
        $country = $users[0]['country'];
      ?>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> new product created with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>

<div id="content">
  <div class="container-fluid">
     <div id="main-content">
      
       <div class="row-fluid">
          <div id="breadcrumb"> <a href="<?php echo base_url();?>home/index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?php echo base_url('admin/users'); ?>"> Users List</a> <a href="#">User Edit</a> </div>
       </div>
       
       <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>Edit User <?php echo $users[0]['name']; ?></h5>
          </div>

            <div style="overflow:auto">

              <div class="box-body">
                  <form role="form" class="registration-form" action="" method="post">
                    <fieldset id="step1">
                        <div class="form-top">
                            <div class="form-top-left">
                                <p style="margin-top: 20px;font-size: 20px"><i class="fa fa-user-o" aria-hidden="true"></i> User's Data </p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6">
                                    <input id="nama" type="text" name="name" required="required" class="form-control" placeholder="Enter Name" value="<?php echo $users[0]['name']; ?>" >
                                </div>
                                <div class="form-group">
                                <select type="text" name="gender" required="required" class="form-control" placeholder="Enter Gender" value="<?php echo $users[0]['gender']; ?>">
                                  <option val="Male" <?php if($gender==='Male') echo 'selected="selected"';?>>Male</option>
                                  <option val="Female" <?php if($gender==='Female') echo 'selected="selected"';?>>Female</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                  <input type="text" name="age" id="text1" onkeypress="return IsNumeric(event);" value="<?php echo $users[0]['age'];?>" ondrop="return false;" onpaste="return false;" />
                                <span id="error" style="color: Red; display: none">* Input number only</span>
                                </div>
                                <div class="form-group col-md-6 col-sm-6">
                                    <input type="text" name="occupation" required="required" class="form-control" placeholder="Enter Occupation" value="<?php echo $users[0]['occupation']; ?>">
                                </div>
                                <select type="text" name="country" required="required" class="form-control" placeholder="Enter Country" value="<?php echo $users[0]['country']; ?>"> 
                                 <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                <?php for($i=0; $i<count($list_negara); $i++){ ?>
                                <option value="<?= $list_negara[$i]?>"><?= $list_negara[$i]?></option>
                                 <?php }?> 
                                </select> 
                                <div class="form-group col-md-6 col-sm-6">
                                    <input type="text" name="region" required="required" class="form-control" placeholder="Enter Region" value="<?php echo $users[0]['region']; ?>">
                                </div>
                                <button type="button" id="btNext" class="btn btn-primary btn-next" style="float: right;border-radius: 5px;">Next</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="step2">
                        <div class="form-top">
                            <div class="form-top-left">
                              <p style="margin-top: 20px;font-size: 20px"><i class="fa fa-camera" aria-hidden="true"></i> Train Face Recognizer</p>
                            </div>
                        </div>
                      <div class="form-bottom">
                        <div class="col-lg-6 pull-left" style="width: 50%">
                          <div class="panel-content">
                            <div class="panel-body">
                              <div> <!--src="http://192.168.2.189:8081/"-->
                                <iframe id="videoID" src="<?php echo $this->config->item('url_video');?>" scrolling="no" width="680" height="497" frameborder="0"></iframe>
                                <input id="cpt" class="btn btn-info" type="button" style="margin-left: 262px;margin-top: -8px;margin-bottom: 10px;border-radius: 5px;" onclick="capture();" value="Capture" />
                            </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6 pull-right" style="width: 50%">
                          <div class="widget-box1" style="margin-top: 5px;margin-left: 123px;width: -moz-fit-content;height: 477px;">
                            <div id="loader"></div>
                            <div class="panel-body" id="panel_show" >

                            </div>
                          </div>
                        </div>
                      </div>

                      <button id="submit" type="submit" class="btn btn-success" style="margin-right: 29px;margin-top: 10px;margin-bottom: 10px; float: right;">Submit</button>
                      <!--<a href="<?php //echo base_url('admin/users'); ?>" class="btn btn-warning" style="float: right;margin-top: 10px;margin-bottom: 10px;margin-left: 20px;border-radius: 5px;margin: 10px;">Cancel</a>-->
                      <input onclick="cancel();" class="btn btn-warning" style="float: right; margin-top: 10px;margin-bottom: 10px;margin-left: 20px;border-radius: 5px;margin: 10px;" value="Cancel" type="button" />
                      <button id="previouse" type="button" class="btn btn-primary btn-previous" style="float: right;margin-top: 10px;margin-bottom: 10px;border-radius: 5px;">Previous</button>

                  </fieldset>
                    </form>
                </div>
              
            </div>
           </div>
        </div>
      </div>
       
     </div>
  </div>

</div>

<script>
	$(document).ready(function() {
      $('#loader').hide();
        show_img();
		
	});
		
    function startUserMedia(stream) {
        video.src = window.URL.createObjectURL(stream);
      }

     var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
    }

    function hapus(file, id){
      var nama = $('#nama').val();
        $.ajax({
          type:"POST",
          url: "<?php echo base_url() ?>users_admin/delete",
          dataType: 'json',
          data: {'file' : "assets/py/att_faces/"+nama+"/"+file },
          success(res){
           $("#gbr_"+id).hide();
          }
      });
    }
  
  
  function cancel(){
    $('#loader').hide();
      $.ajax({
          type:"GET",
          url: "<?php echo base_url() ?>users_admin/kill",
          dataType: 'json',
          success: function(response) {
            
          if (response == "success"){
            //alert(response);
            console.log(response);
          } else {
            //alert(response);
            location.href = "<?php echo base_url('admin/users'); ?>";
          }
         
        }
      });
  }


    function capture(){
      var nama = $('#nama').val();
       $('#submit').attr('disabled', 'disabled');
       $('#previouse').attr('disabled', 'disabled');
       $('#cpt').attr('disabled', 'disabled');
       $('#panel_show').hide();
       $("#loader").show();
      $.ajax({
        type: "GET",   
        url: '<?php echo base_url() ?>users_admin/capture', 
        data: {'file':nama},
        success: function(response) {
          show_img();
          document.getElementById("panel_show").style.display = "block";
        }
      });
    }

    function show_img(){
      $("#loader").hide();
        var nama = $('#nama').val();
        $.ajax({
            type : 'GET',
            url	 : '<?php echo base_url() ?>users_admin/show',
            data : {'file':nama},
            success : function(response){
                //$("#loader").show();
                $('#panel_show').html(response);
                document.getElementById("panel_show").style.display = "block";
                $('#cpt').removeAttr('disabled');
                $('#submit').removeAttr('disabled');
                $('#previouse').removeAttr('disabled');
            }
        });
}
  
</script>
