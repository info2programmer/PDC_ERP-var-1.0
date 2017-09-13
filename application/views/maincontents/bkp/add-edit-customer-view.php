<h4><i class="fa fa-plus-square-o"></i> Manage Customer Details </h4>
<hr class="style5">
<?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
  <?php
	if($row)
	{
		$customer_name = $row->customer_name;
		$address = $row->address;
		$district = $row->district;
		$state = $row->state;
		$pincode = $row->pincode;
		$email = $row->email;
		$phone1 = $row->phone1;
		$phone2 = $row->phone2;
		$passport_no = $row->passport_no;
		$aadhar_no = $row->aadhar_no;
		$votarid = $row->votarid;
		$pan = $row->pan;
		$dob = $row->dob;
		$doa = $row->doa;
		$gst_no = $row->gst_no;
		$aadhar_file = $row->aadhar_file;
		$pan_file = $row->pan_file;
		$votar_file = $row->votar_file;
		$passport_file = $row->passport_file;
	}
	else
	{
		$customer_name = '';
		$address = '';
		$district = '';
		$state = '';
		$pincode = '';
		$email = '';
		$phone1 = '';
		$phone2 = '';
		$passport_no = '';
		$aadhar_no = '';
		$votarid = '';
		$pan = '';
		$dob = '';
		$doa = '';
		$gst_no = '';
		$aadhar_file = '';
		$pan_file = '';
		$votar_file = '';
		$passport_file = '';
	}
?>
  <input type="hidden" name="mode" value="tab" />
  <div class="form-group">
    <label class="control-label col-sm-3">Customer Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $customer_name; ?>" placeholder="Enter Customer Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Customer Address</label>
    <div class="col-sm-9">
      <textarea name="address" class="form-control">
      <?php echo $address; ?>
      </textarea>
    </div>
  </div>
  
  
  
 
  <div class="form-group">
  	<label class="control-label col-sm-3">State</label>
    <div class="col-sm-3">      
      <input type="text" class="form-control" id="state" name="state" value="<?php echo $state; ?>" placeholder="Enter State">
    </div>
    
  	<label class="control-label col-sm-3">District</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="district" name="district" value="<?php echo $district; ?>" placeholder="Enter District">
    </div>
    
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Pincode</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $pincode; ?>" placeholder="Enter Pincode">
    </div>
  </div>  
  
  
  <div class="form-group">
    <label class="control-label col-sm-3">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter Email">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Passport No</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="passport_no" name="passport_no" value="<?php echo $passport_no; ?>" placeholder="Enter Passport No">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Phone 1</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="phone1" name="phone1" value="<?php echo $phone1; ?>" placeholder="Enter Phone 1">
    </div>
    <label class="control-label col-sm-3">Phone 2</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="phone2" name="phone2" value="<?php echo $phone2; ?>" placeholder="Enter Phone 2">
    </div>
  </div>
 
 
 <div class="form-group">
    <label class="control-label col-sm-3">Aadhar Number</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="aadhar_no" name="aadhar_no" value="<?php echo $aadhar_no; ?>" placeholder="Enter Aadhar Number">
    </div>
    <label class="control-label col-sm-3">Votar Id</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="votarid" name="votarid" value="<?php echo $votarid; ?>" placeholder="Enter Votar Id">
    </div>
  </div>
 
 
 
 <div class="form-group">
    <label class="control-label col-sm-3">PAN ID</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="pan" name="pan" value="<?php echo $pan; ?>" placeholder="Enter PAN ID">
    </div>
    <label class="control-label col-sm-3">GST Number</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="gst_no" name="gst_no" value="<?php echo $gst_no; ?>" placeholder="Enter GST Number">
    </div>
  </div>
  
  
 <div class="form-group">
    <label class="control-label col-sm-3">Date Of Birth</label>
    <div class="col-sm-3">
      <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" placeholder="Enter Date Of Birth">
    </div>
    <label class="control-label col-sm-3">Date Of Anniversary</label>
    <div class="col-sm-3">
      <input type="date" class="form-control" id="doa" name="doa" value="<?php echo $doa; ?>" placeholder="Enter Date Of Anniversary">
    </div>
  </div>
  
  <div class="form-group aadhar-row">
    <label class="control-label col-sm-3">Passport</label>
    <div class="col-sm-9">
      <?php if($passport_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $passport_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $passport_file; ?>" class="img-thumbnail"  width="120" height="100" /></a>
          <span>Click on the image to downlaod</span>	
      <?php } ?><br />
      <input type="file" class="form-control" name="passport_file" />
      <?php echo $this->session->flashdata('passport_message'); ?>
    </div>
  </div>
  
  <div class="form-group aadhar-row">
    <label class="control-label col-sm-3">Aadhar Card</label>
    <div class="col-sm-9">
      <?php if($aadhar_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $aadhar_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $aadhar_file; ?>" class="img-thumbnail"  width="120" height="100" /></a>
          <span>Click on the image to downlaod</span>	
      <?php } ?><br />
      <input type="file" class="form-control" name="aadhar_file" />
      <?php echo $this->session->flashdata('aadhar_message'); ?>
    </div>
  </div>
  <div class="form-group pan-row">
    <label class="control-label col-sm-3">PAN Card</label>
    <div class="col-sm-9">
      <?php if($pan_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $pan_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $pan_file; ?>" class="img-thumbnail" width="120" height="100" /></a>
          <span>Click on the image to downlaod</span>	
      <?php } ?><br />
      <input type="file" class="form-control" name="pan_file" />
      <?php echo $this->session->flashdata('pan_message'); ?>
    </div>
  </div>
  <div class="form-group votar-row">
    <label class="control-label col-sm-3">Votar Card</label>
    <div class="col-sm-9">
      <?php if($votar_file!='') { ?>
         <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $votar_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $votar_file; ?>" class="img-thumbnail" width="120" height="100" /></a>	
         <span>Click on the image to downlaod</span>
      <?php } ?><br />
      <input type="file" class="form-control" name="votar_file" />
      <?php echo $this->session->flashdata('votar_message'); ?>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success"><?php echo $action; ?> Customer </button>
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
