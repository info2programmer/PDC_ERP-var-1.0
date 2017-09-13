<section id="mainbody">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> STOCK IN LIST OF <?php echo $product_detail->commodity_name; ?></p>
        <hr class="style5">
        <br />
        <div class="table-responsive">
          <table width="100%" border="1" bordercolor="#999999" class="table-responsive table">
            <tr>
              <td width="7%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Sl No.</strong></td>
              <td width="50%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Product Name</strong></td>
              <td width="24%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Amount (kg)</strong></td>
              <td width="19%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Stock Date</strong></td>
            </tr>
            <?php
		  if($rows1) { $i=1; foreach($rows1 as $row1) {  ?>
            <tr>
            	<td align="left" valign="middle"><?php echo $i++; ?></td>
            	<td align="left" valign="middle"><?php echo $row1->commodity_name; ?></td>
            	<td align="left" valign="middle"><?php echo $row1->stock_amt; ?></td>
            	<td align="left" valign="middle"><?php echo date_format(date_create($row1->stock_date), "d-m-Y"); ?></td>            
          	</tr>
            <?php } } else { ?>
            <tr>
              <td colspan="4" align="center">No records found</td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      
      <div class="col-md-6">
        <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> STOCK OUT LIST OF <?php echo $product_detail->commodity_name; ?></p>
        <hr class="style5">
        <br />
        <div class="table-responsive">
          <table width="100%" border="1" bordercolor="#999999" class="table-responsive table">
            <tr>
              <td width="7%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Sl No.</strong></td>
              <td width="50%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Product Name</strong></td>
              <td width="24%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Amount</strong></td>
              <td width="19%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Stock Date</strong></td>
            </tr>
            <?php
		  	if($rows2) { $j=1; foreach($rows2 as $row2) {  ?>
            <tr>
            	<td align="left" valign="middle"><?php echo $j++; ?></td>
            	<td align="left" valign="middle"><?php echo $row2->commodity_name; ?></td>
            	<td align="left" valign="middle"><?php echo $row2->stock_amt; ?></td>
            	<td align="left" valign="middle"><?php echo date_format(date_create($row2->stock_date), "d-m-Y"); ?></td>            
          	</tr>
            <?php } } else { ?>
            <tr>
              <td colspan="4" align="center">No records found</td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
