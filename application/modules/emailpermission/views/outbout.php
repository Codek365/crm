
<div class="row">
    <?php echo (isset($menu) ? $menu : '');?><!-- /span-3 -->
    <div class="col-sm-9" style="width: 80%">

        <!-- column 2 -->
        <h3><i class="glyphicon glyphicon-align-justify"></i> Danh Sách Email Dùng Để Gửi</h3>

        <hr>
        <div class="row">
            <!-- center left-->
            <div class="col-md-12">
                <?php
                    $success = $this->session->flashdata('success');
                    if(!empty( $success)){ ?>
                        <div class="alert alert-success margin-bottom-10">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <i class="glyphicon glyphicon-ok"></i> <?php echo $success;?>
                        </div>
                <?php    }
                ?>


                <div class="row" style="padding-left: 15px; padding-bottom: 10px ">
                    <button class="btn green add-new" type="submit" data-toggle="modal" href="#basic"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
                    <button class="btn red delete_outbound"  type="button"><i class="glyphicon glyphicon-trash"></i> Xóa</button>
                </div>

                    <div class="panel panel-default">
                        <table class="table table-hover">
                            <tr class="tr-out">
                                <td width="6%">TT</td>
                                <td width="6%">Chọn</td>
                                <td width="30%">Tên hiển thị</td>
                                <td width="30%">Email</td>
                                <td width="10%">IP host</td>
                                <td width="10%">Status</td>
                                <td width="10%">Action</td>
                            </tr>
                            <?php
                                if(!empty($outbound)){
                                    $i = 1;
                                    foreach($outbound as $items){ ?>
                                        <tr class="tr-bb">
                                            <td width="6%"><?php echo $i;?></td>
                                            <td width="6%"><input class="ob_id" type="checkbox" name="id_check" value="<?php echo $items->id;?>"></td>
                                            <td width="30%"><?php echo $items->fullname;?></td>
                                            <td width="30%"><?php echo $items->smtp_user;?></td>
                                            <td width="10%"><?php echo $items->smtp_host;?></td>
                                            <?php if($items->status == 1){ ?>
                                                <td width="10%" style="color: green"><i class="glyphicon glyphicon-ok"></i></td>
                                            <?php }else{ ?>
                                                <td width="10%" style="color: red"><i class="glyphicon glyphicon-remove"></i></td>
                                            <?php }?>
                                            <td width="10%" class="class="btn blue""><i id="<?php echo $items->id;?>" data-toggle="modal" href="#basic" style="cursor: pointer" class="glyphicon glyphicon-edit edit_outbound"></i></td>
                                        </tr>
                                <?php
                                    $i++; }
                                }
                            ?>

                            </tbody>
                        </table>

                    </div>
            </div><!--/col-->

        </div><!--/row-->
    </div><!--/col-span-9-->

    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <form class="form-horizontal outbound" method="post" action="<?php echo base_url('emailpermission/process_outbound')?>" >
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Insert New Email Outbound</h4>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Protocol</label>
                            <div class="col-md-8">
                                <input type="hidden" name="id" class="outbound_id">
                                <input type="text" data-rule-required="true" data-msg-required="* Vui lòng chọn nhập protocol" placeholder="Enter protocol" class="form-control protocol" name="protocol">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Web mail</label>
                            <div class="col-md-8">
                                <input type="text" data-rule-required="true" data-msg-required="* Vui lòng chọn nhập web mail" placeholder="Enter web mail" class="form-control webmail" name="webmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Smtp host</label>
                            <div class="col-md-8">
                                <input type="text" data-rule-required="true" data-msg-required="* Vui lòng chọn nhập smtp host" placeholder="Enter smtp host" class="form-control smtp_host" name="smtp_host">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Smtp port</label>
                            <div class="col-md-8">
                                <input type="text" data-rule-required="true" data-msg-required="* Vui lòng chọn nhập smtp port" placeholder="Enter smtp port" class="form-control smtp_port" name="smtp_port">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Smtp email</label>
                            <div class="col-md-8">
                                <input type="text" data-rule-required="true" data-msg-required="* Vui lòng chọn nhập smtp smtp email" data-rule-email="true" data-msg-email="* Email không đúng định dạng" placeholder="Enter smtp email" class="form-control smtp_user" name="smtp_user">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Smtp pass</label>
                            <div class="col-md-8">
                                <input type="password" data-rule-required="true" data-msg-required="* Vui lòng chọn nhập smtp pass" placeholder="Enter smtp password" class="form-control smtp_pass" name="smtp_pass">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Display name</label>
                            <div class="col-md-8">
                                <input type="text" data-rule-required="true" data-msg-required="* Vui lòng chọn nhập display name" placeholder="Enter display name" class="form-control fullname" name="fullname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-8" style="padding-left: 15px; margin-top: 8px;">
                                <span style="float: left"><input class="status" type="radio" style="float: left; margin-right: 7px" name="status" value="1"><label style="float: left; margin-top: 2px; "> Active</label></span>
                                 <span style="float: left; margin-left:40px;"><input class="status" type="radio" style="float: left; margin-right: 7px" checked="checked" name="status" value="0"><label style="float: left; margin-top: 2px; "> Unactive</label></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue add_outbound">Add</button>
                </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



</div><!--/row-->
<script type="text/javascript">
    $(function(){
        $('.outbound').validate();
        $('.add_outbound').on('click',function(){
            $('.add_outbound').text('Processing...');
            $('.outbound').submit();
        });
        $('.add-new').on('click',function(){
            $('.outbound_id').val('');
            $('.protocol').val('');
            $('.webmail').val('');
            $('.smtp_host').val('');
            $('.smtp_port').val('');
            $('.smtp_user').val('');
            $('.smtp_pass').val('');
            $('.fullname').val('');
            $('.status').each(function(){
                if($(this).val() == 0){
                    $(this).attr('checked','checked');
                }
            });
        })
        $('.edit_outbound').on('click',function(){
            $('.add_outbound').text('Edit');
            var id = $(this).attr('id');
            $.ajax({
                type:'POST',
                dataType:'JSON',
                url:'<?php echo base_url().'emailpermission/getEmailOutbound';?>',
                data:{ id: id },
                success: function(result){
                    $('.outbound_id').val(result.id);
                    $('.protocol').val(result.protocol);
                    $('.webmail').val(result.webmail);
                    $('.smtp_host').val(result.smtp_host);
                    $('.smtp_port').val(result.smtp_port);
                    $('.smtp_user').val(result.smtp_user);
                    $('.smtp_pass').val(result.smtp_pass);
                    $('.fullname').val(result.fullname);
                    $('.status').removeAttr('checked');
                    $('.status').each(function(){
                       if($(this).val() == result.status){
                           $(this).attr('checked','checked');
                       }
                    });
                }
            });
        });
        $('.delete_outbound').on('click',function(){
            if (confirm("Bạn chắc chắn muốn xóa ? Dữ lệu không được khôi phục về sau.")) {
                var radio = $('.ob_id');
                radio.each(function(){
                    if($(this).is(':checked')){
                        var choose = $(this).parent();
                        var id = $(this).val();
                        $.ajax({
                            type:'POST',
                            url:'<?php echo base_url().'emailpermission/deleteEmailOutbound';?>',
                            data: { id: id },
                            success: function(result){
                                var parent = choose.parent().parent().parent().remove();
                            }
                        });
                    }

                })
            }
            return false;


        })
    })
</script>