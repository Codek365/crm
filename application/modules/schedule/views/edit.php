<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title col-sm-11"><i class="fa fa-calendar"></i></h3>
        <button id="edit" type="button" class="btn btn-info btn-xs" style="margin-left:3%;"><i class="fa fa-edit"></i>Edit</button>
    </div>
    <div class="panel-body form">
        <form id="form" method="post" class="form-horizontal form-row-seperated">
            <div class="form-body">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-icon right">
                            <input class="form-control" readonly="readonly" name="txtFullNameTour" value="<?php echo $Schedule['full_name_tour']; ?>" type="text" placeholder="Search" id="sbox">
                        </div>                        
                    </div>
                </div>                
                <div class="form-group option" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row margin-top-10">
                                <label class="col-md-4 control-label">Ngày khởi hành</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div id="fake"><input type="text" readonly="readonly" name="txtDateStart" class="form-control" placeholder="Ngày Khởi Hành" value="<?php echo date('d-m-Y',strtotime($Schedule['start_date'])); ?>"></div>
                                        <div id="real" style="display:none"><input type="text" id="dp1" name="txtDateStart" class="form-control" placeholder="Ngày Khởi Hành" value="<?php echo date('d-m-Y',strtotime($Schedule['start_date'])); ?>"></div>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row margin-top-20">
                                <label class="col-md-4 control-label">Loại tour</label>
                                <div class="col-md-8">
                                    <select id="tour_type" disabled="true" name="txtOptionChoose" class="form-control" ></select>
                                </div>
                            </div>
                            <div class="row margin-top-20" id="tour_flight" style="display:none">
                                <label class="col-md-4 control-label">Vé máy bay</label>
                                <div class="col-md-8">
                                    <select id="flight_type" disabled="true" name="txtOptionFlight" class="form-control" ></select>
                                </div>
                            </div>
                            <div class="row margin-top-20" id="selectSl">                                
                                <div class="col-md-5 col-md-offset-2">
                                    <label id="type1" label="Người lớn">Người lớn</label><br>
                                    <select id="price1" name="txtslAdult" class="form-control" disabled="true">
                                        <option value="0">--Chon--</option>   
                                        <?php for($i = 1; $i <= 30; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $Schedule['aduls']){echo 'selected="selected"';} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label id="type2" label="Trẻ em">Trẻ em</label><br>
                                    <select id="price2" name="txtslChd" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 30; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $Schedule['childs']){echo 'selected="selected"';} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row margin-top-20" id="selectSLR">                                
                                <div class="col-md-5 col-md-offset-2">
                                    <label id="type3" label="Phòng đơn">Phòng đơn</label><br>
                                    <select id="price3" name="txtslSingleRoom" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 30; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $Schedule['singlerooms']){echo 'selected="selected"';} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label id="type4" label="Ngoại quốc">Ngoại quốc</label><br>
                                    <select id="price4" name="txtslForeign" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 30; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $Schedule['foreigns']){echo 'selected="selected"';} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row margin-top-20" id="selectVMB" style="display:none">
                                <div class="col-md-3 col-md-offset-2">
                                    <label id="type6" label="Từ 12 tuổi trở lên">Trên 11 tuổi</label><br>
                                    <select id="price6" name="txt12age" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 30; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $Schedule['12age']){echo 'selected="selected"';} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label id="type7" label="Từ 2 tuổi đến dưới 12 tuổi">Từ 3 tuổi tới 11 tuổi</label><br>
                                    <select id="price7" name="txt2to12" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 30; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $Schedule['2to12']){echo 'selected="selected"';} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label id="type8" label="Dưới 2 tuổi trở xuống">Dưới 3 tuổi</label><br>
                                    <select id="price8" name="txt2age" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 30; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $Schedule['2age']){echo 'selected="selected"';} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-md-6">
                            <div class="table-scrollable">
                                <table class="table table-hover" id="cal-tour">   
                                    <thead>
                                            <th>#</th>
                                            <th>Số lượng</th>
                                            <th>Giá tiền</th>
                                            <th>Thành tiền</th>
                                    </thead>                                
                                    <tbody>
                                        <tr id="slAdult"></tr>
                                        <tr id="slChd"></tr>
                                        <tr id="slSingleRoom"></tr>
                                        <tr id="slForeign"></tr>
                                        <tr id="slTickets"></tr>
                                        <tr id="VMB12"></tr>
                                        <tr id="VMB2to12"></tr>
                                        <tr id="VMB2"></tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <span class="pull-right" id="sumall"></span>
                                                <span class="pull-right">Tổng cộng : </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#myModal">Chi Tiết Tour</button>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                      </div>
                                                    <div class="modal-body tour-description" style="height:400px;overflow:scroll">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>Model</td>
                                                                <td id="txtModel"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tên Tour</td>
                                                                <td id="txtNameTour"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lịch Trình</td>
                                                                <td id="txtSchedule"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thời Gian</td>
                                                                <td id="txtDuration"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Điểm Khởi Hành</td>
                                                                <td id="txtStartPlane"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thời Gian Khởi Hành</td>
                                                                <td id="txtTimeStartTour"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phương Tiện</td>
                                                                <td id="txtTraffic"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dịch Vụ Bao Gồm</td>
                                                                <td><textarea id="txtIncluded"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Dịch vụ Không Bao Gồm</td>
                                                                <td><textarea id="txtNotincluded"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Thông Tin Cần Biết</td>
                                                                <td><textarea id="txtInfo"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Địa Điểm Tập Trung</td>
                                                                <td><textarea id="txtMeeting"></textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Chi Tiết Tour</td>
                                                                <td><textarea id="txtDescription"></textarea></td>
                                                            </tr>
                                                        </table>                                      
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                                        <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
                                                      </div>
                                                  </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>                       
                    </div>                    
                 
                <div class="form-group" >
                    <div class="col-md-12 margin-top-20">
                        <div class="row margin-top-10">
                            <label class="col-sm-2 control-label">Họ Tên :</label>
                            <div class="col-sm-7">
                                <input type="text" readonly="readonly" name="txtName" value="<?php echo $Schedule['fullname']; ?>" class="form-control" placeholder="Họ Tên">
                            </div>
                            <p class="col-sm-3" id="errorname"></p>
                        </div>
                        <div class="row margin-top-20">
                            <label class="col-sm-2 control-label">Email :</label>
                            <div class="col-sm-7">
                                <input type="text" readonly="readonly" name="txtEmail" value="<?php echo $Schedule['email']; ?>" class="form-control" placeholder="Email">
                            </div>
                            <p class="col-sm-3" id="erroremail"></p>
                        </div>
                        <div class="row margin-top-20">
                            <label class="col-sm-2 control-label">Điện Thoại :</label>
                            <div class="col-sm-7">
                                <input type="text" readonly="readonly" name="txtPhone" value="<?php echo $Schedule['phone']; ?>" class="form-control" placeholder="Điện Thoại">
                            </div>
                            <p class="col-sm-3" id="errorphone"></p>
                        </div>
                        <div class="row margin-top-20">
                            <label class="col-sm-2 control-label">Địa Chỉ :</label>
                            <div class="col-sm-7">
                                <input type="text" readonly="readonly" name="txtAddress" value="<?php echo $Schedule['home_address']; ?>" class="form-control" placeholder="Địa Chỉ">
                            </div>
                            <p class="col-sm-3" id="erroraddress"></p>
                        </div>
                        <div class="row margin-top-20">
                            <label class="col-sm-2 control-label">Phương Thức Thanh Toán :</label>
                            <div class="col-sm-7">
                                <select name="txtPayment" disabled="true" class="col-sm-7 form-control">
                                    <option value="Tiền mặt" <?php if(isset($Schedule['payment']) && $Schedule['payment'] == 'Tiền mặt'){echo 'selected';} ?>>Tiền mặt</option>
                                    <option value="Chuyển khoản" <?php if(isset($Schedule['payment']) && $Schedule['payment'] == 'Chuyển khoản'){echo 'selected';} ?>>Chuyển khoản</option>
                                </select>
                            </div>
                            <p class="col-sm-3" id="errorname"></p>
                        </div>
                        <?php $date_born = explode('-',$Schedule['birth_date']); ?>
                        <div class="row margin-top-20">
                            <label class="col-sm-2 control-label">Ngày Sinh :</label>
                            <div class="col-sm-2">
                                <label class="col-sm-1 control-label">Ngày</label>
                                <select name="txtBornDay" class="col-sm-1 form-control" disabled="true">
                                    <?php for($i = 1; $i <= 31; $i++){?>
                                    <option value="<?php echo $i?>" <?php if($i == $date_born[2]){echo 'selected';} ?>><?php echo $i?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-sm-1 control-label">Tháng</label>
                                <select name="txtBornMonth" class="col-sm-1 form-control" disabled="true">
                                    <?php for($i = 1; $i <= 12; $i++){?>
                                    <option value="<?php echo $i?>" <?php if($i == $date_born[1]){echo 'selected';} ?>><?php echo $i?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label class="col-sm-1 control-label">Năm</label>
                                <input type="text" name="txtBornYear" value="<?php echo $date_born[0]; ?>" readonly="readonly" class="form-control" placeholder="Năm">
                            </div>
                            <p class="col-sm-3" id="errordayborn"></p>
                        </div>
                        <?php date_default_timezone_set('UTC'); $date_Alert_default = explode('-',date('Y-m-d-H-i',$Schedule['call_time'])); ?>
                        <div class="row margin-top-20">
                            <label class="col-sm-2 control-label">Thời Gian Thông Báo :</label>
                            <div class="col-sm-7">
                                <div class="col-sm-3">
                                    <label class="control-label">Giờ</label>
                                    <select name="txtAHour" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 24; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $date_Alert_default[3]){echo "selected='selected'";} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Phút</label>
                                    <select name="txtAMinute" class="form-control" disabled="true">
                                        <?php for($i = 0; $i <= 60; $i++){ ?>
                                        <option value="<?php echo $i?>" <?php if($i == $date_Alert_default[4]){echo "selected='selected'";} ?>><?php echo $i?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-7 col-md-offset-2">
                                <div class="col-sm-3">
                                    <label class="control-label">Ngày</label>
                                    <select name="txtADay" class="form-control" disabled="true">
                                        <?php for($i = 1; $i <= 31; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $date_Alert_default[2]){echo "selected='selected'";} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Tháng</label>
                                    <select name="txtAMonth" class="form-control" disabled="true">
                                        <?php for($i = 1; $i <= 12; $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $date_Alert_default[1]){echo "selected='selected'";} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Năm</label>
                                    <select name="txtAYear" class="form-control" disabled="true">
                                        <?php for($i = date("Y"); $i <= (date("Y")+1); $i++){?>
                                        <option value="<?php echo $i?>" <?php if($i == $date_Alert_default[0]){echo "selected='selected'";} ?>><?php echo $i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-20">
                            <label class="col-sm-2 control-label">Tình Trạng Tour :</label>
                            <div class='date col-sm-7'>
                                <select class="form-control" disabled="true" name="txtStatus">
                                    <option value="1" <?php if($Schedule['status'] == 1){echo 'selected';} ?>>Thanh Toán</option>
                                    <option value="0" <?php if($Schedule['status'] == 0){echo 'selected';} ?>>Chưa Thanh Toán</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-20">
                        <textarea name="Note" id="Note"><?php echo $Schedule['require_work']; ?></textarea>
                    </div>
                    <input type="hidden" name="txtSumall" id="txtSumall" value="<?php echo $Schedule['total']; ?>" />
                    <input type="hidden" name="txtTourID" id="txtTourID" />
                </div>
                </div>   
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-5 col-md-9">
                        <button id="btnEdit" name="btnEdit" value="1" type="submit" class="btn green">Save</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">CKEDITOR.replace('Note',{readOnly:true,toolbar: [{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
    { name: 'others', items: [ '-' ] },
    '/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
    { name: 'styles', items: [ 'Styles', 'Format' ] },
    { name: 'about', items: [ 'About' ] }]});</script>
