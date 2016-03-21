<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Thêm Tour</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <!-- <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a> -->
                </div>
            </div>
            
<div class="portlet-body">
<ul class="nav nav-tabs">
  <li class="active"><a href="#tab_general" data-toggle="tab">Tổng Quan</a></li>
  <li><a href="#tab_b" data-toggle="tab">Tab B</a></li>
</ul>
	<?php
		if (validation_errors() != "") {
			echo "<div class='alert alert-danger' style='padding:25px;'><ul>";
			echo validation_errors("<li>","</li>");
			echo "</ul></div>";
		}
	?>
	<div class="col-lg-12">
		<form action="" method="POST" role="form" class="form-horizontal">
		<div class="tab-content">
			<div class="tab-pane active" id="tab_general">
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Chính Sách:</label>
					<div class="col-xs-10">
					<?php if(isset($policy)){ ?>
					<?php foreach ($policy as $key => $value) { ?>
						<input type="radio" name="txtPolicy">
						<?php if($value['category'] == 0){ ?>
							<label for="policy-32"><b>Tour ghép đoàn</b> - <?php echo $value['name']; ?></label><br/>
						<?php }else{ ?>
							<label><b>Tour riêng</b> - <?php echo $value['name']; ?></label><br/>
						<?php } ?>
					<?php }} ?>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Tên Sản Phẩm:</label>
					<div class="col-xs-10">
					<input type="text" class="form-control" name="txtName" placeholder="Tên Sản Phẩm">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Tên Chi Tiết:</label>
					<div class="col-xs-10">
					<input type="text" class="form-control" name="txtName_tour" placeholder="Tên Chi Tiết">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Tiêu Đề Tùy Chỉnh:</label>
					<div class="col-xs-10">
					<input type="text" class="form-control" name="txtCustom_title" placeholder="Tiêu Đề Tùy Chỉnh">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Meta tag Description:</label>
					<div class="col-xs-10">
					<input type="text" class="form-control" name="txtMeta_Description" placeholder="Meta tag Description">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Meta tag keywords:</label>
					<div class="col-xs-10">
					<input type="text" class="form-control" name="txtMeta_Keywords" placeholder="Meta tag keywords">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Mô tả:</label>
					<div class="col-xs-10">
					<textarea id="description" name="txtTourDescription"></textarea>
					</div>
				</div>
				<div class="form-group" id="product-detail">
					<div class="vdetail control-label col-sm-2">
						<span>Thêm Chi Tiết <img src="/assets/img/add.png" alt="" onclick="addProductDetail();"></span>
					</div>
					<div id="tab-product-detail-1" class="vdetail_content col-sm-9">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label col-sm-4">Label:</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Tiêu đề:</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="" />
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label col-sm-4">Trạng thái:</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4">Thứ tự:</label>
								<div class="col-sm-8">
									<input class="form-control" type="text" name="" />
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<div class="col-xs-12">
								<div id="thumb">
									<img src="<?php echo base_url(); ?>assets/img/no_image.jpg" width="100px" height="100px" />
				                </div>
								<input type="hidden" name="image" value="/assets/img/no_image.jpg" id="image" />
								<a onclick="openKCFinder(thumb)">Chọn ảnh</a> | <a onclick="$('#thumb img').attr('src', '<?php echo base_url(); ?>assets/img/no_image.jpg'); $('#image').attr('value', '/assets/img/no_image.jpg');">Xóa ảnh</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-xs-2">Status:</label>
					<div class="col-xs-10">
					<select class="form-control" name="txtStatus">
						<option value="1">Bật</option>
						<option value="0">Tắt</option>
					</select>
					</div>
				</div>
			</div>
			<div class="tab-pane" id="tab_b">
				<input name="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Thêm Thuộc Tính Tour" />
			</div>
		</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">CKEDITOR.replace('description',{toolbar: [{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source' ] },{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
    { name: 'others', items: [ '-' ] },
    '/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
    { name: 'styles', items: [ 'Styles', 'Format' ] },
    { name: 'about', items: [ 'About' ] }]});
</script>
<script type="text/javascript">
	var product_detail_row = 1;
	function addProductDetail() {	
		html = '<a href="#tab-product-detail-'+product_detail_row+'" id="product-detail-'+product_detail_row+'" class="selected">Chi tiết '+product_detail_row+'&nbsp;<img src="/assets/img/delete.png" alt="" onclick="$(\'.vtabs-detail a:first\').trigger(\'click\'); $(\'#product-detail-'+product_detail_row+'\').remove(); $(\'#tab-product-detail-1\').remove(); return false;"></a>';
		table = '';
		$('.vdetail span').before(html);
		product_detail_row++;
	}
</script>
<script type="text/javascript">
function openKCFinder(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                div.innerHTML = '<img id="img" src="' + url + '" />';
                $('#image').val(url);
                var img = document.getElementById('img');
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
                img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                img.style.visibility = "visible";
            }
        }
    };
    window.open('/assets/kcfinder/browse.php?type=images&dir=upload',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>