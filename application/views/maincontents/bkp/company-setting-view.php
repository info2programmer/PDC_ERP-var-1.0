<h4><i class="fa fa-plus-square-o"></i> Manage Company Details </h4>
<hr class="style5">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<form class="form-horizontal" method="post" action="<?php echo base_url();?>company_setting/manage_company">
<?php
	if($row)
	{
		$company_name = $row->company_name;
		$company_address = $row->company_address;
		$state_ut = $row->state_ut;
		$pin_code = $row->pin_code;
		$email_id = $row->email_id;
		$phn_number = $row->phn_number;
		$gst_no = $row->gst_no;
		$state_code = $row->state_code;
		$pan_no = $row->pan_no;
	}
	else
	{
		$company_name = '';
		$company_address = '';
		$state_ut = '';
		$pin_code = '';
		$email_id = '';
		$phn_number = '';
		$gst_no = '';
		$state_code = '';
		$pan_no = '';
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Company Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $company_name; ?>" placeholder="Enter Company Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Company Address</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="company_address" name="company_address" value="<?php echo $company_address; ?>" placeholder="Enter Company Address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" >State / UT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="state_ut" name="state_ut" value="<?php echo $state_ut; ?>" placeholder="Eg. West Bengal">
    </div>
    <label class="control-label col-sm-2" >Pin Code</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="pin_code" name="pin_code" value="<?php echo $pin_code; ?>" placeholder="Eg. 700001">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" >Email Address</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email_id" name="email_id" value="<?php echo $email_id; ?>" placeholder="Eg. yourname@email.com">
    </div>
    <label class="control-label col-sm-2" >Phone Number</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="phn_number" name="phn_number" value="<?php echo $phn_number; ?>" placeholder="Eg. 03365501153">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" >GST Number</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="gst_no" name="gst_no" value="<?php echo $gst_no; ?>" placeholder="Enter GST Number">
    </div>
    <label class="control-label col-sm-2" >State Code</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="state_code" name="state_code" value="<?php echo $state_code; ?>" placeholder="Eg. 19">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" >PAN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="pan_no" name="pan_no" value="<?php echo $pan_no; ?>" placeholder="Enter PAN">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success">Update Company Setting</button>
    </div>
  </div>
</form>
<hr class="style5">

