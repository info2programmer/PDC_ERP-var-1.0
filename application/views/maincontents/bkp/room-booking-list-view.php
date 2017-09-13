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

	  <label class="col-sm-12 text-center" style="color:#FF6600;font-size:20px;">~~~~~ <?php echo $floor->floor_name; ?> ~~~~~</label>


	  <?php

		$rooms = $this->db->query("select * from td_room where floor_id='$floor->floor_id' order by room_no asc")->result();

		if($rooms) {

		foreach($rooms as $room) {
		$new_ldate = date('Y-m-d', strtotime($ldate.'+1 day'));
$room_bookscnt = $this->db->query("SELECT * FROM td_room_book WHERE room_id='$room->room_id' AND booking_to BETWEEN '$fdate' AND '$new_ldate'")->num_rows();
//echo "SELECT * FROM td_room_book WHERE room_id='$room->room_id' AND booking_to BETWEEN '$fdate' AND '$ldate'";
if($room_bookscnt <=0){

//echo $new_ldate;
//$room_books = $this->db->query("SELECT * FROM td_room_book WHERE room_id='$room->room_id' AND booking_to BETWEEN '$fdate' AND '$new_ldate'")->row();
?>


<div class="col-sm-4">

    <div class="well<?php if($room_bookscnt <=0){ echo 2; } else echo 6;?> text-center "> Room No <span style="font-size: 22px;font-weight: 600;"><?php echo $room->room_no; ?></span><br>

      <button type="button" class="btn btn-success btn-xs">VACANT</button>
<br />

      <br />

      <a href="#modal<?php echo $room->room_id; ?>" style="color:#fff; text-decoration:none;">

      <button type="button" class="btn btn-success btn-xs">BOOK THIS ROOM</button>

      </a>

      <div id="modal<?php echo $room->room_id; ?>" class="overlay">

        <div class="popup"> 
        <br />

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

          <!--<div class="form-group customer_type_row">

            <label class="control-label col-sm-3">Customer Type</label>

            <div class="col-sm-5">

              <select name="customer_type" class="form-control customer_type">

                <option value="" selected="selected" hidden>Choose Customer Type</option>

                <option value="New">New</option>

                <option value="Existing">Existing</option>

              </select>

            </div>

          </div>-->

         <!-- <div class="form-group customer_row1">

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

          </div>-->

          <div class="form-group customer_row2" style="display:block;">

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
      </div>
    </div>

 
<?php } else { 
$room_books = $this->db->query("select * from td_room_book where room_id='$room->room_id' and vacancy_status=1")->row();

		$cust = $this->db->query("select * from td_customer where customer_id='$room_books->customer_id'")->row();
?>

<div class="col-sm-4">

    <div class="well6 text-center "> Room No <span style="font-size: 22px;font-weight: 600;"><?php echo $room->room_no; ?></span><br>

      
      <strong><?php echo $cust->customer_name; ?></strong><br />

      <strong><?php echo date_format(date_create($room_books->booking_from), "d-m-Y")?> to <?php echo date_format(date_create($room_books->booking_to), "d-m-Y")?></strong><br />

      <a href="<?php echo base_url();?>manage_book/room_details/<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;" target="_blank">

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

      
    </div>

  </div>

<?php } ?>


<?php }  ?>
</div>

<?php } else { ?>

	  <div class="row">

		<div class="col-md-12">

		  <div class="text-center" style="padding:20px;"> <span class="alert alert-danger">No rooms in <?php echo $floor->floor_name; ?></span> </div>

		</div>

	  </div>

	  <?php } ?>

	  

	</div>

<?php } } ?>

	</div>