<script type="text/javascript">CKEDITOR.replace('txtDescription',{readOnly:true,toolbar: [],resize_enabled:false});</script>
<script type="text/javascript">CKEDITOR.replace('txtIncluded',{readOnly:true,toolbar: [],resize_enabled:false});</script>
<script type="text/javascript">CKEDITOR.replace('txtNotincluded',{readOnly:true,toolbar: [],resize_enabled:false});</script>
<script type="text/javascript">CKEDITOR.replace('txtInfo',{readOnly:true,toolbar: [],resize_enabled:false});</script>
<script type="text/javascript">CKEDITOR.replace('txtMeeting',{readOnly:true,toolbar: [],resize_enabled:false});</script>
<script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/to/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/datepicker/to/bootstrap-datepicker.vi.min.js"></script>
<script type="text/javascript">
    $("#dp1").datepicker({format: 'dd-mm-yyyy',autoclose: true,language: "vi",startDate: "<?php echo date('d-m-Y'); ?>",forceParse: true,todayHighlight: true,
    beforeShowDay: function (date){
                    <?php 
                    /*show ngày lễ*/
                    if($holiday){
                        foreach ($holiday as $key => $value) {
                            $dateStart[$key] = explode('-',$value->date_start);
                            $dateEnd[$key] = explode('-',$value->date_end);
                            if((int)$dateStart[$key][0] < (int)$dateEnd[$key][0]){
                                for($i=(int)$dateStart[$key][0];$i<=(int)$dateEnd[$key][0];$i++){
                                    if($i < (int)$dateEnd[$key][0]){
                                        for ($j = (int)$dateStart[$key][1]; $j <= 12; $j++) { 
                                            echo "if (date.getMonth() == ".($j-1).") /*0->11*/
                                                switch (date.getDate()){";
                                                for ($k = $dateStart[$key][2]; $k <= 31; $k++) { 
                                                    echo "case ".$k.":
                                                        return {
                                                            tooltip: 'Ngày Lễ',
                                                            classes: 'holiday'
                                                        };";
                                                }
                                                if($j > (int)$dateStart[$key][1]){
                                                    for ($k = 1; $k <= $dateStart[$key][2]; $k++) { 
                                                        echo "case ".$k.":
                                                            return {
                                                                tooltip: 'Ngày Lễ',
                                                                classes: 'holiday'
                                                            };";
                                                    }
                                                }                              
                                            echo "}";
                                        }
                                    }else{
                                        for ($j = 1; $j <= (int)$dateEnd[$key][1]; $j++) { 
                                            echo "if (date.getMonth() == ".($j-1).") /*0->11*/
                                                switch (date.getDate()){";
                                                for ($k = 1; $k <= $dateEnd[$key][2]; $k++) { 
                                                    echo "case ".$k.":
                                                        return {
                                                            tooltip: 'Ngày Lễ',
                                                            classes: 'holiday'
                                                        };";
                                                }                              
                                            echo "}";
                                        }
                                    }
                                }                                
                            }else{
                                for ($i = (int)$dateStart[$key][1]; $i <= (int)$dateEnd[$key][1]; $i++) {
                                echo "if (date.getMonth() == ".($i-1).") /*0->11*/
                                        switch (date.getDate()){";
                                        if($i < (int)$dateEnd[$key][1]) {
                                            for ($k = $dateStart[$key][2]; $k <= 31; $k++) { 
                                                echo "case ".$k.":
                                                    return {
                                                        tooltip: 'Ngày Lễ',
                                                        classes: 'holiday'
                                                    };";
                                            }
                                            if($i > (int)$dateStart[$key][1]){
                                                for ($l = 1; $l <= $dateEnd[$key][2]; $l++) { 
                                                    echo "case ".$l.":
                                                        return {
                                                            tooltip: 'Ngày Lễ',
                                                            classes: 'holiday'
                                                        };";
                                                }   
                                            }
                                        }elseif($i = (int)$dateEnd[$key][1]) {
                                            if($i > (int)$dateStart[$key][1]){
                                                for ($l = 1; $l <= $dateEnd[$key][2]; $l++) { 
                                                    echo "case ".$l.":
                                                        return {
                                                            tooltip: 'Ngày Lễ',
                                                            classes: 'holiday'
                                                        };";
                                                }   
                                            }else{
                                                for ($l = $dateStart[$key][2]; $l <= $dateEnd[$key][2]; $l++) { 
                                                    echo "case ".$l.":
                                                        return {
                                                            tooltip: 'Ngày Lễ',
                                                            classes: 'holiday'
                                                        };";
                                                }
                                            }
                                        }                                   
                                    echo "}";
                                }
                            }                        
                        }
                    }?>
                }});
$('#btnEdit').on('click',function(){
    /*bắt lỗi form trước khi submit*/
    var slAdult = $('select[name=\"txtslAdult\"]').val();
    var txtName = $('input[name=\"txtName\"]').val();
    var txtEmail = $('input[name=\"txtEmail\"]').val();
    var txtPhone = $('input[name=\"txtPhone\"]').val();
    var txtAddress = $('input[name=\"txtAddress\"]').val();
    var txtBornDay = $('input[name=\"txtBornDay\"]').val();
    var txtAlertTime = $('input[name=\"txtAlertTime\"]').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var btnsubmit = true;
    if(!filter.test(txtEmail)){
        $('#erroremail').html('<p style="color:red;">Email Không Tồn Tại *</p>');
        btnsubmit = false;
    }else if(filter.test(txtEmail)){
        $('#erroremail').html('');
    }
    if(isNaN(txtPhone)){
        $('#errorphone').html('<p style="color:red;">Chỉ có thể nhập số *</p>');
        btnsubmit = false;
    }else if(!isNaN(txtPhone)){
        $('#errorphone').html('');
    }
    if(slAdult == 0){
        alert("Vui Lòng Chọn ít nhất 1 Người Lớn");
        btnsubmit = false;
    }
    if(txtName == ""){
        $('#errorname').html('<p style="color:red;">Vui Lòng Nhập Tên *</p>');
        btnsubmit = false;
    }else{
        $('#errorname').html('');
    }
    if(txtEmail == ""){
        $('#erroremail').html('<p style="color:red;">Vui Lòng Nhập Email *</p>');
        btnsubmit = false;
    }
    if(txtPhone == ""){
        $('#errorphone').html('<p style="color:red;">Vui Lòng Nhập Số Điện Thoại *</p>');
        btnsubmit = false;
    }
    if(txtAddress == ""){
        $('#erroraddress').html('<p style="color:red;">Vui Lòng Nhập Địa chỉ *</p>');
        btnsubmit = false;
    }else{
        $('#erroraddress').html('');
    }
    if(txtBornDay == ""){
        $('#errordayborn').html('<p style="color:red;">Vui Lòng Nhập Ngày Sinh *</p>');
        btnsubmit = false;
    }else if(txtBornDay.length != 4 || isNaN(txtBornDay) == true){
        $('#errordayborn').html('<p style="color:red;">Nàm Sinh Chưa Đúng *</p>');
        btnsubmit = false;
    }else{
        $('#errordayborn').html('');
    }
    if(btnsubmit == true){
        $('#form').attr('action','<?php echo base_url(); ?>schedule/edit/'+<?php echo $Schedule['id']; ?>);
        $('#form').submit();
    }
});
$('#edit').click(function(event) {
    /*bật edit*/
    $('#fake').css('display', 'none');
    $('#real').css('display', 'block');
    $('#tour_type').attr('disabled', false);
    $('#flight_type').attr('disabled', false);
    if($('#price1').attr('ak') == 'false') {
        $('#price1').attr('disabled', false);
    }
    if($('#price2').attr('ak') == 'false') {
        $('#price2').attr('disabled', false);
    }
    if($('#price3').attr('ak') == 'false') {
        $('#price3').attr('disabled', false);
    }
    if($('#price4').attr('ak') == 'false') {
        $('#price4').attr('disabled', false);
    }
    if($('#price5').attr('ak') == 'false') {
        $('#price5').attr('disabled', false);
    }
    $('#price6').attr('disabled', false);
    $('#price7').attr('disabled', false);
    $('#price8').attr('disabled', false);
    $('input[name=\"txtName\"]').attr('readonly', false);
    $('input[name=\"txtEmail\"]').attr('readonly', false);
    $('input[name=\"txtPhone\"]').attr('readonly', false);
    $('input[name=\"txtAddress\"]').attr('readonly', false);
    $('input[name=\"txtBornYear\"]').attr('readonly', false);
    $('select[name=\"txtPayment\"]').attr('disabled', false);
    $('select[name=\"txtBornDay\"]').attr('disabled', false);
    $('select[name=\"txtBornMonth\"]').attr('disabled', false);
    $('select[name=\"txtAHour\"]').attr('disabled', false);
    $('select[name=\"txtAMinute\"]').attr('disabled', false);
    $('select[name=\"txtADay\"]').attr('disabled', false);
    $('select[name=\"txtAMonth\"]').attr('disabled', false);
    $('select[name=\"txtAYear\"]').attr('disabled', false);
    $('select[name=\"txtStatus\"]').attr('disabled', false);
    CKEDITOR.instances.Note.setReadOnly(false);
});
</script>
<script type="text/javascript">
    var Djson = "";
    var special_price = 0;
    var arr = [];
    var temp = [];
    var datestart = [];
    var dateend = [];
    var date_id = [];
    $(document).ready(function() {
        var key = <?php echo $Schedule['tour_id']; ?>;
        $('#txtTourID').val(key);
        showOptionGroup();
        getDescription(key);
        var date_choose_start = parseDate($('input[name=\"txtDateStart\"]').val()).getTime();
        /*bắt ngày lễ trong date start*/
        <?php if($holiday){
            foreach ($holiday as $key => $value) {                     
                $datetimestart = explode('-',$value->date_start);
                $datetimeend = explode('-',$value->date_end); ?>
                datestart[<?php echo $key; ?>] = <?php echo $datetimestart[2]; ?>+'-'+ <?php echo $datetimestart[1]; ?>+'-'+<?php echo $datetimestart[0]; ?>;
                dateend[<?php echo $key; ?>] = <?php echo $datetimeend[2]; ?>+'-'+ <?php echo $datetimeend[1]; ?>+'-'+<?php echo $datetimeend[0]; ?>;
                date_id[<?php echo $key; ?>] = <?php echo $value->option_category_id; ?>;
        <?php } }?>
        $.each(datestart, function(stt, val){
            if (date_choose_start >= parseDate(val).getTime() && date_choose_start <= parseDate(dateend[stt]).getTime()) {
                special_price = date_id[stt];
            }
        });
        function showOptionGroup() {
            $.ajax({
                url: '<?php echo base_url() ?>schedule/getTourOptionGroupAjax',
                type: 'GET',
                dataType: 'JSON',
                data: {product_id: parseInt(key)},
                success : function (data){
                    Djson = data;
                    $(".option").show();
                    var html = '';
                        html+= '<option value="0">--- Loại ---</option>';
                    var html_flight = '';
                        html_flight += '<option value="0">--- Loại ---</option>';
                    /*đổ dữ liệu vào type tour*/
                    $.each(data, function(index,option) {
                        if(change_alias(option.name) == 'xe-ghe-ngoi' || change_alias(option.name) == 'xe-giuong-nam'){
                            $('#selectSl').empty();
                            $('#selectSLR').empty();
                            $('#selectSl').html('<label id="type5" label="Vé" class="col-sm-4 control-label">Số Lượng Vé</label><div class="col-sm-8"><select id="price5" name="txtslTicket" class="form-control " disabled="true"><option value="0">--Chon--</option> <?php for($i = 1; $i <= 30; $i++){?><option value="<?php echo $i?>" <?php if($i == $Schedule["tickets"]){echo "selected";} ?>><?php echo $i?></option><?php }?></select></div>');
                        }                                  
                        if (option.type == 'checkbox' && option.category == 0 && option.option_class == 0 ) {
                            $.each(option.option_value, function(index,option_value){                   
                                html += '<option value="' + option_value.name + '"';
                                if(option_value.name == "<?php echo $Schedule['option_choose']; ?>"){
                                    html += ' selected="selected"';
                                };
                                html += '>';
                                html += option_value.name;
                                html += '</option>';                                
                            });                     
                            return false;          
                        };                          
                    });
                    /*đỗ dữ liệu vào flight type*/
                    $.each(data, function(index,option) {
                        $.each(option.option_value, function(index,option_value){   
                            if(option.type == 'checkbox' && option.option_class == 1){
                                $('#tour_flight').css('display','block');
                                $('#selectVMB').css('display', 'block');
                                html_flight += '<option value="' + option.name + '"';
                                if(option.name == "<?php echo $Schedule['option_flight']; ?>"){
                                    html_flight += ' selected="selected"';
                                };
                                html_flight += '>';
                                html_flight += option.name;
                                html_flight += '</option>';                                
                            };
                            return false;
                        });
                    });                                     
                    $("#tour_type").html(html);
                    $('#flight_type').html(html_flight);
                        $.each(Djson, function(stt, val){
                            if(val.category == special_price){
                                if(change_alias(val.name) != 'xe-ghe-ngoi' && change_alias(val.name) != 'xe-giuong-nam'){
                                    if(change_alias(val.name) == "phu-thu-phong-don"){
                                        /*$('#price3').attr('disabled', false);*/
                                        $('#price3').attr('ak', false);
                                    }
                                    if(change_alias(val.name) == "phu-thu-ngoai-quoc"){
                                        /*$('#price4').attr('disabled', false);*/
                                        $('#price4').attr('ak', false);
                                    }
                                    /*$('#price1').attr('disabled', false);                                       
                                    $('#price2').attr('disabled', false);*/
                                    $('#price1').attr('ak', false);
                                    $('#price2').attr('ak', false);
                                }else{
                                    /*$('#price5').attr('disabled', false);*/
                                    $('#price5').attr('ak', false);
                                }
                            }
                        });
                    var key = 0;
                    <?php if($Schedule['tickets'] != 0){ ?>
                        key = 4;
                    <?php } ?>
                    /*lọc mảng giá trị các option*/
                    var option_choose = "<?php echo $Schedule['option_choose']; ?>";
                    $.each(Djson, function(index, option) {
                        if (option.type == 'checkbox' && option.category == special_price) {
                            $.each(option.option_value, function(index, option_value) {
                                if (change_alias(option_value.name) == change_alias(option_choose) || change_alias(option_value.name) == "tat-ca-cac-loai" || change_alias(option_value.name) == "khach-vn-vk") {
                                    key++;
                                    temp[key] = option_value.price;
                                };
                            });
                        };                       
                    });
                    key = 5;
                    var option_flight = "<?php echo $Schedule['option_flight']; ?>";
                    $.each(Djson, function(index, option) {
                        if (option.type == 'checkbox' && option.category == special_price) {
                            $.each(option.option_value, function(index, option_value) {
                                if (change_alias(option.name) == change_alias(option_flight)) {
                                    key++;
                                    temp[key] = option_value.price;
                                };
                            });
                        };                       
                    });
                    /*đổ giá trị vào bảng theo các selected option*/
                    var tour = ['slAdult','slChd','slSingleRoom','slForeign','slTickets','VMB12','VMB2to12','VMB2'];
                    var tourlabel = ['Người lớn','Trẻ em','Phòng đơn','Ngoại quốc','Vé','Từ 12 tuổi trở lên','Từ 2 tuổi đến dưới 12 tuổi','Dưới 2 tuổi trở xuống'];
                    var numper = ["<?php echo $Schedule['aduls']; ?>","<?php echo $Schedule['childs']; ?>","<?php echo $Schedule['singlerooms']; ?>","<?php echo $Schedule['foreigns']; ?>","<?php echo $Schedule['tickets']; ?>","<?php echo $Schedule['12age']; ?>","<?php echo $Schedule['2to12']; ?>","<?php echo $Schedule['2age']; ?>"];
                    $.each(tour,function(index, el) {
                        if(numper[index] != 0){
                            $('#'+el).append(
                                "<td>"+tourlabel[index]+"</td>" +
                                "<td><span class='pull-right'>" + numper[index] + " x" + "</span></td>" +
                                "<td>" + Number(temp[index+1]).toLocaleString('en') + "</span></td>" +
                                "<td><span id='sum"+(index+1)+"' sum='" + (numper[index] * temp[index+1]) + "'>" + Number(numper[index] * temp[index+1]).toLocaleString('en')  + "</td>");
                        }
                        $('#txtPrice'+(index+1)).val(numper[index] * temp[index+1]); 
                    });
                }
            });
        }
        $("#sumall").html(Number(<?php echo $Schedule['total']; ?>).toLocaleString('en'));        
        function getOptionItem(i) {
            $("#sumall").empty();
            var key = 0;
            $.each(Djson, function(index, option) {
                if (option.type == 'checkbox' && option.category == special_price) {
                    $.each(option.option_value, function(index2, option_value) {
                        if (change_alias(option_value.name) == change_alias($("#tour_type").val()) || change_alias(option_value.name) == "tat-ca-cac-loai" || change_alias(option_value.name) == "khach-vn-vk") {
                            key++;
                            if(i == 5){
                                key = 5;
                            }
                            arr[key] = option_value.price;
                        };
                    });
                };                       
            });
            $.each(Djson, function(index, option) {
                key = 5;
                if (option.type == 'checkbox' && option.category == special_price) {
                    $.each(option.option_value, function(indèx, option_value) {
                        if (change_alias(option.name) == change_alias($("#flight_type").val())) {
                            key++;
                            arr[key] = option_value.price;
                        };
                    });
                };                       
            });
            var id = "";
            if(i == 1) {
                id = "#slAdult";
            };
            if(i == 2) {
                id = "#slChd";
            };
            if(i == 3) {
                id = "#slSingleRoom";
            };
            if(i == 4) {
                id = "#slForeign";
            };
            if(i == 5) {
                id = "#slTickets";
            };
            if(i == 6) {
                id = "#VMB12";
            };
            if(i == 7) {
                id = "#VMB2to12";
            };
            if(i == 8) {
                id = "#VMB2";
            };                                 
            if (i == 0)  {
                return false;
            }else {
                var numper = $("#price" + i).val();
                $(id).empty();
                $(id).append(
                "<td>" + $("#type"+i).attr('label') + "</td>" +
                "<td><span class='pull-right'>" + numper + " x" + "</span></td>" +
                "<td>" + Number(arr[i]).toLocaleString('en') + "</span></td>" +
                "<td><span id='sum" + i + "' sum='" + (numper * arr[i]) + "'>" + Number(numper * arr[i]).toLocaleString('en')  + "</td>"
                );
                $('#txtPrice'+i).val(numper * arr[i]);
                if(numper == 0){
                    $(id).empty();   
                }                              
            }
            var sum1 = $("#sum1").attr('sum');
            var sum2 = $("#sum2").attr('sum');                         
            var sum3 = $("#sum3").attr('sum');                                
            var sum4 = $("#sum4").attr('sum');
            var sum5 = $("#sum5").attr('sum');
            var sum6 = $("#sum6").attr('sum');
            var sum7 = $("#sum7").attr('sum');
            var sum8 = $("#sum8").attr('sum');                               
            if (sum1 ==null && sum2 ==null && sum3 ==null && sum4 ==null && sum5 ==null && sum6 ==null && sum7 ==null && sum8 ==null) {
                var sumall = 0;  
            }else {
                if(sum1 == null){
                    sum1 = 0;
                }
                if(sum2 == null){
                    sum2 = 0;
                }
                if(sum3 == null){
                    sum3 = 0;
                }
                if(sum4 == null){
                    sum4 = 0;
                }
                if(sum5 == null){
                    sum5 = 0;
                }
                if(sum6 == null){
                    sum6 = 0;
                }
                if(sum7 == null){
                    sum7 = 0;
                }
                if(sum8 == null){
                    sum8 = 0;
                }
                var sumall = parseInt(sum1)+parseInt(sum2)+parseInt(sum3)+parseInt(sum4)+parseInt(sum5)+parseInt(sum6)+parseInt(sum7)+parseInt(sum8);
                $('#txtSumall').val(sumall);
            }                     
            $("#sumall").html(Number(sumall).toLocaleString('en'));    
        }
        $("#tour_type").on('change', function() {
            getOptionItem(0);
            $('#slAdult').empty();
            $('#slChd').empty();
            $('#slSingleRoom').empty();
            $('#slForeign').empty();
            $('#slTickets').empty();
            $('#price1').val('0');
            $('#price2').val('0');
            $('#price3').val('0');
            $('#price4').val('0');
            $('#price5').val('0');
            $('#price1').attr('disabled', false);
            $('#price2').attr('disabled', false);
            $('#price3').attr('disabled', false);
            $('#price4').attr('disabled', false);
            $('#price5').attr('disabled', false);                                       
        });
        $("#flight_type").on('change',function(){
            /*getOptionItem(0);*/
            $('#VMB12').empty();
            $('#VMB2to12').empty();
            $('#VMB2').empty();
            $('#price6').val('0');
            $('#price7').val('0');
            $('#price8').val('0');
            $('#price6').attr('disabled', false);
            $('#price7').attr('disabled', false);
            $('#price8').attr('disabled', false);
        });
        $("#price1").on('change', function() {
            getOptionItem(1);                                       
        });
        $("#price2").on('change', function() {
            getOptionItem(2);                                       
        });
        $("#price3").on('change', function() {
            getOptionItem(3);                                       
        });
        $("#price4").on('change', function() {
            getOptionItem(4);                                       
        });
        $("#price5").live('change', function() {
            getOptionItem(5);                                       
        });
        $("#price6").live('change', function() {
            getOptionItem(6);                                       
        });
        $("#price7").live('change', function() {
            getOptionItem(7);                                       
        });
        $("#price8").live('change', function() {
            getOptionItem(8);                                       
        });
        $('td.day').live('click',function(){
            $('#slAdult').empty();
            $('#slChd').empty();
            $('#slSingleRoom').empty();
            $('#slForeign').empty();
            $('#slTickets').empty();
            $('#VMB12').empty();
            $('#VMB2to12').empty();
            $('#VMB2').empty();
            $('#tour_type').val('0');
            $('#flight_type').val('0');
            $('#price1').val('0');
            $('#price2').val('0');
            $('#price3').val('0');
            $('#price4').val('0');
            $('#price5').val('0');
            $('#price6').val('0');
            $('#price7').val('0');
            $('#price8').val('0');
            $('#price1').attr('disabled', true);
            $('#price2').attr('disabled', true);
            $('#price3').attr('disabled', true);
            $('#price4').attr('disabled', true);  
            $('#price5').attr('disabled', true);
            $('#price6').attr('disabled', true);
            $('#price7').attr('disabled', true);
            $('#price8').attr('disabled', true);
            $("#sumall").html(Number(0).toLocaleString('en'));
            special_price = 0;
        });
    });
    function parseDate(str) {
        var mdy = str.split('-');
        return new Date(mdy[2], mdy[1], mdy[0]);
    }
    function change_alias(alias){
        var str = alias;
        str= str.toLowerCase(); 
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ  |ặ|ẳ|ẵ/g,"a"); 
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ  |ợ|ở|ỡ/g,"o"); 
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
        str= str.replace(/đ/g,"d"); 
        str= str.replace(/!|@|%|\^|\(|\)|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
        /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
        str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
        str= str.replace(/^\-+|\-+$/g,""); 
        //cắt bỏ ký tự - ở đầu và cuối chuỗi 
        return str;
    }
    function getDescription(id) {
        $.getJSON('<?php echo base_url(); ?>schedule/getDescription', {product_id: id}, function(json) {
            $('#txtModel').html(json[0]['model']);
            $('#txtNameTour').html(json[0]['name']);
            $('#txtSchedule').html(json[0]['schedule']);
            $('#txtDuration').html(json[0]['duration']);
            $('#txtStartPlane').html(json[0]['location_from']);
            $('#txtTimeStartTour').html(json[0]['departure']);
            $('#txtTraffic').html(json[0]['transport']);
            var temp = document.createElement("pre");
            temp.innerHTML=json[0]['description'];
            if(temp.firstChild != null){
                CKEDITOR.instances.txtDescription.setData(temp.firstChild.nodeValue);
            }
            temp.innerHTML= json[0]['included'];
            if(temp.firstChild != null){
                CKEDITOR.instances.txtIncluded.setData(temp.firstChild.nodeValue);
            }
            temp.innerHTML= json[0]['notincluded'];
            if(temp.firstChild != null){
                CKEDITOR.instances.txtNotincluded.setData(temp.firstChild.nodeValue);
            }
            temp.innerHTML= json[0]['info'];
            if(temp.firstChild != null){
                CKEDITOR.instances.txtInfo.setData(temp.firstChild.nodeValue);
            }
            temp.innerHTML= json[0]['meeting'];
            if(temp.firstChild != null){
                CKEDITOR.instances.txtMeeting.setData(temp.firstChild.nodeValue);
            }
        });        
    }
</script>