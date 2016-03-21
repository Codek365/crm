<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Thêm Loại Khách Sạn</span>
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
		<form action="" method="POST" role="form" class="form-horizontal">		
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Tên Loại Khách Sạn:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" name="txtName" placeholder="Tên Loại Khách Sạn">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Thứ Tự:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" name="txtOrder" placeholder="Thứ Tự">
				</div>
			</div>
			<input name="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Thêm Loại Khách Sạn" />
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>