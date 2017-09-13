<?php
$company_setting = $this->db->query("select * from td_company_setting")->row();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $company_setting->company_name; ?> - Invoice Reports</title>
<meta charset="utf-8">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
  <h2><strong><?php echo $company_setting->company_name; ?></strong></h2>
  <p class="alert alert-info" style="color:#0080C0; font-size:20px;"><i class="fa fa-sticky-note"></i> <span style="text-transform:uppercase;"><?php echo $invoice_type; ?></span> INVOICE REPORT (Date Range : <?php echo date_format(date_create($from_date), "d-m-Y");?> To <?php echo date_format(date_create($to_date), "d-m-Y");?>)</p>            
  <div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="4" align="right" valign="middle"><button class="btn btn-success pull-right"><i class="fa fa-file-excel-o"></i> Download Excel</button></th>
      </tr>
      <tr>
        <th width="3%">SL#</th>
        <th width="8%">Invoice No</th>
        <th width="22%">Customer Name (Room)</th>
        <th width="17%">Booking Duration</th>
        <th width="8%">Sub Total Amount</th>
        <th width="7%">Discount Amount</th>
        <th width="7%">Total Amount</th>
        <th width="7%">CGST Amount</th>
        <th width="7%">SGST Amount</th>
        <th width="8%">Bill Amount</th>
        <th width="6%">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
	if($rows) { $s=1;
		foreach($rows as $row) {
		$customer = $this->db->query("select * from td_customer where customer_id='$row->customer_id'")->row();
		if($invoice_type=='Restaurant')
		{
			$table = $this->db->query("select * from td_table where table_id='$row->table_id'")->row();
		}
		else if($invoice_type=='Room')
		{
			$room = $this->db->query("select * from td_room where room_id='$row->room_id'")->row();
		}
	?>
      <tr>
        <td><?php echo $s++; ?></td>
        <td><?php echo $row->booking_no; ?></td>
        <td><?php echo $customer->customer_name; ?> 
        <?php if($invoice_type=='Restaurant') { ?>
        (<?php echo $table->table_name; ?>)
        <?php } else if($invoice_type=='Room') { ?>
        (<?php echo $room->room_no; ?>)
        <?php } ?>
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <?php echo date_format(date_create($row->booking_to), "d-m-Y"); ?>
        <?php } else if($invoice_type=='Room') { ?>
        <?php echo date_format(date_create($row->booking_from), "d-m-Y"); ?> To <?php echo date_format(date_create($row->booking_to), "d-m-Y"); ?>
        <?php } ?>
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <?php
		$food_total = $this->db->query("select sum(food_total) as f_tot from td_table_booking_food_menu where room_book_id='$row->room_book_id'")->row();
		$liquor_total = $this->db->query("select sum(liquor_total) as l_tot from td_table_booking_liquor_menu where room_book_id='$row->room_book_id'")->row();
		echo $subtotal = ($row->misc_charges+$food_total->f_tot+$liquor_total->l_tot);
		?>
        <?php } else if($invoice_type=='Room') { ?>
        <?php
		$service_total = $this->db->query("select sum(service_total) as s_tot from td_booking_service where room_book_id='$row->room_book_id'")->row();
		$food_total = $this->db->query("select sum(food_total) as f_tot from td_booking_food_menu where room_book_id='$row->room_book_id'")->row();
		$liquor_total = $this->db->query("select sum(liquor_total) as l_tot from td_booking_liquor_menu where room_book_id='$row->room_book_id'")->row();
		echo $subtotal = ($row->room_subtotal+$row->misc_charges+$service_total->s_tot+$food_total->f_tot+$liquor_total->l_tot);
		?>
        <?php } ?>
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <?php
		if($row->disc_type=='P')
		{
			echo $disc_amt = ($subtotal*$row->disc_amt)/100;
		}
		else
		{
			echo $disc_amt = ($subtotal-$row->disc_amt);
		}
		?>
        <?php } else if($invoice_type=='Room') { ?>
        <?php
		if($row->disc_type=='P')
		{
			echo $disc_amt = ($subtotal*$row->disc_amt)/100;
		}
		else
		{
			echo $disc_amt = ($subtotal-$row->disc_amt);
		}
		?>
        <?php } ?> 
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <?php echo $total_amount = ($subtotal-$disc_amt); ?>
        <?php } else if($invoice_type=='Room') { ?>
        <?php echo $total_amount = ($subtotal-$disc_amt); ?>
        <?php } ?>
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <?php
		$food_total_cgst = $this->db->query("select sum(cgst_amt) as f_cgst_tot from td_table_booking_food_menu where room_book_id='$row->room_book_id'")->row();
		$liquor_total_cgst = $this->db->query("select sum(cgst_amt) as l_cgst_tot from td_table_booking_liquor_menu where room_book_id='$row->room_book_id'")->row();
		echo $total_cgst = ($food_total_cgst->f_cgst_tot+$liquor_total_cgst->l_cgst_tot);
		?>
        <?php } else if($invoice_type=='Room') { ?>
        <?php
		$service_total_cgst = $this->db->query("select sum(cgst_amt) as s_cgst_tot from td_booking_service where room_book_id='$row->room_book_id'")->row();
		$food_total_cgst = $this->db->query("select sum(cgst_amt) as f_cgst_tot from td_booking_food_menu where room_book_id='$row->room_book_id'")->row();
		$liquor_total_cgst = $this->db->query("select sum(cgst_amt) as l_cgst_tot from td_booking_liquor_menu where room_book_id='$row->room_book_id'")->row();
		echo $total_cgst = ($row->cgst_amt+$service_total_cgst->s_cgst_tot+$food_total_cgst->f_cgst_tot+$liquor_total_cgst->l_cgst_tot);
		?>
        <?php } ?>
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <?php
		$food_total_sgst = $this->db->query("select sum(sgst_amt) as f_sgst_tot from td_table_booking_food_menu where room_book_id='$row->room_book_id'")->row();
		$liquor_total_sgst = $this->db->query("select sum(sgst_amt) as l_sgst_tot from td_table_booking_liquor_menu where room_book_id='$row->room_book_id'")->row();
		echo $total_sgst = ($food_total_sgst->f_sgst_tot+$liquor_total_sgst->l_sgst_tot);
		?>
        <?php } else if($invoice_type=='Room') { ?>
        <?php
		$service_total_sgst = $this->db->query("select sum(sgst_amt) as s_sgst_tot from td_booking_service where room_book_id='$row->room_book_id'")->row();
		$food_total_sgst = $this->db->query("select sum(sgst_amt) as f_sgst_tot from td_booking_food_menu where room_book_id='$row->room_book_id'")->row();
		$liquor_total_sgst = $this->db->query("select sum(sgst_amt) as l_sgst_tot from td_booking_liquor_menu where room_book_id='$row->room_book_id'")->row();
		echo $total_sgst = ($row->sgst_amt+$service_total_sgst->s_sgst_tot+$food_total_sgst->f_sgst_tot+$liquor_total_sgst->l_sgst_tot);
		?>
        <?php } ?>
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <?php echo ($total_amount+$total_cgst+$total_sgst); ?>
        <?php } else if($invoice_type=='Room') { ?>
        <?php echo ($total_amount+$total_cgst+$total_sgst); ?>
        <?php } ?>
        </td>
        <td>
        <?php if($invoice_type=='Restaurant') { ?>
        <a href="<?php echo base_url();?>manage_restaurant_book/preview_restaurant_bill/<?php echo $row->room_book_id; ?>" target="_blank"><button class="btn btn-primary btn-xs">Print</button></a>
        <?php } else if($invoice_type=='Room') { ?>
        <a href="<?php echo base_url();?>manage_book/preview_hotel_bill/<?php echo $row->room_book_id; ?>" target="_blank"><button class="btn btn-primary btn-xs">Print</button></a>
        <?php } ?>
        </td>
      </tr>
     <?php } } ?>       
    </tbody>
  </table>
  </div>
</div>


</body>
</html>
