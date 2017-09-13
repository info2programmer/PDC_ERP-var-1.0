<?php
$company_setting = $this->db->query("select * from td_company_setting")->row();
$bank = $this->db->query("select * from td_bank")->row();
?>

<?php
function getIndianCurrency($number)
{



    $decimal = round($number - ($no = floor($number)), 2) * 100;



    $hundred = null;



    $digits_length = strlen($no);



    $i = 0;



    $str = array();



    $words = array(0 => '', 1 => 'One', 2 => 'Two',



        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',



        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',



        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',



        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',



        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',



        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',



        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',



        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');



    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');



    while( $i < $digits_length ) {



        $divider = ($i == 2) ? 10 : 100;



        $number = floor($no % $divider);



        $no = floor($no / $divider);



        $i += $divider == 10 ? 1 : 2;



        if ($number) {



            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;



            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;



            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;



        } else $str[] = null;



    }



    $Rupees = implode('', array_reverse($str));



    $paise = ($decimal) ? "and " . ($words[$decimal - ($decimal % 10)] . " " . $words[$decimal % 10]) . ' Paise Only' : '';



    return ($Rupees ? 'Rupees '.$Rupees . '' : '') . $paise." Only";



}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice - Hotel : <?php echo $company_setting->company_name; ?></title>
<style type="text/css">
<!--
.style31 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.style33 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.style35 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; font-weight: bold; }
.style36 {
	font-size: 18px;
	font-weight: bold;
}
.style37 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}

