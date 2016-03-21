<link href="<?php echo base_url();?>assets/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
    .text-core{ display: block !important;}
    .text-wrap{margin-left: 3px !important; width: 100% !important;}
</style>
<div class="container content-body">
    <div class="row">
        <?php
        $flash = $this->session->flashdata('error');
        if(!empty($flash)){
            ?>
            <div style="width: 96.6%;margin-left: 16px;" id="prefix_651377199096" class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa-lg fa fa-warning"></i>  <?php echo $flash;?></div>
        <?php } ?>
        <?php
        $data = $this->session->flashdata('data');
        $success = $this->session->flashdata('success');
        if(!empty($success)){ ?>
            <div class="alert alert-success margin-bottom-10" style="width: 96.6%;margin-left: 16px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <i class="fa fa-warning fa-lg"></i> <?php echo $success; ?>
            </div>
        <?php }
        ?>
        <div class="col-sm-9 col-md-10 crow-mail-tool">
            <!-- Split button -->
            <div class="btn-group bt-show">
                <button type="button" table="<?php echo $list_email['0']->table;?>" class="btn btn-primary dropdown-toggle font-size-11" data-toggle="dropdown" value="<?php echo $list_email['0']->email;?>"><?php echo $list_email['0']->email;?>  <?php if(count($list_email) > 1) { ?> <span class="caret"></span><?php }?></button>
                <?php
                if(!empty($list_email)){
                ?>
                <ul class="dropdown-menu" role="menu">
                    <?php foreach($list_email as $items_email){  ?>
                            <li table="<?php echo str_replace('.','_',$items_email->table); ?>" class="menu-email-items font-size-11"><a href="javascript:void(0)" ><?php echo $items_email->email;?></a></li>
                        <?php }?>
                </ul>
                <?php } ?>
            </div>
            <div class="btn-group dl-list">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Công cụ &nbsp;<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li class="li-mn get_signed"><a data-toggle="modal" href="#responsive" ><i class="glyphicon glyphicon-inbox"></i> Chữ ký</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-default reload_email" data-toggle="tooltip" title="Reload email">
                &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;</button>
            <!-- Single button -->
            <div class="btn-group dl-list" style="display: none">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Chuyển đến &nbsp;<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li class="li-mn"><a value="inbox" href="javascript:void(0)" class="move-email"><i class="glyphicon glyphicon-inbox"></i> Hộp thư đến</a></li>
                    <li class="li-mn"><a value="spam" href="javascript:void(0)" class="move-email"><i class="glyphicon glyphicon-credit-card"></i> Thư rác</a></li>
                    <li class="li-mn"><a value="send" href="javascript:void(0)" class="move-email"><i class="glyphicon glyphicon-send"></i> Thư đã gửi</a></li>
                    <li class="li-mn"><a value="recycle" href="javascript:void(0)" class="move-email"><i class="glyphicon glyphicon-trash"></i> Thùng rác</a></li>
                </ul>
            </div>
            <button style="display: none" type="button" class="btn btn-default dl-list delete-email" data-toggle="tooltip" title="Xóa email">
                <span class="glyphicon glyphicon-trash"></span>
            </button>
        </div>
        <div class="col-sm-3 col-md-2 crow-mail-bt">

            <div class="pull-right">
                <span class="text-muted">
                    <b class="from-number">1</b>–<b class="to-number">30</b> of <b class="total-number">0</b>
                </span>
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-default mail-prev">
                        <span class="glyphicon glyphicon-chevron-left "></span>
                    </button>
                    <button type="button" class="btn btn-default mail-next">
                        <span class="glyphicon glyphicon-chevron-right "></span>
                    </button>
                </div>
            </div>

        </div>

    </div>
    <hr>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bs_leftnavi.css');?>">
    <script src="<?php echo base_url('assets/js/bs_leftnavi.js');?>"></script>
    <div class="row">
        <div class="col-sm-3 col-md-3 tool-content">
            <input type="hidden" class="event-email" name="event-email" value="">
            <a href="#form_modal2" data-toggle="modal" class="btn btn-danger btn-sm btn-block compose_email" role="button">Soạn Thư</a>
            <hr>

            <div class="nano-content">
                <ul class="gw-nav gw-nav-list">
                    <li class="init-arrow-down"> <a href="javascript:void(0)" class="inbox_"><i class="glyphicon glyphicon-inbox"></i> <span class="gw-menu-text">Hộp thư</span> <b class="gw-arrow"></b> </a>
                        <ul class="gw-submenu">
                            <li class="li-mn"><a value="inbox" href="javascript:void(0)" class="get-mail"> Hộp thư đến</a></li>
                            <li class="li-mn"><a value="draft" href="javascript:void(0)" class="get-mail"> Thư nháp</a></li>
                            <li class="li-mn"><a value="send" href="javascript:void(0)" class="get-mail"> Thư đã gửi</a></li>
                            <li class="li-mn"><a value="spam" href="javascript:void(0)" class="get-mail"> Thư rác</a></li>
                            <li class="li-mn"><a value="recycle" href="javascript:void(0)" class="get-mail"> Thùng rác</a></li>
                        </ul>
                    </li>

                    <li class="init-arrow-down"> <a href="javascript:void(0)"><i class="glyphicon glyphicon-cog"></i> <span class="gw-menu-text">Mỡ rộng</span> <b class="gw-arrow"></b> </a>

                        <ul class="gw-submenu">
                            <li >
                                <a class="create_folder"  title="Thư mục lưu trữ" data-popover-content="#list-popover">Tạo thư mục lưu</a>
                            </li>
                            <li>
                                <a href="#" rel="create" data-toggle="popover" title="Thư mục lưu mail" data-create-content="#list-create">Tự động lấy mail</a>
                            </li>
                        </ul>
                    </li>

                    <li class="init-arrow-down wrapper_folder"> <a href="javascript:void(0)"><i class="glyphicon glyphicon-folder-open"></i> <span class="gw-menu-text">Thư mục chứa</span> <b class="gw-arrow"></b> </a>
                        <ul class="gw-submenu" style="margin-top: -5px !important;">
                            <li class="create-li"></li>
                        </ul>
                    </li>

                </ul>
                <form id="form_input" method="post" action="checkemail/addFolder"></form>
            </div>

        </div>
        <script >
            $(function(){
                function getpecentrow(count){
                    if(count == 9){
                        $('.arrow').attr('style','top:36%');
                    }else{
                        if(count == 11){
                            $('.arrow').attr('style','top:28%');
                        }else{
                            if(count == 13){
                                $('.arrow').attr('style','top:23%');
                            }else{
                                if(count == 15){
                                    $('.arrow').attr('style','top:20%');
                                }else{
                                    if(count == 17){
                                        $('.arrow').attr('style','top:17%');
                                    }else{
                                        if(count == 19){
                                            $('.arrow').attr('style','top:14%');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $('body').delegate('.add_folder','click',function(){
                    var count = $('.input-group').length;
                    var html = '<div class="input-group">';
                    html +='<span class="input-group-addon input-circle-left">';
                    html +='<i class="glyphicon glyphicon-folder-open"></i>';
                    html +='</span>';
                    html +='<input type="text" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'))?>'+count+'[name]" class="form-control input-circle-right folder_input" placeholder="Tên folder">';
                    html +='</div>';
                    html +='<div class="input-group">';
                    html +='<div class="icheck-inline">';
                    html +='<span><input class="folder_checkbox" type="checkbox"  name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>'+count+'[]" value="inbox" > inbox</span>';
                    html +='<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>'+count+'[]" value="send"> Send</span>';
                    html +='<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>'+count+'[]" value="draft"> Draft</span>';
                    html +='</div>';
                    html +='</div>';
                    var folder_last = $('.wrapper_folder').find('div.input-group').last();
                    folder_last.before(html);
                    getpecentrow(count);

                });
                $('.subins_folder').on('click',function(){
                    $('input[name="undefined[]"]').remove();
                    $('#form_input').submit();
                });
//                $('body').delegate('.folder_input','focusout',function(){
//                    var email = $('.bt-show').find('button').val();
//                    var value = $(this).val();
//                    var name = $(this).attr('name');
//                    var str = name.split('[]');
//                    var html = '<input class="'+str[0]+'" type="hidden" value="'+value+'" name="'+name+'">';
//                        html += '<input class="'+str[0]+'" type="hidden" value="1" name="folder_type">';
//                        html += '<input class="'+str[0]+'" type="hidden" value="'+email+'" name="folder_email">';
//                    $('#form_input').append(html);
//                });
                $('body').delegate('.folder_checkbox','click',function(){
                    if($(this).is(':checked')){
                        var value = $(this).val();
                        var name = $(this).attr('name');
                        var str = name.split('[]');
                        var html = '<input class="'+str[0]+'" type="hidden" value="'+value+'" name="'+name+'">';
                        $('#form_input').append(html);
                    }else{
                        var value = $(this).val();
                        var name = $(this).attr('name');
                        var str = name.split('[]');
                        $('.'+str[0]).each(function(){
                            if($(this).val() == value){
                                $(this).remove();
                            }
                        });
                    }
                });

            });
        </script>
<!--        <script>-->
<!--            $(function(){-->
<!--                $('[rel="popover"]').popover({-->
<!--                    container: 'body',-->
<!--                    html: true,-->
<!--                    content: function () {-->
<!--                        $('.popover').hide();-->
<!--                        var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');-->
<!--                        return clone;-->
<!--                    }-->
<!--                }).click(function(e) {-->
<!--                    e.preventDefault();-->
<!--                });-->
<!--            })-->
<!--        </script>-->
<!--        <script>-->
<!--            $(function(){-->
<!--                $('[rel="create"]').popover({-->
<!--                    container: 'body',-->
<!--                    html: true,-->
<!--                    content: function () {-->
<!--                        $('.popover').hide();-->
<!--                        var clone = $($(this).data('create-content')).clone(true).removeClass('hide');-->
<!--                        return clone;-->
<!--                    }-->
<!--                }).click(function(e) {-->
<!--                    e.preventDefault();-->
<!--                });-->
<!--            })-->
<!--        </script>-->

        <div class="col-sm-9 col-md-10 content-email">
            <div class="tab-content" style="border-radius: 0px !important;">
                <div class="tab-pane fade in active" id="home">
                    <div class="loading-get-email"><img style="max-width: 70px" src="<?php echo base_url('assets/img/LoaderIcon.gif')?>"></div>
                    <div class="list-group">
                        <!----content email ----->
                        <!----endcontent email ----->
                    </div>

                </div>
                <div class="tab-pane fade in" id="profile">
                    <div class="list-group">
                        <div class="list-group-item">
                            <span class="text-center">This tab is empty.</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="messages">
                    ...</div>
                <div class="tab-pane fade in" id="settings">
                    This tab is empty.</div>
            </div>
        </div>
    </div>

    <!------------------------modal compose email-------------------------->
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
                <div class="modal-body" style="border: 0px; padding-top: 3px; margin-bottom: -30px">
                    <div class="form-group group-file last-file">

                        <form id="form_sample_2" action="<?php echo base_url()?>checkemail/sendEmail" class="form-horizontal form-bordered form" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="col-md-12" style="width: 100%;">
                                        <table>
                                            <tr class="email-body">
                                                <td>
                                                    <div class="col-md-4 margin-none">
                                                        <button  type="button" class="btn blue submit-form sb-modal send_email">Send mail <i class="fa fa-paper-plane-o"></i></button>
                                                    </div>
                                                </td>
                                                <td width="100%">
                                                    <table width="100%" class="table-email">
                                                        <tr>
                                                            <td>
                                                                <p class="to-icon ls-10">
                                                                    <a style="padding-right: 13px !important;" class="btn blue" data-toggle="modal">Out..</a>
                                                                </p>
                                                            </td>
                                                            <td class="pd-top send-email-to" style="width: 100%" ng-controller="autocompleteController" >
                                                                <select name="email_out" class="form-control width-98 height-20">
                                                                    <?php
                                                                        if(!empty($email_out)){
                                                                            foreach($email_out as $row_out){ ?>
                                                                                <option value="<?php echo $row_out->smtp_user;?>"><?php echo $row_out->smtp_user;?></option>
                                                                        <?php    } }?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p class="to-icon ls-10">
                                                                    <a class="btn green" data-toggle="modal">To...</a>
                                                                </p>
                                                            </td>
                                                            <td class="pd-top send-email-to" style="width: 100%" ng-controller="autocompleteController" >
                                                                <input class="row_id" type="hidden" name="row_id" value="0">
                                                                <input id="email_to" type="hidden" name="email_to" value="">
                                                                <input type="email" onkeydown="return stopTab(event);" data-rule-required="true" data-rule-email="true" data-msg-email="* Email không đúng định dạng" data-msg-required="* Vui lòng nhập địa chỉ email" class="form-control email_to" id="spotlight" placeholder="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td >
                                                                <p class="to-icon ls-10">
                                                                    <a class="btn yellow" data-toggle="modal">CC..</a>
                                                                </p>
                                                            </td>
                                                            <td class="td-email-cc">
                                                                <input type="text" id="tokens-example"/>
                                                                <input class="mail_cc" type="hidden" name="mail_cc" value="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> <p class="to-icon ls-10">
                                                                    <a class="btn default" data-toggle="modal">Sb...</a>
                                                                </p></td>
                                                            <td class="pd-top">
                                                                <input class="width-98 subject" data-rule-required="true" data-rule-required="* Vui lòng nhập tiêu đề"  type="text" name="subject">
                                                            </td>
                                                        </tr>
                                                        <tr class="choose_attach">
                                                            <td></td>
                                                            <td class="pd-top" style="padding-left: 10px; ">
                                                              <span class="btn btn-success fileinput-button">
                                                                <span>Select files...</span>
                                                                <input id="fileupload" type="file" name="files[]" multiple>
                                                              </span>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </td>
                                            </tr>
                                            <tr >
                                                <td></td>
                                                <td>
                                                    <p class="loading-bar">
                                                        <img style="max-height: 20px" src="<?php echo base_url('assets/img/progress_bar.gif');?>">
                                                    </p>
                                                    <p class="fl-upload">
                                                    <ul id="files-ul"></ul>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">

                                                </td>
                                            </tr>

                                        </table>
                                        <input type="hidden" class="content" name="content" value="">
                                        <input type="hidden" class="table_send" name="table_send" value="">
                                        <input type="hidden" class="email_send" name="email_send" value="">
                                        <div id='edit'>
                                            <p><br></p>
                                            <?php echo(!empty($signed->signed) ? html_entity_decode($signed->signed,ENT_QUOTES,'UTF-8') : '');?>
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

    <!------------------------modal compose email-------------------------->
    <form class="signed_form" method="post" action="<?php echo base_url('checkemail/processSigned')?>">
        <div id="responsive" class="modal fade in" role="dialog" aria-hidden="false" >
            <div class="modal-dialog">
                <div class="loadding-img">
                    <img src="<?php echo base_url('assets/img/LoaderIcon.gif')?>">
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Cài đặt chữ ký</h4>
                    </div>
                    <!-- stackable -->

                    <!--Modal Sendemail-->
                    <div class="modal-body signed_edit">
                        <div id='edit-i'><?php echo(!empty($signed->signed) ? html_entity_decode($signed->signed,ENT_QUOTES,'UTF-8') : '');?> </div>
                        <input class="input_signed" type="hidden" name="input_signed" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        <button type="button" class="btn btn-primary edit_sign">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!------------------------modal compose email-------------------------->
</div>

<link href="<?php echo base_url()?>assets/wys/css/froala_editor.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/wys/css/froala_style.min.css" rel="stylesheet" type="text/css">

<script src="<?php echo base_url()?>assets/wys/js/froala_editor.min.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo base_url()?>assets/wys/js/froala_editor_ie8.min.js"></script>
<![endif]-->

<script src="<?php echo base_url()?>assets/wys/js/plugins/tables.min.js"></script>
<script src="<?php echo base_url()?>assets/wys/js/plugins/lists.min.js"></script>
<script src="<?php echo base_url()?>assets/wys/js/plugins/colors.min.js"></script>
<script src="<?php echo base_url()?>assets/wys/js/plugins/media_manager.min.js"></script>
<script src="<?php echo base_url()?>assets/wys/js/plugins/font_family.min.js"></script>
<script src="<?php echo base_url()?>assets/wys/js/plugins/font_size.min.js"></script>
<script src="<?php echo base_url()?>assets/wys/js/plugins/block_styles.min.js"></script>
<script src="<?php echo base_url()?>assets/wys/js/plugins/video.min.js"></script>

<script type="text/javascript">
    $(function(){

        $('body').delegate('.open_folder','click',function(){
            $(this).parent().find('ul').first().find('li').toggle();
            $( this ).toggleClass( "glyphicon-minus" );
        });

        $('body').delegate('.folder_row','click',function(){
            var id = $(this).attr('id');
            var email = $(this).attr('email');

            var check_child = $(this).parent().find('ul').find('li.branch');
            $(this).popover({
                html: true,
                placement: 'top',
                container: 'body',
                title: function () {
                    return 'Thông tin chung';
                },
                content: function () {
                    $('.popover').hide();
                    var html = '<ul class="ul-common">';
                    html += '<li class="li-mn"><a value="inbox" href="javascript:void(0)" id = "'+id+'" email = "'+email+'" class="add_folder_child"><i class="glyphicon glyphicon-plus"></i> Tạo mục con</a></li>';
                        html += '<li class="li-mn"><a value="inbox" href="javascript:void(0)" id = "'+id+'" email = "'+email+'" class="delete_folder"><i class="glyphicon glyphicon-trash"></i> Xóa thư mục</a></li>';
                        if(check_child.length == 0){
                            html += '<li class="li-mn"><a value="draft" href="javascript:void(0)" id = "'+id+'" email = "'+email+'" level="1" class="tranfer-to"><i class="glyphicon glyphicon-share-alt"></i> Di chuyển đến</a></li>';
                        }

                        html += '</ul>';
                    return html;
                }
            });
        });

        $('body').delegate('.create_folder','click',function(){
            var email = $('.bt-show').find('button').val();
            $(this).popover({
                html: true,
                placement: 'right',
                container: 'body',
                title: function () {
                    return 'Thông tin chung';
                },
                content: function () {
                    $('.popover').hide();
                    var html = '<form id="child_form"  method="post" action="<?php echo base_url('checkemail/addFolder')?>">';
                    html += '<input type="hidden" name="folder_type" value="1">';
                    html += '<input type="hidden" name="folder_email" value="'+email+'">';
                    html += '<div id="list-popover" >';
                    html += '<div class="col-md-12 wrapper_folder" style="padding: 0px ; margin: 0px">';
                    html += '<div class="input-group">';
                    html += '<span class="input-group-addon input-circle-left">';
                    html += '<i class="glyphicon glyphicon-folder-open"></i>';
                    html += '</span>';
                    html += '<input type="text" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'))?>[name]" value="" class="form-control input-circle-right folder_input" placeholder="Tên folder">';
                    html += '</div>';
                    html += '<div class="input-group folder_input">';
                    html += '<div class="icheck-inline">';
                    html += '<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>[]" value="inbox"> inbox</span>';
                    html += '<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>[]" value="send"> send</span>';
                    html += '<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>[]" value="draft"> draft</span>';
                    html += '</div>';
                    html += '</div>';

                    html += '<div class="input-group">';
                    html += '<div class="icheck-inline">';
                    html += '<a class="add_folder font-13"><i class="glyphicon glyphicon-plus font-13"></i> Thêm mục mới</a>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="form-actions top" style="margin-bottom: 15px;">';
                    html += '<div class="row" style="text-align: left">';
                    html += '<div class=" col-md-12">';
                    html += '<button style="width: 100%;" type="submit" class="btn default subins_folder_child">Submit</button>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</form>';
                    return html;
                }
            });
        });

        $('body').delegate('.add_folder_child','click',function(){
            var id = $(this).attr('id');
            $(this).popover({
                html: true,
                placement: 'right',
                container: 'body',
                title: function () {
                    return 'Thông tin chung';
                },
                content: function () {
                     var html = '<form id="child_form" method="post" action="<?php echo base_url('checkemail/insertFolderChild')?>">';
                        html += '<input type="hidden" name="folder_id" value="'+id+'">';
                        html += '<div id="list-create" >';
                        html += '<div class="col-md-12 wrapper_folder" style="padding: 0px ; margin: 0px">';
                        html += '<div class="input-group">';
                        html += '<span class="input-group-addon input-circle-left">';
                        html += '<i class="glyphicon glyphicon-folder-open"></i>';
                        html += '</span>';
                        html += '<input type="text" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'))?>[folder]" value="" class="form-control input-circle-right folder_input" placeholder="Tên folder">';
                        html += '</div>';
                        html += '<div class="input-group folder_input">';
                        html += '<div class="icheck-inline">';
                        html += '<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>[]" value="inbox"> Inbox</span>';
                        html += '<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>[]" value="send"> Send</span>';
                        html += '<span><input class="folder_checkbox" type="checkbox" name="folder_<?php echo strtotime(date('Y-m-d H:i:s'));?>[]" value="draft"> Draft</span>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class="form-actions top" style="margin-bottom: 15px;">';
                        html += '<div class="row" style="text-align: left">';
                        html += '<div class=" col-md-12">';
                        html += '<button style="width: 100%;" type="submit" class="btn default subins_folder_child">Submit</button>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</form>';
                    return html;
                }
            });
        });

        $('body').delegate('.subins_folder_child','click',function(){
            $('#child_form').submit();
        });


        $('body').delegate('.folder-child-row','click',function(){
            var id = $(this).attr('id');
            var parent_folder = $(this).attr('parent_folder');
            var email = $('.bt-show').find('button').val();
            $(this).popover({
                html: true,
                placement: 'top',
                container: 'body',
                title: function () {
                    return 'Thông tin chung';
                },
                content: function () {
                    $('.popover').hide();
                    var html = '<ul class="ul-common">';
                    html += '<li class="li-mn"><a value="inbox" href="javascript:void(0)" id = "'+id+'" id = "'+id+'" class="add_folder_child"><i class="glyphicon glyphicon-plus"></i> Tạo mục con</a></li>';
                    html += '<li class="li-mn"><a value="inbox" href="javascript:void(0)" id = "'+id+'" parent_folder = "'+parent_folder+'" class="delete_folder_child"><i class="glyphicon glyphicon-trash"></i> Xóa thư mục</a></li>';
                    html += '<li class="li-mn"><a value="draft" href="javascript:void(0)" id = "'+id+'" level="2" parent_folder = "'+parent_folder+'" email = "'+email+'" class="tranfer-to"><i class="glyphicon glyphicon-share-alt"></i> Di chuyển đến</a></li>';
                    html += '</ul>';
                    return html;
                }
            });
        })

        $('body').delegate('.tranfer-to','click',function(){
            var id = $(this).attr('id');
            var level = $(this).attr('level');
            var email = $('.bt-show').find('button').val();
            var parent_folder = $(this).attr('parent_folder');
            if(parent_folder){
                var parent = parent_folder;
            }else{
                var parent = 0;
            }
            $(this).popover({
                html: true,
                placement: 'right',
                container: 'body',
                title: function () {
                    return 'Thông tin chung';
                },
                content: function () {
                    var html = '<form class="transferform" method="post" action="<?php echo base_url('checkemail/transferFolder')?>">';
                        html += '<div class="content_email">';
                        html += '<div class="col-md-12" style="margin-bottom: 12px">';
                        html += '<select class="form-control transfer_select">';
                        html += '<option value="">Chọn thư mục</option>';
                        html += '<option value="">Female</option>';
                        html += '</select>';
                        html += '</div>';
                        html += '<div class=" col-md-12" style="margin-bottom: 20px">';
                        html += '<button style="width: 100%;" type="submit" class="btn default subins_folder_child">Submit</button>';
                        html += '</div>';
                        html +='</div>';
                        html +='</form>';
                    return html;
                }
            });

            $.ajax({
                type:"POST",
                dataType:"json",
                url:"<?php echo base_url('checkemail/getEmailTranfer')?>",
                data: { id:id, level:level, email:email, parent:parent },
                success:function(result){
                    console.log(result);
                    var html = '<option value="0">Chọn folder</option>';
                    $.each(result,function(key,name){
                        html += '<option value="'+name.id+'">'+name.name+'</option>';
                    });
                    $('.transfer_select').html(html);
                }
            })



        });

        $('body').delegate('.delete_folder_child','click',function(){
            var id = $(this).attr('id');
            var parent_folder = $(this).attr('parent_folder');
            $.ajax({
                type:"POST",
                dataType:"TEXT",
                url:"<?php echo base_url('checkemail/deleteFolderChild')?>",
                data: { id:id, parent_folder:parent_folder },
                success:function(result){
                    $('.popover').hide();

                    $('.folder-child-row').each(function(){
                        if($(this).attr('id') == id && $(this).attr('parent_folder') == parent_folder){
                           $(this).parent().remove();
                        }
                    })

                }
            })
        })

        $('body').delegate('.delete_folder','click',function(){
            var id = $(this).attr('id');
            var email = $(this).attr('email');
            var parent_folder = $(this);
            $.ajax({
                type:"POST",
                dataType:"JSON",
                url:"<?php echo base_url('checkemail/deleteFolder')?>",
                data: { id:id, email:email },
                success:function(result){
                    $('.popover').hide();
                    $('.folder_row').each(function(){
                        if($(this).attr('id') == id && $(this).attr('email') == email){
                            $(this).parent().remove();
                        }
                    })
                }
            })
        });
    })
</script>

<script>
    $(function(){
        $('#edit').editable({inlineMode: false})
        $('#edit-i').editable({inlineMode: false, theme: 'dark'})
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/tokens.js" type="text/javascript">"></script>
<script type="text/javascript">
    $(function(){
        $('.inbox_').trigger('click');
        $('.email_to').focusout(function(){
            var value = $(this).val();
            $('#email_to').val(value);
        });
        $('.send_email').on('click', function () {
            $('input[name=content]').val($('div#edit').editable('getHTML'));
            $('.loadding-img').show();
            var counter = 0;
            setInterval(function () {
                if (counter == 1) {
                    $('.loadding-img').hide();
                }
                ++counter;
            }, 1000);

            $('textarea[name=mail_cc]').val();
            var input = $('input[type=file]');
            var upload = $('.attach').val();
            $('.table_send').val($('.bt-show').find('button').attr('table'));
            $('.email_send').val($('.bt-show').find('button').val());
            $('#form_sample_2').submit();
        });
        $('.froala-wrapper').after().next().attr('style','display:none');
        $.ajax({
            type:"POST",
            dataType:"TEXT",
            url:"<?php echo base_url('checkemail/getSigned')?>",
            success:function(result){

            }
        });
    });
    $('.edit_sign').on('click',function(e, editor){
       var html = $('div#edit-i').editable('getHTML');
        $('.input_signed').val(html);
        $('.signed_form').submit();
    });
    $('body').delegate('.bt-forward','click',function(){
        var cat = $('.event-email').attr('cat');
        var value = $('.event-email').attr('value');
        var db = $('.bt-show').find('button').attr('table');
        var id = $('.event-email').attr('id');
        var li = $('.tokens-token-list').find('li');
        var class_this = $(this);
        var i_forward = $(this).find('span.for-all');
        $('.filename').remove();
        $('.size').remove();
        $.ajax({
            type:"POST",
            dataType:"JSON",
            url:"<?php echo base_url('checkemail/getDescriptionEmail')?>",
            data: { type:cat, db:db, id:id },
            success:function(result){
                $('#email_to').val(result.email);
                $('.email_to').val(result.email);
                $('#files-ul').find('li').remove();
                $('input.email_sending').val(result.email);
                $('input[name=mail_cc]').val(result.cc);
                var li = $('ul.tokens-token-list').find('li');
                li.each(function(){
                    $(this).prev().remove();
                });
                if(i_forward.length > 0){
                    if(result.email_cc){
                        $.each(result.email_cc,function(key,name){
                            if(name.length > 0){
                                var html_cc = '<li class="tokens-list-token-holder"><p>'+name+'</p><span class="tokens-delete-token delete-email-cc">×</span></li>';
                                $('.tokens-token-list').prepend(html_cc);
                            }
                        });
                    }
                }

                $('.folder').remove();
                var input = '<input class="folder" type="hidden" name="folder" value="'+result.path_file+'">';
                $('#files-ul').before(input);

                $('.subject').val(result.subject);
//                if(result.body){
//                    $('#edit').find('div.froala-wrapper').find('div.froala-view').first().html(result.body);
//                    $('input[name=content]').val(result.body);
//                }
//                if(result.content){
//                    $('#edit').find('div.froala-wrapper').find('div.froala-view').first().html(result.content);
//                    $('input[name=content]').val(result.content);
//                }

                if(result.filename){
                    $('.fileinput-button').find('input.filename').remove();
                    $('.fileinput-button').find('input.size').remove();
                    $.each(result.filename, function(key,name){
                        if(name){
                            var file = '<li file="'+name+'" class="li-file">'+name+' <span class="remove-file"><i class="glyphicon glyphicon-remove"></i><span></span></span></li>';
                            var name_input = '<input class="filename" type="hidden" name="filename[]" multiple="" value="'+name+'">';
                            var size_input = '<input class="size" type="hidden" name="size[]" multiple="" value="0">';
                            $('input[name=row_id]').after(name_input);
                            $('input[name=row_id]').after(size_input);
                            $('ul#files-ul').append(file);
                        }

                    });
                }

                if(class_this.hasClass('a-reply')){
                    if(result.from_email) {
                        $('.email_to').val(result.from_email);
                        $('#email_to').val(result.from_email);
                    }else{
                        if(result.email_to){
                            $('.email_to').val(result.email_to);
                            $('#email_to').val(result.email_to);
                        }
                    }
                }else{
                    $('.email_to').val('');
                }

            }
        });
    });

    $('body').delegate('.delete-email-cc','click',function(){
        $(this).parent().remove();
    });
    function stopTab( e ) {
        var evt = e || window.event
        if ( evt.keyCode === 9 ) {
            return false
        }
    }
    $('.mail-prev').on('click',function(){
        var from = parseInt($('.from-number').text());
        var to = parseInt($('.to-number').text());
        var total = parseInt($('.total-number').text());
        var mail_form_html = '';
        var mail_to_html = '';
        if(from <= 1){
            mail_form_html = 1;
        }else{
            if(from > 30){
                mail_form_html = from - 30;
            }
        }
        $('.from-number').html(mail_form_html);

        if(to == total){
            mail_to_html = total;
        }else{
            if(to == 30){
                mail_to_html = 30;
            }else{
                if(to > 30){
                    mail_to_html = to - 30;
                }
            }
        }
        $('.to-number').html(mail_to_html);

        var value = $('.event-email').val();
        $('.get-mail').each(function(){
            if($(this).attr('value') == value){
                $(this).trigger('click');
            }
        })

    });
    $('.mail-next').on('click',function(){
        var from = parseInt($('.from-number').text());
        var to = parseInt($('.to-number').text());
        var total = parseInt($('.total-number').text());
        var mail_form_html = '';
        var mail_to_html = '';

        if(total <= 30){
            mail_form_html = 1;
        }else{
            if(from + 30 < total){
                mail_form_html = from + 30;
            }else{
                mail_form_html = from;
            }
        }
        $('.from-number').html(mail_form_html);

        if(to >= total){
            mail_to_html = total;
        }else{
            if(to + 30 < total){
                mail_to_html = to + 30;
            }
            else{
                if(to + 30 > total){
                    var sub = total - to;
                    mail_to_html = to + sub;
                }
            }
        }
        $('.to-number').html(mail_to_html);

        var value = $('.event-email').val();
        $('.get-mail').each(function(){
            if($(this).attr('value') == value){
                $(this).trigger('click');
            }
        })

    })
    $('.move-email').on('click',function(){
        $('.loadding-img').show();
        var move = $(this).attr('value');
        var db = $('.bt-show').find('button').attr('table');
        var type_send = $('.event-email').val();
        var arr = new Array();
        if($('.checkbox_email').length >0){
            $('.checkbox_email').each(function(){
                if($(this).is(':checked')){
                    var type = $(this).parent().parent().parent().find('span.init-span').attr('type');
                    arr.push($(this).val() + ':'+type);
                }
            });
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('checkemail/moveEmail')?>",
                dataType: "TEXT",
                data:{ move:move , table:type_send, arr:arr, db:db },
                success: function(result){
                    $('.loadding-img').hide();
                    $('.get-mail').each(function(){
                        if($(this).attr('value') == type_send){
                            $(this).trigger('click');
                        }
                    })
                }
            });
        }else{
            var id = $('.event-email').attr('id');
            var tail = $('.event-email').attr('cat');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('checkemail/moveEmailView')?>",
                dataType: "TEXT",
                data:{ id:id , db:db, move:move, tail:tail },
                success: function(result){
                    $('.get-mail').each(function(){
                        if($(this).attr('value') == type_send){
                            $(this).trigger('click');
                        }
                    })
                }
            });
        }

    });
    $('body').delegate('.checkbox_email','click',function(){
        var check = new Array();
        $('.checkbox_email').each(function(){
            if($(this).is(':checked')){
                var type = $(this).parent().parent().parent().find('span.init-span').attr('type');
                check.push($(this).val()+':'+type);
            }
        });
        if(check.length > 0){
            $('.dl-list').show();
        }else{
            $('.dl-list').hide();
        }
    });
    $('.delete-email').on('click',function(){
        var db = $('.bt-show').find('button').attr('table');
        var arr = new Array();
        var type_send = $('.event-email').val();
        $('.checkbox_email').each(function(){
            if($(this).is(':checked')){
                var type = $(this).parent().parent().parent().find('span.init-span').attr('type');
                arr.push($(this).val() + ':'+type);
            }
        });
        if(arr.length > 0){
            if (confirm("Bạn thực sự muốn xóa? Dữ liệu sẽ không được khôi phục")) {
                removeEmail(db,arr,type_send);
            }
            return false;
        }else{
            var type_send = $('.event-email').val();
            var id = $('.event-email').attr('id');
            var cat = $('.event-email').attr('cat');
            var arr = new Array();
            arr.push(id+':'+cat);
            var db = $('.bt-show').find('button').attr('table');

            if (confirm("Bạn thực sự muốn xóa? Dữ liệu sẽ không được khôi phục")) {
                removeEmail(db,arr,type_send);
            }
            return false;
        }

    });
    function removeEmail(db,arr,type_send){
        $.ajax({
            type: "POST",
            dataType:"TEXT",
            url: "<?php echo base_url('checkemail/removeEmail')?>",
            data:{ db:db, arr:arr},
            success: function(result){
                $('.get-mail').each(function(){
                    if($(this).attr('value') == type_send){
                        $(this).trigger('click');
                    }
                })
            }
        });
    }
