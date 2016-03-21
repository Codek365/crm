<script type="text/javascript">
   getOrderList ();
   function getOrderList () {
      $.ajax({
         url: '<?=base_url()?>orders/getorderlist',
         type: 'POST',
         dataType: 'JSON',
         // data: {ation: 'getlist'},
      })
      
      .always(function(data) {
         // console.log("Orderlist :"+data);            
          var html = '';
         $.each(data, function(index,val) {
               html += '<li><div class="col1"><div class="cont"><div class="cont-col1"><div class="label label-sm label-success"><i class="fa fa-bell-o"></i></div></div><div class="cont-col2"><div class="desc">';
               html += val.name;
               html += '<span class="label label-sm label-info">';
               html += val.model;
               html += '<i class="fa fa-share"></i></span></div></div></div></div><div class="col2"><div class="date">';
               html += val.order_id;
               html += '</div></div></li>';
                    
         });            
         $("#feeds").html(html);   
      });
      
   }   
</script>

<div class="portlet light bordered">
   <div class="portlet-title tabbable-line">
      <div class="caption">
         <i class="icon-globe font-green-sharp fa-spin fa-5x"></i>
         <span class="caption-subject font-green-sharp bold uppercase">DON HANG MOI</span>
      </div>      
   </div>   
   <div class="portlet-body">
      <!--BEGIN TABS-->
      <div class="tab-content">
         <div class="tab-pane active" id="tab_1_1">
            <div class="scroller" style="height: 296px;" data-always-visible="1" data-rail-visible="0" data-handle-color="#FF0000">
               <div >
                  <ul id="feeds" class="feeds" ></ul>
               </div>               
            </div>
         </div>         
      </div>
      <!--END TABS-->
   </div>
</div>
