<div class="row">
<div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">Setting Thông Số SMS</span>
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
	<div class="col-md-6 col-md-offset-2">
		<form action="<?php echo base_url(); ?>sms/edit" method="POST" role="form" class="form-horizontal">		
			<div class="form-group">
				<label for="" class="control-label col-xs-3">API:</label>
				<div class="col-xs-9">
					<input type="text" class="form-control" value="<?php if(isset($info['sms_api'])) echo $info['sms_api']; ?>" name="txtAPI" placeholder="Link API">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">APIKey:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['sms_apikey'])) echo $info['sms_apikey']; ?>" name="txtAPIKey" placeholder="API Key">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">SecretKey:</label>
				<div class="col-xs-9">
				<input type="text" class="form-control" value="<?php if(isset($info['sms_secretkey'])) echo $info['sms_secretkey']; ?>" name="txtSecretKey" placeholder="Secret Key">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Content SMS:</label>
				<div class="col-xs-9">
				<textarea class="form-control" name="txtContent" rows="5"><?php if(isset($info['sms_content'])) echo $info['sms_content']; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-3">Content SMS:</label>
				<div class="col-xs-9">
				<select class="form-control" name="status">
					<?php if($info['sms_status'] == 1){ ?>
						<option value="1" selected="selected">Bật</option>
						<option value="2">Tắt</option>
					<?php }else{ ?>
						<option value="1">Bật</option>
						<option value="2" selected="selected">Tắt</option>
					<?php } ?>
				</select>
				</div>
			</div>
			<input name="btnConfig" type="submit" class="btn btn-primary col-md-offset-3" value="Cài Đặt Tham Số SMS" />
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>