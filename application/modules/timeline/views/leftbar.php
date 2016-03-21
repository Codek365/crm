<script type="text/javascript">
    function toSeconds(time_str) {
        // Extract hours, minutes and seconds
        var parts = time_str.split(':');
        // compute  and return total seconds
        return parts[0] * 3600 + // an hour has 3600 seconds
            parts[1] * 60 + // a minute has 60 seconds
            +
                parts[2]; // seconds
    }
    $(document).ready(function(){
        var user_id = <?php echo $this->session->userdata('user_id') ?>;
        var counter = 30;
        setInterval(function () {
            if(counter == 30){
                counter = 0;
                $.ajax({
                    url: "<?=base_url()?>schedule/getSchedule/",
                    type: 'POST',
                    datatype: 'JSON',
                    success: function(data) {
                        var getdata = $.parseJSON(data);
                        $('.time-line').empty();
                        $('#list_timeline').empty();
                        Object.keys(getdata).forEach(function(key) {
                            var dateObj = new Date();
                            var month = dateObj.getUTCMonth() + 1; //months from 1-12
                            var day = dateObj.getUTCDate();
                            if(parseInt(day) < 10){
                                day = '0'+day;
                            }
                            if(parseInt(month) < 10){
                                month = '0'+month;
                            }
                            var year = dateObj.getUTCFullYear();
                            var getdate = day + "/" + month + "/" + year;

                            if(getdata[key]["full_tour_name"]){
                                var time_line = getdata[key]["time_line"];
                                var a = (getdata[key][time_line]).split(" ");
                                var waning = "00:15:00";
                                var difference_waning = Math.abs(toSeconds(a[1]) - toSeconds(waning));
                                var danger = "00:10:00";
                                var difference_danger = Math.abs(toSeconds(a[1]) - toSeconds(danger));                            
                                var resultid1 = [
                                    Math.floor(difference_waning / 3600),
                                    Math.floor((difference_waning % 3600) / 60),
                                    difference_waning % 60
                                ];
                                var resultid2 = [
                                    Math.floor(difference_danger / 3600),
                                    Math.floor((difference_danger % 3600) / 60),
                                    difference_danger % 60
                                ];
                                resultid1 = resultid1.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');

                                resultid2 = resultid2.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');

                                var d = new Date(); // for now
                                var current_time = [d.getHours(),d.getMinutes(),d.getSeconds()];
                                current_time = current_time.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');

                                ////////////////////////////////////
                                var str_date = a[0].split("-");
                                var date_show = str_date[2]+'/'+str_date[1]+'/'+str_date[0];
                                var html = '<li>';
                                html += '<div class="col1">';
                                html += '<div class="cont">';
                                html += '<div class="cont-col1">';
                                if((getdate > date_show) || (getdate == date_show && resultid2 <= current_time)) {
                                    html += '<div class="label label-sm label-to">';
                                }else if((getdate > date_show) || (getdate == date_show && resultid1 <= current_time)){
                                    html += '<div class="label label-sm label-warning">';
                                }else{
                                    html += '<div class="label label-sm label-success">';
                                }
                                html += '<i class="fa fa-bell-o"></i>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="cont-col2" style="width: 150%;">';
                                html += '<div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo url?>schedule/description/'+getdata[key]["id"]+'">'+getdata[key]["full_tour_name"]+'</a></div>';
                                html += '<div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success">'+ date_show +' '+a[1]+'</span></div>';
                                html += '</div>';

                                html += '</div>';
                                html += '</div>';
                                html += '</li>';
                                $('.time-line').append(html);
                            }
                            if (user_id == getdata[key]["user_process"] && getdata[key]["user_process"] !=0) {
                                var time_line = getdata[key]["time_line"];
                                var a = (getdata[key][time_line]).split(" ");
                                var waning = "00:15:00";
                                var difference_waning = Math.abs(toSeconds(a[1]) - toSeconds(waning));
                                var danger = "00:10:00";
                                var difference_danger = Math.abs(toSeconds(a[1]) - toSeconds(danger));
                                var resultid1 = [
                                    Math.floor(difference_waning / 3600),
                                    Math.floor((difference_waning % 3600) / 60),
                                    difference_waning % 60
                                ];
                                var resultid2 = [
                                    Math.floor(difference_danger / 3600),
                                    Math.floor((difference_danger % 3600) / 60),
                                    difference_danger % 60
                                ];
                                resultid1 = resultid1.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');

                                resultid2 = resultid2.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');

                                var d = new Date(); // for now
                                var current_time = [d.getHours(),d.getMinutes(),d.getSeconds()];
                                current_time = current_time.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');

                                var str_date = a[0].split("-");
                                var date_show = str_date[2]+'/'+str_date[1]+'/'+str_date[0];

                                
                                if((getdate > date_show) || (getdate == date_show && resultid2 <= current_time)) {

                                    var dem = 0;
                                    var namechange = "";
                                    var idchange = "";
                                    $.ajax({
                                        url: "<?php echo url?>schedule/getCountById/"+getdata[key]["id"]+"",
                                        type: 'POST',
                                        datatype: 'JSON',
                                        success: function(data) {
                                            var getrep = $.parseJSON(data);
                                            var html = '<li>';
                                            html += '<div class="col1">';
                                            html += '<div class="cont">';
                                            html += '<div class="cont-col1">';
                                            html += '<div class="label label-sm label-to">';
                                            html += '<i class="fa fa-bell-o"></i>';
                                            html += '</div>';
                                            html += '</div>';
                                            html += '<div class="cont-col2" style="width: 150%;">';
                                            html += '<div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo url?>schedule/description/'+getdata[key]["id"]+'">'+getdata[key]["full_tour_name"]+'</a></div>';
                                            html += '<div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success"> Da chuyen qua tai khoan:'+getrep["name"]+'</span></div>';
                                            html += '</div>';
                                            html += '</div>';
                                            html += '</div>';
                                            html += '</li>';
                                            $('#list_timeline').append(html);
                                        }
                                    });
                                    
                                }else if((getdate > date_show) || (getdate == date_show && resultid1 <= current_time)) {
                                    var html = '<li>';
                                    html += '<div class="col1">';
                                    html += '<div class="cont">';
                                    html += '<div class="cont-col1">';
                                    html += '<div class="label label-sm label-to  label-warning">';
                                    html += '<i class="fa fa-bell-o"></i>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '<div class="cont-col2" style="width: 150%;">';
                                    html += '<div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo url?>schedule/description/'+getdata[key]["id"]+'">'+getdata[key]["full_tour_name"]+'</a></div>';
                                    html += '<div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success">'+ date_show +' '+a[1]+'</span></div>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</li>';
                                    $('#list_timeline').append(html);
                                }else{
                                    var html = '<li>';
                                    html += '<div class="col1">';
                                    html += '<div class="cont">';
                                    html += '<div class="cont-col1">';
                                    html += '<div class="label llabel-sm label-success">';
                                    html += '<i class="fa fa-bell-o"></i>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '<div class="cont-col2" style="width: 150%;">';
                                    html += '<div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo url?>schedule/description/'+getdata[key]["id"]+'">'+getdata[key]["full_tour_name"]+'</a></div>';
                                    html += '<div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success">'+ date_show +' '+a[1]+'</span></div>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</div>';
                                    html += '</li>';
                                    $('#list_timeline').append(html);
                                }
                            // }if (user_id == getdata[key]["user_init"] && getdata[key]["user_process"]== 0){// ) {
                            //     var time_line = getdata[key]["time_line"];
                            //     var a = (getdata[key][time_line]).split(" ");
                            //     var waning = "00:15:00";
                            //     var difference_waning = Math.abs(toSeconds(a[1]) - toSeconds(waning));
                            //     var danger = "00:10:00";
                            //     var difference_danger = Math.abs(toSeconds(a[1]) - toSeconds(danger));
                            //     var resultid1 = [
                            //         Math.floor(difference_waning / 3600),
                            //         Math.floor((difference_waning % 3600) / 60),
                            //         difference_waning % 60
                            //     ];
                            //     var resultid2 = [
                            //         Math.floor(difference_danger / 3600),
                            //         Math.floor((difference_danger % 3600) / 60),
                            //         difference_danger % 60
                            //     ];
                            //     resultid1 = resultid1.map(function(v) {
                            //         return v < 10 ? '0' + v : v;
                            //     }).join(':');

                            //     resultid2 = resultid2.map(function(v) {
                            //         return v < 10 ? '0' + v : v;
                            //     }).join(':');

                            //     var d = new Date(); // for now
                            //     var current_time = [d.getHours(),d.getMinutes(),d.getSeconds()];
                            //     current_time = current_time.map(function(v) {
                            //         return v < 10 ? '0' + v : v;
                            //     }).join(':');

                            //     var str_date = a[0].split("-");
                            //     var date_show = str_date[2]+'/'+str_date[1]+'/'+str_date[0];

                                
                            //     if(getdate >= date_show && resultid2 <= current_time) {
                            //         var dem = 0;
                            //         var namechange = "";
                            //         var idchange = "";
                            //         $.ajax({
                            //             url: "<?php echo url?>schedule/getCountById/"+getdata[key]["id"]+"",
                            //             type: 'POST',
                            //             datatype: 'JSON',
                            //             success: function(data) {
                            //                 var getrep = $.parseJSON(data);
                            //                 var html = '<li>';
                            //                 html += '<div class="col1">';
                            //                 html += '<div class="cont">';
                            //                 html += '<div class="cont-col1">';
                            //                 html += '<div class="label label-sm label-to">';
                            //                 html += '<i class="fa fa-bell-o"></i>';
                            //                 html += '</div>';
                            //                 html += '</div>';
                            //                 html += '<div class="cont-col2" style="width: 150%;">';
                            //                 html += '<div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo url?>schedule/description/'+getdata[key]["id"]+'">'+getdata[key]["full_tour_name"]+'</a></div>';
                            //                 html += '<div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success"> Da chuyen qua tai khoan:'+getrep["name"]+'</span></div>';
                            //                 html += '</div>';
                            //                 html += '</div>';
                            //                 html += '</div>';
                            //                 html += '</li>';
                            //                 $('#list_timeline').append(html);
                            //             }
                            //         });
                                    
                            //     }else if(getdate >= date_show && resultid1 <= current_time) {
                            //         var html = '<li>';
                            //         html += '<div class="col1">';
                            //         html += '<div class="cont">';
                            //         html += '<div class="cont-col1">';
                            //         html += '<div class="label label-sm label-to  label-warning">';
                            //         html += '<i class="fa fa-bell-o"></i>';
                            //         html += '</div>';
                            //         html += '</div>';
                            //         html += '<div class="cont-col2" style="width: 150%;">';
                            //         html += '<div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo url?>schedule/description/'+getdata[key]["id"]+'">'+getdata[key]["full_tour_name"]+'</a></div>';
                            //         html += '<div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success">'+ date_show +' '+a[1]+'</span></div>';
                            //         html += '</div>';
                            //         html += '</div>';
                            //         html += '</div>';
                            //         html += '</li>';
                            //         $('#list_timeline').append(html);
                            //     }else{
                            //         var html = '<li>';
                            //         html += '<div class="col1">';
                            //         html += '<div class="cont">';
                            //         html += '<div class="cont-col1">';
                            //         html += '<div class="label llabel-sm label-success">';
                            //         html += '<i class="fa fa-bell-o"></i>';
                            //         html += '</div>';
                            //         html += '</div>';
                            //         html += '<div class="cont-col2" style="width: 150%;">';
                            //         html += '<div class="desc" style="padding-bottom: 0px; padding-top: 0px"><a href="<?php echo url?>schedule/description/'+getdata[key]["id"]+'">'+getdata[key]["full_tour_name"]+'</a></div>';
                            //         html += '<div class="date" style="margin-left: 40px;"><span style="font-size: 11px" class="label label-sm label-success">'+ date_show +' '+a[1]+'</span></div>';
                            //         html += '</div>';
                            //         html += '</div>';
                            //         html += '</div>';
                            //         html += '</li>';
                            //         $('#list_timeline').append(html);
                            //     }
                            }
                        });
                    }
                });
            }
            ++counter;
        }, 1000);
    });
</script>
<!-- BEGIN PORTLET-->
<div class="portlet light fixedt" >
	<div class="portlet-title tabbable-line">
		<div class="caption caption-md">
			<i class="icon-globe theme-font hide"></i>
			<span class="caption-subject theme-font bold uppercase">Feeds</span>
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#tab_1_1" data-toggle="tab">
				System </a>
			</li>
			<li>
				<a href="#tab_1_2" data-toggle="tab">
				Activities </a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<!--BEGIN TABS-->
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1_1">
				<div class="scroller" style="height: 437px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
					<ul class="feeds">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 4 pending tasks. <span class="label label-sm label-info">
												Take action <i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">
									Just now
								</div>
							</div>
						</li>

					</ul>
				</div>
			</div>
			<div class="tab-pane" id="tab_1_2">
				<div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
					<ul class="feeds">
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-bell-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												New user registered
											</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">
										Just now
									</div>
								</div>
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!--END TABS-->
	</div>
</div>
<!-- END PORTLET-->