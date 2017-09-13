<h4><i class="fa fa-plus-square-o"></i> Manage Food Menu Details </h4>
<hr class="style5">
<?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
  <?php
	if($row)
	{
		$menu_code = $row->menu_code;
		$menu_name = $row->menu_name;
		$menu_price = $row->menu_price;
		$cgst_percent = $row->cgst_percent;
		$cgst_amt = $row->cgst_amt;
		$sgst_percent = $row->sgst_percent;
		$sgst_amt = $row->sgst_amt;
		$net_total = $row->net_total;
	}
	else
	{
		$menu_code = '';
		$menu_name = '';
		$menu_price = '';
		$cgst_percent = '';
		$cgst_amt = '';
		$sgst_percent = '';
		$sgst_amt = '';
		$net_total = 0;
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Menu Code</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="menu_code" name="menu_code" value="<?php echo $menu_code; ?>" placeholder="Enter Menu Code">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Menu Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="menu_name" name="menu_name" value="<?php echo $menu_name; ?>" placeholder="Enter Menu Name">
    </div>
  </div>  
  
  
  <div class="form-group">
    <label class="control-label col-sm-3">Menu Price</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="menu_price" name="menu_price" value="<?php echo $menu_price; ?>" placeholder="Enter Menu Price">
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-3">CGST Percent</label>
    <div class="col-sm-9">
    <select name="cgst_percent" class="form-control" id="cgst_percent">
      	<option value="" selected="selected" hidden>Choose CGST Percent</option>
        <option value="0.00" <?php if($cgst_percent=='0.00') { ?>selected="selected"<?php } ?>>0</option>
        <option value="2.50" <?php if($cgst_percent=='2.50') { ?>selected="selected"<?php } ?>>2.5</option>
        <option value="6.00" <?php if($cgst_percent=='6.00') { ?>selected="selected"<?php } ?>>6</option>
        <option value="9.00" <?php if($cgst_percent=='9.00') { ?>selected="selected"<?php } ?>>9</option>
        <option value="14.00" <?php if($cgst_percent=='14.00') { ?>selected="selected"<?php } ?>>14</option>
      </select>
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-3">CGST Amount</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="cgst_amt" name="cgst_amt" value="<?php echo $cgst_amt; ?>" placeholder="Enter CGST Amount">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">SGST Percent</label>
    <div class="col-sm-9">
    <select name="sgst_percent" class="form-control" id="sgst_percent">
      	<option value="" selected="selected" hidden>Choose SGST Percent</option>
        <option value="0.00" <?php if($sgst_percent=='0.00') { ?>selected="selected"<?php } ?>>0</option>
        <option value="2.50" <?php if($sgst_percent=='2.50') { ?>selected="selected"<?php } ?>>2.5</option>
        <option value="6.00" <?php if($sgst_percent=='6.00') { ?>selected="selected"<?php } ?>>6</option>
        <option value="9.00" <?php if($sgst_percent=='9.00') { ?>selected="selected"<?php } ?>>9</option>
        <option value="14.00" <?php if($sgst_percent=='14.00') { ?>selected="selected"<?php } ?>>14</option>
      </select>
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-3">SGST Amount</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="sgst_amt" name="sgst_amt" value="<?php echo $sgst_amt; ?>" placeholder="Enter SGST Amount">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Net Amount</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="net_total" name="net_total" value="<?php echo $net_total; ?>" placeholder="Enter Net Amount">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success"><?php echo $action; ?> Food Menu </button>
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
