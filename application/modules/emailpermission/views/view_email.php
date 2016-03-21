<div class="row">
    <?php echo (isset($menu) ? $menu : '');?><!-- /span-3 -->
    <div class="col-sm-9">
        <!-- column 2 -->
        <h3><i class="glyphicon glyphicon-align-justify"></i> <?php echo $email->subject;?></h3>

        <hr>
        <div class="row">
            <!-- center left-->
            <div class="col-md-12">

                        <div class="panel panel-default">
                            <table class="table">
                                    <tr style="border-bottom: 1px #ddd solid;">
                                        <td width="100px">
                                        <div class="user-email">
                                            <img style="width: 90px; height: 90px" src="<?php echo base_url().'/assets/admin/layout/images/default-user.png';?>">
                                        </div>
                                        </td>
                                        <td>
                                            <table class="header-emai" style="margin-top: 15px">
                                                <tr>
                                                    <td width="100px"><i class="glyphicon glyphicon-share-alt"></i> Gửi từ: </td>
                                                    <td><?php echo $email->from_email;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="glyphicon glyphicon-random"></i> Gửi đến: </td>
                                                    <td><?php echo $email->to;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="glyphicon glyphicon-time"></i> Ngày nhận: </td>
                                                    <td><?php echo $email->date;?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="email_body">
                                                <?php
                                                echo $email->body;
                                                ?>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php
                                        if(!empty($email->attach)){
                                            $this->load->helper('download');
                                            $attach = json_decode($email->attach); ?>

                                                <tr>
                                                    <td colspan="5">
                                                        <h4><i class="glyphicon glyphicon-paperclip"> </i>   File đính kèm</h4>
                                                        <?php foreach($attach as $_attach){ ?>
                                                            <div class="file-dowload">
                                                                <?php
                                                                $file = explode('.',$_attach);
                                                                switch($file[1]){
                                                                    case ('jpg'): case ('png'): case ('gif'): case ('jpeg'): case ('JPG'):?>
                                                                        <div class="imageOuter">
                                                                            <!--jquery-->
                                                                            <a class="image" title="Download" target="_blank" href="<?php echo base_url().'emailpermission/downlad/'.$_attach;?>">
                                                                                <span class="roll img-responsive" ></span>
                                                                                <img width="60px"  class=" imgborder" alt="" src="<?php echo base_url().'attach_file/'.$_attach;?>">
                                                                                <span class="name-file"><?php echo $_attach;?></span>
                                                                            </a>
                                                                        </div>
                                                                <?php
                                                                        break;
                                                                    case ('zip'): case ('7zip'): case ('rar'): case ('tag'): ?>
                                                                        <div class="imageOuter">
                                                                            <!--jquery-->
                                                                            <a class="image" title="Download" target="_blank" href="<?php echo base_url().'emailpermission/downlad/'.$_attach;?>">
                                                                                <span class="roll img-responsive" ></span>
                                                                                <img src="<?php echo base_url().'assets/admin/file_img/rar.png'?>">
                                                                                <span class="name-file"><?php echo $_attach;?></span>
                                                                            </a>
                                                                        </div>

                                                               <?php
                                                                        break;
                                                                    case ('pdf'): ?>
                                                                        <div class="imageOuter">
                                                                            <!--jquery-->
                                                                            <a class="image" title="Download" target="_blank" href="<?php echo base_url().'emailpermission/downlad/'.$_attach;?>">
                                                                                <span class="roll img-responsive" ></span>
                                                                                <img src="<?php echo base_url().'assets/admin/file_img/pdf.png'?>">
                                                                                <span class="name-file"><?php echo $_attach;?></span>
                                                                            </a>
                                                                        </div>
                                                               <?php
                                                                        break;
                                                                    case ('xlsx'):  case ('xls'): ?>
                                                                        <div class="imageOuter">
                                                                            <!--jquery-->
                                                                            <a class="image" title="Download" target="_blank" href="<?php echo base_url().'emailpermission/downlad/'.$_attach;?>">
                                                                                <span class="roll img-responsive" ></span>
                                                                                <img src="<?php echo base_url().'assets/admin/file_img/excel.png'?>">
                                                                                <span class="name-file"><?php echo $_attach;?></span>
                                                                            </a>
                                                                        </div>
                                                               <?php
                                                                        break;
                                                                    case ('doc'): case ('docx'):  ?>
                                                                        <div class="imageOuter">
                                                                            <!--jquery-->
                                                                            <a class="image" title="Download" target="_blank" href="<?php echo base_url().'emailpermission/downlad/'.$_attach;?>">
                                                                                <span class="roll img-responsive" ></span>
                                                                                <img src="<?php echo base_url().'assets/admin/file_img/doc.png'?>">
                                                                                <span class="name-file"><?php echo $_attach;?></span>
                                                                            </a>
                                                                        </div>

                                                               <?php
                                                                    break;
                                                                    default: ?>
                                                                        <div class="imageOuter">
                                                                            <!--jquery-->
                                                                            <a class="image" title="Download" target="_blank" href="<?php echo base_url().'emailpermission/downlad/'.$_attach;?>">
                                                                                <span class="roll img-responsive" ></span>
                                                                                <img src="<?php echo base_url().'assets/admin/file_img/file.png'?>">
                                                                                <span class="name-file"><?php echo $_attach;?></span>
                                                                            </a>
                                                                        </div>
                                                               <?php  } ?>
                                                            </div>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                         <?php
                                        }
                                    ?>


                                </tbody>
                            </table>

                        </div>
                </div>

        </div><!--/row-->
    </div><!--/col-span-9-->

</div><!--/row-->
<script type="text/javascript">
    $(function() {
// OPACITY OF BUTTON SET TO 0%
        $(".roll").css("opacity","0");

// ON MOUSE OVER
        $(".roll").hover(function () {

// SET OPACITY TO 70%
                $(this).stop().animate({
                    opacity: .7
                }, "slow");
            },

// ON MOUSE OUT
            function () {

// SET OPACITY BACK TO 50%
                $(this).stop().animate({
                    opacity: 0
                }, "slow");
            });
    });
</script>

