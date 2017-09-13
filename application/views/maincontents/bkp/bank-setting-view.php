<h4><i class="fa fa-plus-square-o"></i> Manage Bank Details </h4>
<hr class="style5">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<form class="form-horizontal" method="post" action="<?php echo base_url();?>company_setting/manage_bank">
  <?php
	if($row)
	{
		$bank_name = $row->bank_name;
		$bank_branch = $row->bank_branch;
		$ac_num = $row->ac_num;
		$ac_type = $row->ac_type;
		$ac_name = $row->ac_name;
		$ifsc_code = $row->ifsc_code;
		$branch_address = $row->branch_address;
	}
	else
	{
		$bank_name = '';
		$bank_branch = '';
		$ac_num = '';
		$ac_type = '';
		$ac_name = '';
		$ifsc_code = '';
		$branch_address = '';
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Bank Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo $bank_name; ?>" placeholder="Enter Bank Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Bank Branch</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="bank_branch" name="bank_branch" value="<?php echo $bank_branch; ?>" placeholder="Enter Branch Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" >Account Number</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="ac_num" name="ac_num" value="<?php echo $ac_num; ?>" placeholder="Enter Account Number">
    </div>
    <label class="control-label col-sm-2" >A/C Type</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="ac_type" name="ac_type" value="<?php echo $ac_type; ?>" placeholder="Eg. Current">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" >Account Name</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="ac_name" name="ac_name" value="<?php echo $ac_name; ?>" placeholder="Enter Account Name">
    </div>
    <label class="control-label col-sm-2" >IFSC Code</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" value="<?php echo $ifsc_code; ?>" placeholder="Enter IFSC Code">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" >Branch Address</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="branch_address" name="branch_address" value="<?php echo $branch_address; ?>" placeholder="Enter Branch Address">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success">Update Bank Details</button>
    </div>
  </div>
</form>
<hr class="style5">