@page {
    size: A4;
    margin: 20px;
}
@media print {
    .page {
        margin: 20px;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	}
-->
</style>
<script language="JavaScript">

function printPage() {

if(document.all) {

document.all.divButtons.style.visibility = 'hidden';

window.print();

document.all.divButtons.style.visibility = 'visible';

} else {

document.getElementById('divButtons').style.visibility = 'hidden';

window.print();

document.getElementById('divButtons').style.visibility = 'visible';

}

}

</script>
</head>

<body>
<input id="divButtons" type="button" value= "Print this page" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;display:block; margin:0 auto;" />
<?php
$room_details = $this->db->query("select * from td_room where room_id='$room_book->room_id'")->row();
$customer_details = $this->db->query("select * from td_customer where customer_id='$room_book->customer_id'")->row();
?>
<table width="660" border="1" align="center" cellpadding="4" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td height="120" colspan="9" align="center" valign="middle">
      <span class="style35"><span class="style36"><u><?php echo $company_setting->company_name; ?></u></span><br />
    <?php echo $company_setting->company_address; ?><br /><?php echo $company_setting->state_ut; ?> 
India - <?php echo $company_setting->pin_code; ?><br />
Mob - <?php echo $company_setting->phn_number; ?> | 
GSTIN NO - <?php echo $company_setting->gst_no; ?><br />
      </span>
      
      <table width="142" border="1" cellspacing="0" cellpadding="2" style="margin-top:10px; margin-bottom:10px;">
        <tr>
          <td align="center" valign="middle"><span class="style37">TAX INVOICE</span></td>
        </tr>
      </table>      </td>
  </tr>
  <tr>
    <td colspan="4"><span class="style33">ROOM NO - <?php echo $room_details->room_no; ?> (<?php echo $room_details->bed_type; ?> Bed)</span></td>
    <td colspan="3"><span class="style33">Inv No : <?php echo $room_book->booking_no; ?></span></td>
    <td colspan="2"><span class="style33">Invoice Date : <?php echo date('d-m-Y');?></span></td>
  </tr>
  <tr>
    <td colspan="4" align="left" valign="middle"><span class="style33">Date of Booking : <?php echo date_format(date_create($room_book->booking_date), "d.m.Y"); ?></span></td>
    <td colspan="5" align="left" valign="middle"><span class="style33">Booking FROM <?php echo date_format(date_create($room_book->booking_from), "d.m.Y"); ?> TO <?php echo date_format(date_create($room_book->booking_to), "d.m.Y"); ?> 
	(<?php $diff = date_diff(date_create($room_book->booking_from),date_create($room_book->booking_to));  
	echo $no_of_days = $diff->format("%a");
	?>
	Days)
	</span></td>
  </tr>
  <tr>
    <td colspan="7" align="left" valign="middle"><span class="style31"><strong>Bill To :<br />
    </strong> <?php echo $customer_details->customer_name; ?><br />
<?php echo $customer_details->address; ?>, PIN - <?php echo $customer_details->pincode; ?><br />
Phone : <?php echo $customer_details->phone1; ?> | <?php echo $customer_details->phone2; ?></span></td>
    <td colspan="2" align="left" valign="middle"><span class="style31"><strong>GST No - </strong> <?php echo $customer_details->gst_no; ?><br />
        <strong>PAN - </strong><?php echo $customer_details->pan; ?></span></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle"><span class="style33">ROOM DETAILS</span></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><span class="style33">Day(s)</span></td>
    <td width="50" align="center" valign="middle"><span class="style33">Rate <br />(INR)</span></td>
    <td width="53" align="center" valign="middle"><span class="style33">Subtoal<br />(INR</span><strong>)</strong></td>
    <td width="35" align="center" valign="middle"><span class="style33">SGST<br />%</span></td>
    <td width="67" align="center" valign="middle"><span class="style33">SGST Amt (INR)</span></td>
    <td width="34" align="center" valign="middle"><span class="style33">CGST %</span></td>
    <td width="76" align="center" valign="middle"><span class="style33">CGST Amt (INR)</span></td>
    <td width="141" align="center" valign="middle"><span class="style33">Total (INR)</span></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" class="style31"><?php echo $no_of_days; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $room_price = $room_book->room_price; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $room_subtotal = $room_book->room_subtotal; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $room_cgst_percent = $room_book->cgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $room_cgst_amt = $room_book->cgst_amt; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $room_sgst_percent = $room_book->sgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $room_sgst_amt = $room_book->sgst_amt?></td>
    <td align="center" valign="middle" class="style31"><?php echo $room_total = $room_book->net_total; ?></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle"><span class="style33">ROOM SERVICE DETAILS</span></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><span class="style33">Service Name</span></td>
    <td align="center" valign="middle"><span class="style33">Qty</span></td>
    <td align="center" valign="middle"><span class="style33">Rate<br />(INR</span><strong>)</strong></td>
    <td align="center" valign="middle"><span class="style33">Total<br />(INR</span><strong>)</strong></td>
    <td align="center" valign="middle"><span class="style33">CGST<br />%</span></td>
    <td align="center" valign="middle"><span class="style33">CGST Amt (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">SGST %</span></td>
    <td align="center" valign="middle"><span class="style33">SGST Amt (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">Total (INR)</span></td>
  </tr>
  <?php 
  $booking_services = $this->db->query("select * from td_booking_service where room_book_id='$room_book->room_book_id'")->result();
  $service_tot=0; 
  if($booking_services){ 
  		foreach($booking_services as $booking_service) {
		$service = $this->db->query("select * from td_service where service_id='$booking_service->service_id'")->row();
  ?>
  <tr>
    <td align="center" valign="middle" class="style31"><?php echo $service->service_name; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_qty = $booking_service->service_qty; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_price = $service->service_price; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_ttl = $booking_service->service_total; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_cgst_percent = $booking_service->cgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_cgst_amt = $booking_service->cgst_amt; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_sgst_percent = $booking_service->sgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_sgst_amt = $booking_service->sgst_amt; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $service_total = $booking_service->service_subtotal; ?></td>
  </tr>
  <?php 
  $service_tot += $service_ttl;
  } } else { ?>
  	<tr>
		<td colspan="9" align="center">No services taken</td>
	</tr>
  <?php } ?>
  <tr>
    <td colspan="9" align="center" valign="middle"><span class="style33">FOOD DETAILS</span></td>
  </tr>
  <tr>
    <td width="81" align="center" valign="middle"><span class="style33">Food Name</span></td>
    <td width="31" align="center" valign="middle"><span class="style33">Qty</span></td>
    <td align="center" valign="middle"><span class="style33">Rate<br />(INR</span><strong>)</strong></td>
    <td align="center" valign="middle"><span class="style33">Total<br />(INR</span><strong>)</strong></td>
    <td align="center" valign="middle"><span class="style33">CGST<br />%</span></td>
    <td align="center" valign="middle"><span class="style33">CGST Amt (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">SGST %</span></td>
    <td align="center" valign="middle"><span class="style33">SGST Amt (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">Total (INR)</span></td>
  </tr>
  <?php 
  $booking_food_menus = $this->db->query("select * from td_booking_food_menu where room_book_id='$room_book->room_book_id'")->result();
   $food_total=0;
  if($booking_food_menus){
  		foreach($booking_food_menus as $booking_food_menu) {
		$food_menu = $this->db->query("select * from td_food_menu where menu_id='$booking_food_menu->food_menu_id'")->row();
  ?>
  <tr>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu->menu_name; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu_qty = $booking_food_menu->food_menu_qty; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $menu_price = $food_menu->menu_price; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu_subtotal = $food_menu_qty*$menu_price; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu_cgst_percent = $booking_food_menu->cgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu_cgst_amt = $booking_food_menu->cgst_amt; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu_sgst_percent = $booking_food_menu->sgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu_sgst_amt = $booking_food_menu->sgst_amt; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $food_menu_total = $booking_food_menu->food_menu_subtotal; ?></td>
  </tr>
  <?php 
  $food_total += ($food_menu_subtotal);
  } } else { ?>
  	<tr>
		<td colspan="9" align="center">No foods taken</td>
	</tr>
  <?php } ?>  
  <tr>
    <td colspan="9" align="center" valign="middle" class="style31"><span class="style33">LIQUOR DETAILS</span></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><span class="style33">Liquor Name</span></td>
    <td align="center" valign="middle"><span class="style33">Qty</span></td>
    <td align="center" valign="middle"><span class="style33">Rate<br />(INR</span><strong>)</strong></td>
    <td align="center" valign="middle"><span class="style33">Total<br />(INR</span><strong>)</strong></td>
    <td align="center" valign="middle"><span class="style33">CGST<br />%</span></td>
    <td align="center" valign="middle"><span class="style33">CGST Amt (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">SGST %</span></td>
    <td align="center" valign="middle"><span class="style33">SGST Amt (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">Total (INR)</span></td>
  </tr>
  <?php 
  $booking_liquor_menus = $this->db->query("select * from td_booking_liquor_menu where room_book_id='$room_book->room_book_id'")->result();
  $liquor_total=0;
  if($booking_liquor_menus){ 
  		foreach($booking_liquor_menus as $booking_liquor_menu) {
		$liquor_menu = $this->db->query("select * from td_liquor_menu where liquor_id='$booking_liquor_menu->liquor_menu_id'")->row();
  ?>
  <tr>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu->liquor_name; ?> (<?php echo $liquor_menu->size; ?>) ML</td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_qty = $booking_liquor_menu->liquor_menu_qty; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_price = $liquor_menu->liquor_price; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_subtotal = $booking_liquor_menu->liquor_total; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_cgst_percent = $booking_liquor_menu->cgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_cgst_amt = $booking_liquor_menu->cgst_amt; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_sgst_percent = $booking_liquor_menu->sgst_percent; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_sgst_amt = $booking_liquor_menu->sgst_amt; ?></td>
    <td align="center" valign="middle" class="style31"><?php echo $liquor_menu_subtotal; ?></td>
  </tr>
  <?php 
  $liquor_total += $liquor_menu_subtotal;
  } } else { ?>
  	<tr>
		<td colspan="9" align="center">No liquors taken</td>
	</tr>
  <?php } ?>
  <tr>
    <td colspan="9" align="center" valign="middle" class="style31">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="8" align="right" valign="middle" class="style31"><span class="style33">Sub Total (INR)</span></td>
    <td align="center" valign="middle" class="style31"><span class="style33">
	<?php 
	$room_tot = $room_subtotal;
	echo $gross_total = $room_tot+$service_tot+$food_total+$liquor_total;	
	?>
	</span></td>
  </tr>
  <?php if($room_book->disc_type!='' && $room_book->disc_amt!='') { ?>
  <tr>
    <td colspan="8" align="right" valign="middle" class="style31"><span class="style33">
	Less : <?php echo ($room_book->disc_type=='P')?$room_book->disc_amt." %":'Flat'; ?> Discount (INR)
	
	</span></td>
    <td align="center" valign="middle" class="style31"><span class="style33">
	<?php
	if($room_book->disc_type=='P')
	{ echo number_format((($gross_total*$room_book->disc_amt)/100),2); $disc_amt = (($gross_total*$room_book->disc_amt)/100); }
	
	else
	{ echo number_format(($room_book->disc_amt),2); $disc_amt = ($room_book->disc_amt); }
	
	?>
	</span></td>
  </tr>
  <?php } ?>
  
  <?php
	$service_cgst_tot = $this->db->query("select sum(cgst_amt) as s_cgst from td_booking_service where room_book_id='$room_book->room_book_id'")->row();
	$service_sgst_tot = $this->db->query("select sum(sgst_amt) as s_sgst from td_booking_service where room_book_id='$room_book->room_book_id'")->row();
	
	$food_cgst_tot = $this->db->query("select sum(cgst_amt) as f_cgst from td_booking_food_menu where room_book_id='$room_book->room_book_id'")->row();
	$food_sgst_tot = $this->db->query("select sum(sgst_amt) as f_sgst from td_booking_food_menu where room_book_id='$room_book->room_book_id'")->row();
	
	$liquor_cgst_tot = $this->db->query("select sum(cgst_amt) as l_cgst from td_booking_liquor_menu where room_book_id='$room_book->room_book_id'")->row();
	$liquor_sgst_tot = $this->db->query("select sum(sgst_amt) as l_sgst from td_booking_liquor_menu where room_book_id='$room_book->room_book_id'")->row();
  ?>
    
  <tr>
    <td colspan="8" align="right" valign="middle"><span class="style33">Total CGST (INR)</span></td>
    <td align="center" valign="middle">
    <?php echo $total_cgst = ($room_cgst_amt+$service_cgst_tot->s_cgst+$food_cgst_tot->f_cgst+$liquor_cgst_tot->l_cgst); ?>    </td>
  </tr>
  <tr>
    <td colspan="8" align="right" valign="middle"><span class="style33">Total SGST (INR)</span></td>
    <td align="center" valign="middle">
    <?php echo $total_sgst = ($room_sgst_amt+$service_sgst_tot->s_sgst+$food_sgst_tot->f_sgst+$liquor_sgst_tot->l_sgst); ?>    </td>
  </tr>
  <tr>
    <td colspan="8" align="right" valign="middle"><span class="style33">Net Total (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">
	<?php
	$net_total = $gross_total-$disc_amt+($total_cgst+$total_sgst);	
	echo number_format($net_total,2);
	?></span></td>
  </tr>
  <tr>
    <td colspan="8" align="right" valign="middle"><span class="style33">Rounded Off (INR)</span></td>
    <td align="center" valign="middle"><span class="style33">
	<?php
	$actual_payable_amt = number_format(($net_total),2);
	$frac = explode(".", $net_total);
	//print_r($frac);
	if($frac[1]>=5)
	{
		$rounded_payable_amt = ceil($net_total);
		echo $round_amt = number_format(($rounded_payable_amt-$net_total),2);
	}
	else
	{
		$rounded_payable_amt = floor($net_total);
		echo $round_amt = number_format(($net_total-$rounded_payable_amt),2);
	}	
	?>
	</span></td>
  </tr>
  <tr>
    <td colspan="8" align="right" valign="middle"><span class="style33">Total Amount Payable (INR)</span></td>
    <td align="center" valign="middle"><span class="style33"><?php echo number_format($rounded_payable_amt,2); ?></span></td>
  </tr>
  <tr>
    <td colspan="9" align="right" valign="middle"><span class="style33">Amount in Words : <?php echo getIndianCurrency($rounded_payable_amt); ?></span></td>
  </tr>
  <tr>
    <td height="80" colspan="7" valign="bottom"><span class="style31" style="text-decoration:overline;">Cashier / Accountant</span></td>
    <td height="80" colspan="2" valign="bottom"><span class="style31" style="text-decoration:overline;">Guest Signature with Date</span></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle"><span class="style33">NO TAX ON ALCOHOL.</span></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="middle"><span class="style33">THANK YOU. PLEASE VISIT AGAIN.</span></td>
  </tr>
</table>
</body>
</html>
