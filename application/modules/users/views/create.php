<div class="row">
<div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Thêm Thành Viên</span>
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
	<div class="col-md-10 col-md-offset-1">
		<form action="" method="POST" role="form" class="form-horizontal">		
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Họ:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" name="txtfirstName" placeholder="Họ">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Tên:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" name="txtlastName" placeholder="Tên">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Email:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" name="txtEmail" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Phone:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" name="txtPhone" placeholder="Số Điện Thoại">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Tên Hiển Thị:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" name="txtNameDisplay" placeholder="Tên Hiển Thị">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Tài Khoản:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" name="txtUser" placeholder="Tài Khoản">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Mật Khẩu:</label>
				<div class="col-xs-9">
				<input type="password" class="form-control" name="txtPass" placeholder="Mật Khẩu">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Nhập Lại Mật Khẩu:</label>
				<div class="col-xs-9">
				<input type="password" class="form-control" name="txtPass2" placeholder="Nhập Lại Mật Khẩu">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Nhóm Quyền:</label>
				<div class="col-xs-9">
				<select class="form-control" name="txtGroup">
					<?php foreach ($listgroup as $key => $value) { ?>
						<option value="<?php echo $value['id']; ?>"><?php echo $value['namegroup']; ?></option>
					<?php } ?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Trạng Thái:</label>
				<div class="col-xs-9">
					<select class="form-control" name="txtStatus">
						<option value="0">Tắt</option>
						<option value="1">Bật</option>
					</select>
				</div>
			</div>
			<input name="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Thêm Nhân Viên" />
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>