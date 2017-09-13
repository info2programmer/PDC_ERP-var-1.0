<h4><i class="fa fa-plus-square-o"></i> Manage Table Details </h4>
<hr class="style5">
<?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
  <?php
	if($row)
	{
		$table_name = $row->table_name;
	}
	else
	{
		$table_name = '';
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Table Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="table_name" name="table_name" value="<?php echo $table_name; ?>" placeholder="Enter Table Name">
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success"><?php echo $action; ?> Table </button>
    </div>
  </div>
</form>
<hr class="style5">
