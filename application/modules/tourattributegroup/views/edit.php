<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Cập Nhật Nhóm Thuộc Tính Tour</span>
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
		<form action="" method="POST" role="form" class="form-horizontal">		
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Tên Nhóm Thuộc Tính:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" value="<?php if(isset($attribute_group['name'])){echo $attribute_group['name'];} ?>" name="txtName" placeholder="Tên Nhóm Thuộc Tính">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Thứ Tự:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" value="<?php if(isset($attribute_group['sort_order'])){echo $attribute_group['sort_order'];} ?>" name="txtOrder" placeholder="Thứ Tự">
				</div>
			</div>
			<input name="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Cập Nhật Nhóm Thuộc Tính Tour" />
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>