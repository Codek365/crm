<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Thêm Danh Mục Tùy Chọn</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <!-- <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a> -->
                </div>
            </div>
<div class="portlet-body">
<div class="container">
    <div id="error" class='alert alert-danger' style='padding:25px;display:none'></div>
    <div class="col-md-10 col-md-offset-2">
        <form action="" method="POST" id="form" role="form" class="form-horizontal">      
            <div class="form-group">
                <label for="" class="control-label col-xs-3">Tên Danh Mục Tùy Chọn:</label>
                <div class="col-xs-8">
                <input type="text" class="form-control" name="txtName" placeholder="Tên Danh Mục Tùy Chọn">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-xs-3">Ngày Bắt Đầu:</label>
                <div class="col-xs-8">
                <input type="text" id="dp1" class="form-control" name="txtDateStart" readonly="readonly" placeholder="Ngày Bắt Đầu">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-xs-3">Ngày Kết Thúc:</label>
                <div class="col-xs-8">
                <input type="text" id="dp2" class="form-control" name="txtDateEnd" readonly="readonly" placeholder="Ngày Kết Thúc">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-xs-3">Tình Trạng:</label>
                <div class="col-xs-8">
                <select name="txtStatus" class="form-control">
                    <option value="1">Bật</option>
                    <option value="0">Tắt</option>
                </select>
                </div>
            </div>
            <input name="btnOK" id="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Thêm Danh Mục Tùy Chọn" />
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    $('#btnOK').on('click',function(){
        var name = $('input[name=\'txtName\']').val();
        var html = "<ul>";
        var check = true;
        if(name == ""){
            html += "<li>Tên Danh Mục Tùy Chọn Không Để Trống</li>";
            check = false;
        }
        html += "</ul>";
        if(check == false){
            $('#error').css('display','block');
            $('#error').html(html);
            event.preventDefault();
            check = true;
        }
    });
</script>
<script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/css/bootstrap-datepicker.min.css"></script>
<script type="text/javascript">
    $("#dp1").datepicker({format: 'dd-mm-yyyy',forceParse: true,clearBtn: true,todayHighlight: true});
    $("#dp2").datepicker({format: 'dd-mm-yyyy',forceParse: true,clearBtn: true,todayHighlight: true});
</script>