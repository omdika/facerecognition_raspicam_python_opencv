<div id="content">
  <div class="container-fluid">
     <div id="main-content">
       
       <div class="row-fluid">
          <div id="breadcrumb"> <a href="<?php echo base_url();?>home/index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Users List</a> </div>
       </div>
       
       <div class="row-fluid">
         <div class="span12" style="padding: 5px 0px 10px 0px;">
         <a class="btn btn-success pull-right" href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add">Add User <span class="plus-link"><i class=" icon-plus"></i></span></a>  
         </div>
         
       </div>
       
       <?php echo $this->session->flashdata('adduser');?>
       
<div class="row-fluid">
<div class="span12">
<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Users List</h5>
  </div>
    
    <div style="overflow:auto">
    <table id="dataUser" class="table table-bordered table-striped data-table">
        <thead>
          <tr>
            <th>No</th>              
            <th>Name</th>
            <th>Gender</th>                    
            <th>Age</th>                            
            <th>Occupation</th>                        
            <th>Country</th> 
            <th>Region</th>
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
            <?php $nomor=1; foreach($users as $row) {
              echo '<td>'.$nomor.'</td>';
              echo '<td>'.$row['name'].'</td>';
              echo '<td>'.$row['gender'].'</td>';
              echo '<td>'.$row['age'].'</td>';
              echo '<td>'.$row['occupation'].'</td>';
              echo '<td>'.$row['country'].'</td>';
              echo '<td>'.$row['region'].'</td>';
              echo '<td style="text-align:center">
                <a href="'.site_url("admin").'/users/update/'.$row['id_users'].'" title="View & Edit User" class="tip-bottom"><i class="icon-edit"></i> </a>

                <a onclick = "hapus(\''.$row['id_users'].'\', \''.$row['name'].'\');" title="Delete Group" class="tip-bottom"><i class="icon-remove"></i> </a>
              </td>';
              echo '</tr>';
              $nomor++;
            } ?>      
          </tbody>
          
      </table>
    </div>
   </div>
  </div>

</div>
       
     </div>
  </div>
</div>

<script>
  function hapus(id, nama){
	 
  var r = confirm("Are you sure you want to delete this Data?")
    if(r == true)
    {
        $.ajax({
          type:"POST",
          url: "<?php echo base_url() ?>users_admin/hapus",
          dataType: 'json',
          data: {'id' : id, 'name': nama},
          success(res){
           //$(id).hide();
            alert("deleted!!");
            location.reload(); 
          }
        });
  }
}
  
  </script>
