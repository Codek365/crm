<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Thêm Thuộc Tính Tour</span>
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
				<label for="" class="control-label col-xs-4">Tên Tùy Chọn:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" name="txtName" placeholder="Tên Thuộc Tính" <?php if($list["name"]) {
					echo "value='$list[name]'";
				}?>>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Lớp Tùy Chọn:</label>
				<div class="col-xs-8">
				<select class="form-control" name="txtClass">
					<option value="*"></option>
					<?php if(isset($list_class)){foreach ($list_class as $value) { ?>
                        <option value="<?php echo $value['option_class_id']; ?>" <?php if($list['class'] == $value['option_class_id']){echo 'selected';} ?>><?php echo $value['name']; ?></option>
                	<?php }} ?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Danh Mục Tùy Chọn:</label>
				<div class="col-xs-8">
				<select class="form-control" name="txtCategory">
					<option value="*"></option>
                    <?php if(isset($list_category)){foreach ($list_category as $value) { ?>
                        <option value="<?php echo $value['option_category_id']; ?>" <?php if($list['category'] == $value['option_category_id']){echo 'selected';} ?>><?php echo $value['name']; ?></option>
                    <?php }} ?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-xs-4">Thứ Tự:</label>
				<div class="col-xs-8">
				<input type="text" class="form-control" name="txtOrder" placeholder="Thứ Tự" <?php if($list["sort_order"]) {
					echo "value='$list[sort_order]'";
				}?>>
				</div>
			</div>
			<input name="btnOK" type="submit" class="btn btn-primary col-md-offset-3" value="Thêm Thuộc Tính Tour"/>
	        <table id="option-value" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_1_info">
	          <thead>
	            <tr role="row">
	              <th>Option Value Name</th>
	              <th>Thứ tự:</th>
	              <th></th>
	            </tr>
	          </thead>
	          <?php 
	          	if (isset($list_value))  {?>
	          			<?php  $option_value_row = 0 ?>
	          			<?php foreach ($list_value as  $value) {
	          				echo '<tbody id="option-value-row'.$option_value_row.'">';
	          				echo "<tr>";
	          					echo '<td class="left"><input type="hidden" name="option_value['.$option_value_row.'][option_value_id]" value="'.$value["option_value_id"].'">';
	          					echo '<input type="text" name="option_value['.$option_value_row.'][option_value_description]" value="'.$value["name"].'" size="30" ></td>';
	          					echo '<td class="left"><input type="text" name="option_value['.$option_value_row.'][sort_order]" value="'.$value["sort_order"].'" size="1" class="option_value_sort_order_'. $option_value_row.'"></td>';
	          					echo '<td class="left"><button onclick="$(\'#option-value-row'.$option_value_row.'\').remove();" class="btn btn-primary">Remove</button></td>';
	          				echo "</tr>";
	          				$option_value_row ++;
	          			}?>
	          		</tbody>
	          	<?php }?>
	          <tfoot>
	            <tr>
	              <td colspan="2"></td>
	              <td class="left"><a onclick="addOptionValue();" class="btn btn-primary">Thêm</a></td>
	            </tr>
	          </tfoot>
	        </table>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	var option_value_row = <?php echo $option_value_row; ?>;
	function addOptionValue() {
		var sort_order_max = $('.option_value_sort_order_'+(option_value_row-1)).val();
		if(sort_order_max){
			sort_order_max = parseInt(sort_order_max) + 1;
		}else{
			sort_order_max = 1;
		}
		html  = '<tbody id="option-value-row' + option_value_row + '">';
		html += '  <tr>';	
	    html += '    <td class="left"><input type="hidden" name="option_value[' + option_value_row + '][option_value_id]" value=""  />';
		html += '<input type="text" name="option_value[' + option_value_row + '][option_value_description]" value="" size="30"/><br />';
		html += '    </td>';
		html += '    <td class="right"><input type="text" name="option_value[' + option_value_row + '][sort_order]" value="'+ sort_order_max +'" size="1" class="option_value_sort_order_' + option_value_row + '"/></td>';
		html += '    <td class="left"><button onclick="$(\'#option-value-row' + option_value_row + '\').remove();" class="btn btn-primary">Remove</button></td>';
		html += '  </tr>';
	    html += '</tbody>';
		$('#option-value tfoot').before(html);
		option_value_row++;
	}
</script>