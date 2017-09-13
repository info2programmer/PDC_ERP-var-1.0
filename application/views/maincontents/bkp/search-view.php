<section id="mainbody">
  <div class="container">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 well spacing">
        <h4 style="font-family: 'Oswald', sans-serif;"><i class="fa fa-search"></i> Search Panel</h4>
        <form class="form-inline" method="post" action="<?php echo base_url();?>manage_invoice/search">
          <input type="hidden" name="mode" value="search" />
          <h6 class="form-signin-heading" style="color:#0080C0;"><i class="fa fa-info-circle"></i> Choose 'search by' from drop down</h6>
          <label>Search By :</label>
          <select class="form-control" id="type" name="type">
            <option value="" selected="selected" hidden="">Choose Type</option>
            <option value="inv_no">Invoice Number</option>
            <option value="goods_no">Goods Number</option>
            <option value="customer">Customer Name</option>
          </select>
          <label> &nbsp;Keyword : </label>
          <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Keyword" required autofocus>
          <label> &nbsp;Password : </label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          &nbsp;
          <button class="btn btn-success" type="submit">Find Now</button>
        </form>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</section>
<?php 
if($check) {
if($check->password_search==$password) { 

?>
<section id="mainbody">
  <div class="container">
    <div class="row">
      <hr class="style5">
      <p class="bodyheading text-center"><i class="fa fa-search-plus"></i> SEARCH RESULT 
      	<span class="pull-right" style="border:1px solid #090;padding: 6px 14px 5px 6px;"> 
        	<a href="<?php echo base_url();?>manage_invoice/csv_report/<?php echo $type; ?>/<?php echo $keyword; ?>" target="_blank" style="text-decoration:none; color:#090;">CSV <i class="fa fa-file-excel-o" ></i></a>
        </span>
      </p>
      <hr class="style5">
      <br />
      <div class="table-responsive">
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
            <td width="13%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Action</strong></td>
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
            <td align="center" valign="middle"><a target="_blank" onclick="return confirm('Are you want to print this ? ');" href="<?php echo base_url();?>manage_invoice/print_tax_invoice/<?php echo $row->invoice_id; ?>"><i class="fa fa-print" style="color:#0080C0;"></i></a></td>
          </tr>
          <?php } } else { ?>
          <tr>
            <td colspan="13" align="center">No records found</td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</section>
<?php } else { ?>
<span style="font-size:14px;color:#F00;margin-left: 40%;">Password Did Not Matched </span>
<?php } } ?>
