<h4><i class="fa fa-plus-square-o"></i> Advance Table Booking List</h4>
<hr class="style5">
<div class="col-md-12">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<span style="color:#FF0000;">
<?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); } ?>
</span>
  <h4><i class="fa fa-list-ul"></i> Advance Table Booking List</h4>
  
  <div class="table-responsive">
    <table width="1143" class="table table-hover">
      <thead>
        <tr>
          <th width="61" align="left" valign="middle">Sl No.</th>
          <th width="161" align="left" valign="middle">Invoice Number</th>
          <th width="143" align="left" valign="middle">Table Number</th>
		  <th width="151" align="left" valign="middle">Booking Date</th>
		  <th width="242" align="left" valign="middle">Customer Name</th>
		  <th width="242" align="left" valign="middle">Payment Mode</th>
          <th width="242" align="left" valign="middle">Check In</th>
		  <th width="105" align="left" valign="middle">Total Amount</th>
        </tr>
      </thead>
      <tbody>
      <?php if($rows) { $s=1; foreach($rows as $row) { ?>
        <tr>
          <td align="center" valign="middle"><?php echo $s++; ?></td>
          <td align="center" valign="middle"><?php echo $row->booking_no; ?></td>
		  <td align="center" valign="middle"><?php  
		  $table = $this->db->query("select * from td_table where table_id='$row->table_id'")->row();
		  echo $table->table_name;
		  ?></td>
		  <td align="center" valign="middle"><?php echo date_format(date_create($row->booking_to), "d-m-Y"); ?></td>
		  <td align="center" valign="middle"><?php 
		  $customer = $this->db->query("select * from td_customer where customer_id='$row->customer_id'")->row();
		  echo $customer->customer_name;
		  ?></td>
		  <td align="center" valign="middle">
		  <?php if($row->payment_mode!='') { ?>
		  <span class="label label-success"><?php echo $row->payment_mode; ?></span>
		  <?php } else { ?>
		  <span class="label label-danger">Due</span>
		  <?php } ?>
		  </td>
          <td>
          		<?php if($row->is_checkin!=1) { ?>
                <a onclick="return confirm('Are you want to check in ? ');" href="<?php echo base_url();?>manage_restaurant_book/checkin/<?php echo $row->room_book_id; ?>"><span class="label label-danger"> No </span></a>
                <?php } else { ?>
                <span class="label label-success"> Yes </span>
                <?php } ?>
          </td>
		  <td align="center" valign="middle">
		  <?php 
		  $misc_charges= $row->misc_charges;		  
		  $food = $this->db->query("select sum(food_menu_subtotal)as food_tot from td_table_booking_food_menu where room_book_id='$row->room_book_id'")->row();
		  $food_tot = $food->food_tot;
		  
		  $liquor = $this->db->query("select sum(liquor_menu_subtotal)as liquor_tot from td_table_booking_liquor_menu where room_book_id='$row->room_book_id'")->row();
		  $liquor_tot = $liquor->liquor_tot;
		  
		  $gross_total =($misc_charges+$food_tot+$liquor_tot);
		  
		  if($row->disc_type=='P')
		  { $disc_amt = (($gross_total*$row->disc_amt)/100); }
			
		  else
		  { $disc_amt = ($row->disc_amt); }
		  echo number_format(($gross_total-$disc_amt),2); 
		  
		  ?>
		  </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="9" align="center">No records found</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<!-- listing  area ends here ------------------------------->
