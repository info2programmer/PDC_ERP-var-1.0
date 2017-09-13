<h4><i class="fa fa-plus-square-o"></i> Manage Floor Details </h4>
<hr class="style5">
<?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
  <?php
	if($row)
	{
		$floor_name = $row->floor_name;
	}
	else
	{
		$floor_name = '';
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Floor Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="floor_name" name="floor_name" value="<?php echo $floor_name; ?>" placeholder="Enter Floor Name">
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success"><?php echo $action; ?> Floor </button>
    </div>
  </div>
</form>
<hr class="style5">
