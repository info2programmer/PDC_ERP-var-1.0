<section id="mainbody">
  <div class="container">
    <div class="row">      
      <hr class="style5">
      <p class="bodyheading text-center"><i class="fa fa-th-list"></i> INVOICE LIST </p>
      <hr class="style5">
      <br />
      <span style="color:#090; margin-left:40%">
    	<?php if($this->session->userdata('success_message')) { echo $this->session->userdata('success_message'); } ?>
      </span>
      <div class="table-responsive">
        <table width="100%" border="1" bordercolor="#999999" class="table-responsive table">
          <tr>
          	<td width="2%" bgcolor="#EAEAEA"><strong>Sl No.</strong></td>
            <td width="6%" bgcolor="#EAEAEA"><strong>Customer Name</strong></td>
            <td width="10%" bgcolor="#EAEAEA"><strong>Manufacturer Name</strong></td>
            <td width="10%" bgcolor="#EAEAEA"><strong>Product Name</strong></td>
            <td width="5%" bgcolor="#EAEAEA"><strong>Bill No</strong></td>
            <td width="7%" bgcolor="#EAEAEA"><strong>Bill Date</strong></td>
            <td width="6%" bgcolor="#EAEAEA"><strong>Net Wt (kg)</strong></td>
            <td width="7%" bgcolor="#EAEAEA"><strong>Rate/Unit</strong></td>
            <td width="7%" bgcolor="#EAEAEA"><strong>Sub Total</strong></td>
            <td width="5%" bgcolor="#EAEAEA"><strong>IGST</strong></td>
            <td width="4%" bgcolor="#EAEAEA"><strong>CGST</strong></td>
            <td width="4%" bgcolor="#EAEAEA"><strong>SGST</strong></td>
            <td width="5%" bgcolor="#EAEAEA"><strong>Fraight Charges</strong></td>
            <td width="3%" bgcolor="#EAEAEA"><strong>Total</strong></td>
            <td width="19%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Action</strong></td>
          </tr>
          <?php
		  if($rows) { $i=1; foreach($rows as $row) { 
		  ?>
          <tr>
          	<td align="left" valign="middle"><?php echo $i++; ?></td>
            <td align="left" valign="middle"><?php echo $row->name."(".$row->vendor_code.")"; ?></td>
            <td align="left" valign="middle"><?php echo $row->manufacturer_name; ?></td>
            <td align="left" valign="middle"><?php echo $row->commodity_name; ?></td>
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
            
            <td align="center" valign="middle">
            	<a onclick="return confirm('Are you want to edit this ? ');" href="<?php echo base_url();?>manage_invoice/edit/<?php echo $row->invoice_id; ?>"><i class="fa fa-pencil-square" style="color:#0080C0;"></i></a> | 
            	<a onclick="return confirm('Are you want to delete this ? ');" href="<?php echo base_url();?>manage_invoice/confirmDelete/<?php echo $row->invoice_id; ?>"><i class="fa fa-window-close" style="color:#FF1C1C;"></i></a> |
                <a target="_blank" onclick="return confirm('Are you want to print this ? ');" href="<?php echo base_url();?>manage_invoice/print_tax_invoice/<?php echo $row->invoice_id; ?>"><i class="fa fa-print" style="color:#0080C0;"></i></a>
            </td>
          </tr>
          <?php } } else { ?>
          <tr>
          	<td colspan="15" align="center">No records found</td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</section>
