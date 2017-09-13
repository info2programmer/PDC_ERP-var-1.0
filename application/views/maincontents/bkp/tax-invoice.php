<?php



function no_to_words($number1)

{ 



   //$no = round($number);



   $number = explode(".",$number1);



   $no = $number[0];



   $point = $number[1];



   //$point = round($number - $no, 2) * 100;



   //echo $point;



   $hundred = null;



   $digits_1 = strlen($no);



   $i = 0;



   $str = array();



   $words = array('0' => '', '1' => 'One', '2' => 'Two',



    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',



    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',



    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',



    '13' => 'Thirteen', '14' => 'Fourteen',



    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',



    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',



    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',



    '60' => 'Sixty', '70' => 'Seventy',



    '80' => 'Eighty', '90' => 'Ninety');



   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');



   while ($i < $digits_1) {



     $divider = ($i == 2) ? 10 : 100;



     $number = floor($no % $divider);



     $no = floor($no / $divider);



     $i += ($divider == 10) ? 1 : 2;



     if ($number) {



        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;



        $hundred = ($counter == 1 && $str[0]) ? '  ' : null;



        $str [] = ($number < 21) ? $words[$number] .



            " " . $digits[$counter] . $plural . " " . $hundred



            :



            $words[floor($number / 10) * 10]



            . " " . $words[$number % 10] . " "



            . $digits[$counter] . $plural . " " . $hundred;



     } else $str[] = null;



  }



  $str = array_reverse($str);



  $result = implode('', $str);



  $points = ($point) ?



    "and " . $words[$point / 10] . " " . 



          $words[$point = $point % 10] : '';



  //echo $result . "Rupees  " . $points . " Paise";



  



  if($point > 0){



	//echo   $points;



 return "Rupees ". $result . $points . " Paise Only";



 



  }else{



	  



	return "Rupees ".$result." Only";  



	  



  }



}

function numtowords($num){ 
$decones = array( 
            '01' => "One", 
            '02' => "Two", 
            '03' => "Three", 
            '04' => "Four", 
            '05' => "Five", 
            '06' => "Six", 
            '07' => "Seven", 
            '08' => "Eight", 
            '09' => "Nine", 
            10 => "Ten", 
            11 => "Eleven", 
            12 => "Twelve", 
            13 => "Thirteen", 
            14 => "Fourteen", 
            15 => "Fifteen", 
            16 => "Sixteen", 
            17 => "Seventeen", 
            18 => "Eighteen", 
            19 => "Nineteen" 
            );
$ones = array( 
            0 => " ",
            1 => "One",     
            2 => "Two", 
            3 => "Three", 
            4 => "Four", 
            5 => "Five", 
            6 => "Six", 
            7 => "Seven", 
            8 => "Eight", 
            9 => "Nine", 
            10 => "Ten", 
            11 => "Eleven", 
            12 => "Twelve", 
            13 => "Thirteen", 
            14 => "Fourteen", 
            15 => "Fifteen", 
            16 => "Sixteen", 
            17 => "Seventeen", 
            18 => "Eighteen", 
            19 => "Nineteen" 
            ); 
$tens = array( 
            0 => "",
            2 => "Twenty", 
            3 => "Thirty", 
            4 => "Forty", 
            5 => "Fifty", 
            6 => "Sixty", 
            7 => "Seventy", 
            8 => "Eighty", 
            9 => "Ninety" 
            ); 
$hundreds = array( 
            "Hundred", 
            "Thousand", 
            "Million", 
            "Billion", 
            "Trillion", 
            "Quadrillion" 
            ); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
    if($i < 20){ 
        $rettxt .= $ones[$i]; 
    }
    elseif($i < 100){ 
        $rettxt .= $tens[substr($i,0,1)]; 
        $rettxt .= " ".$ones[substr($i,1,1)]; 
    }
    else{ 
        $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
        $rettxt .= " ".$tens[substr($i,1,1)]; 
        $rettxt .= " ".$ones[substr($i,2,1)]; 
    } 
    if($key > 0){ 
        $rettxt .= " ".$hundreds[$key]." "; 
    } 

} 
$rettxt = $rettxt." Rupees";

if($decnum > 0){ 
    $rettxt .= " and "; 
    if($decnum < 20){ 
        $rettxt .= $decones[$decnum]; 
    }
    elseif($decnum < 100){ 
        $rettxt .= $tens[substr($decnum,0,1)]; 
        $rettxt .= " ".$ones[substr($decnum,1,1)]; 
    }
    $rettxt = $rettxt." Paise"; 
} 
return $rettxt;}

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
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title>Tax Invoice - Sanjay Commercial Company</title>



