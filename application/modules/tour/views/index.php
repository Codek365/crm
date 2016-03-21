<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Quản lý danh sách Tour</span>
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
                                    <button id="btnAdd" class="btn blue">
                                    Thêm <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button id="btnDelete" class="btn green red-sunglo">
                                    Xóa <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <?php if($mess) { ?>
                                <div class="alert alert-success btn-group" style="padding: 8px;margin-bottom: 0px;width: 72%;">
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
                    <form id="form" action="<?php echo base_url(); ?>tour/delete" method="post">
                    <div id="table">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info">
                            <thead>
                                <tr role="row">
                                    <th>
                                        <input type="checkbox" name="case[]" id="selectall" />
                                    </th>
                                    <th>Model</th>
                                    <th>Tên Tour</th>
                                    <th>Thời gian</th>
                                    <th>Giá</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="filter">
                                    <td style="width:4%;"></td>
                                    <td><input type="text" name="filter_model" value="<?php if(isset($filter['model'])){echo $filter['model'];} ?>" style="width:100%;" /></td>
                                    <td><input type="text" name="filter_name" value="<?php if(isset($filter['name'])){echo $filter['name'];} ?>" style="width:100%;" /></td>
                                    <td><select name="filter_date">
                                        <option value="*"></option>
                                        <?php for($i=1;$i<20;$i++){?>
                                        <?php if($i.' Ngày' == $filter['date']){?>
                                        <option value="<?php echo $i;?> Ngày" selected="selected"><?php echo $i;?> Ngày</option>
                                        <?php }else{?>
                                        <option value="<?php echo $i;?> Ngày"><?php echo $i;?> Ngày</option>
                                        <?php }?>
                                        <?php }?>
                                    </select></td>
                                    <td><input type="text" name="filter_price" value="<?php if(isset($filter['price'])){echo $filter['price'];} ?>" style="width:100%;" /></td>
                                    <td><select name="filter_status">
                                        <?php
                                            if(isset($filter['status']) && $filter['status'] != '*'){ ?>
                                                <option value="*"></option>
                                                <option value="1" <?php if($filter['status'] == 1){echo 'selected';} ?>>Bật</option>
                                                <option value="0" <?php if($filter['status'] == 0){echo 'selected';} ?>>Tắt</option>
                                        <?php }else{ ?>
                                                <option value="*" selected="selected"></option>
                                                <option value="1">Bật</option>
                                                <option value="0">Tắt</option>
                                        <?php    }
                                        ?>
                                    </select></td>
                                    <td style="width:7%;"></td>
                                </tr>
                            <?php if($list) {
                                foreach ($list as $key => $value) { ?>
                                <tr class="gradeX <?php if($key%2==0){echo 'odd active';}else{echo 'even active';} ?>" role="row">
                                    <td>
                                        <input type="checkbox" id="check"  name="case[]" value="<?php echo $value['product_id']; ?>">
                                    </td>
                                    <td><?php echo $value['model']; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['duration']; ?></td>
                                    <td><?php 
                                    if(isset($value['special']) && date('Y-m-d') < $value['date_end'] && date('Y-m-d') > $value['date_start']){ ?>
                                        <p style="text-decoration: line-through;"><?php if(isset($value['price'])){echo $value['price'];} ?></p>
                                        <p style="color:red;"><?php echo $value['special']; ?></p>
                                    <?php }else{
                                        if(isset($value['price'])){
                                            echo $value['price'];
                                        }
                                    }
                                    ?></td>
                                    <td>
                                        <?php 
                                            if($value['status'] == 0){
                                                echo "Tắt";
                                            }else{
                                                echo "Bật";
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo site_url('tour'); ?>/edit/<?php echo $value['product_id']; ?>">Sửa <i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php }}else{?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Chưa Có Dữ Liệu</td>
                                </tr>
                                   <?php  } ?>  
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?php if(isset($page)){echo $page;} ?> to <?php if(isset($per_page_row)){echo $per_page_row;} ?> of <?php if(isset($total_rows)){echo $total_rows;} ?> entries
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12">
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
    $('#btnAdd').on('click',function(){
        location = '<?php echo base_url(); ?>tour/create';
    });
    $('#search').on('input',function(){
        $.ajax({
            url: '<?php echo base_url(); ?>tour/search',
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
        var filter_model = $('input[name=\'filter_model\']').val();
        var filter_name = $('input[name=\'filter_name\']').val();
        var filter_date = $('select[name=\'filter_date\']').val();
        var filter_price = $('input[name=\'filter_price\']').val();
        var filter_status = $('select[name=\'filter_status\']').val();
        var url = location.href;
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            data:{filter_row:table_row_length,filter_model:filter_model,filter_name:filter_name,filter_date:filter_date,filter_price:filter_price,filter_status:filter_status},
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
        var filter_model = $('input[name=\'filter_model\']').val();
        var filter_name = $('input[name=\'filter_name\']').val();
        var filter_date = $('select[name=\'filter_date\']').val();
        var filter_price = $('input[name=\'filter_price\']').val();
        var filter_status = $('select[name=\'filter_status\']').val();
        var url = $(this).attr('href');
        $(this).attr('href','javascript:void(0)');
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            data:{filter_row:table_row_length,filter_model:filter_model,filter_name:filter_name,filter_date:filter_date,filter_price:filter_price,filter_status:filter_status},
            success: function(results) {
                $('#content').html(results);
            }
        });
    });
</script>