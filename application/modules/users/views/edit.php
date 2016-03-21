<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Cập Nhật Thông Tin Thành Viên</span>
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
	<?php
		if (validation_errors() != "") {
			echo "<div class='alert alert-danger' style='padding:25px;'><ul>";
			echo validation_errors("<li>","</li>");
			echo "</ul></div>";
		}
	?>
	<div class="col-md-7 col-md-offset-2">
		<form action="<?php echo base_url(); ?>users/edit/<?php echo $info['user_id']; ?>" method="POST" role="form" class="form-horizontal">		
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Họ:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['firstname'])) echo $info['firstname']; ?>" name="txtfirstName" placeholder="Họ">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Tên:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['lastname'])) echo $info['lastname']; ?>" name="txtlastName" placeholder="Tên">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Email:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['email'])) echo $info['email']; ?>" name="txtEmail" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Phone:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['phone'])) echo $info['phone']; ?>" name="txtPhone" placeholder="Số Điện Thoại">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Tên Hiển Thị:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['name_display'])) echo $info['name_display']; ?>" name="txtNameDisplay" placeholder="Tên Hiển Thị">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Tài Khoản:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['username'])) echo $info['username']; ?>" name="txtUser" placeholder="Tài Khoản">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Mật Khẩu:</label>
				<div class="col-xs-9">
				<input type="password" class="form-control" value="" name="txtPass" placeholder="Mật Khẩu">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Nhập Lại Mật Khẩu:</label>
				<div class="col-xs-9">
				<input type="password" class="form-control" value="" name="txtPass2" placeholder="Nhập Lại Mật Khẩu">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Nhóm Quyền:</label>
				<div class="col-xs-9">
				<select class="form-control" name="txtGroup">
					<?php foreach ($listgroup as $key => $value) { ?>
						<?php if($info['group_id'] == $value['id']){ ?>
						<option selected="selected" value="<?php echo $value['id']; ?>"><?php echo $value['namegroup']; ?></option>
						<?php }else{ ?>
						<option value="<?php echo $value['id']; ?>"><?php echo $value['namegroup']; ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Trạng Thái:</label>
				<div class="col-xs-9">
					<select class="form-control" name="txtStatus">
						<option value="0" <?php if($info['status'] == 0){ echo 'selected';} ?>>Tắt</option>
						<option value="1" <?php if($info['status'] == 1){ echo 'selected';} ?>>Bật</option>
					</select>
				</div>
			</div>
			<input name="btnEdit" type="submit" class="btn btn-primary col-md-offset-3" value="Cập Nhật Nhân Viên" />
		</form>
	</div>
</div>
</div>
</div>
            </div>
        </div>