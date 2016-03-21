<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT INNER -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs font-green-sharp"></i>
                        <span class="caption-subject font-green-sharp bold uppercase">Thêm Nhóm Thành Viên</span>
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
	<div class="col-md-8 col-md-offset-2">
		<form action="<?php echo base_url(); ?>usergroup/create" method="POST" role="form" class="form-horizontal">		
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Name Group:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" name="txtName" placeholder="Tên Nhóm Thành Viên">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Quyền Truy Cập:</label>
				<div class="table-responsive col-xs-9">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th>Module</th>
								<th style="text-align: center;">Ready</th>
								<th style="text-align: center;">Thêm</th>
								<th style="text-align: center;">Xóa</th>
								<th style="text-align: center;">Sửa</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($modules as $key => $value) { ?>
							<tr>
								<td><?php echo $value; ?></td>
								<td align="center"><input type="checkbox" name="checkbox[<?php echo $value; ?>][chkReady]" /></td>
								<td align="center"><input type="checkbox" name="checkbox[<?php echo $value; ?>][chkCreate]" /></td>
								<td align="center"><input type="checkbox" name="checkbox[<?php echo $value; ?>][chkDelete]" /></td>
								<td align="center"><input type="checkbox" name="checkbox[<?php echo $value; ?>][chkEdit]" /></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<input name="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Thêm Nhóm Thành Viên" />
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>