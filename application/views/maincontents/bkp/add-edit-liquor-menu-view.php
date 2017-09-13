<h4><i class="fa fa-plus-square-o"></i> Manage Liquor Menu Details </h4>
<hr class="style5">
<?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
  <?php
	if($row)
	{
		$liquor_code = $row->liquor_code;
		$size = $row->size;
		$liquor_name = $row->liquor_name;
		$liquor_price = $row->liquor_price;
	}
	else
	{
		$liquor_code = '';
		$size = '';
		$liquor_name = '';
		$liquor_price = '';
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Liquor Code</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="liquor_code" name="liquor_code" value="<?php echo $liquor_code; ?>" placeholder="Enter Liquor Code">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Size</label>
    <div class="col-sm-9">
      <select class="form-control" name="size">
      	<option value="" selected="selected" hidden>Choose Size</option>
        <option value="30" <?php if($size=='30') { ?>selected="selected"<?php } ?>>30 ML</option>
        <option value="60" <?php if($size=='60') { ?>selected="selected"<?php } ?>>60 ML</option>
        <option value="275" <?php if($size=='275') { ?>selected="selected"<?php } ?>>275 ML</option>
        <option value="650" <?php if($size=='650') { ?>selected="selected"<?php } ?>>650 ML</option>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Liquor Menu Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="liquor_name" name="liquor_name" value="<?php echo $liquor_name; ?>" placeholder="Enter Liquor Menu Name">
    </div>
  </div>  
  
  
  <div class="form-group">
    <label class="control-label col-sm-3">Liquor Menu Price</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="liquor_price" name="liquor_price" value="<?php echo $liquor_price; ?>" placeholder="Enter Liquor Menu Price">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success"><?php echo $action; ?> Liquor Menu </button>
    </div>
  </div>
</form>
<hr class="style5">

<script>
	$(document).ready(function () {
		
		
		
		$('#cgst_percent').on('change', function() {
			net_total = parseFloat($('#net_total').val());
			cgst_percent = parseFloat($('#cgst_percent').val());
			menu_price = parseFloat($('#menu_price').val());
			cgst_amt = (menu_price*cgst_percent)/100;			
			$('#cgst_amt').val(cgst_amt);
			
			net_total = (net_total+menu_price+cgst_amt);
			$('#net_total').val(net_total);
			
		});
		$('#sgst_percent').on('change', function() {
			net_total = parseFloat($('#net_total').val());
			sgst_percent = parseFloat($('#sgst_percent').val());
			menu_price1 = parseFloat($('#menu_price').val());
			sgst_amt = (menu_price1*sgst_percent)/100;
			$('#sgst_amt').val(sgst_amt);
			
			net_total = (net_total+sgst_amt);
			$('#net_total').val(net_total.toFixed(2));
		});
	});
</script>
