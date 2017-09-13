<h4><i class="fa fa-plus-square-o"></i> Invoice Report </h4>
<hr class="style5">
<form action="<?php echo base_url();?>manage_report/invoice_report" method="post" target="_blank">  
  <input type="hidden" name="mode" value="search" />
  <div class="form-group">
    <label class="control-label col-sm-1">Type</label>
    <div class="col-sm-3">
      <select name="invoice_type" class="form-control" required>
      	<option value="" selected="selected" hidden>Choose Invoice Type</option>
        <option value="Room">Room</option>
        <option value="Restaurant">Restaurant</option>
      </select>
    </div>
    <label class="control-label col-sm-1">From</label>
    <div class="col-sm-3">
      <input type="date" name="from_date" class="form-control" required />
    </div>
    <label class="control-label col-sm-1">To</label>
    <div class="col-sm-3">
      <input type="date" name="to_date" class="form-control" required />
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Submit </button>
    </div>
  </div>
</form>
<hr class="style5">
