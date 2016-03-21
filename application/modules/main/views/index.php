<script type="text/javascript">
setInterval(function()
  {
    getOrderList ();
  }, 9000);
  </script>
<?php $this->load->view('main/widgettop'); ?>
<div class="row">
   <div class="col-md-6 col-sm-6">
      <?php $this->load->view('main/widgetbodyL'); ?>
   </div>
   <div class="col-md-6 col-sm-6">
     <?php $this->load->view('main/widgetbodyR'); ?>
   </div>
</div>