</script>
<script>
    (function(){
        $('#tokens-example').tokens({
            source : <?php echo isset($items) ? $items : '[ ]'; ?>,
            initValue : []
        });
    })();
</script>
<script>
    $(function () {
        'use strict';
        var url = '<?php echo base_url().'checkemail/uloadFile'?>';
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<li/>').text(file.name).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        });
    });

</script>

<script type="text/javascript">
    $(function() {
        var i = 0
        $('.get-mail').each(function(){
           if($(this).attr('value') == 'inbox'){
               $(this).trigger('click');
           }
            i++;
        })
        $("#spotlight").autocomplete({
            source: <?php echo isset($items) ? $items : '[ ]'; ?>,
            appendTo: $("form:first")
        });

        $("#spotlight").data( "ui-autocomplete" )._renderMenu = function( ul, items ) {
            var that = this;
            ul.attr("class", "nav nav-pills nav-stacked");
            $.each( items, function( index, item ) {
                that._renderItemData( ul, item );
            });
        };

    });
</script>

<script type="text/javascript">
    $(function(){
        $('.get-mail').each(function(){
            if($(this).attr('value') == 'inbox'){
                $('.event-email').val('inbox');
                var value = 'inbox';
                call_ajax(value)
            }
        });
        $('.reload_email').on('click',function(){
//            $(this).remove('span');
            var html = '<span><img style="max-width:15px" src="<?php echo base_url('assets/img/loading_smaill.gif')?>"></span> Loading...';
            $(this).html(html);
            $.ajax({
                type:"POST",
                dataType:"TEXT",
                url: "<?php echo base_url().'scrolleremail'?>",
                success: function() {
                    var thm = '&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;&nbsp;';
                    $('.reload_email').html(thm);
                    $('.get-mail').each(function(){
                        if($(this).attr('value') == 'inbox'){
                            $(this).trigger('click');
                        }
                    })
                }
            });
        });
        $('#fileupload').on('change',function(event){
            var files = event.target.files,
                file;
            if (files && files.length > 0) {
                file = files[0];
            }
            var input = '<input class="filename" type="hidden" name="filename[]" value="'+file.name+'">';
            var size = '<input attr='+file.name+' class="size" type="hidden" name="size[]" value="'+Math.ceil(file.size / 1024) +'">';
            $('input[name=row_id]').after(input);
            $('input[name=row_id]').after(size);
            var html = '<li file="'+file.name+'" class="li-file">'+ file.name +' | size: '+Math.ceil(file.size / 1024) +'kb  <span class="remove-file"><i class="glyphicon glyphicon-remove"></i><span></li>';
            $('.loading-bar').show();
            var counter = 0;
            setInterval(function () {
                $('.loading-bar').hide();
                ++counter;
            }, 1000);
            $('#files-ul').append(html);
        });
        $('body').delegate('.remove-file','click',function(){
            $(this).parent().remove();
            var file = $(this).parent().attr('file');
            $.ajax({
                type:"POST",
                dataType:"TEXT",
                url: "<?php echo base_url().'checkemail/deleteFileUpload'?>",
                data:{ name: file },
                success: function(result) {
                }
            });
            var input = $('input.filename');
            input.each(function(){
                if($(this).val() == file){
                    $(this).remove();
                }
            });
            $('.size').each(function(){
                if($(this).attr('attr') == file){
                    $(this).remove();
                }
            });
        });

        $('.compose_email').on('click',function(){
            $('.email_to').val('');
            $('#email_to').val('');
            $('.mail_cc').val('');
            $('.subject').val('');
            $('.note-editable').empty('');
            var p = $('.tokens-token-list').find('li');
            p.each(function(){
                if($(this).find('p').length > 0){
                    $(this).remove();
                }
            });
            $('#files-ul').empty();
            $('.filename').val('');
            $('.size').val('');
            $.ajax({
                dataType:"TEXT",
                url: "<?php echo base_url().'checkemail/getRowDraft'?>",
                success: function (result) {
                    $('.row_id').val(result);
                }
            });
        });
        $('.tokens-token-list').focusout(function(){
            var value = $(this).find('li').find('p');
            var email = '[';
            value.each(function(){
                email += "'"+$(this).text()+"',";
            });
            email += ']';
            $('.mail_cc').val(email);
        });

        $('#form_modal2').on('click',function(){
            var text_edit = $('.note-editable').html();
            $('.content').val($('div#edit').editable('getHTML'));
            var table = $('.bt-show').find('button').attr('table');
            var email_to = $('.email_to').val();
            var mail_cc = $('.mail_cc').val();
            var subject = $('input[name=subject]').val();
            var transfer = $('.subject').attr('transfer');
            var n = $("input[name^='filename']").length;
            var row_id = $('.row_id').val();
            var array = $("input[name^='filename']");
            var i;
            var file = [];
            for(i=0;i<n;i++)
            {
                file.push(array[i].value);
            }
            var m = $("input[name^='size']").length;
            var arr = $("input[name^='size']");
            var i;
            var size = [];
            for(i=0;i<m;i++)
            {
                size.push(arr[i].value);
            }
            $.ajax({
                type: "POST",
                dataType: "TEXT",
                url: "<?php echo base_url().'checkemail/processDraft'?>",
                data: { row_id:row_id, table:table, transfer:transfer, file:file, size:size, email_to:email_to, mail_cc:mail_cc, subject:subject, content:text_edit },
                success: function(result){
                }
            });
        });

        $('.menu-email-items').on('click',function(){
//            var email = $(this).find('a').text();
            $('.bt-show').find('button').remove();
            var email = $(this).find('a').text();
            var table = $(this).attr('table');
            var html = '<button type="button" table="'+table+'" class="btn btn-primary dropdown-toggle font-size-11" data-toggle="dropdown" value="'+email+'">' +email+    ' <span class="caret"></span></button>';
            $('.bt-show').prepend(html);
            $('.from-number').html('1');
            $('.to-number').html('30');
            var tail = 'receive_inbox';
            $('.get-mail').each(function(){
                if($(this).attr('value') == 'inbox'){
                    $(this).trigger('click');
                }
            });
            call_ajax(tail);
            emailfolder(email);
        });


        $('.menu-email-items').each(function(){
            if($(this).find('a').text() == '<?php echo $list_email['0']->email;?>'){
                $(this).trigger('click');
            }
        });

        $('body').delegate('.view_mail_draft','click',function(){
            $('li.li-file').remove();
            var row_id = $(this).attr('row_id');
            $('.subject').attr('transfer',$(this).attr('transfer'));
            $('.row_id').val(row_id);
            $('.filename').remove();
            $('.size').remove();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?php echo base_url('checkemail/getDescriptionDraft')?>",
                data: { row_id: row_id },
                success: function(result) {
                    $('#email_to').val(result.email);
                    $('.email_to').val(result.email);
                    $('input.email_sending').val(result.email);
                    $('input[name=mail_cc]').val(result.cc);
                    var li = $('ul.tokens-token-list').find('li');
                    li.each(function(){
                        $(this).prev().remove();
                    });
                    $.each(result.mail_cc,function(key,name){
                        if(name){
                            var html_cc = '<li class="tokens-list-token-holder"><p>'+name+'</p><span class="tokens-delete-token delete-email-cc">×</span></li>';
                            $('.tokens-token-list').prepend(html_cc);
                        }
                    });
                    $('.subject').val(result.subject);
                    $('.note-editable').html(result.content);
                    $('input[name=content]').val(result.content);
                    if(result.file){
                        $('.fileinput-button').find('input.filename').remove();
                        $('.fileinput-button').find('input.size').remove();
                        $.each(result.file, function(key,name){
                            if(name.name){
                                var file = '<li file="'+name.name+'" class="li-file">'+name.name+' | size: '+name.size+'kb  <span class="remove-file"><i class="glyphicon glyphicon-remove"></i><span></span></span></li>';
                                var name_input = '<input class="filename" type="hidden" name="filename[]" multiple="" value="'+name.name+'">';
                                var size_input = '<input class="size" type="hidden" name="size[]" multiple="" value="'+name.size+'">';
                                $('input[name=row_id]').after(name_input);
                                $('input[name=row_id]').after(size_input);
                                $('ul#files-ul').append(file);
                            }

                        });
                    }
                }
            });
        })
        $('.get-mail').on('click',function(){
            $('.dl-list').hide();
            $('.bt-forward').hide();
            $('.loading-get-email').show();
            var value = $(this).attr('value');
            $('.event-email').val(value);
            $('.event-email').removeAttr('id');
            call_ajax(value);
        });

        function emailfolder(email){
            $('.wrapper_folder').find('ul').find('li.create-li').empty();
            $.ajax({
                type:"POST",
                dataType:"JSON",
                url:"<?php echo base_url('checkemail/geFolder')?>",
                data: { email:email },
                success:function(result){
                    console.log(result);
                    if(result.length > 0){
                        $('.wrapper_folder').show();
                        var html = '<ul id="tree1" class="tree" style="margin-left: -20px !important;">';
                        $.each(result,function(key,name){
                            html += '<li class="branch">';
                            if(name.segment || name.folder_child){
                                html += '<i class="indicator glyphicon glyphicon glyphicon-plus open_folder"></i>';
                                html += '<i class="glyphicon glyphicon-folder-open folder_row" id = "'+ name.id +'" name="'+name.name+'" email="'+name.email+'" type="'+name.type+'" folder = "'+name.code+'"></i> <a href="javascript:void(0)">'+name.name+'</a>';
                            }else{
                                html += '<i class="glyphicon glyphicon-folder-open open_folder folder_row" style="font-size: 12px !important; margin-left: 10px;" id = "'+ name.id +'" name="'+name.name+'" email="'+name.email+'" type="'+name.type+'" folder = "'+name.code+'"></i> <a href="javascript:void(0)">' + name.name + '</a>';
                            }
                            html += '<ul style="margin-left: -20px;">';
                            if(name.segment){
                                $.each(name.segment,function(key_sg, value_seg){
                                    html += '<li style="display: none;"><i class="glyphicon glyphicon-menu-right"></i> '+value_seg.name+'</li>';
                                });
                            }
                            if(name.folder_child ){

                                $.each(name.folder_child,function(folder_key,folder_value){
                                    html += '<li class="branch" style="display: none;">';
                                    if(folder_value.child){
                                        html +='<i class="indicator glyphicon glyphicon glyphicon-plus glyphicon-minus open_folder"></i>';
                                        html += '<i class="glyphicon glyphicon-folder-open folder-child-row" id = "'+folder_value.id+'" code = "'+folder_value.code+'" parent_folder="'+name.id+'"></i> '+folder_value.name+'';
                                    }else{
                                        html += '<i class="glyphicon glyphicon-folder-open  folder-child-row" style="font-size: 12px !important; margin-left: 10px;" id = "'+folder_value.id+'" code = "'+folder_value.code+'" parent_folder="'+name.id+'"></i> '+folder_value.name+'';
                                    }

                                    html += '<ul style="margin-left: -20px">';
                                    if(folder_value.child){
                                        $.each(folder_value.child,function($items,$values){
                                            html += '<li style="display: none;"><i class="glyphicon glyphicon-menu-right"></i> '+$values.name+'</li>';
                                        });
                                    }

                                    html += '</ul>';
                                    html += '</li>';
                                });

                            }
                            html += '</ul>';
                            html += '</li>';
                        });
                        html += '</ul>';
                        $('.create-li').append(html);
                    }else{
                        $('li.wrapper_folder').hide();
                    }
                }
            });
        }

        function call_ajax(value){
            var table = $('.bt-show').find('button').attr('table');
            $('.list-group').empty();
            var from = parseInt($('.from-number').text());
            var to = parseInt($('.to-number').text());
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo base_url().'checkemail/getEmailList'?>",
                data: { from: from, to: to , table:table, value: value },
                success: function (result) {
                    $('.total-number').html(result.total);
                    if(result.total < 30){
                        $('.to-number').html(result.total);
                    }else{
                        $('.to-number').html('30');
                    }
                    delete result['total'];
                    $.each(result,function(key,name){
                        var html = '<a  href="javascript:void(0)" class="list-group-item ">';
                        html += '<div class="checkbox check-opt">';
                        html += '<label><input class="checkbox_email" type="checkbox" name="checkbox_email[]" value="'+name.id+'"></label>';
                        html += '</div>';
                        if(name.start == '1'){
                            html += '<span class="glyphicon glyphicon-star start-read"></span>';
                        }else{
                            html += '<span class="glyphicon glyphicon-star-empty start-read" ></span>';
                        }
                        if(name.read == '1'){
                            html += '<span class="glyphicon glyphicon-comment" style="color: #f0ad4e" ></span>';
                        }else{
                            html += '<span class="glyphicon glyphicon-comment"  style="color: #9099a3"></span>';
                        }
                        if(name.emailfrom){
                            html += '<span id="'+name.id+'" type="'+name.type+'" class="name mail-ds init-span" >' + name.emailfrom +'</span>';
                        }else{
                            if(name.type == 'send'){
                                html += '<span id="'+name.id+'" type="'+name.type+'" class="name init-span mail-ds init-span">'+name.to+'</span>';
                            }else{
                                if(name.type == 'draft'){
                                    if(name.to){
                                        html += '<span href="#form_modal2" row_id="'+ name.row_id +'" transfer="'+name.transfer+'"  data-toggle="modal" id="'+name.id+'" type="'+name.type+'" class="name view_mail_draft init-span">'+name.to+'</span>';
                                    }else{
                                        html += '<span href="#form_modal2" row_id="'+ name.row_id +'" transfer="'+name.transfer+'" data-toggle="modal" id="'+name.id+'" type="'+name.type+'" class="name view_mail_draft init-span">(no subject)</span>';
                                    }

                                }
                            }
                        }
                        html += '<span class="text-muted" style="font-size: 12px;"> - '+name.subject+'</span> <span class="badge">'+name.date+'</span> <span class="pull-right attach-icon attach-ic">';
                        if(name.attach) {
                            html += '<span class="glyphicon glyphicon-paperclip"></span>';
                        }
                        html += '</span>';
                        html += '</a>';
                        $('.list-group').append(html);
                    });
                    $('.loading-get-email').hide();

                }
            });
        }
        $('.get-inbox').trigger('click');
        $('body').delegate('.mail-ds','click',function(){
            $('.bt-forward').show();
            $('.dl-list').show();
            var id = $(this).attr('id');
            var type = $(this).attr('type');
            var table = $('.bt-show').find('button').attr('table');
            var tail = $('.event-email').val();
            $('.event-email').removeAttr('id');
            $('.event-email').removeAttr('cat');
            $('.event-email').attr('id',id);
            $('.event-email').attr('cat',$(this).attr('type'));
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo base_url().'checkemail/EmailDescription'?>",
                data: { id: id, type:type, table:table, tail:tail},
                success: function (result) {
                    var html ='<h3 class="mail-title"><i class="glyphicon glyphicon-align-justify"></i> '+result.subject+'</h3>';
                    html += '<hr>';
                    html +='<div class="row">';
                    html += '<div class="col-md-12">';
                    html += '<div class="panel panel-default">';
                    html += '<table class="table">';
                    html += '<tbody><tr style="border-bottom: 1px #ddd solid;">';
                    html += '<td width="100px">';
                    html += '<div class="user-email">';
                    html += '<img style="width: 90px; height: 90px" src="<?php echo base_url('assets/img/default-user.png')?>">';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>';
                    html +='<table class="header-emai" style="margin-top: 15px">';
                    html += '<tbody><tr>';

                    if(result.from_email){
                        html += '<td width="100px"><i class="glyphicon glyphicon-share-alt"></i> Gửi từ: </td>';
                        html += '<td>'+result.from_email+'</td>';
                    }else{
                        html += '<td width="100px"><i class="glyphicon glyphicon-share-alt"></i> Gửi đến: </td>';
                        html += '<td>'+result.email_to+'</td>';
                    }

                    html +='</tr>';
                    html += '<tr>';

                    if(result.to) {
                        html += '<td><i class="glyphicon glyphicon-random"></i> Gửi đến: </td>';
                        html += '<td>' + result.to + '</td>';
                    }else{
                        html += '<td><i class="glyphicon glyphicon-random"></i> Cc: </td>';
                        html += '<td>' + result.email_cc + '</td>';
                    }

                    html +='</tr>';
                    html +='<tr>';

                    if(!result.time_init){
                        html +='<td><i class="glyphicon glyphicon-time"></i> Ngày nhận: </td>';
                        html +='<td>'+result.date+'</td>';
                    }else{
                        html +='<td><i class="glyphicon glyphicon-time"></i> Ngày gửi: </td>';
                        html +='<td>'+result.time_init+'</td>';
                    }
                    html +='</tr>';
                    html += '<tr><td colspan="2"><a href="#form_modal2" data-toggle="modal" title="Forward" class="a-reply bt-forward"> <i class="glyphicon glyphicon-random"></i><i class="reply-to"></i>  Reply</a>';
                    html += '<a href="#form_modal2" data-toggle="modal" title="Forward" class="a-forward bt-forward "><i class="glyphicon glyphicon-share-alt"></i>  Forward</a>';
                    if(result.email_cc && result.email_cc != 'Không'){
                        html += '<a href="#form_modal2" data-toggle="modal" title="Forward" class="a-reply bt-forward"><i class="glyphicon glyphicon-random"></i>  Reply All <span class="for-all"><span></a>';
                        html += '<a href="#form_modal2" data-toggle="modal" title="Forward" class="a-forward bt-forward"><i class="glyphicon glyphicon-share-alt"></i>  Forward All <span class="for-all"><span></a>';
                    }
                    html += '</td></tr>';
                    html +='</tbody></table>';
                    html +='</td>';
                    html +='</tr>';
                    html +='<tr>';
                    html +='<td colspan="2">';
                    if(result.body){
                        html +='<div class="email_body">'+result.body+'</div>';
                    }else{
                        html +='<div class="email_body">'+result.content+'</div>';
                    }
                    html +='</td>';
                    html +='</tr>';
                    if(result.attach) {

                        html += '<tr>';
                        html += '<td colspan="5">';
                        html += '<h4><i class="glyphicon glyphicon-paperclip"> </i> File đính kèm</h4>';

                        $.each(result.attach,function(key,name){
                            html += '<div class="file-dowload">';
                            html += '<div class="imageOuter" style="width: 60px !important;">';
                            html += '<a class="image" title="Download" target="_blank" href="<?php echo base_url('checkemail/downlad');?>/'+name+'/'+type+'">';
                            html += '<span class="roll img-responsive" style="opacity: 0;"></span>';
                            $.each(result.file,function(key_file,name_value)
                            {
                                if(key == key_file) {
                                    html += name_value;
                                }
                            });
                            html += '<span class="name-file">'+name+'</span>';
                            html += '</a>';
                            html += '</div>';
                            html += '</div>';
                        });

                        html += '</td>';
                        html += '</tr>';
                    }
                    html +='</tbody>';
                    html +='</table>';
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';
                    $('.list-group').html(html);
                }
            });

        })
    });

</script>
