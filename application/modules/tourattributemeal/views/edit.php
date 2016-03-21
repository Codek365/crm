<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Cập Nhật Bữa Ăn</span>
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
				<label for="" class="control-label col-xs-4">Tên Bữa Ăn:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" value="<?php if(isset($meal['name'])){echo $meal['name'];} ?>" name="txtName" placeholder="Tên Bữa Ăn">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Hình Ảnh:</label>
				<div class="col-xs-8">
				<div id="thumb">
                    <?php if(isset($meal['image'])){ ?>
                        <img src="<?php echo $meal['image']; ?>" width="100px" height="100px" />
                    <?php }else{ ?>
                        <img src="/assets/img/no_image.jpg" width="100px" height="100px" />
                    <?php } ?>
				</div>
				<input type="hidden" name="image" value="" id="image" />
                <a onclick="openKCFinder(thumb)">Chọn ảnh</a> | <a id="btnclean" onclick="$('#thumb img').attr('src', '/assets/img/no_image.jpg'); $('#image').attr('value', '/assets/img/no_image.jpg');">Xóa ảnh</a>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Thứ Tự:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" value="<?php if(isset($meal['sort_order'])){echo $meal['sort_order'];} ?>" name="txtOrder" placeholder="Thứ Tự">
				</div>
			</div>
			<input name="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Cập Nhật Bữa Ăn" />
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
function openKCFinder(thumb) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            thumb.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                thumb.innerHTML = '<img src="' + url + '" name="imageMeal" width="100px" height="100px" />';
                $('#image').val(url);
                var img = document.getElementById('thumb');
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
    window.open('<?php echo base_url(); ?>assets/kcfinder/browse.php?type=images&dir=images/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>