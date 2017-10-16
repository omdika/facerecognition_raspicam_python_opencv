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


<script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/matrix.js"></script> 
<script src="<?php echo base_url();?>/assets/js/select2.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/js/video.js"></script>
<script src="<?php echo base_url(); ?>assets/js/step.js"></script>

<script type="text/javascript">
  
  $(document).ready(function(){
 /* $('#dataUser').DataTable();*/
    $.fn.dataTableExt.sErrMode = 'mute';
    $('.data-table').dataTable({
        bJQueryUI: true,
        sPaginationType: "full_numbers",
        sDom: '<""l>t<"F"fp>',
      });
    $.fn.dataTableExt.sErrMode = 'mute';
    $('.data-table-info').dataTable({
        bJQueryUI: true,
        sPaginationType: "full_numbers",
        sDom: '<""l>t<"F"fp>',
        bFilter : true,
        paging: true,
        info : true,
        ordering : false,
      });
  });
  
</script>

</body>
</html>
