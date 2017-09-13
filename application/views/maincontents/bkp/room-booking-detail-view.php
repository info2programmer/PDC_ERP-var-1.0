<h4><i class="fa fa-building"></i> Room Booking Details Of <strong><?php echo $room->room_no; ?></strong></h4>
<hr class="style5">
<span style="color:#009900;">
<?php
if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); }
?>
</span>
<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>manage_book/room_details/<?php echo $book_room->room_book_id; ?>">
<input type="hidden" name="mode" value="tab1" />
  <div class="form-group">
    <label class="control-label col-sm-3">Room No.</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" value="<?php echo $room->room_no; ?>" readonly>
    </div>
    <label class="control-label col-sm-3">Type</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" value="<?php echo $room->room_type; ?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">From</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" value="<?php echo date_format(date_create($book_room->booking_from), "d-m-Y"); ?>">
    </div>
    <label class="control-label col-sm-3">Till</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" value="<?php echo date_format(date_create($book_room->booking_to), "d-m-Y"); ?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3">Adult</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" name="no_of_adult" value="<?php echo $book_room->no_of_adult; ?>">
    </div>
    <label class="control-label col-sm-3">Child</label>
    <div class="col-sm-3">
      <input type="number" class="form-control" name="no_of_child" value="<?php echo $book_room->no_of_child; ?>">
    </div>
  </div>
  <div class="form-group customer_row2">
    <label class="control-label col-sm-3">Customer Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $customer->customer_name; ?>" readonly="readonly">
    </div>
  </div>
  <div class="form-group customer_row3">
    <label class="control-label col-sm-3">Customer Address</label>
    <div class="col-sm-9">
      <textarea name="address" class="form-control">
     	<?php echo $customer->address; ?>
      </textarea>
    </div>
  </div> 
  <div class="form-group customer_row4">
  	<label class="control-label col-sm-3">State</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="state" name="state" value="<?php echo $customer->state; ?>" placeholder="Enter State">
    </div>
    
  	<label class="control-label col-sm-3">District</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="district" name="district" value="<?php echo $customer->district; ?>" placeholder="Enter District">
    </div>
    
  </div>
  
  <div class="form-group customer_row5">
    <label class="control-label col-sm-3">Pincode</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="pincode" name="pincode"  value="<?php echo $customer->pincode; ?>">
    </div>
    
    <label class="control-label col-sm-3">Email</label>
    <div class="col-sm-3">
      <input type="email" class="form-control" id="email" name="email"  value="<?php echo $customer->email; ?>">
    </div>
  </div> 
  
  <div class="form-group">
    <label class="control-label col-sm-3">Passport No</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="passport_no" name="passport_no" value="<?php echo $customer->passport_no; ?>" placeholder="Enter Passport No">
    </div>
  </div>  
  
  <div class="form-group customer_row6">
    <label class="control-label col-sm-3">Phone 1</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="phone1" name="phone1"  value="<?php echo $customer->phone1; ?>">
    </div>
    <label class="control-label col-sm-3">Phone 2</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="phone2" name="phone2"  value="<?php echo $customer->phone2; ?>">
    </div>
  </div>
 
 <div class="form-group customer_row7">
    <label class="control-label col-sm-3">Aadhar Number</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="aadhar_no" name="aadhar_no"  value="<?php echo $customer->aadhar_no; ?>">
    </div>
    <label class="control-label col-sm-3">Votar Id</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="votarid" name="votarid"  value="<?php echo $customer->votarid; ?>">
    </div>
  </div> 
 <div class="form-group customer_row8">
    <label class="control-label col-sm-3">PAN ID</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="pan" name="pan"  value="<?php echo $customer->pan; ?>">
    </div>
    <label class="control-label col-sm-3">GST Number</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="gst_no" name="gst_no"  value="<?php echo $customer->gst_no; ?>">
    </div>
  </div> 
  
 <div class="form-group customer_row9">
    <label class="control-label col-sm-3">Date Of Birth</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="dob" name="dob"  value="<?php echo date_format(date_create($customer->dob), "d-m-Y"); ?>" readonly="readonly">
    </div>
    <label class="control-label col-sm-3">Date Of Anniversary</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="doa" name="doa"  value="<?php echo date_format(date_create($customer->doa), "d-m-Y"); ?>" readonly="readonly">
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
      <?php if($customer->aadhar_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $customer->aadhar_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $customer->aadhar_file; ?>" class="img-thumbnail" width="120" height="100" /></a>	
      <?php } ?><br />
      <input type="file" class="form-control" name="aadhar_file" />
      <?php echo $this->session->flashdata('aadhar_message'); ?>
    </div>
  </div>
  <div class="form-group pan-row">
    <label class="control-label col-sm-3">PAN Card</label>
    <div class="col-sm-9">
      <?php if($customer->pan_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $customer->pan_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $customer->pan_file; ?>" class="img-thumbnail" width="120" height="100" /></a>	
      <?php } ?><br />
      <input type="file" class="form-control" name="pan_file" />
      <?php echo $this->session->flashdata('pan_message'); ?>
    </div>
  </div>
  <div class="form-group votar-row">
    <label class="control-label col-sm-3">Votar Card</label>
    <div class="col-sm-9">
      <?php if($customer->votar_file!='') { ?>
         <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $customer->votar_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $customer->votar_file; ?>" class="img-thumbnail" width="120" height="100" /></a>	
      <?php } ?><br />
      <input type="file" class="form-control" name="votar_file" />
      <?php echo $this->session->flashdata('votar_message'); ?>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-9 col-sm-3">
      <button type="submit" class="btn btn-success">Update Details </button>
    </div>
  </div>  