<style type="text/css">



<!--



body {



	margin-left: 0px;



	margin-top: 0px;



	margin-right: 0px;



	margin-bottom: 0px;



}



.style1 {font-family: Arial, Helvetica, sans-serif}



.style2 {font-size: 14px}



.style36 {font-size: 10}



.style39 {font-family: Arial, Helvetica, sans-serif; font-size: 13px; }



.style41 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }



.style43 {font-family: Arial, Helvetica, sans-serif; font-size: 10; font-weight: bold; }



.style45 {font-size: 10; font-family: Arial, Helvetica, sans-serif;}



.style46 {



	font-size: 12px;



	font-weight: bold;



}

 @media print {

 @page {

 size: portrait;

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



<table width="710" border="0" align="center" cellpadding="0" cellspacing="0">



  <tr>



    <td width="710" height="910" align="center" valign="top"><p><br />
      
      
      
      <br />
      
      
      
      <br />
      
      
      
      <br />
      
      
      
      <br />
      
      
      
      <br />
      <br />
        
        
        
        <strong><br />
          
          
          
        <span class="style1"><u>TAX INVOICE</u></span></strong><span class="style1"><br />
            
            
            
        <span class="style2">Original For Buyer Copy / Duplicate for Transporter / Triplicate For Registered Person<br />
              
              
              
        Party GSTIN No : <?php echo $row->gstin; ?><br />
              
              
              
        <br />
              
              
              
        </span></span>
        
        
        
      </p>
      <table width="690" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
        
        
        
        <tr>



        <td width="281" height="25" rowspan="4" align="center" valign="middle" class="style39"><strong>M/S</strong> <?php echo $row->name; ?><br />



        <?php echo $row->postal_address; ?><br />



        Dist: <?php echo $row->district; ?>, <?php echo $row->state; ?> - <?php echo $row->pincode; ?></td>



        <td width="99" height="25" align="center" valign="middle" class="style41">Bill No.</td>



        <td width="111" height="25" align="center" valign="middle" class="style39"><?php echo $row->bill_no; ?></td>



        <td width="84" height="25" align="center" valign="middle" class="style41">Date</td>



        <td width="103" height="25" align="center" valign="middle" class="style39"><?php echo date_format(date_create($row->bill_date), "d-m-Y"); ?></td>

      </tr>



      <tr>



        <td height="25" align="center" valign="middle" class="style41">Challan No.</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo $row->challan_no; ?></td>



        <td height="25" align="center" valign="middle" class="style41">Date</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo date_format(date_create($row->challan_date), "d-m-Y"); ?></td>

      </tr>



      <tr>



        <td height="25" align="center" valign="middle" class="style41">P.O. No.</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo $row->po_no; ?></td>



        <td height="25" align="center" valign="middle" class="style41">Date</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo date_format(date_create($row->po_date), "d-m-Y"); ?></td>

      </tr>



      <tr>
        
        
        
        <td height="25" align="center" valign="middle" class="style41"><strong>C. Note No</strong></td>
        
        
        
        <td height="25" align="center" valign="middle" class="style39"><?php echo $row->c_note_no; ?></td>
        
        
        
        <td height="25" align="center" valign="middle" class="style39"><span class="style41">Vendor Code</span></td>
        
        
        
        <td height="25" align="center" valign="middle" class="style39"><?php echo $row->vendor_code; ?></td>
        
      </tr>
      <tr>
        
        
        
        <td height="30" colspan="2" align="center" valign="middle" class="style41">Particulars / Items</td>
        
        
        
        <td height="30" align="center" valign="middle" class="style41">Qty ( Net )</td>
        
        
        
        <td height="30" align="center" valign="middle" class="style41">Rate/kg</td>
        
        
        
        <td height="30" align="center" valign="middle" class="style41">Amount (Rs)</td>
        
      </tr>



      <tr>



        <td height="25" colspan="2" align="center" valign="middle" class="style39"><?php echo $row->commodity_name; ?></td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo $row->net_wt; ?></td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo  number_format($row->rate_per_unit,2); ?></td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo  number_format($row->sub_total,2); ?></td>

      </tr>



      <tr>



        <td height="25" colspan="2" align="center" valign="middle" class="style39"><strong>HSN Code :</strong> <?php echo $row->packing_hscode; ?></td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>

      </tr>



      <tr>



        <td height="25" colspan="2" align="center" valign="middle" class="style39">Add : Freight / Delivery Charges</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo $row->fraight_charges; ?></td>

      </tr>



      <tr>



        <td height="25" colspan="2" align="center" valign="middle" class="style39">Add : IGST @ <?php echo $row->igst_percent; ?> %</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo number_format($row->igst_value,2); ?></td>

      </tr>



      <tr>



        <td height="25" colspan="2" align="center" valign="middle" class="style39">Add : CGST @ <?php echo $row->cgst_percent; ?> %</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo number_format($row->cgst_value,2); ?></td>

      </tr>



      <tr>



        <td height="25" colspan="2" align="center" valign="middle" class="style39">Add : SGST @ <?php echo $row->sgst_percent; ?> %</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39">&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style39"><?php echo number_format($row->sgst_value,2); ?></td>

      </tr>



      <tr>



        <td height="25" colspan="4" align="right" valign="middle" class="style39"><strong>Rounded Off</strong>&nbsp;&nbsp;</td>



        <td height="25" align="center" valign="middle" class="style45">&nbsp;</td>

      </tr>



      <tr>



        <td height="25" colspan="4" align="right" valign="middle" class="style39"><strong>TOTAL (Rs) &nbsp;</strong></td>



        <td height="25" align="center" valign="middle" class="style45 style46"><?php echo round($row->total); ?></td>

      </tr>

      <tr>

        <td height="25" colspan="5" align="left" valign="middle" class="style39"><span class="style43">Packing  : &nbsp;</span><?php echo $row->packing; ?></td>

        </tr>



      <tr>



        <td height="100" colspan="5" align="left" valign="middle" class="style39">

        <strong>&nbsp;&nbsp;Amount :</strong> 



		<?php 

		if($row->sub_total>0.00) { 

		$words = number_format($row->sub_total,2);

		echo getIndianCurrency(floatval($row->sub_total)); } else { echo "N/A"; } ?>

		<br />

		<strong>&nbsp;&nbsp;Freight / Delivery Charges :</strong>

        <?php 

		if($row->fraight_charges>0.00) { 

		$words = number_format($row->fraight_charges,2);

		echo getIndianCurrency(floatval($row->fraight_charges)); } else { echo "N/A"; } ?>

        <br />

        <strong>&nbsp;&nbsp;IGST :</strong>

        <?php 

		if($row->igst_value>0.00) { 

		$words = number_format($row->igst_value,2);

		echo getIndianCurrency(floatval($row->igst_value)); } else { echo "N/A"; } ?>

        <br />

        <strong>&nbsp;&nbsp;CGST :</strong>

        <?php
		if($row->cgst_value>0.00) { 

		echo getIndianCurrency(floatval($row->cgst_value)); } else { echo "N/A"; } 		
		
		?>

        <br />

        <strong>&nbsp;&nbsp;SGST :</strong>

        <?php 

		if($row->sgst_value>0.00) { 

		$words = number_format($row->sgst_value,2);



		echo getIndianCurrency(floatval($row->sgst_value)); } else { echo "N/A"; } ?>

        <br />

        <strong>&nbsp;&nbsp;Total :</strong>

        <?php 

		if($row->total>0.00) { 

		$words = number_format($row->total,2);


		$total_amt_words = round($row->total).".00";
		echo no_to_words($total_amt_words); } else { echo "N/A"; } ?></td>

        </tr>



      <tr>



        <td height="80" colspan="5" align="left" valign="middle" class="style39"><strong>&nbsp;&nbsp;Remarks :-</strong> <br />
		&nbsp;<?php echo $row->remarks1; ?><br />
       		&nbsp;<?php echo $row->remarks2; ?><br />
        	&nbsp;<?php echo $row->remarks3; ?>
        </td>

        </tr>



      <tr>



        <td height="130" align="left" valign="top" class="style39">&nbsp;&nbsp;<br />



              <strong>&nbsp;&nbsp;PAN No : ABFFS3792P<br />



&nbsp;&nbsp;GSTIN No :</strong> <strong>19ABFFS3792P1Z8</strong></td>

        <td height="130" colspan="4" align="center" valign="top" class="style39"><strong>For<br />

          

          Sanjay Commercial Co.</strong></td>

        </tr>

  </table>

	<span class="style39" style="text-align:center;">Please Pay by Account Payee Cheque Only<br />

    Subject to Kolkata Jurisdiction</span> <br /></td>



  </tr>



</table>



</body>



</html>



