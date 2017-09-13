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
<title>Invoice - Restaurant : <?php echo $company_setting->company_name; ?></title>
<style type="text/css">
body {text-align:center}
@page {margin: 0}
table {width: 70mm; max-width:100%}
<!--
.style5 {font-family: Arial, Helvetica, sans-serif; font-size: 8pt; }
.style6 {font-family: Arial, Helvetica, sans-serif; font-size: 11pt; }
.style7 {
	font-size: 9pt;
	font-weight: bold;
}
.style11 {font-family: Arial, Helvetica, sans-serif; font-size: 9pt; }
.style12 {font-size: 9pt}
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
$table_details = $this->db->query("select * from td_table where table_id='$room_book->table_id'")->row();
?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="16" colspan="6" align="center" valign="middle" class="style6"><span class="style7"><?php echo $company_setting->company_name; ?></span></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" class="style11"><?php echo $company_setting->company_address; ?><br><?php echo $company_setting->state_ut; ?>, India - <?php echo $company_setting->pin_code; ?></td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="center" valign="middle" class="style11">Mob - <?php echo $company_setting->phn_number; ?><br>GSTIN NO - <?php echo $company_setting->gst_no; ?></td>
  </tr>
  <tr>
    <td height="20" colspan="2" align="left" valign="bottom" class="style11">Inv ID :<br><?php echo $room_book->booking_no; ?></td>
    <td height="20" colspan="2" align="left" valign="bottom" class="style11">Date :<br><?php echo date_format(date_create($room_book->booking_to), "d-m-Y"); ?></td>
    <td height="20" colspan="2" align="right" valign="bottom" class="style11">Paid : <?php echo $room_book->payment_mode; ?></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" class="style11">------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td width="29%" align="center" valign="middle" class="style5"><span class="style11">Description</span></td>
    <td width="9%" align="center" valign="middle" class="style5"><span class="style11">Qty</span></td>
    <td width="14%" align="center" valign="middle" class="style5"><span class="style11">Rate</span></td>
    <td width="17%" align="center" valign="middle" class="style5"><span class="style11">Subtotal</span></td>
    <td width="14%" align="center" valign="middle" class="style5"><span class="style11">GST</span></td>
    <td width="17%" align="center" valign="middle" class="style5"><span class="style11">Amount</span></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" class="style11">------------------------------------------------------------------</td>
  </tr>
  <?php 
  $booking_food_menus = $this->db->query("select * from td_table_booking_food_menu where room_book_id='$room_book->room_book_id'")->result();
   $food_total=0; $fd_price =0; $cgst =0; $sgst =0;
  if($booking_food_menus){
  		foreach($booking_food_menus as $booking_food_menu) {
		$food_menu = $this->db->query("select * from td_food_menu where menu_id='$booking_food_menu->food_menu_id'")->row();
  ?>
  <tr>
    <td height="16" align="left" valign="middle" class="style5"><span class="style11"><?php echo $food_menu->menu_name; ?></span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11"><?php echo $food_menu_qty = $booking_food_menu->food_menu_qty; ?></span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11"><?php echo $food_menu_price = $food_menu->menu_price; ?></span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11"><?php $food_menu_subtotal = ($food_menu_qty*$food_menu_price); echo number_format($food_menu_subtotal, 2, ".", ""); ?></span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11">
	<?php
	$food_menu_cgst_percent = $food_menu->cgst_percent; 
	$food_menu_cgst_amt = (($food_menu_subtotal*$food_menu_cgst_percent)/100); 
	$food_menu_sgst_percent = $food_menu->sgst_percent;
	$food_menu_sgst_amt = (($food_menu_subtotal*$food_menu_sgst_percent)/100);
	echo number_format(($food_menu_cgst_amt+$food_menu_sgst_amt), 2, ".", "");
	?>
	</span></td>
    <td height="16" align="right" valign="middle" class="style5"><span class="style11"><?php $food_menu_total = $booking_food_menu->food_menu_subtotal; echo number_format($food_menu_total, 2, ".", ""); ?></span></td>
  </tr>
  <?php 
  $food_total += ($food_menu_total);
  $fd_price += $food_menu_subtotal;
  $cgst += $food_menu_cgst_amt;
  $sgst += $food_menu_sgst_amt;
  } } ?>
  
  <?php
  $booking_liquor_menus = $this->db->query("select * from td_table_booking_liquor_menu where room_book_id='$room_book->room_book_id'")->result();
  $liquor_total = 0; $liq_price=0;
  if($booking_liquor_menus) {
  	foreach($booking_liquor_menus as $booking_liquor_menu) {
		$liquor_menu = $this->db->query("select * from td_liquor_menu where liquor_id='$booking_liquor_menu->liquor_menu_id'")->row(); 
  ?>
  <tr>
    <td height="16" align="left" valign="middle" class="style5"><span class="style11"><?php echo $liquor_menu->liquor_name; ?> (<?php echo $liquor_menu->size; ?>) ml</span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11"><?php echo $liquor_menu_qty = $booking_liquor_menu->liquor_menu_qty; ?></span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11"><?php echo $liquor_menu_price = $liquor_menu->liquor_price; ?></span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11"><?php $liquor_menu_subtotal = ($liquor_menu_qty*$liquor_menu_price); echo number_format($liquor_menu_subtotal, 2, ".", ""); ?></span></td>
    <td height="16" align="center" valign="middle" class="style5"><span class="style11">0.00</span></td>
    <td height="16" align="right" valign="middle" class="style5"><span class="style11"><?php echo number_format($liquor_menu_subtotal, 2, ".", ""); ?></span></td>
  </tr>
  <?php 
  $liquor_total += ($liquor_menu_qty*$liquor_menu_price);
  $liq_price += $liquor_menu_subtotal;
  } } ?>
  
  <tr>
    <td colspan="6" align="center" valign="middle" class="style11">------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td height="16" align="center" valign="middle" class="style11">&nbsp;</td>
    <td height="16" colspan="4" align="right" valign="middle" class="style11">Other Charges </td>
    <td height="16" align="right" valign="middle" class="style5"><span class="style12"><?php echo $misc_charges = $room_book->misc_charges; ?></span></td>
  </tr>
  <tr>
    <td height="16" align="center" valign="middle" class="style11">&nbsp;</td>
    <td height="16" colspan="4" align="right" valign="middle" class="style11">Total</td>
    <td height="16" align="right" valign="middle" class="style5"><span class="style12">
      <?php 
	
	$gross_total = $liquor_total+$food_total+$misc_charges;
	echo number_format($gross_total,2);
	?>
    </span></td>
  </tr>
  <tr>
    <td height="16" colspan="5" align="right" valign="middle" class="style11">	
	Less : <?php echo ($room_book->disc_type=='P')?$room_book->disc_amt."%":'Flat'; ?> Discount (INR)</td>
    <td height="16" align="right" valign="middle" class="style5">
	  <span class="style12">
	  <?php
	$actual_amt = ($liq_price+$fd_price+$misc_charges);
	if($room_book->disc_type=='P')
	{ $disc_amt = (($actual_amt*$room_book->disc_amt)/100); echo number_format($disc_amt, 2, ".", ""); }
	
	else
	{ $disc_amt = ($room_book->disc_amt); echo number_format($disc_amt, 2, ".", ""); }
	
	?>
    </span>	</td>
  </tr>
  <tr>
    <td height="16" align="center" valign="middle" class="style11">&nbsp;</td>
    <td height="16" colspan="4" align="right" valign="middle" class="style11">Rounded off</td>
    <td height="16" align="right" valign="middle" class="style5">
	  <span class="style12">
	  <?php
	$actual_payable_amt = number_format(($gross_total-$disc_amt),2);
	$frac = explode(".", $actual_payable_amt);
	//print_r($frac);
	if($frac[1]>=50)
	{
		$rounded_payable_amt = ceil($gross_total-$disc_amt);
		echo $round_amt = number_format(($rounded_payable_amt-($gross_total-$disc_amt)),2);
	}
	else
	{
		$rounded_payable_amt = floor($gross_total-$disc_amt);
		echo $round_amt = number_format(($gross_total-$disc_amt-$rounded_payable_amt),2);
	}	
	?>
    </span>	</td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="center" valign="middle" class="style11">------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="style11">&nbsp;</td>
    <td colspan="4" align="right" valign="middle" class="style5"><span class="style12"><strong>NET AMOUNT</strong></span></td>
    <td align="center" valign="middle" class="style5"><span class="style12"><strong><?php echo number_format($rounded_payable_amt,2);?></strong></span></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" class="style5">
    <u><span class="style12">------------------------------------------------------------------</span></u></td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="right" valign="middle" class="style5"><span class="style12"><strong><?php echo getIndianCurrency($rounded_payable_amt); ?></strong></span></td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="right" valign="middle" class="style11">E &amp; O.E.</td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="left" valign="middle" class="style11">Total Sale = Rs.<?php echo number_format(($liq_price+$fd_price+$misc_charges), 2, ".", ""); ?> | Tax exempt = Rs.<?php echo number_format($liq_price+$misc_charges, 2, ".", ""); ?></td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="left" valign="middle" class="style11">CGST@9%=Rs.<?php echo number_format($cgst, 2, ".", ""); ?> and SGST@9%=Rs.<?php echo number_format($sgst, 2, ".", ""); ?></td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="left" valign="middle" class="style11">No Tax on Alcohol</td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" class="style11">------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td height="16" colspan="6" align="center" valign="middle" class="style11">THANK YOU. PLEASE VISIT AGAIN.</td>
  </tr>
</table>
</body>
</html>