</form>
<hr class="style5">
<div class="col-md-12" onclick="$('#service-taken').toggle();">
  <h4 style="color:#0066CC;cursor:pointer; margin-left:-15px; background-color:#CAE4FF; padding:6px; border-radius:4px; border:1px solid #0080C0;"><i class="fa fa-list-ul"></i> <strong>Service Taken (click here to view details)</strong></h4>
  <div class="table-responsive" id="service-taken" style="display:none;">
    <table width="1143" class="table table-hover">
      <thead>
        <tr align="center">
          <th width="90" valign="middle"><strong>Sl No.</strong></th>
          <th width="115" valign="middle"><strong>Code</strong></th>
          <th width="257" valign="middle"><strong>Name</strong></th>
          <th width="137" valign="middle"><strong>Rate (Rs.)</strong></th>
          <th width="73" valign="middle"><strong>Qty</strong></th>
          <th width="153" valign="middle"><strong>Total (Rs.)</strong></th>
          <th width="286" valign="middle"><strong>Action</strong></th>
        </tr>
      </thead>
      <tbody>
      <?php	  
	  $booking_services = $this->db->query("select a.*,b.service_code,b.service_name,b.service_description,b.net_total from td_booking_service as a inner join td_service as b on b.service_id=a.service_id where a.booking_no='$book_room->booking_no' order by a.booking_service_id desc")->result();
	  if($booking_services) { 
	  	$i=1;
		foreach($booking_services as $booking_service) {
	  ?>
        <tr>
          <td align="left" valign="middle"><?php echo $i++; ?></td>
          <td align="left" valign="middle"><?php echo $booking_service->service_code; ?></td>
          <td align="left" valign="middle"><?php echo $booking_service->service_name; ?></td>
          <td align="left" valign="middle"><?php echo number_format($booking_service->net_total,2); ?></td>
          <td align="left" valign="middle"><?php echo $booking_service->service_qty; ?></td>
          <td align="left" valign="middle"><?php echo number_format($booking_service->service_subtotal,2); ?></td>
          <td align="left" valign="middle">
		  <a href="<?php echo base_url();?>manage_book/service_delete/<?php echo $booking_service->booking_service_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="6" align="center">No service taken</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<h4><i class="fa fa-plus-square-o"></i> Add Service</h4>
<hr class="style5">
<form class="form-horizontal" action="<?php echo base_url();?>manage_book/booking_service" method="post">
<input type="hidden" name="mode" value="tab2" />
<input type="hidden" name="room_book_id" value="<?php echo $book_room->room_book_id; ?>" />
<input type="hidden" name="booking_no" value="<?php echo $book_room->booking_no; ?>" />

 <div id="repeat_panel">
  <div class="form-group">
  	<input type="hidden" name="service_id[]" id="service_id1" value="" />
    <label class="control-label col-sm-2">Service Code</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="service_code1" name="service_code[]" value="" placeholder="Capital letter"  onkeyup="return servauto(1)">
    </div>
    <label class="control-label col-sm-2">Service Name</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="service_name1" name="service_name[]" value="">
    </div>
    <label class="control-label col-sm-2">Price</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="net_total1" name="net_total[]" value="">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2">Quantity</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="service_qty1" name="service_qty[]" value="" onkeyup="return calservauto(1)">
    </div>
    <label class="control-label col-sm-2">Subtotal</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="service_subtotal1" name="service_subtotal[]" value="">
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-3"></div>
  </div>
  </div>
<div class="form-group">
  <a href="javascript:void(0);" class="btn btn-warning btn-xs pull-right" onClick="addMore();"><i class="fa fa-plus-square"></i> Add More</a>
 </div>
  <!--<div class="form-group">
    <label class="control-label col-sm-1">Date</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="service_date" name="service_date" value="">
    </div>
    <label class="control-label col-sm-1">Time</label>
    <div class="col-sm-5">
      <input type="time" class="form-control" id="service_time" name="service_time" value="">
    </div>
  </div>-->
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Add Service</button>
    </div>
  </div>
  <?php 
  $currentDateTime = date('Y-m-d h:i:s');
$newDateTime = date('h:i A', strtotime($currentDateTime));
  ?>
  <input type="hidden" class="form-control" id="service_date" name="service_date" value="<?php echo date('Y-m-d');?>">
  <input type="hidden" class="form-control" id="service_time" name="service_time" value="<?php echo $newDateTime;?>">
</form>


<!-- listing  area ends here ------------------------------->

<hr class="style5">
<div class="col-md-12" onclick="$('#food-taken').toggle();">
  <h4 style="color:#0066CC;cursor:pointer; margin-left:-15px; background-color:#CAE4FF; padding:6px; border-radius:4px; border:1px solid #0080C0;"><i class="fa fa-list-ul"></i> <strong>Food Taken (click here to view details)</strong></h4>
  <div class="table-responsive" id="food-taken" style="display:none;">
    <table width="1143" class="table table-hover">
      <thead>
        <tr align="center">
          <th width="80" valign="middle"><strong>Sl No.</strong></th>
          <th width="106" valign="middle"><strong>Code</strong></th>
          <th width="308" valign="middle"><strong>Name</strong></th>
          <th width="135" valign="middle"><strong>Rate (Rs.)</strong></th>
          <th width="79" valign="middle"><strong>Qty</strong></th>
          <th width="160" valign="middle"><strong>Total (Rs.)</strong></th>
          <th width="243" valign="middle"><strong>Action</strong></th>
        </tr>
      </thead>
      <tbody>
      <?php	  
	  $booking_services = $this->db->query("select * from td_booking_food_menu where booking_no='$book_room->booking_no' order by booking_food_menu_id desc")->result();
	  if($booking_services) { 
	  	$i=1;
		foreach($booking_services as $booking_service) {
			$food_menu = $this->db->query("select * from td_food_menu where menu_id='$booking_service->food_menu_id'")->row();
	  ?>
        <tr>
          <td align="left" valign="middle"><?php echo $i++; ?></td>
          <td align="left" valign="middle"><?php echo $food_menu->menu_code; ?></td>
          <td align="left" valign="middle"><?php echo $food_menu->menu_name; ?></td>
          <td align="left" valign="middle"><?php echo number_format($food_menu->net_total,2); ?></td>
          <td align="left" valign="middle"><?php echo $booking_service->food_menu_qty; ?></td>
          <td align="left" valign="middle"><?php echo number_format($booking_service->food_menu_subtotal,2); ?></td>
          <td align="left" valign="middle">
		  <a href="<?php echo base_url();?>manage_book/food_delete/<?php echo $booking_service->booking_food_menu_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="7" align="center">No food menu taken</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<h4><i class="fa fa-plus-square-o"></i> Add Food Menu</h4>
<hr class="style5">
<form class="form-horizontal" action="<?php echo base_url();?>manage_book/booking_food_menu" method="post">
<input type="hidden" name="mode" value="tab3" />
<input type="hidden" name="room_book_id" value="<?php echo $book_room->room_book_id; ?>" />
<input type="hidden" name="booking_no" value="<?php echo $book_room->booking_no; ?>" />

<div id="repeat_fpanel">
  <div class="form-group">
  	<input type="hidden" name="food_menu_id[]" id="food_menu_id1" value="" />
    <label class="control-label col-sm-1">Code</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="menu_code1" name="menu_code[]" value="" placeholder="Capital letter" onkeyup="return mco(1)">
    </div>
    <label class="control-label col-sm-1">Menu</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="menu_name1" name="menu_name[]" value="">
    </div>
    
    <label class="control-label col-md-1">Price</label>
    <div class="col-md-2">
      <input type="text" class="form-control" id="food_net_total1" name="net_total[]" value="">
    </div>
    
  </div>
 
  
  <div class="form-group">
    <label class="control-label col-sm-1">Qty</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="food_menu_qty1" name="food_menu_qty[]" value="" onkeyup="return calmno(1)">
    </div>
    
    <label class="control-label col-sm-1">Subtotal</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="food_menu_subtotal1" name="food_menu_subtotal[]" value="">
    </div>
    <div class="col-sm-3"></div>
  </div>
  </div>
  <div class="form-group">
  <a href="javascript:void(0);" class="btn btn-warning btn-xs pull-right" onClick="addMorefood();"><i class="fa fa-plus-square"></i> Add More</a>
 </div>
  
  <!--<div class="form-group">
    <label class="control-label col-sm-1">Date</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="food_menu_date" name="food_menu_date" value="">
    </div>
    <label class="control-label col-sm-1">Time</label>
    <div class="col-sm-5">
      <input type="time" class="form-control" id="food_menu_time" name="food_menu_time" value="">
    </div>
  </div>-->
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Add Food Menu</button>
    </div>
  </div>
   <?php 
  $currentDateTime1 = date('Y-m-d h:i:s');
$newDateTime1 = date('h:i A', strtotime($currentDateTime1));
  ?>
  <input type="hidden" class="form-control" id="food_menu_date" name="food_menu_date" value="<?php echo date('Y-m-d');?>">
  <input type="hidden" class="form-control" id="food_menu_time" name="food_menu_time" value="<?php echo $newDateTime1;?>">
</form>


<!-- listing  area ends here ------------------------------->


<hr class="style5">
<div class="col-md-12" onclick="$('#liquor-taken').toggle();">
  <h4 style="color:#0066CC;cursor:pointer; margin-left:-15px; background-color:#CAE4FF; padding:6px; border-radius:4px; border:1px solid #0080C0;"><i class="fa fa-list-ul"></i> <strong>Liquor Taken (click here to view details)</strong></h4>
  <div class="table-responsive" id="liquor-taken" style="display:none;">
    <table width="1143" class="table table-hover">
      <thead>
        <tr align="center">
          <th width="80" valign="middle"><strong>Sl No.</strong></th>
          <th width="130" valign="middle"><strong>Code</strong></th>
          <th width="284" valign="middle"><strong>Name</strong></th>
          <th width="135" valign="middle"><strong>Rate (Rs.)</strong></th>
          <th width="69" valign="middle"><strong>Qty</strong></th>
          <th width="147" valign="middle"><strong>Total (Rs.)</strong></th>
          <th width="266" valign="middle"><strong>Action</strong></th>
        </tr>
      </thead>
      <tbody>
      <?php	  
	  $booking_liquors = $this->db->query("select * from td_booking_liquor_menu where booking_no='$book_room->booking_no' order by booking_liquor_menu_id desc")->result();
	  if($booking_liquors) { 
	  	$i=1;
		foreach($booking_liquors as $booking_liquor) {
			$liquor_menu = $this->db->query("select * from td_liquor_menu where liquor_id='$booking_liquor->liquor_menu_id'")->row();
	  ?>
        <tr>
          <td align="left" valign="middle"><?php echo $i++; ?></td>
          <td align="left" valign="middle"><?php echo $liquor_menu->liquor_code; ?></td>
          <td align="left" valign="middle"><?php echo $liquor_menu->liquor_name." ".$liquor_menu->size." ML"; ?></td>
          <td align="left" valign="middle"><?php echo number_format($liquor_menu->liquor_price,2); ?></td>
          <td align="left" valign="middle"><?php echo $booking_liquor->liquor_menu_qty; ?></td>
          <td align="left" valign="middle"><?php echo number_format($booking_liquor->liquor_menu_subtotal,2); ?></td>
          <td align="left" valign="middle">
          <a href="<?php echo base_url();?>manage_book/liquor_delete/<?php echo $booking_liquor->booking_liquor_menu_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="7" align="center">No food menu taken</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<h4><i class="fa fa-plus-square-o"></i> Add Liquor Menu</h4>
<hr class="style5">
<form class="form-horizontal" action="<?php echo base_url();?>manage_book/booking_liquor_menu" method="post">
<input type="hidden" name="mode" value="tab3" />
<input type="hidden" name="room_book_id" value="<?php echo $book_room->room_book_id; ?>" />
<input type="hidden" name="booking_no" value="<?php echo $book_room->booking_no; ?>" />

<div id="repeat_lpanel">
  <div class="form-group">
  	<input type="hidden" name="liquor_menu_id[]" id="liquor_menu_id1" value="" />
    <label class="control-label col-sm-1">Code</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="liquor_code1" name="liquor_code[]" value="" placeholder="Capital letter" onkeyup="return lqo(1)">
    </div>
    <label class="control-label col-sm-1">Name</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="liquor_name1" name="liquor_name[]" value="">
    </div>
    <label class="control-label col-md-1">Size(ml)</label>
    <div class="col-md-2">
      <input type="text" class="form-control" id="liquor_size1" name="liquor_size[]" value="">
    </div>  
    <label class="control-label col-md-1">Price</label>
    <div class="col-md-2">
      <input type="text" class="form-control" id="liquor_net_total1" name="liquor_net_total[]" value="">
    </div>
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-1">Qty</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="liquor_menu_qty1" name="liquor_menu_qty[]" value="" onkeyup="return callqo(1)">
    </div>
    <label class="control-label col-sm-1">Subtotal</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="liquor_menu_subtotal1" name="liquor_menu_subtotal[]" value="">
    </div>
    <div class="col-sm-3"></div>
    <div class="col-sm-3"></div>
  </div>
  </div>
  <div class="form-group">
  <a href="javascript:void(0);" class="btn btn-warning btn-xs pull-right" onClick="addMorelq();"><i class="fa fa-plus-square"></i> Add More</a>
 </div>
  
  <!--<div class="form-group">
    <label class="control-label col-sm-1">Date</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" id="liquor_menu_date" name="liquor_menu_date" value="">
    </div>
    <label class="control-label col-sm-1">Time</label>
    <div class="col-sm-5">
      <input type="time" class="form-control" id="liquor_menu_time" name="liquor_menu_time" value="">
    </div>
  </div>-->
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Add Liquor Menu</button>
    </div>
  </div>
   <?php 
  $currentDateTime2 = date('Y-m-d h:i:s');
$newDateTime2 = date('h:i A', strtotime($currentDateTime2));
  ?>
  <input type="hidden" class="form-control" id="liquor_menu_date" name="liquor_menu_date" value="<?php echo date('Y-m-d');?>">
   <input type="hidden" class="form-control" id="liquor_menu_time" name="liquor_menu_time" value="<?php echo $newDateTime2;?>">
</form>
<hr class="style5">
<h4><i class="fa fa-plus-square-o"></i> Other Charges</h4>
<hr class="style5">
<form class="form-horizontal" action="<?php echo base_url();?>manage_book/booking_extra" method="post">
<input type="hidden" name="mode" value="tab3" />
<input type="hidden" name="room_book_id" value="<?php echo $book_room->room_book_id; ?>" />
<input type="hidden" name="booking_no" value="<?php echo $book_room->booking_no; ?>" />
  
  <div class="form-group">
    <label class="control-label col-sm-2">Other Charges</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="misc_charges" name="misc_charges" value="<?php echo $book_room->misc_charges; ?>">
    </div>
    <label class="control-label col-sm-3">Other Charges Description</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="misc_charges_description" name="misc_charges_description" value="<?php echo $book_room->misc_charges_description; ?>">
    </div>	
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Discount Type</label>
    <div class="col-sm-3">
	  <select class="form-control" name="disc_type" id="disc_type">
	  		<option value="" selected="selected" hidden>Choose Discount Type</option>
			<option value="P" <?php if($book_room->disc_type=='P') { ?>selected="selected"<?php } ?>>Percentage</option>
			<option value="F" <?php if($book_room->disc_type=='F') { ?>selected="selected"<?php } ?>>Flat</option>
	  </select>
    </div>
    <label class="control-label col-sm-3">Discount Amount</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="disc_amt" name="disc_amt" value="<?php echo $book_room->disc_amt; ?>">
    </div>	
  </div>
  <div class="form-group">
  	<label class="control-label col-sm-2">Payment Mode</label>
    <div class="col-sm-3">
	  <select class="form-control" name="payment_mode" id="payment_mode">
	  		<option value="" selected="selected" hidden>Choose Payment Mode</option>
			<option value="Cash" <?php if($book_room->payment_mode=='Cash') { ?>selected="selected"<?php } ?>>Cash</option>
			<option value="Card" <?php if($book_room->payment_mode=='Card') { ?>selected="selected"<?php } ?>>Card</option>
	  </select>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-success">Update Other Charges</button>
    </div>
  </div>  
</form>
<hr class="style5">
<a target="_blank" href="<?php echo base_url();?>manage_book/preview_hotel_bill/<?php echo $book_room->room_book_id; ?>" style="color:#fff; text-decoration:none;"><button type="button" class="btn btn-primary" onclick="return confirm('Do you want to preview invoice for this room ?');"><i class="fa fa-eye"></i> PRIVIEW INVOICE</button></a>

<a target="_blank" href="<?php echo base_url();?>manage_book/hotel_bill/<?php echo $book_room->room_book_id; ?>" style="color:#fff; text-decoration:none;"><button type="button" class="btn btn-primary" onclick="return confirm('Reminder : The room will be vacant after clicking OK button ');"><i class="fa fa-print"></i> GENERATE INVOICE</button></a>

<hr class="style5">
<!-- listing  area ends here ------------------------------->

<script>
function calservauto(srvqty) {
		service_qty = $('#service_qty'+srvqty).val();
		net_total = $('#net_total'+srvqty).val();
		service_subtotal = service_qty*net_total;
		$('#service_subtotal'+srvqty).val(service_subtotal);	
}
</script>

<script>
function calmno(mnqty) {
		food_menu_qty = $('#food_menu_qty'+mnqty).val();
		food_net_total = $('#food_net_total'+mnqty).val();
		food_menu_subtotal = food_menu_qty*food_net_total;
		$('#food_menu_subtotal'+mnqty).val(food_menu_subtotal);
	
}
</script>

<script>
function callqo(lqty) {
		liquor_menu_qty = $('#liquor_menu_qty'+lqty).val();
		liquor_net_total = $('#liquor_net_total'+lqty).val();
		liquor_menu_subtotal = liquor_menu_qty*liquor_net_total;
		$('#liquor_menu_subtotal'+lqty).val(liquor_menu_subtotal);
	}
</script>

<!---- Add More Starts-->
<script>
var incr_id=2;
            function addMore()

            {
			 $("#repeat_panel").append('<div class="row"><hr/><input type="hidden" name="service_id[]" id="service_id'+incr_id+'" value="" /><div class="form-group"><label class="control-label col-sm-2">Service Code</label><div class="col-sm-2"><input type="text" class="form-control" id="service_code'+incr_id+'" name="service_code[]" value="" placeholder="Capital letter" onkeyup="return servauto('+incr_id+')"></div><label class="control-label col-sm-2">Service Name</label><div class="col-sm-2"><input type="text" class="form-control" id="service_name'+incr_id+'" name="service_name[]" value=""></div><label class="control-label col-sm-2">Price</label><div class="col-sm-2"><input type="text" class="form-control" id="net_total'+incr_id+'" name="net_total[]" value=""></div></div><div class="form-group"><label class="control-label col-sm-2">Quantity</label><div class="col-sm-2"><input type="text" class="form-control" id="service_qty'+incr_id+'" name="service_qty[]" value="" onkeyup="return calservauto('+incr_id+')"></div><label class="control-label col-sm-2">Subtotal</label><div class="col-sm-2"><input type="text" class="form-control" id="service_subtotal'+incr_id+'" name="service_subtotal[]" value=""></div><div class="col-sm-1"></div><div class="col-sm-3"><button class="btn btn-danger removePanel" type="button">-</button></div></div></div>');


                incr_id++;

                $(".removePanel").click(function(e){

                    e.stopPropagation();

                    $(this).closest(".row").remove();

                });

}

var incr_id1=2;
            function addMorefood()

            {
			 $("#repeat_fpanel").append('<div class="row"><hr/><input type="hidden" name="food_menu_id[]" id="food_menu_id'+incr_id1+'" value="" /><div class="form-group"><label class="control-label col-sm-1">Code</label><div class="col-sm-2"><input type="text" class="form-control" id="menu_code'+incr_id1+'" name="menu_code[]" value="" placeholder="Capital letter" onkeyup="return mco('+incr_id1+')"></div><label class="control-label col-sm-1">Menu</label><div class="col-sm-5"><input type="text" class="form-control" id="menu_name'+incr_id1+'" name="menu_name[]" value=""></div><label class="control-label col-md-1">Price</label><div class="col-md-2"><input type="text" class="form-control" id="food_net_total'+incr_id1+'" name="net_total[]" value=""></div></div><div class="form-group"><label class="control-label col-sm-1">Qty</label><div class="col-sm-2"><input type="text" class="form-control" id="food_menu_qty'+incr_id1+'" name="food_menu_qty[]" value="" onkeyup="return calmno('+incr_id1+')"></div><label class="control-label col-sm-1">Subtotal</label><div class="col-sm-5"><input type="text" class="form-control" id="food_menu_subtotal'+incr_id1+'" name="food_menu_subtotal[]" value=""></div><div class="col-sm-3"><button class="btn btn-danger removePanelfood" type="button">-</button></div></div></div>');



                incr_id1++;

                $(".removePanelfood").click(function(e){

                    e.stopPropagation();

                    $(this).closest(".row").remove();

                });

            }
	
	var incr_id2=2;
            function addMorelq()

            {
			 $("#repeat_lpanel").append('<div class="row"><hr/><input type="hidden" name="liquor_menu_id[]" id="liquor_menu_id'+incr_id2+'" value="" /><div class="form-group"><label class="control-label col-sm-1">Code</label><div class="col-sm-2"><input type="text" class="form-control" id="liquor_code'+incr_id2+'" name="liquor_code[]" value="" placeholder="Capital letter" onkeyup="return lqo('+incr_id2+')"></div><label class="control-label col-sm-1">Name</label><div class="col-sm-2"><input type="text" class="form-control" id="liquor_name'+incr_id2+'" name="liquor_name[]" value=""></div><label class="control-label col-md-1">Size(ml)</label><div class="col-md-2"><input type="text" class="form-control" id="liquor_size'+incr_id2+'" name="liquor_size[]" value=""></div><label class="control-label col-md-1">Price</label><div class="col-md-2"><input type="text" class="form-control" id="liquor_net_total'+incr_id2+'" name="liquor_net_total[]" value=""></div></div><div class="form-group"><label class="control-label col-sm-1">Qty</label><div class="col-sm-2"><input type="text" class="form-control" id="liquor_menu_qty'+incr_id2+'" name="liquor_menu_qty[]" value="" onkeyup="return callqo('+incr_id2+')"></div><label class="control-label col-sm-1">Subtotal</label><div class="col-sm-2"><input type="text" class="form-control" id="liquor_menu_subtotal'+incr_id2+'" name="liquor_menu_subtotal[]" value=""></div><div class="col-sm-3"></div><div class="col-sm-3"><button class="btn btn-danger removePanellq" type="button">-</button></div></div></div>');



                incr_id2++;

                $(".removePanellq").click(function(e){

                    e.stopPropagation();

                    $(this).closest(".row").remove();

                });

            }		

</script>

<!--- Add More Ends --->
