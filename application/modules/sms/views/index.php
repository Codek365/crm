<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">   
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE BREADCRUMB -->
    
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Quản lý danh sách Tin Nhắn</span>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title="">
                        </a>
                        <!-- <a href="javascript:;" class="remove" data-original-title="" title="">
                        </a> -->
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="btn-group">
                            		<button id="btnfilter" class="btn green">
                                    Lọc <i class="fa fa-filter"></i>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button id="btnsetting" class="btn blue">
                                    Setting <i class="fa fa-wrench"></i>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button id="btnDelete" class="btn green red-sunglo">
                                    Xóa <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <?php if($mess) { ?>
                                <div class="alert alert-success btn-group" style="padding: 8px;margin-bottom: 0px;width: 82%;">
                                <?php echo $mess; ?>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-1">
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Công cụ <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                            In </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                            Lưu thành file PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                            Xuất file EXCEL </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table dữ liệu -->
                    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="dataTables_length" id="sample_1_length">
                                    <label>
                                        <select name="sample_1_length" id="table_row_length" aria-controls="sample_1" class="form-control input-xsmall input-inline">
                                        <?php if($per_page != 5 && $per_page != 15 && $per_page != 20 && $per_page < 5){ ?>
                                            <option value="<?php echo $per_page; ?>" selected="selected"><?php echo $per_page; ?></option>
                                        <?php } ?>
                                        <option value="5" <?php if($per_page == 5){echo "selected";} ?>>5</option>
                                        <?php if($per_page != 5 && $per_page != 15 && $per_page != 20 && $per_page > 5 && $per_page < 15 ){ ?>
                                            <option value="<?php echo $per_page; ?>" selected="selected"><?php echo $per_page; ?></option>
                                        <?php } ?>
                                        <option value="15" <?php if($per_page == 15){echo "selected";} ?>>15</option>
                                        <?php if($per_page != 5 && $per_page != 15 && $per_page != 20 && $per_page > 15 && $per_page < 20 ){ ?>
                                            <option value="<?php echo $per_page; ?>" selected="selected"><?php echo $per_page; ?></option>
                                        <?php } ?>
                                        <option value="20" <?php if($per_page == 20){echo "selected";} ?>>20</option>
                                        <?php if($per_page != 5 && $per_page != 15 && $per_page != 20 && $per_page > 20){ ?>
                                            <option value="<?php echo $per_page; ?>" selected="selected"><?php echo $per_page; ?></option>
                                        <?php } ?>
                                        <?php if($per_page != 5 && $per_page != 15 && $per_page != 20 && $per_page == $total_rows ){ ?>
                                            <option value="<?php echo $per_page; ?>" selected="selected">All</option>
                                        <?php } ?>
                                        </select>
                                    records
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div id="sample_1_filter" class="dataTables_filter">
                                <label>My search: <input type="search" id="search" class="form-control input-inline" placeholder="" aria-controls="sample_1">
                                </label>
                            </div>
                        </div>
                    </div>
                    <form id="form" action="<?php echo base_url(); ?>sms/delete" method="post">
                    <div id="table">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info">
                            <thead>
                                <tr role="row">
                                    <th>
                                        <input type="checkbox" name="case[]" id="selectall" />
                                    </th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Nội Dung Tin Nhắn</th>
                                    <th>Thời Gian Gửi Tin</th>
                                    <th>Thời gian xem</th>
                                    <th>Số Lần Xem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="filter">
						            <td></td>
						            <td><input type="text" name="filter_namekh" value="<?php if(isset($filter['namekh'])){echo $filter['namekh'];} ?>" /></td>
						            <td><input type="text" name="filter_contentsms" value="<?php if(isset($filter['contentsms'])){echo $filter['contentsms'];} ?>" style="width:100%;" /></td></td>
						            <td><input type="text" value="<?php if(isset($filter['sendtime'])){echo $filter['sendtime'];} ?>" id="dp1" name="filter_sendtime" style="width:100%;" /></td>
						            <td><input type="text" value="<?php if(isset($filter['viewtime'])){echo $filter['viewtime'];} ?>" id="dp2" name="filter_viewtime" style="width:100%;" /></td>
						            <td><input type="text" value="<?php if(isset($filter['click'])){echo $filter['click'];} ?>" name="filter_click" style="width:100%;" /></td>
					            </tr>
                            <?php if($list) {
                                foreach ($list as $key => $value) { ?>
                                <tr class="gradeX <?php if($key%2==0){echo 'odd active';}else{echo 'even active';} ?>" role="row">
                                    <td>
                                        <input type="checkbox" id="check"  name="case[]" value="<?php echo $value['smsid']; ?>">
                                    </td>
                                    <td><?php echo $value['namekh']; ?></td>
                                    <td><?php  echo $value['contentsms']; ?>
                                    </td>
                                    <td><?php echo date("d/m/Y-h:i", strtotime($value['sendtime'])); ?>
                                    </td>
                                    <td><?php echo $value['clicktime']; ?></td>
                                    <td><?php echo $value['view']; ?></td>
                                </tr>
                                <?php }}else{?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Chưa Có Dữ Liệu</td>
                                </tr>
                                   <?php  } ?>  
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?php if(isset($page)){echo $page;} ?> to <?php if(isset($per_page_row)){echo $per_page_row;} ?> of <?php if(isset($total_rows)){echo $total_rows;} ?> entries
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
                                <ul class="pagination" style="visibility: visible;float:right">
                                    <?php echo $links; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    $('#selectall').on('click',function(){
        if($('div#uniform-selectall > span').attr("class") != "checked"){
            $('div#uniform-check > span').addClass("checked");
            $('div#uniform-check > span > input').attr("checked","checked");
        }else{
            $('div#uniform-check > span').removeClass("checked");
            $('div#uniform-check > span > input').removeAttr("checked");
        }
    });
    $('#btnDelete').on('click',function(){
        $('#form').submit();
    });
    $('#btnsetting').on('click',function(){
        location = '<?php echo base_url(); ?>sms/edit';;
    });
    $('#search').on('input',function(){
        $.ajax({
            url: '<?php echo base_url(); ?>sms/search',
            type: 'post',
            dataType: 'html',
            data:{search_name:$('#search').val()},
            success: function(results) {
                $('#table').html(results);
            }
        });
    });
    $('#table_row_length').on('change',function(){
        loaddatatable();
    });
    function loaddatatable(){
        var table_row_length = $('#table_row_length').val();
        var filter_namekh = $('input[name=\'filter_namekh\']').val();
        var filter_contentsms = $('input[name=\'filter_contentsms\']').val();
        var filter_sendtime = $('input[name=\'filter_sendtime\']').val();
        var filter_viewtime = $('input[name=\'filter_viewtime\']').val();
        var filter_click = $('input[name=\'filter_click\']').val();
        var url = location.href;
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            data:{filter_row:table_row_length,filter_namekh:filter_namekh,filter_contentsms:filter_contentsms,filter_sendtime:filter_sendtime,filter_click:filter_click,filter_viewtime:filter_viewtime},
            success: function(results) {
                $('#content').html(results);
            }
        });
    }  
    $('#btnfilter').on('click',function(){
        loaddatatable();
    });
    $('ul.pagination li a').on('click',function(){
        var table_row_length = $('#table_row_length').val();
        var filter_namekh = $('input[name=\'filter_namekh\']').val();
        var filter_contentsms = $('input[name=\'filter_contentsms\']').val();
        var filter_sendtime = $('input[name=\'filter_sendtime\']').val();
        var filter_viewtime = $('input[name=\'filter_viewtime\']').val();
        var filter_click = $('input[name=\'filter_click\']').val();
        var url = $(this).attr('href');
        $(this).attr('href','javascript:void(0)');
        if(url != '#'){
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'html',
                data:{filter_row:table_row_length,filter_namekh:filter_namekh,filter_contentsms:filter_contentsms,filter_sendtime:filter_sendtime,filter_viewtime:filter_viewtime,filter_click:filter_click},
                success: function(results) {
                    $('#content').html(results);
                }
            });
        }
    });
</script>
<script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/to/bootstrap-datetimepicker.min.css"></script>
<script type="text/javascript">
    $("#dp1").datepicker({format: 'yyyy-mm-dd',forceParse: true,clearBtn: true,todayHighlight: true});
    $("#dp2").datepicker({format: 'yyyy-mm-dd',forceParse: true,clearBtn: true,todayHighlight: true});
</script>