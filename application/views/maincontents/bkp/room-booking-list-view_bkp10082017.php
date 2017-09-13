<h4><i class="fa fa-home"></i> Book Room</h4>
<hr class="style5">
<span style="color:#009900;">
<?php
if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); }
?>
</span>
<form method="post" action="<?php echo base_url();?>manage_book/room_booking_list">
  <input type="hidden" name="mode" value="search" />
  <div class="form-group">
    <label class="control-label col-sm-2">From Date</label>
    <div class="col-sm-3">
      <input name="from_date" type="date" value="<?php echo set_value('from_date'); ?>" class="form-control"/>
    </div>
    <label class="control-label col-sm-2">To Date</label>
    <div class="col-sm-3">
      <input name="to_date" type="date" value="<?php echo set_value('to_date'); ?>" class="form-control"/>
    </div>
    <div class="col-sm-2">
      <button  value="" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
<?php
   if($search_result) {
   ?>
	<div class="form-group">
	  <!--<label class="control-label col-sm-7 text-center">~~~ GROUND FLOOR ~~~</label>-->
	  <br/>
	  <br/>
	  <?php
  		$floors = $this->db->query("select * from td_floor")->result();
  		if($floors) {
  		foreach($floors as $floor) {
  	  ?>
	<div class="form-group">
	  <label class="col-sm-12 text-center">~~~~~ <?php echo $floor->floor_name; ?> ~~~~~</label>
	  <br/>
	  <br/>
	  <?php
		$rooms = $this->db->query("select * from td_room where floor_id='$floor->floor_id' order by room_no asc")->result();
		if($rooms) {
		foreach($rooms as $room) {
		?>
		  <div class="col-sm-4">
			<div class="well<?php echo ($room->vacancy_status==1)?'6':'2';?> text-center "> Room No <span style="font-size: 22px;font-weight: 600;"><?php echo $room->room_no; ?></span><br/>
			  <?php
			
			if($room->vacancy_status==1) {
				$room_books = $this->db->query("select * from td_room_book where room_id='$room->room_id' and vacancy_status=1")->row();
				$cust = $this->db->query("select * from td_customer where customer_id='$room_books->customer_id'")->row();
			?>
			  <strong><?php echo $cust->customer_name; ?></strong><br />
			  <strong><?php echo date_format(date_create($room_books->booking_from), "d-m-Y")?> to <?php echo date_format(date_create($room_books->booking_to), "d-m-Y")?></strong><br />
			  <a href="<?php echo base_url();?>manage_book/room_details/<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
			  <button type="button" class="btn btn-success btn-xs">DETAILS</button>
			  </a> <a href="#transfer<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
			  <button type="button" class="btn btn-success btn-xs">TRANSFER</button>
			  </a> <a href="<?php echo base_url();?>manage_book/room_vacant/<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
			  <button type="button" class="btn btn-success btn-xs" onclick="return confirm('Are you want to vacant this room ?');">VACANT</button>
			  </a>
			  <div id="transfer<?php echo $room_books->room_book_id; ?>" class="overlay">
				<div class="popup"> <br />
				  <br />
				  <p>
					<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('manage_book/room_transfer',$attributes); ?>
					<input type="hidden" name="mode" value="tab" />
					<input type="hidden" name="old_room_id" value="<?php echo $room_books->room_id; ?>" />
					<input type="hidden" name="booking_no" value="<?php echo $room_books->booking_no; ?>" />
				  <div class="form-group">
					<label class="control-label col-sm-2">Booking From</label>
					<div class="col-sm-2">
					  <input type="text" class="form-control" id="booking_from" name="booking_from"  placeholder="Enter Booking From" value="<?php echo date_format(date_create($room_books->booking_from), "d-m-Y"); ?>"  readonly="">
					</div>
					<label class="control-label col-sm-2">Booking To</label>
					<div class="col-sm-2">
					  <input type="date" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" value="<?php echo $room_books->booking_to; ?>" required>
					</div>
					<label class="control-label col-sm-2">Shift Room To</label>
					<div class="col-sm-2">
					  <select name="new_room_id" id="new_room_id" class="form-control" required>
						<option value="" selected="selected" hidden>Choose Room</option>
						<?php 
							$vacant_rooms = $this->db->query("select * from td_room where vacancy_status=0 order by room_no asc")->result();
							if($vacant_rooms) { foreach($vacant_rooms as $vacant_room) {
							?>
						<option value="<?php echo $vacant_room->room_id; ?>"><?php echo $vacant_room->room_no; ?></option>
						<?php } } ?>
					  </select>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-10 col-sm-2">
					  <button type="submit" class="btn btn-success" onclick="return confirm('Are you want to transfer room ?'); ">Transfer Now</button>
					</div>
				  </div>
				  </form>
				  </p>
				  <a class="close" href="#">&times;</a> </div>
			  </div>
			  <?php } else { ?>
			  <strong>Vacant</strong><br />
			  <br />
			  <a href="#modal<?php echo $room->room_id; ?>" style="color:#fff; text-decoration:none;">
			  <button type="button" class="btn btn-success btn-xs">BOOK THIS ROOM</button>
			  </a>
			  <div id="modal<?php echo $room->room_id; ?>" class="overlay">
				<div class="popup"> <br />
				  <br />
				  <p>
					<?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
					<!--<form action="<?php echo base_url();?>manage_book/room_booking_list" method="post">-->
					<input type="hidden" name="mode" value="tab" />
					<input type="hidden" name="room_id" value="<?php echo $room->room_id; ?>" />
				  <div class="form-group">
					<label class="control-label col-sm-2">Booking From</label>
					<div class="col-sm-2">
					  <input type="date" class="form-control" id="booking_from" name="booking_from"  placeholder="Enter Booking From" required>
					</div>
					<label class="control-label col-sm-2">Booking To</label>
					<div class="col-sm-2">
					  <input type="date" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" required>
					</div>
					<label class="control-label col-sm-1">Adult</label>
					<div class="col-sm-1">
					  <input type="number" class="form-control" id="no_of_adult" name="no_of_adult"  placeholder="Enter Number Of Adult" required>
					</div>
					<label class="control-label col-sm-1">Child</label>
					<div class="col-sm-1">
					  <input type="number" class="form-control" id="no_of_child" name="no_of_child"  placeholder="Enter Number Of Child" required>
					</div>
				  </div>
				  <div class="form-group customer_type_row">
					<label class="control-label col-sm-3">Customer Type</label>
					<div class="col-sm-5">
					  <select name="customer_type" class="form-control customer_type">
						<option value="" selected="selected" hidden>Choose Customer Type</option>
						<option value="New">New</option>
						<option value="Existing">Existing</option>
					  </select>
					</div>
				  </div>
				  <div class="form-group customer_row1">
					<label class="control-label col-sm-3">Customer Name</label>
					<div class="col-sm-5">
					  <select name="customer_id" id="customer_id" class="form-control">
						<option value="" selected="selected" hidden>Choose Customer Name</option>
						<?php 
			$customers = $this->db->query("select * from td_customer")->result();
			if($customers) { foreach($customers as $customer) {
			?>
						<option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->customer_name; ?></option>
						<?php } } ?>
					  </select>
					</div>
				  </div>
				  <div class="form-group customer_row2">
					<label class="control-label col-sm-3">Customer Name</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" id="customer_name" name="customer_name"  placeholder="Enter Customer Name">
					</div>
				  </div>
				  <div class="form-group customer_row3">
					<label class="control-label col-sm-3">Customer Address</label>
					<div class="col-sm-9">
					  <textarea name="address" class="form-control">
			 
			  </textarea>
					</div>
				  </div>
				  <div class="form-group customer_row4">
					<label class="control-label col-sm-3">State</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="state" name="state" value="" placeholder="Enter State">
					</div>
					<label class="control-label col-sm-3">District</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="district" name="district" value="" placeholder="Enter District">
					</div>
				  </div>
				  <div class="form-group customer_row5">
					<label class="control-label col-sm-3">Pincode</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="pincode" name="pincode"  placeholder="Enter Pincode">
					</div>
					<label class="control-label col-sm-3">Email</label>
					<div class="col-sm-3">
					  <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email">
					</div>
				  </div>
				  <div class="form-group customer_row6">
					<label class="control-label col-sm-3">Phone 1</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="phone1" name="phone1"  placeholder="Enter Phone 1">
					</div>
					<label class="control-label col-sm-3">Phone 2</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="phone2" name="phone2"  placeholder="Enter Phone 2">
					</div>
				  </div>
				  <div class="form-group customer_row7">
					<label class="control-label col-sm-3">Aadhar Number</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="aadhar_no" name="aadhar_no"  placeholder="Enter Aadhar Number">
					</div>
					<label class="control-label col-sm-3">Votar Id</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="votarid" name="votarid"  placeholder="Enter Votar Id">
					</div>
				  </div>
				  <div class="form-group customer_row8">
					<label class="control-label col-sm-3">PAN ID</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="pan" name="pan"  placeholder="Enter PAN ID">
					</div>
					<label class="control-label col-sm-3">GST Number</label>
					<div class="col-sm-3">
					  <input type="text" class="form-control" id="gst_no" name="gst_no"  placeholder="Enter GST Number">
					</div>
				  </div>
				  <div class="form-group customer_row9">
					<label class="control-label col-sm-3">Date Of Birth</label>
					<div class="col-sm-3">
					  <input type="date" class="form-control" id="dob" name="dob"  placeholder="Enter Date Of Birth">
					</div>
					<label class="control-label col-sm-3">Date Of Anniversary</label>
					<div class="col-sm-3">
					  <input type="date" class="form-control" id="doa" name="doa"  placeholder="Enter Date Of Anniversary">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-9 col-sm-3">
					  <button type="submit" class="btn btn-success">Assign Customer </button>
					</div>
				  </div>
				  </form>
				  </p>
				  <a class="close" href="#">&times;</a> </div>
			  </div>
			  <?php } ?>
			</div>
		  </div>
	  <?php } } else { ?>
	  <div class="row">
		<div class="col-md-12">
		  <div class="text-center" style="padding:20px;"> <span class="alert alert-danger">No rooms in <?php echo $floor->floor_name; ?></span> </div>
		</div>
	  </div>
	  <?php } ?>
	  
	</div>
<?php } } ?>
  </div>
	</div>
<?php } else { ?>
<?php
  $floors = $this->db->query("select * from td_floor")->result();
  if($floors) {
  	foreach($floors as $floor) {
  ?>
<div class="form-group">
  <label class="col-sm-12 text-center">~~~~~ <?php echo $floor->floor_name; ?> ~~~~~</label>
  <br/>
  <br/>
  <?php
	$rooms = $this->db->query("select * from td_room where floor_id='$floor->floor_id' order by room_no asc")->result();
	if($rooms) {
  	foreach($rooms as $room) {
	?>
  <div class="col-sm-4">
    <div class="well<?php echo ($room->vacancy_status==1)?'6':'2';?> text-center "> Room No <span style="font-size: 22px;font-weight: 600;"><?php echo $room->room_no; ?></span><br/>
      <?php
	
	if($room->vacancy_status==1) {
		$room_books = $this->db->query("select * from td_room_book where room_id='$room->room_id' and vacancy_status=1")->row();
		$cust = $this->db->query("select * from td_customer where customer_id='$room_books->customer_id'")->row();
	?>
      <strong><?php echo $cust->customer_name; ?></strong><br />
      <strong><?php echo date_format(date_create($room_books->booking_from), "d-m-Y")?> to <?php echo date_format(date_create($room_books->booking_to), "d-m-Y")?></strong><br />
      <a href="<?php echo base_url();?>manage_book/room_details/<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">DETAILS</button>
      </a> <a href="#transfer<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">TRANSFER</button>
      </a> <a href="<?php echo base_url();?>manage_book/room_vacant/<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs" onclick="return confirm('Are you want to vacant this room ?');">VACANT</button>
      </a>
      <div id="transfer<?php echo $room_books->room_book_id; ?>" class="overlay">
        <div class="popup"> <br />
          <br />
          <p>
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('manage_book/room_transfer',$attributes); ?>
            <input type="hidden" name="mode" value="tab" />
            <input type="hidden" name="old_room_id" value="<?php echo $room_books->room_id; ?>" />
            <input type="hidden" name="booking_no" value="<?php echo $room_books->booking_no; ?>" />
          <div class="form-group">
            <label class="control-label col-sm-2">Booking From</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="booking_from" name="booking_from"  placeholder="Enter Booking From" value="<?php echo date_format(date_create($room_books->booking_from), "d-m-Y"); ?>"  readonly="">
            </div>
            <label class="control-label col-sm-2">Booking To</label>
            <div class="col-sm-2">
              <input type="date" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" value="<?php echo $room_books->booking_to; ?>" required>
            </div>
            <label class="control-label col-sm-2">Shift Room To</label>
            <div class="col-sm-2">
              <select name="new_room_id" id="new_room_id" class="form-control" required>
                <option value="" selected="selected" hidden>Choose Room</option>
                <?php 
					$vacant_rooms = $this->db->query("select * from td_room where vacancy_status=0 order by room_no asc")->result();
					if($vacant_rooms) { foreach($vacant_rooms as $vacant_room) {
					?>
                <option value="<?php echo $vacant_room->room_id; ?>"><?php echo $vacant_room->room_no; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
              <button type="submit" class="btn btn-success" onclick="return confirm('Are you want to transfer room ?'); ">Transfer Now</button>
            </div>
          </div>
          </form>
          </p>
          <a class="close" href="#">&times;</a> </div>
      </div>
      <?php } else { ?>
      <strong>Vacant</strong><br />
      <br />
      <a href="#modal<?php echo $room->room_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">BOOK THIS ROOM</button>
      </a>
      <div id="modal<?php echo $room->room_id; ?>" class="overlay">
        <div class="popup"> <br />
          <br />
          <p>
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
            <!--<form action="<?php echo base_url();?>manage_book/room_booking_list" method="post">-->
            <input type="hidden" name="mode" value="tab" />
            <input type="hidden" name="room_id" value="<?php echo $room->room_id; ?>" />
          <div class="form-group">
            <label class="control-label col-sm-2">Booking From</label>
            <div class="col-sm-2">
              <input type="date" class="form-control" id="booking_from" name="booking_from"  placeholder="Enter Booking From" required>
            </div>
            <label class="control-label col-sm-2">Booking To</label>
            <div class="col-sm-2">
              <input type="date" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" required>
            </div>
            <label class="control-label col-sm-1">Adult</label>
            <div class="col-sm-1">
              <input type="number" class="form-control" id="no_of_adult" name="no_of_adult"  placeholder="Enter Number Of Adult" required>
            </div>
            <label class="control-label col-sm-1">Child</label>
            <div class="col-sm-1">
              <input type="number" class="form-control" id="no_of_child" name="no_of_child"  placeholder="Enter Number Of Child" required>
            </div>
          </div>
          <div class="form-group customer_type_row">
            <label class="control-label col-sm-3">Customer Type</label>
            <div class="col-sm-5">
              <select name="customer_type" class="form-control customer_type">
                <option value="" selected="selected" hidden>Choose Customer Type</option>
                <option value="New">New</option>
                <option value="Existing">Existing</option>
              </select>
            </div>
          </div>
          <div class="form-group customer_row1">
            <label class="control-label col-sm-3">Customer Name</label>
            <div class="col-sm-5">
              <select name="customer_id" id="customer_id" class="form-control">
                <option value="" selected="selected" hidden>Choose Customer Name</option>
                <?php 
	$customers = $this->db->query("select * from td_customer")->result();
	if($customers) { foreach($customers as $customer) {
	?>
                <option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->customer_name; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group customer_row2">
            <label class="control-label col-sm-3">Customer Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="customer_name" name="customer_name"  placeholder="Enter Customer Name">
            </div>
          </div>
          <div class="form-group customer_row3">
            <label class="control-label col-sm-3">Customer Address</label>
            <div class="col-sm-9">
              <textarea name="address" class="form-control">
     
      </textarea>
            </div>
          </div>
          <div class="form-group customer_row4">
            <label class="control-label col-sm-3">State</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="state" name="state" value="" placeholder="Enter State">
            </div>
            <label class="control-label col-sm-3">District</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="district" name="district" value="" placeholder="Enter District">
            </div>
          </div>
          <div class="form-group customer_row5">
            <label class="control-label col-sm-3">Pincode</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="pincode" name="pincode"  placeholder="Enter Pincode">
            </div>
            <label class="control-label col-sm-3">Email</label>
            <div class="col-sm-3">
              <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email">
            </div>
          </div>
          <div class="form-group customer_row6">
            <label class="control-label col-sm-3">Phone 1</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="phone1" name="phone1"  placeholder="Enter Phone 1">
            </div>
            <label class="control-label col-sm-3">Phone 2</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="phone2" name="phone2"  placeholder="Enter Phone 2">
            </div>
          </div>
          <div class="form-group customer_row7">
            <label class="control-label col-sm-3">Aadhar Number</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="aadhar_no" name="aadhar_no"  placeholder="Enter Aadhar Number">
            </div>
            <label class="control-label col-sm-3">Votar Id</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="votarid" name="votarid"  placeholder="Enter Votar Id">
            </div>
          </div>
          <div class="form-group customer_row8">
            <label class="control-label col-sm-3">PAN ID</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="pan" name="pan"  placeholder="Enter PAN ID">
            </div>
            <label class="control-label col-sm-3">GST Number</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="gst_no" name="gst_no"  placeholder="Enter GST Number">
            </div>
          </div>
          <div class="form-group customer_row9">
            <label class="control-label col-sm-3">Date Of Birth</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" id="dob" name="dob"  placeholder="Enter Date Of Birth">
            </div>
            <label class="control-label col-sm-3">Date Of Anniversary</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" id="doa" name="doa"  placeholder="Enter Date Of Anniversary">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-9 col-sm-3">
              <button type="submit" class="btn btn-success">Assign Customer </button>
            </div>
          </div>
          </form>
          </p>
          <a class="close" href="#">&times;</a> </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <?php } } else { ?>
  <div class="row">
    <div class="col-md-12">
      <div class="text-center" style="padding:20px;"> <span class="alert alert-danger">No rooms in <?php echo $floor->floor_name; ?></span> </div>
    </div>
  </div>
  <?php } ?>
  <!--<div class="col-sm-2">
      <div class="well6 text-center linkstyle" data-toggle="tooltip" title="Executive Suite"> Room No 111<br/>
        <input name="" type="checkbox" value="" class="form-control"/>
        Vacant </div>
    </div>-->
</div>
<?php } } ?>
<?php } ?>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
$(document).ready(function() {
	
	$('.customer_row1').hide();
	$('.customer_row2').hide();
	$('.customer_row3').hide();
	$('.customer_row4').hide();
	$('.customer_row5').hide();
	$('.customer_row6').hide();
	$('.customer_row7').hide();
	$('.customer_row8').hide();
	$('.customer_row9').hide();
				
	$('.customer_type').on('change', function() {
		customer_type = $(this).val();
		if(customer_type=='New')
		{
			$('.customer_row1').hide();
			$('.customer_row2').show();
			$('.customer_row3').show();
			$('.customer_row4').show();
			$('.customer_row5').show();
			$('.customer_row6').show();
			$('.customer_row7').show();
			$('.customer_row8').show();
			$('.customer_row9').show();
			$('.customer_type_row').hide();
		}
		else
		{
			$('.customer_row1').show();
			$('.customer_row2').hide();
			$('.customer_row3').hide();
			$('.customer_row4').hide();
			$('.customer_row5').hide();
			$('.customer_row6').hide();
			$('.customer_row7').hide();
			$('.customer_row8').hide();
			$('.customer_row9').hide();
			$('.customer_type_row').hide();
		}
	});
});
</script>
