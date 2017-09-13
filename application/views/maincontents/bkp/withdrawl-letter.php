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
 return $result . $points . " Paise ";
 
  }else{
	  
	return $result;  
	  
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Withdrawl Form</title>
<style>
.txt{
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	text-align:justify !important;
}
u {    
    border-bottom: 1px dotted #000;
    text-decoration: none;
}
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
<div id="divButtons" name="divButtons" align="center">
<input type="button" value = "Print" onclick="printPage()" style="font:bold 11px verdana;color:#FF0000;background-color:#FFFFFF;" />

</div>
<div class="pop new_width" align="left" style="margin-top:15px;">
<div align="center" style="height:128px;">
</div>
            	
 <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="txt">
 <tr align="left" valign="top"><td>To<br />The MANAGER<br /><?php echo $Fetch_data->bank_name;?>.<br /><?php echo $Fetch_data->bank_address;?><br /><?php echo $Fetch_data->branch;?><br /><br /></td></tr>
  <tr align="left" valign="top">
</tr>
  <tr align="center" valign="top">
    <td height="60"><strong style="text-decoration:underline;">TO WHOM IT MAY CONCERN</strong></td>
  </tr>
  <tr align="left" valign="middle">
    <td height="35"><strong style="text-decoration:underline;">Sub: Request for mature/premature of cumulative deposit account</strong></td>
  </tr>
  <tr align="left" valign="middle">
    <td height="35"><a style="text-decoration:underline;">Ref:</a>  Fixed Deposit No<u>&nbsp;&nbsp;<?php echo $Fetch_data->fd_no;?>&nbsp;&nbsp;</u> Dated <u>&nbsp;&nbsp;<?php echo date_format(date_create($Fetch_data->fd_created_date), "d-m-Y");?>&nbsp;&nbsp;</u> Amount Rs. <u>&nbsp;&nbsp;<?php echo $Fetch_data->fd_amt;?>&nbsp;&nbsp;</u></td>
  </tr>
  <tr align="left" valign="middle">
  <td>
   <p style="text-align:justify; line-height:220%;"> This is to inform you that, we want to mature/ pre-mature the above cumulative deposit today. Kindly you are requested to please mature/ premature the same and transfer the maturity value to our Current A/c No <u>&nbsp;&nbsp;<?php echo $Fetch_data->acc_no;?>.</p></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle"><p>We are looking forward for your consideration upon this matter.</p></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle">Thanking You, </td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle">Yours Faithfully</td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle"><strong>For SANJAY COMMERCIAL CO.</strong></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle"><strong><u>PARTNER</u></strong></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="middle"><strong><u>Encl: a/a</u></strong></td>
  </tr>
</table>
        


</div>
</body>
</html>
