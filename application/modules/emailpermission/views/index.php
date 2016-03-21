<!-- upper section -->
    <div class="row">
        <?php echo (isset($menu) ? $menu : '');?><!-- /span-3 -->
        <div class="col-sm-9" style="width: 80%">
            <!-- column 2 -->
            <h3><i class="glyphicon glyphicon-align-justify"></i> <?php echo $title;?></h3>

            <hr>
            <div class="row">
                <!-- center left-->
                <div class="col-md-12">
                    <div class="well mail-box-12"><?php echo $email;?> <span style="margin-right: 577px" class="badge pull-right inbox_new"><?php echo (isset($new_email) ? $new_email : 0);?></span></div>
                    <hr>

                    <?php
                        if(isset($mail_box) && !empty($mail_box) && isset($new_email) > 0){
                            foreach($mail_box as $items){
                                if(!empty($items['mail']) > 0){
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4><i class="glyphicon glyphicon-envelope"> </i>   Email: <?php echo $items['email'] ;?></h4>
                                    </div>

                                            <table class="table table-hover">
                                                <?php
                                                $i = 1;
                                                    foreach($items['mail'] as $row){ ?>
                                                        <tr style="bo">
                                                            <td width="6%"><?php echo $i;?></td>
                                                            <td width="30%"><a href="<?php echo base_url('emailpermission/'.$action.'/'.$items['table'].'/'.$row->id.'')?>"><?php echo $row->from_email;?></a></td>
                                                            <td width="60%"><?php echo $row->subject;?></td>
                                                            <td width="10%">
                                                                <?php
                                                                if(!empty($row->attach)){ ?>
                                                                    <span class="glyphicon glyphicon-paperclip"></span>
                                                                <?php   }
                                                                ?>

                                                            </td>
                                                            <td width="20%"><?php echo date('d/m/Y H:i:s',strtotime($row->date));?></td>

                                                        </tr>
                                                 <?php $i++;  } ?>
                                                </tbody>
                                            </table>

                                        </div>
                          <?php  }
                        }
                        }else{
                            echo $none;
                        }
                    ?>
                </div><!--/col-->

            </div><!--/row-->
        </div><!--/col-span-9-->

    </div><!--/row-->

