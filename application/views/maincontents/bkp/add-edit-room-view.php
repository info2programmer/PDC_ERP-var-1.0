<h4><i class="fa fa-plus-square-o"></i> Manage Room Details </h4>
<hr class="style5">
<?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
  <?php
	if($row)
	{
		$room_no = $row->room_no;
		$floor_id = $row->floor_id;
		$room_price = $row->room_price;
		$cgst_percent = $row->cgst_percent;
		$cgst_amt = $row->cgst_amt;
		$sgst_percent = $row->sgst_percent;
		$sgst_amt = $row->sgst_amt;
		$net_total = $row->net_total;
		$room_type = $row->room_type;
		$is_ac = $row->is_ac;
		$bed_type = $row->bed_type;
	}
	else
	{
		$room_no = '';
		$floor_id = '';
		$room_price = '';
		$cgst_percent = '';
		$cgst_amt = '';
		$sgst_percent = '';
		$sgst_amt = '';
		$net_total = 0;
		$room_type = '';
		$is_ac = '';
		$bed_type = '';
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Room Number</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="room_no" name="room_no" value="<?php echo $room_no; ?>" placeholder="Enter Room Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Floor</label>
    <div class="col-sm-9">
      <select class="form-control" name="floor_id">
      	<option value="" selected="selected" hidden>Choose Floor</option>
      <?php
	  $floors = $this->db->query("select * from td_floor")->result();
	  if($floors) { 
	  foreach($floors as $floor) {
	  ?>  
        <option value="<?php echo $floor->floor_id; ?>" <?php if($floor->floor_id==$floor_id) { ?>selected="selected"<?php } ?>><?php echo $floor->floor_name; ?></option>
      <?php } }?>  
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Room Price</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="room_price" name="room_price" value="<?php echo $room_price; ?>" placeholder="Enter Room Price">
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
    <label class="control-label col-sm-3">Room Type</label>
    <div class="col-sm-9">
      <select class="form-control" name="room_type">
      	<option value="" selected="selected" hidden>Choose Room Type</option>
        <option value="Normal" <?php if($room_type=='Normal') { ?>selected="selected"<?php } ?>>Normal</option>
        <option value="Deluxe" <?php if($room_type=='Deluxe') { ?>selected="selected"<?php } ?>>Deluxe</option>
        <option value="Super Deluxe" <?php if($room_type=='Super Deluxe') { ?>selected="selected"<?php } ?>>Super Deluxe</option>        
      </select>
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-3">Is AC</label>
    <div class="col-sm-9">
      <select class="form-control" name="is_ac">
      	<option value="" selected="selected" hidden>Choose AC </option>
        <option value="AC" <?php if($is_ac=='AC') { ?>selected="selected"<?php } ?>>AC</option>
        <option value="Normal AC" <?php if($is_ac=='Normal AC') { ?>selected="selected"<?php } ?>>Normal AC</option>
        <option value="General AC" <?php if($is_ac=='General AC') { ?>selected="selected"<?php } ?>>General AC</option>
      </select>
    </div>
  </div> 
  <div class="form-group">
    <label class="control-label col-sm-3">Bed Type</label>
    <div class="col-sm-9">
      <select class="form-control" name="bed_type">
      	<option value="" selected="selected" hidden>Choose Bed Type</option>
        <option value="Single" <?php if($bed_type=='Single') { ?>selected="selected"<?php } ?>>Single</option>
        <option value="Double" <?php if($bed_type=='Double') { ?>selected="selected"<?php } ?>>Double</option>
        <option value="Triple" <?php if($bed_type=='Triple') { ?>selected="selected"<?php } ?>>Triple</option>
        <option value="Four" <?php if($bed_type=='Four') { ?>selected="selected"<?php } ?>>Four</option>
      </select>
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success"><?php echo $action; ?> Room </button>
    </div>
  </div>
</form>
<hr class="style5">

<script>
	$(document).ready(function () {
		
		
		
		$('#cgst_percent').on('change', function() {
			net_total = parseFloat($('#net_total').val());
			cgst_percent = parseFloat($('#cgst_percent').val());
			room_price = parseFloat($('#room_price').val());
			cgst_amt = (room_price*cgst_percent)/100;			
			$('#cgst_amt').val(cgst_amt);
			
			net_total = (net_total+room_price+cgst_amt);
			$('#net_total').val(net_total);
			
		});
		$('#sgst_percent').on('change', function() {
			net_total = parseFloat($('#net_total').val());
			sgst_percent = parseFloat($('#sgst_percent').val());
			room_price1 = parseFloat($('#room_price').val());
			sgst_amt = (room_price1*sgst_percent)/100;
			$('#sgst_amt').val(sgst_amt);
			
			net_total = (net_total+sgst_amt);
			$('#net_total').val(net_total.toFixed(2));
		});
	});
</script>