<?php } else { ?>

<?php

  $floors = $this->db->query("select * from td_floor")->result();

  if($floors) {

  	foreach($floors as $floor) {

  ?>

<div class="form-group">

  <label class="col-sm-12 text-center" style="color:#FF6600;font-size:20px;">~~~~~ <?php echo $floor->floor_name; ?> ~~~~~</label>

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

      <a href="<?php echo base_url();?>manage_book/room_details/<?php echo $room_books->room_book_id; ?>" style="color:#fff; text-decoration:none;" target="_blank">

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

         <!-- <div class="form-group customer_type_row">

            <label class="control-label col-sm-3">Customer Type</label>

            <div class="col-sm-5">

              <select name="customer_type" class="form-control customer_type">

                <option value="" selected="selected" hidden>Choose Customer Type</option>

                <option value="New">New</option>

                <option value="Existing">Existing</option>

              </select>

            </div>

          </div>-->

          

          <div class="form-group customer_row2">

            <label class="control-label col-sm-3">Customer Name</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="customer_name" name="customer_name"  placeholder="Enter Customer Name">

            </div>

          </div>

          <div class="form-group customer_row3">

            <label class="control-label col-sm-3">Customer Address</label>

            <div class="col-sm-9">

              <textarea name="address" id="address" class="form-control">

     

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
            <select class="form-control chosen-select" name="aadhar_no" id="aadhar_no" data-placeholder="Choose / Write Aadhar No" multiple tabindex="4" onchange="return hahaha(this.value)">
             <option value="">Select...</option>
          <?php 
			$customers = $this->db->query("select * from td_customer")->result();
			if($customers) { foreach($customers as $customer) {
				?>
			 <option value="<?php echo $customer->aadhar_no; ?>"><?php echo $customer->aadhar_no; ?></option>
				<?php } } ?>
             </select>
            </div>

            <label class="control-label col-sm-3">Votar Id</label>

            <div class="col-sm-3">
              <select class="form-control chosen-select" name="votarid" id="votarid" data-placeholder="Choose / Write Voter Id" multiple tabindex="4" onchange="return hahaha(this.value)">
             <option value="">Select...</option>
          <?php 
			$customers = $this->db->query("select * from td_customer")->result();
			if($customers) { foreach($customers as $customer) {
				?>
			 <option value="<?php echo $customer->votarid; ?>"><?php echo $customer->votarid; ?></option>
				<?php } } ?>
             </select>

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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<style>
.chosen-select {
  width: 100%;
}
.chosen-select-deselect {
  width: 100%;
}
.chosen-container {
  display: inline-block;
  font-size: 14px;
  position: relative;
  vertical-align: middle;
}
.chosen-container .chosen-drop {
  background: #ffffff;
  border: 1px solid #cccccc;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: 0 8px 8px rgba(0, 0, 0, .25);
  box-shadow: 0 8px 8px rgba(0, 0, 0, .25);
  margin-top: -1px;
  position: absolute;
  top: 100%;
  left: -9000px;
  z-index: 1060;
}
.chosen-container.chosen-with-drop .chosen-drop {
  left: 0;
  right: 0;
}
.chosen-container .chosen-results {
  color: #555555;
  margin: 0 4px 4px 0;
  max-height: 240px;
  padding: 0 0 0 4px;
  position: relative;
  overflow-x: hidden;
  overflow-y: auto;
  -webkit-overflow-scrolling: touch;
}
.chosen-container .chosen-results li {
  display: none;
  line-height: 1.42857143;
  list-style: none;
  margin: 0;
  padding: 5px 6px;
}
.chosen-container .chosen-results li em {
  background: #feffde;
  font-style: normal;
}
.chosen-container .chosen-results li.group-result {
  display: list-item;
  cursor: default;
  color: #999;
  font-weight: bold;
}
.chosen-container .chosen-results li.group-option {
  padding-left: 15px;
}
.chosen-container .chosen-results li.active-result {
  cursor: pointer;
  display: list-item;
}
.chosen-container .chosen-results li.highlighted {
  background-color: #428bca;
  background-image: none;
  color: white;
}
.chosen-container .chosen-results li.highlighted em {
  background: transparent;
}
.chosen-container .chosen-results li.disabled-result {
  display: list-item;
  color: #777777;
}
.chosen-container .chosen-results .no-results {
  background: #eeeeee;
  display: list-item;
}
.chosen-container .chosen-results-scroll {
  background: white;
  margin: 0 4px;
  position: absolute;
  text-align: center;
  width: 321px;
  z-index: 1;
}
.chosen-container .chosen-results-scroll span {
  display: inline-block;
  height: 1.42857143;
  text-indent: -5000px;
  width: 9px;
}
.chosen-container .chosen-results-scroll-down {
  bottom: 0;
}
.chosen-container .chosen-results-scroll-down span {
  background: url("chosen-sprite.png") no-repeat -4px -3px;
}
.chosen-container .chosen-results-scroll-up span {
  background: url("chosen-sprite.png") no-repeat -22px -3px;
}
.chosen-container-single .chosen-single {
  background-color: #ffffff;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  color: #555555;
  display: block;
  height: 34px;
  overflow: hidden;
  line-height: 34px;
  padding: 0 0 0 8px;
  position: relative;
  text-decoration: none;
  white-space: nowrap;
}
.chosen-container-single .chosen-single span {
  display: block;
  margin-right: 26px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.chosen-container-single .chosen-single abbr {
  background: url("chosen-sprite.png") right top no-repeat;
  display: block;
  font-size: 1px;
  height: 10px;
  position: absolute;
  right: 26px;
  top: 12px;
  width: 12px;
}
.chosen-container-single .chosen-single abbr:hover {
  background-position: right -11px;
}
.chosen-container-single .chosen-single.chosen-disabled .chosen-single abbr:hover {
  background-position: right 2px;
}
.chosen-container-single .chosen-single div {
  display: block;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  width: 18px;
}
.chosen-container-single .chosen-single div b {
  background: url("chosen-sprite.png") no-repeat 0 7px;
  display: block;
  height: 100%;
  width: 100%;
}
.chosen-container-single .chosen-default {
  color: #777777;
}
.chosen-container-single .chosen-search {
  margin: 0;
  padding: 3px 4px;
  position: relative;
  white-space: nowrap;
  z-index: 1000;
}
.chosen-container-single .chosen-search input[type="text"] {
  background: url("chosen-sprite.png") no-repeat 100% -20px, #ffffff;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  margin: 1px 0;
  padding: 4px 20px 4px 4px;
  width: 100%;
}
.chosen-container-single .chosen-drop {
  margin-top: -1px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
}
.chosen-container-single-nosearch .chosen-search input {
  position: absolute;
  left: -9000px;
}
.chosen-container-multi .chosen-choices {
  background-color: #ffffff;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  cursor: text;
  height: auto !important;
  height: 1%;
  margin: 0;
  overflow: hidden;
  padding: 0;
  position: relative;
}
.chosen-container-multi .chosen-choices li {
  float: left;
  list-style: none;
}
.chosen-container-multi .chosen-choices .search-field {
  margin: 0;
  padding: 0;
  white-space: nowrap;
}
.chosen-container-multi .chosen-choices .search-field input[type="text"] {
  background: transparent !important;
  border: 0 !important;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: #555555;
  height: 32px;
  margin: 0;
  padding: 4px;
  outline: 0;
}
.chosen-container-multi .chosen-choices .search-field .default {
  color: #999;
}
.chosen-container-multi .chosen-choices .search-choice {
  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;
  background-color: #eeeeee;
  border: 1px solid #cccccc;
  border-top-right-radius: 4px;
  border-top-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  background-image: -webkit-linear-gradient(top, #ffffff 0%, #eeeeee 100%);
  background-image: -o-linear-gradient(top, #ffffff 0%, #eeeeee 100%);
  background-image: linear-gradient(to bottom, #ffffff 0%, #eeeeee 100%);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffeeeeee', GradientType=0);
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  color: #333333;
  cursor: default;
  line-height: 13px;
  margin: 6px 0 3px 5px;
  padding: 3px 20px 3px 5px;
  position: relative;
}
.chosen-container-multi .chosen-choices .search-choice .search-choice-close {
  background: url("chosen-sprite.png") right top no-repeat;
  display: block;
  font-size: 1px;
  height: 10px;
  position: absolute;
  right: 4px;
  top: 5px;
  width: 12px;
  cursor: pointer;
}
.chosen-container-multi .chosen-choices .search-choice .search-choice-close:hover {
  background-position: right -11px;
}
.chosen-container-multi .chosen-choices .search-choice-focus {
  background: #d4d4d4;
}
.chosen-container-multi .chosen-choices .search-choice-focus .search-choice-close {
  background-position: right -11px;
}
.chosen-container-multi .chosen-results {
  margin: 0 0 0 0;
  padding: 0;
}
.chosen-container-multi .chosen-drop .result-selected {
  display: none;
}
.chosen-container-active .chosen-single {
  border: 1px solid #66afe9;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  -webkit-transition: border linear .2s, box-shadow linear .2s;
  -o-transition: border linear .2s, box-shadow linear .2s;
  transition: border linear .2s, box-shadow linear .2s;
}
.chosen-container-active.chosen-with-drop .chosen-single {
  background-color: #ffffff;
  border: 1px solid #66afe9;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  -webkit-transition: border linear .2s, box-shadow linear .2s;
  -o-transition: border linear .2s, box-shadow linear .2s;
  transition: border linear .2s, box-shadow linear .2s;
}
.chosen-container-active.chosen-with-drop .chosen-single div {
  background: transparent;
  border-left: none;
}
.chosen-container-active.chosen-with-drop .chosen-single div b {
  background-position: -18px 7px;
}
.chosen-container-active .chosen-choices {
  border: 1px solid #66afe9;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .075) inset, 0 0 8px rgba(82, 168, 236, .6);
  -webkit-transition: border linear .2s, box-shadow linear .2s;
  -o-transition: border linear .2s, box-shadow linear .2s;
  transition: border linear .2s, box-shadow linear .2s;
}
.chosen-container-active .chosen-choices .search-field input[type="text"] {
  color: #111 !important;
}
.chosen-container-active.chosen-with-drop .chosen-choices {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.chosen-disabled {
  cursor: default;
  opacity: 0.5 !important;
}
.chosen-disabled .chosen-single {
  cursor: default;
}
.chosen-disabled .chosen-choices .search-choice .search-choice-close {
  cursor: default;
}
.chosen-rtl {
  text-align: right;
}
.chosen-rtl .chosen-single {
  padding: 0 8px 0 0;
  overflow: visible;
}
.chosen-rtl .chosen-single span {
  margin-left: 26px;
  margin-right: 0;
  direction: rtl;
}
.chosen-rtl .chosen-single div {
  left: 7px;
  right: auto;
}
.chosen-rtl .chosen-single abbr {
  left: 26px;
  right: auto;
}
.chosen-rtl .chosen-choices .search-field input[type="text"] {
  direction: rtl;
}
.chosen-rtl .chosen-choices li {
  float: right;
}
.chosen-rtl .chosen-choices .search-choice {
  margin: 6px 5px 3px 0;
  padding: 3px 5px 3px 19px;
}
.chosen-rtl .chosen-choices .search-choice .search-choice-close {
  background-position: right top;
  left: 4px;
  right: auto;
}
.chosen-rtl.chosen-container-single .chosen-results {
  margin: 0 0 4px 4px;
  padding: 0 4px 0 0;
}
.chosen-rtl .chosen-results .group-option {
  padding-left: 0;
  padding-right: 15px;
}
.chosen-rtl.chosen-container-active.chosen-with-drop .chosen-single div {
  border-right: none;
}
.chosen-rtl .chosen-search input[type="text"] {
  background: url("chosen-sprite.png") no-repeat -28px -20px, #ffffff;
  direction: rtl;
  padding: 4px 5px 4px 20px;
}
</style>
<script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
<script type="text/javascript">
$(function() {
	var trm = $(".auto").val();
	//autocomplete
	$(".auto").autocomplete({
		source: "<?php echo base_url();?>manage_book/search/"+trm,
		minLength: 1
	});				

});
</script>
<script>

    $(document).ready(function () {

        $('[data-toggle="tooltip"]').tooltip();

    });

</script>

<script>

$(document).ready(function() {

	

	$('.customer_row1').show();

	$('.customer_row2').show();

	$('.customer_row3').show();

	$('.customer_row4').show();

	$('.customer_row5').show();

	$('.customer_row6').show();

	$('.customer_row7').show();

	$('.customer_row8').show();

	$('.customer_row9').show();

				

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
function hahaha(fff){
event.preventDefault();
                    var ID = fff;
                   
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>manage_book/search/",
                        dataType: 'html',
                        data: {mid: ID},
                        success: function(res) {
							$('#orderarea').css('display','block');
							$('#orderarea').html(res);
							var resp = res.split('/'); 
							$('#customer_name').val(resp[0]);
							$('#address').val(resp[1]);
							$('#state').val(resp[2]);
							$('#district').val(resp[3]);
							$('#pincode').val(resp[4]);
							$('#email').val(resp[5]);
							$('#phone1').val(resp[6]);
							$('#phone2').val(resp[7]);
							$('#voterid').val(resp[10]);
							$('#pan').val(resp[11]);
							$('#aadhar_no').val(resp[9]);
							$('#gst_no').val(resp[14]);
							$('#dob').val(resp[12]);
							$('#doa').val(resp[13]);
							//alert(res);
                        }
                    });
}
</script>

