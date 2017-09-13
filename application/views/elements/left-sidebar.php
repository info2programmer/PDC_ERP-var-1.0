
<div class="well4 spacing3" style="min-height:600px;">

<?php if($this->uri->segment(1)=='company_setting') { ?>
  <p><strong><i class="fa fa-cog"></i> COMPANY SETTINGS</strong></p>
  <ul class="nav nav-pills nav-stacked">
    <li <?php if(($this->uri->segment(1)=='company_setting')&&($this->uri->segment(2)=='manage_company')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>company_setting/manage_company">Manage Company Details</a></li>
    <li <?php if(($this->uri->segment(1)=='company_setting')&&($this->uri->segment(2)=='manage_bank')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>company_setting/manage_bank">Manage Bank Details</a></li>
  </ul>
<?php } ?> 

<?php if($this->uri->segment(1)=='manage_hotel') { ?>
  <p><strong><i class="fa fa-cog"></i> HOTEL & RESTAUTANT MANAGEMENT</strong></p>
  <ul class="nav nav-pills nav-stacked">
    <li <?php if(($this->uri->segment(1)=='manage_hotel')&&($this->uri->segment(2)=='floor_list')||($this->uri->segment(2)=='floor_add')||($this->uri->segment(2)=='floor_edit')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_hotel/floor_list">Manage Floor</a></li>
    <li <?php if(($this->uri->segment(1)=='manage_hotel')&&($this->uri->segment(2)=='room_list')||($this->uri->segment(2)=='room_add')||($this->uri->segment(2)=='room_edit')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_hotel/room_list">Manage Room</a></li>
    <li <?php if(($this->uri->segment(1)=='manage_hotel')&&($this->uri->segment(2)=='service_list')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_hotel/service_list">Manage Service</a></li>
    <li <?php if(($this->uri->segment(1)=='manage_hotel')&&($this->uri->segment(2)=='table_list')||($this->uri->segment(2)=='table_add')||($this->uri->segment(2)=='table_edit')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_hotel/table_list">Manage Table</a></li>
    <li <?php if(($this->uri->segment(1)=='manage_hotel')&&($this->uri->segment(2)=='food_menu_list')||($this->uri->segment(2)=='food_menu_add')||($this->uri->segment(2)=='food_menu_edit')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_hotel/food_menu_list">Manage Food Menu</a></li>
    <li <?php if(($this->uri->segment(1)=='manage_hotel')&&($this->uri->segment(2)=='liquor_menu_list')||($this->uri->segment(2)=='liquor_menu_add')||($this->uri->segment(2)=='liquor_menu_edit')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_hotel/liquor_menu_list">Manage Liquor Menu</a></li>    
  </ul>
<?php } ?>

<?php if($this->uri->segment(1)=='manage_customer') { ?>
  <p><strong><i class="fa fa-cog"></i> CUSTOMER MANAGEMENT </strong></p>
  <ul class="nav nav-pills nav-stacked">
    <li <?php if(($this->uri->segment(1)=='manage_customer')&&($this->uri->segment(2)=='customer_list')||($this->uri->segment(2)=='customer_add')||($this->uri->segment(2)=='customer_edit')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_customer/customer_list">Manage Customer</a></li>
  </ul>
<?php } ?>

<?php if($this->uri->segment(1)=='manage_book') { ?>
  <p><strong><i class="fa fa-cog"></i> ROOM BOOKING </strong></p>
  <ul class="nav nav-pills nav-stacked">
    <li <?php if(($this->uri->segment(1)=='manage_book')&&($this->uri->segment(2)=='room_booking_list') || ($this->uri->segment(1)=='manage_book')&&($this->uri->segment(2)=='room_details')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_book/room_booking_list">Manage Room Booking</a></li>
	<li <?php if(($this->uri->segment(1)=='manage_book')&&($this->uri->segment(2)=='invoice_list')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_book/invoice_list">Invoice List</a></li>
    <li <?php if(($this->uri->segment(1)=='manage_book')&&($this->uri->segment(2)=='advance_booking_list')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_book/advance_booking_list">Advance Booking List</a></li>
  </ul>
<?php } ?>

<?php if($this->uri->segment(1)=='manage_restaurant_book') { ?>
  <p><strong><i class="fa fa-cog"></i> HOTEL BOOKING </strong></p>
  <ul class="nav nav-pills nav-stacked">
    <li <?php if(($this->uri->segment(1)=='manage_restaurant_book')&&($this->uri->segment(2)=='restaurant_booking_list') || ($this->uri->segment(1)=='manage_restaurant_book')&&($this->uri->segment(2)=='restaurant_details')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_restaurant_book/restaurant_booking_list">Restaurant Booking</a></li>
	<li <?php if(($this->uri->segment(1)=='manage_restaurant_book')&&($this->uri->segment(2)=='restaurant_invoice_list')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_restaurant_book/restaurant_invoice_list">Restaurant Invoice List</a></li>
    <li <?php if(($this->uri->segment(1)=='manage_restaurant_book')&&($this->uri->segment(2)=='restaurant_advance_booking_list')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_restaurant_book/restaurant_advance_booking_list">Restaurant Advance Booking List</a></li>
  </ul>
<?php } ?>

<?php if($this->uri->segment(1)=='manage_report') { ?>
  <p><strong><i class="fa fa-cog"></i> REPORT SECTION </strong></p>
  <ul class="nav nav-pills nav-stacked">
    <li <?php if(($this->uri->segment(1)=='manage_report')&&($this->uri->segment(2)=='invoice_report_view')) { ?>class="active"<?php } ?>><a href="<?php echo base_url();?>manage_report/invoice_report_view">Invoice Report</a></li>
  </ul>
<?php } ?>

 
</div>
