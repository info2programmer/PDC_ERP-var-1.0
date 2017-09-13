<section id="mainbody">

  <div class="container">

    <div class="row">

      <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> ADD PURCHASED PRODUCTS</p>

      <hr class="style5">

      <br />

      <span style="margin-left: 38%;padding: 13px 8px;color: #168c09;">

      <?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>

      </span>

      <?php  if($update_row) { ?>

      <form action="<?php echo base_url();?>manage_purchase/index/<?php echo $update_row->product_id; ?>" method="post">

      <?php } else { ?>

      <form action="<?php echo base_url();?>manage_purchase" method="post">

      <?php } ?>      

      <?php

	  if($update_row)

	  {

			$purchase_date = date_format(date_create($update_row->purchase_date), "m/d/Y"); 

			$commodity_name = $update_row->commodity_name; 

			$net_weight = $update_row->net_weight; 

			$assessable_value = $update_row->assessable_value; 

			$sgst = $update_row->sgst; 

			$cgst = $update_row->cgst; 

			$igst = $update_row->igst; 

			$edu_cess = $update_row->edu_cess; 

			$she_cess = $update_row->she_cess;			

	  }

	  else 

	  {

		  	$purchase_date = ''; 

			$commodity_name = ''; 

			$net_weight = ''; 

			$assessable_value = ''; 

			$sgst = ''; 

			$cgst = ''; 

			$igst = '';

			$edu_cess = ''; 

			$she_cess = '';

	  }

	  ?>

        <input type="hidden" name="mode" value="product" />

        

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Date</div>

        <div class="col-md-2">

          <input type="date" name="purchase_date" value="<?php if($update_row) { echo $purchase_date; } ?>" id="date" class="form-control"  required>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Commodity Name</div>

        <div class="col-md-2">

          <input type="text" name="commodity_name" value="<?php if($update_row) { echo $commodity_name; } ?>" id="commodityname" class="form-control"  required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Net Weight (mt)</div>

        <div class="col-md-2">

          <input type="text" name="net_weight" value="<?php if($update_row) { echo $net_weight; } ?>" id="netweight" class="form-control"  required autofocus>

        </div>

        <br />

        <br />

        <br />

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Goods Entry Number</div>

        <div class="col-md-2">

          <input type="text" name="assessable_value" value="<?php if($update_row) { echo $assessable_value; } ?>" id="assesvalue" class="form-control" required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">SGST</div>

        <div class="col-md-2">

          <input type="text" name="sgst" value="<?php if($update_row) { echo $sgst; } ?>" id="sgst" class="form-control" required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">CGST</div>

        <div class="col-md-2">

          <input type="text" name="cgst" value="<?php if($update_row) { echo $cgst; } ?>" id="cgst" class="form-control" required autofocus>

        </div>

        <br />

        <br />

        <br />

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">IGST</div>

        <div class="col-md-2"><input type="text" name="igst" value="<?php if($update_row) { echo $igst; } ?>" id="igst" class="form-control" required autofocus></div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Edu Cess</div>

        <div class="col-md-2"><input type="text" name="edu_cess" value="<?php if($update_row) { echo $edu_cess; } ?>" id="igst" class="form-control" required autofocus></div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">S.H.E. Cess</div>

        <div class="col-md-2"><input type="text" name="she_cess" value="<?php if($update_row) { echo $she_cess; } ?>" id="igst" class="form-control" required autofocus></div>

        

        <br /><br /><br /><br />

        

        <div class="col-md-12 spacing text-center">

          <button type="submit" class="btn btn-success  ">Submit</button>

        </div>

      </form>

      <br />

      <br />

      <br />

      <hr class="style5">

      <p class="bodyheading text-center"><i class="fa fa-th-list"></i> PURCHASED PRODUCTS DETAILS</p>

      <hr class="style5">

      <br />

      <div class="table-responsive">

        <table width="100%" border="1" bordercolor="#999999" class="table-responsive table">

          <tr>

          	<td width="3%" bgcolor="#EAEAEA"><strong>Sl No.</strong></td>

            <td width="9%" bgcolor="#EAEAEA"><strong>Date</strong></td>

            <td width="18%" bgcolor="#EAEAEA"><strong>Commodity Name</strong></td>

            <td width="9%" bgcolor="#EAEAEA"><strong>Net Weight (mt)</strong></td>
            
			<td width="6%" bgcolor="#EAEAEA"><strong>Stock (kg)</strong></td>
            <td width="12%" bgcolor="#EAEAEA"><strong>Goods Entry Number</strong></td>

            <td width="5%" bgcolor="#EAEAEA"><strong>SGST</strong></td>

            <td width="6%" bgcolor="#EAEAEA"><strong>CGST</strong></td>

            <td width="5%" bgcolor="#EAEAEA"><strong>IGST</strong></td>

            <td width="7%" align="left" valign="middle" bgcolor="#EAEAEA"><strong>Edu Cess</strong></td>

            <td width="5%" align="left" valign="middle" bgcolor="#EAEAEA"><strong>S.H.E. Cess</strong></td>

            <td width="15%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Action</strong></td>

          </tr>

          <?php

		  if($rows) { $i=1; foreach($rows as $row) { 

		  ?>

          <tr>

          	<td align="left" valign="middle"><?php echo $i++; ?></td>

            <td align="left" valign="middle"><?php echo date_format(date_create($row->purchase_date), "d-m-Y"); ?></td>

            <td align="left" valign="middle"><?php echo $row->commodity_name; ?></td>

            <td align="left" valign="middle"><?php echo $row->net_weight; ?></td>
            <td align="left" valign="middle">
			<?php 
			
			$stock_in = $this->db->query("select sum(stock_amt) as stockin from td_stock where product_id='$row->product_id' and stock_type='in'")->row();
			$stock_out = $this->db->query("select sum(stock_amt) as stockout from td_stock where product_id='$row->product_id' and stock_type='out'")->row();
			echo ($stock_in->stockin-$stock_out->stockout); 
			
			?>
            </td>
            <td align="left" valign="middle"><?php echo $row->assessable_value; ?></td>

            <td align="left" valign="middle"><?php echo $row->sgst; ?></td>

            <td align="left" valign="middle"><?php echo $row->cgst; ?></td>

            <td align="left" valign="middle"><?php echo $row->igst; ?></td>

            <td align="center" valign="middle"><?php echo $row->edu_cess; ?></td>

            <td align="center" valign="middle"><?php echo $row->she_cess; ?></td>

            <td align="center" valign="middle">

            	<a onclick="return confirm('Are you want to edit this ? ');" href="<?php echo base_url();?>manage_purchase/index/<?php echo $row->product_id; ?>"><i class="fa fa-pencil-square" style="color:#0080C0;" title="Edit"></i></a> | 

            	<a onclick="return confirm('Are you want to delete this ? ');" href="<?php echo base_url();?>manage_purchase/confirmDelete/<?php echo $row->product_id; ?>"><i class="fa fa-window-close" style="color:#FF1C1C;" title="Delete"></i></a> | 
                
                <a target="_blank" onclick="return confirm('Are you want to view stock ? ');" href="<?php echo base_url();?>manage_purchase/stock_details/<?php echo $row->product_id; ?>"><i class="fa fa-eye" aria-hidden="true" style="color:#090;" title="View Stock"></i></a>
                </td>

          </tr>

          <?php } } else { ?>

          <tr>

          	<td colspan="12" align="center">No records found</td>

          </tr>

          <?php } ?>

        </table>

      </div>

    </div>

  </div>

</section>

