<div class="row">
    <?php
    $success = $this->session->flashdata('success');
    if(!empty( $success)){ ?>
        <div class="alert alert-success margin-bottom-10">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <i class="glyphicon glyphicon-ok"></i> <?php echo $success;?>
        </div>
    <?php    }
    ?>
    <?php
    $flash = $this->session->flashdata('error');
    if(!empty($flash)){
        ?>
        <div style="width: 96.6%;margin-left: 16px;" id="prefix_651377199096" class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa-lg fa fa-warning"></i>  <?php echo $flash;?></div>
    <?php } ?>
    <div class="col-xs-12">

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                    #
                </th>
                <th class="hidden-480">
                    Email
                </th>
                <th class="hidden-480">
                    Mail gửi
                </th>
                <th class="hidden-480">
                    Mail nhận
                </th>
                <th width="8%">
                    <a href="#form_modal2" data-toggle="modal" ><i class="glyphicon glyphicon-plus"></i> Thêm</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($email)){
                    $i = 1;
                    foreach($email as $_email){ ?>
                        <tr>
                            <td> <?php echo $i;?> </td>
                            <td class="hidden-480">
                                <?php echo $_email->email;?>
                            </td>
                            <td class="hidden-480">
                                <?php echo number_format($_email->send_number);?>
                            </td>
                            <td class="hidden-480">
                                <?php echo number_format($_email->inbox_number);?>
                            </td>
                            <td>
                                <a onclick="return confirm('Bạn thực sự muốn xóa ?');" href="<?php echo base_url('checkemail/deleteEmail/'.$_email->id)?>"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                 <?php   $i++; }
                }else{ ?>
                    <tr>
                        <td colspan="5" style="text-align: center">Bạn chưa có tài khoản email</td>
                    </tr>
            <?php    }
            ?>
            </tbody>
        </table>
        <div id="form_modal2" class="modal fade in" role="dialog" aria-hidden="false" >
            <div class="modal-dialog">
                <div class="loadding-img">
                    <img src="<?php echo base_url('assets/img/LoaderIcon.gif')?>">
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Compose</h4>
                    </div>
                    <!-- stackable -->

                    <!--Modal Sendemail-->
                    <div class="modal-body" style="border: 0px;">
                        <div class="form-group group-file last-file">
                            <form id="form_sample_2" action="<?php echo base_url('checkemail/processEmailUser')?>" class="form-horizontal form-bordered form" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12" style=" padding-top: 16px;">
                                            <table class="table table_none_border table-striped table-hover">
                                                <tr >
                                                    <td  width="25%">* Email:</td>
                                                    <td><input type="text" data-rule-required="true" data-msg-required="* Nhập địa chỉ email" data-rule-email="true" data-msg-email="* Email không đúng định dạng" class="form-control" name="email" placeholder="Nhập email"></td>
                                                </tr>
                                                <tr style="border: 0px">
                                                    <td>* Password:</td>
                                                    <td><input id="password" type="password" class="form-control" data-rule-required="true" data-msg-required="* Nhập mật khẩu" name="password" placeholder="Nhập password"></td>
                                                </tr>
                                                <tr style="border: 0px">
                                                    <td>* conf-Password:</td>
                                                    <td><input type="password" class="form-control" data-rule-required="true" data-msg-required="* Nhập lại mật khẩu" data-rule-equalto="#password" data-msg-equalto="* Mật khẩu không giống nhau"  name="conpass" placeholder="Nhập lại password"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        <button type="button" class="btn blue submitform">Save email</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $('#form_sample_2').validate();
    $('.submitform').on('click',function(){
        $('#form_sample_2').submit();
    });
</script>


