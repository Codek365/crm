<div class="row" xmlns="http://www.w3.org/1999/html">
    <?php echo (isset($menu) ? $menu : '');?><!-- /span-3 -->
    <div class="col-sm-9" style="width: 80%">
        <!-- column 2 -->
        <h3><i class="glyphicon glyphicon-align-justify"></i> Danh Sách Email Dùng Để Gửi</h3>

        <hr>
        <div class="row">
            <!-- center left-->
            <div class="col-md-12">

                <div class="row" style="padding-left: 15px; padding-bottom: 10px ">
                    <button class="btn green add-new" type="submit" data-toggle="modal" href="#basic"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
                    <button class="btn red delete_user"  type="button"><i class="glyphicon glyphicon-trash"></i> Xóa</button>
                </div>

                <div class="panel panel-default">
                    <table class="table table-hover">
                        <tr class="tr-out">
                            <td width="6%">TT</td>
                            <td width="6%">Chọn</td>
                            <td width="45%">Email</td>
                            <td width="15%">Được chỉ định</td>
                            <td width="10%">Chỉ định</td>
                            <td width="10%">Status</td>
                            <td width="10%">Action</td>
                        </tr>
                        <?php
                            if(!empty($user)){
                                $i = 1;
                                foreach($user as $_user){ ?>
                                    <tr class="tr-bb">
                                        <td width="6%"><?php echo $i;?></td>
                                        <td width="6%"><input class="vl_email" type="checkbox" name="id_check" value="<?php echo $_user['email'];?>"></td>
                                        <td width="30%"><?php echo $_user['email'];?></td>
                                        <?php if($_user['asign_from'] == 1){ ?>
                                            <td ><?php echo $_user['assign_from_number'];?></td>
                                        <?php }else{ ?>
                                            <td style="color: red"><i class="glyphicon glyphicon-remove"></i></td>
                                        <?php }?>
                                        <?php if($_user['asign_to'] == 1){ ?>
                                            <td><?php echo $_user['assign_to_number'];?></td>
                                        <?php }else{ ?>
                                            <td style="color: red"><i class="glyphicon glyphicon-remove"></i></td>
                                        <?php }?>
                                        <?php if($_user['status'] == 1){ ?>
                                            <td style="color: green"><i class="glyphicon glyphicon-ok"></i></td>
                                        <?php }else{ ?>
                                            <td style="color: red"><i class="glyphicon glyphicon-remove"></i></td>
                                        <?php }?>
                                        <td width="10%" class="class="btn blue"">
                                            <i email="<?php echo $_user['email'];?>" data-toggle="modal" href="#basic" style="cursor: pointer" class="glyphicon glyphicon-zoom-out view-user"></i>
                                        </td>
                                    </tr>
                            <?php    $i++; }
                            }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div><!--/col-->

        </div><!--/row-->
    </div><!--/col-span-9-->

    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true" >
