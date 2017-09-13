<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Report-".date('d-m-Y').".xls");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSV Report</title>
</head>
<body>
<table width="100%" border="1" bordercolor="#999999" class="table-responsive table">
  <tr>
    <td width="3%" bgcolor="#EAEAEA"><strong>Sl No.</strong></td>
    <td width="11%" bgcolor="#EAEAEA"><strong>Customer Name</strong></td>
    <td width="3%" bgcolor="#EAEAEA"><strong>Bill No</strong></td>
    <td width="11%" bgcolor="#EAEAEA"><strong>Bill Date</strong></td>
    <td width="11%" bgcolor="#EAEAEA"><strong>Net Wt (kg)</strong></td>
    <td width="11%" bgcolor="#EAEAEA"><strong>Rate/Unit</strong></td>
    <td width="11%" bgcolor="#EAEAEA"><strong>Sub Total</strong></td>
    <td width="6%" bgcolor="#EAEAEA"><strong>IGST</strong></td>
    <td width="5%" bgcolor="#EAEAEA"><strong>CGST</strong></td>
    <td width="5%" bgcolor="#EAEAEA"><strong>SGST</strong></td>
    <td width="5%" bgcolor="#EAEAEA"><strong>Fraight Charges</strong></td>
    <td width="5%" bgcolor="#EAEAEA"><strong>Total</strong></td>
  </tr>
  <?php
		  //echo '<pre>';print_r($searchs);die;
		  if($searchs) { $i=1; foreach($searchs as $row) { 
		  ?>
  <tr>
    <td align="left" valign="middle"><?php echo $i++; ?></td>
    <td align="left" valign="middle"><?php 
			$customer_detail = $this->db->query("select * from td_customer where customer_id='$row->customer_id'")->row();
			echo $customer_detail->name."(".$customer_detail->vendor_code.")"; ?></td>
    <td align="left" valign="middle"><?php echo $row->bill_no; ?></td>
    <td align="left" valign="middle"><?php echo date_format(date_create($row->bill_date), "d-m-Y"); ?></td>
    <td align="left" valign="middle"><?php echo $row->net_wt; ?></td>
    <td align="left" valign="middle"><?php echo number_format($row->rate_per_unit,2); ?></td>
    <td align="left" valign="middle"><?php echo number_format($row->sub_total,2); ?></td>
    <td align="left" valign="middle"><?php echo $row->igst_value." (".$row->igst_percent."%)"; ?></td>
    <td align="left" valign="middle"><?php echo $row->cgst_value." (".$row->cgst_percent."%)"; ?></td>
    <td align="left" valign="middle"><?php echo $row->sgst_value." (".$row->sgst_percent."%)"; ?></td>
    <td align="left" valign="middle"><?php echo number_format($row->fraight_charges,2); ?></td>
    <td align="left" valign="middle"><?php echo number_format($row->total,2); ?></td>
  </tr>
  <?php } } else { ?>
  <tr>
    <td colspan="12" align="center">No records found</td>
  </tr>
  <?php } ?>
</table>
</body>
</html>
