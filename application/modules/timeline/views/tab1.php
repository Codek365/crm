<div class="tab-pane active" id="tab_1_1">
    <div class="scroller" style="height: 467px;" data-always-visible="1" data-rail-visible="0" data-handle-color="#D7DCE2">
        <ul class="feeds time-line" id="time-line">
           <!--  <?php
            if(isset($schedule) && !empty($schedule)){
                foreach($schedule as  $value){
                $to_time = $value->call_time;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $current = date('Y-m-d H:i:s');
                $date = new DateTime($current);
                $date->add(new DateInterval('PT10M'));
                $current =  $date->format('Y-m-d H:i:s');
            ?>
            <li>
                <div class="col1 " style="background: #dee !important">
                    <div class="cont" style="width: 100%;">
                        <div class="cont-col1" >
                            <div class="label label-sm <?php if($to_time <= $current){ echo 'label-to'; }else{ echo 'label-success';}?>">
                                <i class="fa fa-bell-o"></i>
                                </div>
                            </div>
                            <div class="cont-col2">
                                <div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo base_url();?>schedule/edit/<?php echo $value->id;?>" ><?php echo $value->full_name_tour;?></a></div>
                                <div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success"><?php echo date('d/m/Y H:i:s',strtotime($to_time)); ?></span></div>
                            </div>
                        </div>
                    </div>
            </li>
            <?php } } else{ echo " Chưa có dữ liệu !"; }?> -->
        </ul>
    </div>
</div>
<script type="text/javascript">
    var Jschedule = []; 
    getNewSchedule () 
    function getNewSchedule () {
        $.ajax({
            url: '<?=base_url()?>timeline/getnewschedule',
            type: 'POST',
            dataType: 'JSON',
            // data: {param1: 'value1'},
        })       
        .always(function(data) {
            console.log("schedule :" + data);            
            var html = '';
            $("#time-line").hide('fast');
            $("#time-line").show('fast');
            $.each(data, function(index, val) {
                // html += ' <div class="col1 " style="background: #dee !important"><div class="cont" style="width: 100%;"><div class="cont-col1" ><div class="label label-sm "><i class="fa fa-bell-o"></i></div></div><div class="cont-col2"><div class="desc" style="padding-bottom: 0px; padding-top: 0px">';
                // html += '<a href="<?php echo base_url();?>schedule/edit/'+ val.id + '" >';
                // html += val.full_name_tour + '</a></div><div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success"></span></div></div></div></div>';
                html += '<li><div class="col1 "><div class="cont"><div class="cont-col1"><div class="label label-sm label-success"><i class="fa fa-bell-o"></i></div></div><div class="cont-col2"><div class="desc">';
                   // html += val.name;
                   html += '<span class="label label-sm ">';
                   html += '<a href="<?php echo base_url();?>schedule/edit/'+ val.id + '" >';
                   html += val.full_name_tour + '</a>';
                   html += '<i class="fa fa-share"></i></span></div></div></div></div><div class="col2"><div class="date font-red-pink"><strong>';
                   html += val.call_time;
                   html += '</strong></div></div></li>';
                $("#time-line").html(html);

            });
        });
        


    }
    //set refesh time for new schedule
    setInterval(function(){getNewSchedule ()}, 10000);
</script>