<!--    <div class="modal fade in" id="basic" tabindex="-1" role="basic" aria-hidden="true"  aria-hidden="false" style="display: block;">-->
    <div class="modal-dialog">
            <form class="form-horizontal process_email" method="POST" action="<?php echo base_url('emailpermission/process_email')?>" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">View Email</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tên:</label>
                                <label class="col-md-3 control-label text-align-left user-name"></label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email: </label>
                                <label class="col-md-3 control-label text-align-left email-text"></label>
                            </div>

                            <div class="form-group asign-to-group">
                                <label class="col-md-3 control-label">Assign to:</label>
                                <div class="col-md-8" style="width: 75%;" >
                                <div class="row" >
                                    <div class="col-xs-5">
                                        <label>Email list</label>
                                        <select name="from" id="undo_redo" class="form-control max-111 assign-to-select select_to" size="13" multiple="multiple" style="font-size: 12px"></select>
                                    </div>

                                    <div class="col-xs-2" style="padding-top: 24px">
                                        <button style="margin-left: 5px;" type="button" id="undo_redo_rightAll" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-forward"></i></button>
                                        <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                        <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                        <button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-backward"></i></button>
                                    </div>

                                    <div class="col-xs-5">
                                        <label>Move Draft</label>
                                        <select name="to" id="undo_redo_to" class="form-control max-111 agsign-to-draft" size="13" multiple="multiple" style="font-size: 12px"></select>
                                    </div>
                                    <input type="hidden" name="email_assign_user" class="email_assign_user">
                                    <input type="hidden" name="all_email_assign_from" class="all_email_assign_from" value="">
                                    <input type="hidden" name="all_email_assign_from_draft" class="all_email_assign_from_draft" value="sdfsdfds">
                                    <input type="hidden" name="all_email_assign_to" class="all_email_assign_to" value="">
                                    <input type="hidden" name="all_email_assign_to_draft" class="all_email_assign_to_draft" value="">
                                </div>
                                </div>
                            </div>

                            <div class="form-group asign-from-group">
                                <label class="col-md-3 control-label">Assign from:</label>
                                <div class="col-md-8" style="width: 75%;">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label>Email list</label>
                                            <select name="from" id="keepRenderingSort" class="form-control max-111 assign-from-select" size="8" multiple="multiple" style="font-size: 12px; ">
                                            </select>
                                        </div>

                                        <div class="col-xs-2" style="padding-top: 24px">
                                            <button style="margin-left: 5px;" type="button" id="keepRenderingSort_rightAll" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-forward"></i></button>
                                            <button type="button" id="keepRenderingSort_rightSelected" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                            <button type="button" id="keepRenderingSort_leftSelected" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                            <button type="button" id="keepRenderingSort_leftAll" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-backward"></i></button>
                                        </div>

                                        <div class="col-xs-5">
                                            <label>Move Draft</label>
                                            <select style="font-size: 12px;" name="to" id="keepRenderingSort_to" class="form-control max-111 agssign-from-draft" size="8" multiple="multiple" >
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group add-assign-form" style="display: none">
                                <label class="col-md-3 control-label">Add email:</label>
                                <div class="col-md-8" style="width: 75%;">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <select style="font-size: 12px;padding-left: 5px" name="from" id="multiselect" class="form-control  max-111 add-email-from" size="8" multiple="multiple"></select>
                                        </div>

                                        <div class="col-xs-2" >
                                            <button style="margin-left: 5px;" type="button" id="multiselect_rightAll" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-forward"></i></button>
                                            <button type="button" id="multiselect_rightSelected" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                            <button type="button" id="multiselect_leftSelected" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                            <button type="button" id="multiselect_leftAll" class="btn btn-default btn-block btd-bt"><i class="glyphicon glyphicon-backward"></i></button>
                                        </div>

                                        <div class="col-xs-5">
                                            <select style="font-size: 12px;" name="to" id="multiselect_to" class="form-control  max-111 add-email-to" size="8" multiple="multiple"></select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-12 control-label text-align-left choose-new-email" > <a><i class="glyphicon glyphicon-resize-small"></i> choose email</a> </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group add-assign-group">
                                <label class="col-md-3 control-label"> </label>
                                <label class="col-md-3 control-label text-align-left " style="width: 50%;">
                                    <a class="add-assign-from"> <i class="glyphicon glyphicon-plus plus-asign"></i> Add asign from </a> | <a class="add-assign-to"> <i class="glyphicon glyphicon-plus plus-asign"></i> Add asign to </a>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div><!--/row-->
