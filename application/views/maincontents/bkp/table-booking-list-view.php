<h4><i class="fa fa-home"></i> Restaurant Table Booking </h4>
<hr class="style5">
<span style="color:#009900;">
<?php
if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); }
?>
</span>
<form method="post" action="<?php echo base_url();?>manage_restaurant_book/restaurant_booking_list">
  <input type="hidden" name="mode" value="search" />
  <div class="form-group">
    <!--<label class="control-label col-sm-2">From Date</label>
    <div class="col-sm-3">
      <input name="from_date" type="date" value="<?php echo set_value('from_date'); ?>" class="form-control"/>
    </div>-->
    <label class="control-label col-sm-4">Booking Date</label>
    <div class="col-sm-4">
      <input name="to_date" type="date" value="<?php echo set_value('to_date'); ?>" class="form-control"/>
    </div>
    <div class="col-sm-4">
      <button  value="" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
<br /><br />
<?php
	if($search_result)
	{
   		if($table_books) { 
  	foreach($table_books as $table) {
	$book = $this->db->query("select * from td_table_book where booking_to='$to_date' and table_id='$table->table_id'")->row();
	?>
  <div class="col-sm-4">
    <div class="wellsky text-center "> <span style="font-size: 22px;font-weight: 600;"><?php echo $table->table_name; ?></span><br/>
      <?php	
	 ?>
      <strong>Vacant</strong><br />
      <br />
      <a href="#table<?php echo $table->table_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">BOOK THIS TABLE</button>
      </a>
      <div id="table<?php echo $table->table_id; ?>" class="overlay">
        <div class="popup"> <br />
          <br />
          <p>
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
            <input type="hidden" name="mode" value="tab" />
            <input type="hidden" name="room_id" value="<?php echo $table->table_id; ?>" />
          <div class="form-group">
            <label class="control-label col-sm-2">Booking Date</label>
            <div class="col-sm-2">
              <input type="date" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" required>
            </div>
            <input type="hidden" class="form-control" id="no_of_adult" name="no_of_adult"  placeholder="Enter Number Of Adult" value="0">
            <input type="hidden" class="form-control" id="no_of_child" name="no_of_child"  placeholder="Enter Number Of Child" value="0">
			
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
    </div>
  </div>
  <?php } ?>
   <?php }  
   		if($table_books2_count>0) { 
   		foreach($table_book2 as $table2) {
		$table_books2 = $this->db->query("select * from td_table_book where booking_to='$to_date' and table_id='$table2->table_id' and vacancy_status=1")->row();
   ?>
      <div class="col-sm-4">
		<div class="well6 text-center "> <span style="font-size: 22px;font-weight: 600;"><?php echo $table2->table_name; ?></span><br/>
		  
	<?php
		$cust = $this->db->query("select * from td_customer where customer_id='$table_books2->customer_id'")->row();
	?>
      <strong><?php echo $cust->customer_name; ?></strong><br />
      <strong><?php echo date_format(date_create($table_books2->booking_to), "d-m-Y")?></strong><br />
      <a href="<?php echo base_url();?>manage_restaurant_book/restaurant_details/<?php echo $table_books2->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">DETAILS</button>
      </a> <a href="#transfer<?php echo $table_books2->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">TRANSFER</button>
      </a> <a href="<?php echo base_url();?>manage_restaurant_book/table_vacant/<?php echo $table_books2->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs" onclick="return confirm('Are you want to vacant this table ?');">VACANT</button>
      </a>
      <div id="transfer<?php echo $table_books2->room_book_id; ?>" class="overlay">
        <div class="popup"> <br />
          <br />
          <p>
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('manage_restaurant_book/table_transfer',$attributes); ?>
            <input type="hidden" name="mode" value="tab" />
            <input type="hidden" name="old_room_id" value="<?php echo $table_books2->table_id; ?>" />
            <input type="hidden" name="booking_no" value="<?php echo $table_books2->booking_no; ?>" />
          <div class="form-group">
           
            <label class="control-label col-sm-2">Booking Date</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" value="<?php echo date_format(date_create($table_books2->booking_to), "d-m-Y"); ?>" readonly>
            </div>
            <label class="control-label col-sm-2">Shift Table To</label>
            <div class="col-sm-2">
              <select name="new_room_id" id="new_room_id" class="form-control" required>
                <option value="" selected="selected" hidden>Choose Table</option>
                <?php 
					$vacant_tables = $this->db->query("select * from td_table order by table_id asc")->result();
					if($vacant_tables) { foreach($vacant_tables as $vacant_table) {
					?>
                <option value="<?php echo $vacant_table->table_id; ?>"><?php echo $vacant_table->table_name; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
              <button type="submit" class="btn btn-success" onclick="return confirm('Are you want to transfer table ?'); ">Transfer Now</button>
            </div>
          </div>
          </form>
          </p>
          <a class="close" href="#">&times;</a> </div>
      </div>
       
	  
	  
		</div>
	  </div>
      <?php  } } 
	}  
   	else { ?>

<div class="form-group">  
  <br /><br />
  <?php
	$tables = $this->db->query("select * from td_table order by table_id asc")->result();
	if($tables) {
  	foreach($tables as $table) {
	?>
  <div class="col-sm-4">
    <div class="well<?php echo ($table->vacancy_status==1)?'6':'sky';?> text-center "> <span style="font-size: 22px;font-weight: 600;"><?php echo $table->table_name; ?></span><br/>
      <?php	
	if($table->vacancy_status==1) {
		$table_books = $this->db->query("select * from td_table_book where table_id='$table->table_id' and vacancy_status=1")->row();
		$cust = $this->db->query("select * from td_customer where customer_id='$table_books->customer_id'")->row();
	?>
      <strong><?php echo $cust->customer_name; ?></strong><br />
      <strong><?php echo date_format(date_create($table_books->booking_to), "d-m-Y")?></strong><br />
      <a href="<?php echo base_url();?>manage_restaurant_book/restaurant_details/<?php echo $table_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">DETAILS</button>
      </a> <a href="#transfer<?php echo $table_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">TRANSFER</button>
      </a> <a href="<?php echo base_url();?>manage_restaurant_book/table_vacant/<?php echo $table_books->room_book_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs" onclick="return confirm('Are you want to vacant this table ?');">VACANT</button>
      </a>
      <div id="transfer<?php echo $table_books->room_book_id; ?>" class="overlay">
        <div class="popup"> <br />
          <br />
          <p>
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('manage_restaurant_book/table_transfer',$attributes); ?>
            <input type="hidden" name="mode" value="tab" />
            <input type="hidden" name="old_room_id" value="<?php echo $table_books->table_id; ?>" />
            <input type="hidden" name="booking_no" value="<?php echo $table_books->booking_no; ?>" />
          <div class="form-group">
           
            <label class="control-label col-sm-2">Booking Date</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" value="<?php echo date_format(date_create($table_books->booking_to), "d-m-Y"); ?>" readonly>
            </div>
            <label class="control-label col-sm-2">Shift Table To</label>
            <div class="col-sm-2">
              <select name="new_room_id" id="new_room_id" class="form-control" required>
                <option value="" selected="selected" hidden>Choose Table</option>
                <?php 
					$vacant_tables = $this->db->query("select * from td_table where vacancy_status=0 order by table_id asc")->result();
					if($vacant_tables) { foreach($vacant_tables as $vacant_table) {
					?>
                <option value="<?php echo $vacant_table->table_id; ?>"><?php echo $vacant_table->table_name; ?></option>
                <?php } } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-10 col-sm-2">
              <button type="submit" class="btn btn-success" onclick="return confirm('Are you want to transfer table ?'); ">Transfer Now</button>
            </div>
          </div>
          </form>
          </p>
          <a class="close" href="#">&times;</a> </div>
      </div>
      <?php } else { ?>
      <strong>Vacant</strong><br />
      <br />
      <a href="#table<?php echo $table->table_id; ?>" style="color:#fff; text-decoration:none;">
      <button type="button" class="btn btn-success btn-xs">BOOK THIS TABLE</button>
      </a>
      <div id="table<?php echo $table->table_id; ?>" class="overlay">
        <div class="popup"> <br />
          <br />
          <p>
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
            <input type="hidden" name="mode" value="tab" />
            <input type="hidden" name="room_id" value="<?php echo $table->table_id; ?>" />
          <div class="form-group">
            <!--<label class="control-label col-sm-2">Booking From</label>
            <div class="col-sm-2">
              <input type="date" class="form-control" id="booking_from" name="booking_from"  placeholder="Enter Booking From" required>
            </div>-->
            <label class="control-label col-sm-2">Booking Date</label>
            <div class="col-sm-2">
              <input type="date" class="form-control" id="booking_to" name="booking_to"  placeholder="Enter Booking To" required>
            </div>
            <input type="hidden" class="form-control" id="no_of_adult" name="no_of_adult"  placeholder="Enter Number Of Adult" value="0">
            <input type="hidden" class="form-control" id="no_of_child" name="no_of_child"  placeholder="Enter Number Of Child" value="0">
			
			<label class="control-label col-sm-3">Customer Type</label>
            <div class="col-sm-5">
              <select name="customer_type" class="form-control customer_type">
                <option value="" selected="selected" hidden>Choose Customer Type</option>
                <option value="New">Advance</option>
                <option value="Existing">Running</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="customer_id" value="1" />
          <!--<div class="form-group customer_row1">
            <label class="control-label col-sm-3">Customer Name</label>
            <div class="col-sm-5">
              <select name="customer_id" id="customer_id" class="form-control">
                <option value="" selected="selected" hidden>Choose Customer Name</option>
                <option value="1">Rajhans Restaurant</option>
                <?php 
				/*$customers = $this->db->query("select * from td_customer")->result();
				if($customers) { foreach($customers as $customer) {
				?>
                <option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->customer_name; ?></option>
                <?php } }*/ ?>
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
              <button type="submit" class="btn btn-success">Book Table </button>
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
      <div class="text-center" style="padding:20px;"> <span class="alert alert-danger">No tables</span> </div>
    </div>
  </div>
  <?php } ?>
  
</div>
<?php ?>
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