<script src="<?php echo base_url(); ?>assets/js/prettify.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/multiselect.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#multiselect').multiselect({
            keepRenderingSort: true
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete_user').on('click',function(){
            var email = $('.vl_email');
            email.each(function(){
                if($(this).is(":checked")){
                    var input = $(this).parent().parent().parent().parent();
                    $.ajax({
                        type: "POST",
                        dataType:"JSON",
                        url: "<?php echo base_url().'emailpermission/deleteUser';?>",
                        data: { email: $(this).val() },
                        success: function(result) {
                            input.remove();
                        }
                    });
                }

            })
        })
        // make code pretty
        window.prettyPrint && prettyPrint();

        if ( window.location.hash ) {
            scrollTo(window.location.hash);
        }

        $('.nav').on('click', 'a', function(e) {
            scrollTo($(this).attr('href'));
        });

        $('#multiselect').multiselect();
        $('.multiselect').multiselect();
        $('.js-multiselect').multiselect({
            right: '#js_multiselect_to_1',
            rightAll: '#js_right_All_1',
            rightSelected: '#js_right_Selected_1',
            leftSelected: '#js_left_Selected_1',
            leftAll: '#js_left_All_1'
        });

        $('#keepRenderingSort').multiselect({
            keepRenderingSort: true
        });

        $('#undo_redo').multiselect();

        $('#multi_d').multiselect({
            right: '#multi_d_to, #multi_d_to_2',
            rightSelected: '#multi_d_rightSelected, #multi_d_rightSelected_2',
            leftSelected: '#multi_d_leftSelected, #multi_d_leftSelected_2',
            rightAll: '#multi_d_rightAll, #multi_d_rightAll_2',
            leftAll: '#multi_d_leftAll, #multi_d_leftAll_2',

            moveToRight: function(Multiselect, options, event, silent, skipStack) {
                var button = $(event.currentTarget).attr('id');

                if (button == 'multi_d_rightSelected') {
                    var left_options = Multiselect.left.find('option:selected');
                    Multiselect.right.eq(0).append(left_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.right.eq(0).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(0));
                    }
                } else if (button == 'multi_d_rightAll') {
                    var left_options = Multiselect.left.find('option');
                    Multiselect.right.eq(0).append(left_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.right.eq(0).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(0));
                    }
                } else if (button == 'multi_d_rightSelected_2') {
                    var left_options = Multiselect.left.find('option:selected');
                    Multiselect.right.eq(1).append(left_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.right.eq(1).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(1));
                    }
                } else if (button == 'multi_d_rightAll_2') {
                    var left_options = Multiselect.left.find('option');
                    Multiselect.right.eq(1).append(left_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.right.eq(1).eq(1).find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.right.eq(1));
                    }
                }
            },

            moveToLeft: function(Multiselect, options, event, silent, skipStack) {
                var button = $(event.currentTarget).attr('id');

                if (button == 'multi_d_leftSelected') {
                    var right_options = Multiselect.right.eq(0).find('option:selected');
                    Multiselect.left.append(right_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                } else if (button == 'multi_d_leftAll') {
                    var right_options = Multiselect.right.eq(0).find('option');
                    Multiselect.left.append(right_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                } else if (button == 'multi_d_leftSelected_2') {
                    var right_options = Multiselect.right.eq(1).find('option:selected');
                    Multiselect.left.append(right_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                } else if (button == 'multi_d_leftAll_2') {
                    var right_options = Multiselect.right.eq(1).find('option');
                    Multiselect.left.append(right_options);

                    if ( typeof Multiselect.callbacks.sort == 'function' && !silent ) {
                        Multiselect.left.find('option').sort(Multiselect.callbacks.sort).appendTo(Multiselect.left);
                    }
                }
            }
        });
    });

    function scrollTo( id ) {
        if ( $(id).length ) {
            $('html,body').animate({scrollTop: $(id).offset().top - 40},'slow');
        }
    }
</script>
<script type="text/javascript">
    $(function(){
        $('.view-user').on('click',function(){
            $('.assign-from-select').empty();
            $('.agssign-from-draft').empty();
            $('.assign-to-select').empty();
            $('.agssign-to-draft').empty();
            var email = $(this).attr('email');
            $('.add-assign-form').hide();
            $.ajax({
                type: "POST",
                dataType:"JSON",
                url: "<?php echo base_url().'emailpermission/getUserDescription';?>",
                data: { email: email },
                success: function(result){
                    $('.user-name').text(result.name);
                    $('.email-text').text(result.email);

                    if(result.asign_to_number > 0 && result.asign_from_number > 0){
                        $('.assign-to-select').empty();
                        $.each(result.asign_to,function(key,name){
                            var html = '<option value="'+name+'">'+name+'</option>';
                            $('.select_to').append(html);
                        });
                        $('div.asign-to-group').show();

                        $.each(result.asign_from,function(key,name){
                            $('.assign-from-select').empty();
                            var html = '<option value="'+name+'">'+name+'</option>';
                            $('.assign-from-select').append(html);
                        });
                        $('div.asign-from-group').show();

                        $('.add-assign-form').hide();


                    }else{
                        if(result.asign_to_number > 0){
                            $('.assign-to-select').empty();
                            $.each(result.asign_to,function(key,name){
                                var html = '<option value="'+name+'">'+name+'</option>';
                                $('.select_to').append(html);
                            });
                            $('div.asign-from-group').hide();
                            $('div.asign-to-group').show();
                        }else{
                            $('div.asign-to-group').hide();
                        }

                        if(result.asign_from_number > 0){
                            $.each(result.asign_from,function(key,name){
                                $('.assign-from-select').empty();
                                var html = '<option value="'+name+'">'+name+'</option>';
                                $('.assign-from-select').append(html);
                            });
                            $('div.asign-from-group').show();
                            $('div.asign-to-group').hide();
                        }else{
                            $('div.asign-from-group').hide();
                        }
                    }


                    var footer = '<div class="modal-footer">';
                        footer += '<button type="button" class="btn default" data-dismiss="modal">Close</button>';
                        footer += '<button type="button" class="btn blue edit_user">Edit User</button>';
                        footer += '</div>';
                    $('.modal-content').find('div.modal-footer').remove();
                    $('.modal-content').append(footer);
                }
            });
        });
        $('.add-assign-from').on('click',function(){
            $('.asign-from-group').show();
            $('.add-assign-form').show();
            $('.asign-to-group').hide();
            $('.add-email-from').empty();
            $('.add-email-to').empty();

            var group_asign = 'asign-from-group';
            var select_asign = 'assign-from-select';
            getemail(group_asign,select_asign);

        });
        $('.add-assign-to').on('click',function(){
            $('.asign-to-group').show();
            $('.add-assign-to').show();
            $('.add-assign-form').show();
            $('.asign-from-group').hide();
            $('.add-email-to').empty();
            $('.add-email-from').empty();

            var group_asign = 'asign-to-group';
            var select_asign = 'assign-to-select';
            getemail(group_asign,select_asign);
        });
        function getemail(group_asign,select_asign){
            var option = $('div.'+group_asign).find('select.'+select_asign).find('option');
            var user_email = $('.email-text').text();
            var email = new Array();
            option.each(function(){
                email.push($(this).text());
            });
            if(email.length == 0){
                email = '';
            }
            $.ajax({
                type: "POST",
                dataType:"JSON",
                url: "<?php echo base_url().'emailpermission/getEmailAsign';?>",
                data: { email: email, user_email:user_email },
                success: function(result){
//                    console.log(result);return false;
                    $.each(result, function(k, v) {
//                        console.log(v.email)
                        var html = '<option value="' + v.email + '">'+ v.email +'</option>';
                        $('.add-email-from').append(html);
                    })
                }
            });
        }

        $('.choose-new-email').on('click',function(){
            var email = $('select.add-email-to').find('option');
            if ($('.asign-from-group').css('display') == 'block'){
                $('.assign-from-select').append(email);
                var option = $('select.agssign-from-draft').find('option');
                $('select.add-email-from').append(option);
            }else{
                if ($('.asign-to-group').css('display') == 'block'){
                    $('.assign-to-select').append(email);
                    var option = $('select.agsign-to-draft').find('option');
                    $('select.add-email-from').append(option);
                }
            }

        });
        $('body').delegate('.edit_user','click',function(){
            var user_email = $('.email-text').text();
            $('.email_assign_user').val(user_email);
            if ($('.asign-from-group').css('display') == 'block'){
                if($('.asign-to-group').css('display') == 'none'){
                    $('.all_email_assign_to').val('');
                    $('.all_email_assign_to_draft').val('');
                }

                var assign_from_select = $('select.assign-from-select').find('option');
                var assign_from = new Array();
                assign_from_select.each(function(){
                    assign_from.push($(this).text());
                });
                $('.all_email_assign_from').val(assign_from);

                var assign_from_draft = $('select.agssign-from-draft').find('option');
                var assign_draft = new Array();
                assign_from_draft.each(function(){
                    assign_draft.push($(this).text());
                })
                $('.all_email_assign_from_draft').val(assign_draft);
            }
            if($('.asign-to-group').css('display') == 'block'){
                if($('.asign-from-group').css('display') == 'none'){
                    $('.all_email_assign_from').val('');
                    $('.all_email_assign_from_draft').val('');
                }

                var assign_to = $('select.assign-to-select').find('option');
                var arr_assign_to = new Array();
                var i = 0;
                assign_to.each(function(){
                    arr_assign_to.push($(this).text());
                    i++;
                });
                $('.all_email_assign_to').val(arr_assign_to);

                var assign_draft = $('select.agsign-to-draft').find('option');
                var arr_to_draft = new Array();
                assign_draft.each(function(){
                    arr_to_draft.push($(this).text());
                });
                $('.all_email_assign_to_draft').val(arr_to_draft);

            }

            if(i > 1){
                alert('Chỉ được Assign đến 1 email duy nhất !');
                return false;
            }
            var email = $('select.add-email-to').find('option');
            if(email.length > 0){
                alert('Vui lòng add email assign vừa chọn ?');
                return false;
            }else{
                $('.process_email').submit();
            }

        });
    });
</script>
