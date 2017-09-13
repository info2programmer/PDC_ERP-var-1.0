<section id="mainbody">

  <div class="container">

    <div class="row"> <span style="color:#090; margin-left:40%">

      <?php if($this->session->userdata('success_message')) { echo $this->session->userdata('success_message'); } ?>

      </span>

      <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> ADD CUSTOMER INFORMATION</p>

      <hr class="style5">

      <br />

      <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>

      <input type="hidden" name="mode" value="invoice" />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Name</div>

      <div class="col-md-2">

        <input type="text" name="name" id="name" class="form-control" value="<?php if($action=='Edit') { echo $cust_detail->name; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Vendor Code</div>

      <div class="col-md-2">

        <input type="text" name="vendor_code" id="vendor_code" class="form-control" value="<?php if($action=='Edit') { echo $cust_detail->vendor_code; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">State</div>

      <div class="col-md-2">

        <select name="state" class="form-control" required>

          <option value="" selected="selected" hidden="">Select State</option>

          <?php 



		$states = $this->db->query("select * from thi_states where published=1 order by state_name asc")->result();



		if($states) { foreach($states as $state) { 



		?>

          <option value="<?php echo $state->state_name; ?>" <?php if($action=='Edit') { if($state->state_name==$cust_detail->state) { ?>selected="selected"<?php } } ?>><?php echo $state->state_name; ?></option>

          <?php } } ?>

        </select>

      </div>

      <br />

      <br />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Pin Code</div>

      <div class="col-md-2">

        <input type="text" name="pincode" id="pincode" class="form-control" value="<?php if($action=='Edit') { echo $cust_detail->pincode; } ?>" required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Postal Address</div>

      <div class="col-md-2">

        <input type="text" name="postal_address" id="postal_address" class="form-control" value="<?php if($action=='Edit') { echo $cust_detail->postal_address; } ?>" required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">District</div>

      <div class="col-md-2">

        <input type="text" name="district" id="district" class="form-control" value="<?php if($action=='Edit') { echo $cust_detail->district; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <input type="hidden" name="commissionrate" id="commissionrate" class="form-control" value="" autofocus>

      <!--<div class="col-md-2 text-right spacing" style="padding-top:5px;">Commissionrate</div>

      <div class="col-md-2">

        <input type="text" name="commissionrate" id="commissionrate" class="form-control" required value="<?php if($action=='Edit') { echo $cust_detail->commissionrate; } ?>" autofocus>

      </div>-->

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">GSTIN</div>

      <div class="col-md-2">

        <input type="text" name="gstin" id="gstin" class="form-control" required value="<?php if($action=='Edit') { echo $cust_detail->gstin; } ?>" autofocus>

      </div>

      <br />

      <br />

      <br />

      <hr class="style5">

      <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> ADD MANUFACTURER / IMPORTER INFORMATION</p>

      <hr class="style5">

      <br />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Name</div>

      <div class="col-md-2">

        <input type="text" name="manufacturer_name" id="manufacturer_name" class="form-control" value="<?php if($action=='Edit') { echo $manufac_detail->manufacturer_name; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Address</div>

      <div class="col-md-2">

        <input type="text" name="manufacturer_address" id="manufacturer_address" class="form-control" value="<?php if($action=='Edit') { echo $manufac_detail->manufacturer_address; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">GSTIN</div>

      <div class="col-md-2">

        <input type="text" name="manufacturer_gstin" id="manufacturer_gstin" class="form-control" value="<?php if($action=='Edit') { echo $manufac_detail->manufacturer_gstin; } ?>"  required autofocus>

      </div>

      <br />

      <br />

      <br />

      <hr class="style5">

      <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> ADD TAX INVOICE DETAILS</p>

      <hr class="style5">

      <br />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bill Number</div>

      <div class="col-md-2">

        <input type="text" name="bill_no" id="bill_no" class="form-control" value="<?php if($action=='Edit') { echo $row->bill_no; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bill Date</div>

      <div class="col-md-2">

        <input type="date" name="bill_date" id="bill_date" class="form-control" value="<?php if($action=='Edit') { echo $row->bill_date; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Challan Number</div>

      <div class="col-md-2">

        <input type="text" name="challan_no" id="challan_no" class="form-control" value="<?php if($action=='Edit') { echo $row->challan_no; } ?>"  required autofocus>

      </div>

      <br />

      </br>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Challan Date</div>

      <div class="col-md-2">

        <input type="date" name="challan_date" id="challan_date" class="form-control" value="<?php if($action=='Edit') { echo $row->challan_date; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">P.O. Number</div>

      <div class="col-md-2">

        <input type="text" name="po_no" id="po_no" class="form-control" value="<?php if($action=='Edit') { echo $row->po_no; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">P.O. Date</div>

      <div class="col-md-2">

        <input type="date" name="po_date" id="po_date" class="form-control" value="<?php if($action=='Edit') { echo $row->po_date; } ?>"  required autofocus>

      </div>
      <br />

      <br />
      
      <div class="col-md-2 text-right spacing" style="padding-top:5px;">C. Note Number</div>

      <div class="col-md-2">

        <input type="text" name="c_note_no" id="c_note_no" class="form-control" value="<?php if($action=='Edit') { echo $row->c_note_no; } ?>"  autofocus>

      </div>

      <br />

      <br />

      <br />

      <hr class="style5">

      <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> ADD COMMODITY DETAILS</p>

      <hr class="style5">

      <br />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Excisable Commodity</div>

      <div class="col-md-2">

        <input type="text" name="excisable_commodity" id="excisable_commodity" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->commodity_name; } ?>" required autofocus> 

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Goods Entry Number</div>

      <div class="col-md-2">

        <input type="text" name="goods_entry_no" id="goods_entry_no" class="form-control" value="<?php if($action=='Edit') { echo $row->goods_entry_no; } ?>" required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Removal Time Of Goods</div>

      <div class="col-md-2">

        <input type="date" name="removal_time_of_goods" id="removal_time_of_goods" class="form-control" value="<?php if($action=='Edit') { echo $row->removal_time_of_goods; } ?>"  required autofocus>

      </div>

      

      

      <div id="commodity_detail">
      	  <br /><br />
          <div class="col-md-2 text-right spacing" style="padding-top:5px;color:#090;">Select</div>
          <div class="col-md-2 spacing" style="padding-top:5px;color:#090;">Net Weight (kg)</div>
          <div class="col-md-8 text-left spacing" style="padding-top:5px;color:#090;">Stock (kg)</div>
          <br />     

            <div class="col-md-12" id="stock-repeat">
            </div>	   
      </div>

      <br />

      <br />

      <!--<div class="col-md-2 text-right spacing" style="padding-top:5px;">Net Weight (mt)</div>

      <div class="col-md-2">

        <input type="text" name="net_weight" id="net_weight" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->net_weight; } ?>" required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Assessable Value (Rs)</div>

      <div class="col-md-2">

        <input type="text" name="assessable_value" id="assessable_value" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->assessable_value; } ?>" required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">SGST</div>

      <div class="col-md-2">

        <input type="text" name="sgst" id="sgst" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->sgst; } ?>"  required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">CGST</div>

      <div class="col-md-2">

        <input type="text" name="cgst" id="cgst" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->cgst; } ?>" required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">IGST</div>

      <div class="col-md-2">

        <input type="text" name="igst" id="igst" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->igst; } ?>" required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Edu Cess</div>

      <div class="col-md-2">

        <input type="text" name="edu_cess" id="edu_cess" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->edu_cess; } ?>"  required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">S.H.E. Cess</div>

      <div class="col-md-2">

        <input type="text" name="she_cess" id="she_cess" class="form-control" value="<?php if($action=='Edit') { echo $product_detail->she_cess; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <br />

      <br />-->

      <hr class="style5">

      <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> ADD SOLD GOODS INFORMATION</p>

      <hr class="style5">

      <br />

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Net Weight (Kg)</div>

      <div class="col-md-2">

        <input type="text" name="net_wt" id="net_wt" class="form-control" value="<?php if($action=='Edit') { echo $row->net_wt; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Rate / Unit / Kg</div>

      <div class="col-md-2">

        <input type="text" name="rate_per_unit" id="rate_per_unit" class="form-control" value="<?php if($action=='Edit') { echo $row->rate_per_unit; } ?>"  required autofocus>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">Value (Rs)</div>

      <div class="col-md-2">

        <input type="text" name="sub_total" id="sub_total" class="form-control" value="<?php if($action=='Edit') { echo $row->sub_total; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-6"></div>

      <div class="col-md-4 text-right spacing" style="padding-top:5px;">Fraight / Delivery Charges (Rs)</div>

      <div class="col-md-2">

        <input type="text" name="fraight_charges" id="fraight_charges" class="form-control" value="<?php if($action=='Edit') { echo $row->fraight_charges; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-2"></div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">IGST</div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">----------></div>

      <div class="col-md-2">

        <select name="igst_percent" class="form-control" id="igst_percent">

          <option value="" selected="selected" hidden="">Choose (%)</option>

          <?php for($i=0;$i<=28;$i++) { ?>

          <option value="<?php echo $i; ?>" <?php if($action=='Edit') { if($i==$row->igst_percent) { ?>selected="selected"<?php } } ?>><?php echo $i; ?></option>

          <?php } ?>

        </select>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">----------></div>

      <div class="col-md-2">

        <input type="text" name="igst_value" id="igst_value" class="form-control" value="<?php if($action=='Edit') { echo $row->igst_value; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-2"></div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">CGST</div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">----------></div>

      <div class="col-md-2">

        <select name="cgst_percent" class="form-control" id="cgst_percent">

          <option value="" selected="selected" hidden="">Choose (%)</option>

          <?php for($j=0;$j<=28;$j++) { ?>

          <option value="<?php echo $j; ?>" <?php if($action=='Edit') { if($j==$row->cgst_percent) { ?>selected="selected"<?php } } ?>><?php echo $j; ?></option>

          <?php } ?>

        </select>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">----------></div>

      <div class="col-md-2">

        <input type="text" name="cgst_value" id="cgst_value" class="form-control" value="<?php if($action=='Edit') { echo $row->cgst_value; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-2"></div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">SGST</div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">----------></div>

      <div class="col-md-2">

        <select name="sgst_percent" class="form-control" id="sgst_percent">

          <option value="" selected="selected" hidden="">Choose (%)</option>

          <?php for($k=0;$k<=28;$k++) { ?>

          <option value="<?php echo $k; ?>" <?php if($action=='Edit') { if($k==$row->sgst_percent) { ?>selected="selected"<?php } } ?>><?php echo $k; ?></option>

          <?php } ?>

        </select>

      </div>

      <div class="col-md-2 text-right spacing" style="padding-top:5px;">----------></div>

      <div class="col-md-2">

        <input type="text" name="sgst_value" id="sgst_value" class="form-control" value="<?php if($action=='Edit') { echo $row->sgst_value; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-6"></div>

      <div class="col-md-4 text-right spacing" style="padding-top:5px;">Total (Rs)</div>

      <div class="col-md-2">

        <input type="text" name="total" id="total" class="form-control" value="<?php if($action=='Edit') { echo $row->total; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-6"></div>

      <div class="col-md-4 text-right spacing" style="padding-top:5px;">Packing </div>

      <div class="col-md-2">

        <input type="text" name="packing" id="packing" class="form-control" value="<?php if($action=='Edit') { echo $row->packing; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-6"></div>

      <div class="col-md-4 text-right spacing" style="padding-top:5px;">Packing HS Code</div>

      <div class="col-md-2">

        <input type="text" name="packing_hscode" id="packing_hscode" class="form-control" value="<?php if($action=='Edit') { echo $row->packing_hscode; } ?>" required autofocus>

      </div>

      <br />

      <br />

      <div class="col-md-2"></div>
      <div class="col-md-4 text-right spacing" style="padding-top:5px;">Remarks 1</div>
      <div class="col-md-6">
        <!--<textarea name="remarks" id="remarks" class="form-control" required autofocus rows="5">
        	<?php if($action=='Edit') { echo $row->remarks; } ?>
        </textarea>-->
        <input type="text" name="remarks1" id="remarks1" class="form-control" value="<?php if($action=='Edit') { echo $row->remarks1; } ?>" required autofocus>
      </div>
      <br />

      <br />
      
      <div class="col-md-2"></div>
      <div class="col-md-4 text-right spacing" style="padding-top:5px;">Remarks 2</div>
      <div class="col-md-6">
        <input type="text" name="remarks2" id="remarks2" class="form-control" value="<?php if($action=='Edit') { echo $row->remarks2; } ?>" required autofocus>
      </div>

      <br />

      <br />
      
      <div class="col-md-2"></div>
      <div class="col-md-4 text-right spacing" style="padding-top:5px;">Remarks 3</div>
      <div class="col-md-6">
        <input type="text" name="remarks3" id="remarks3" class="form-control" value="<?php if($action=='Edit') { echo $row->remarks3; } ?>" required autofocus>
      </div>
      
      <br /><br /><br /><br />

      <div class="col-md-12 col-sm-12 text-right">

        <button type="submit" class="btn btn-success ">Create Invoice</button>

      </div>

    </div>

    <?php echo form_close(); ?> </div>

  <br />

  <br />

</section>

<script>



$(document).ready(function() {



	$('#net_wt,#rate_per_unit').on('input', function() {



		net_wt = parseFloat($('#net_wt').val())||0;



		rate_per_unit = parseFloat($('#rate_per_unit').val())||0;



		sub_total = net_wt*rate_per_unit;



		$('#sub_total').val(sub_total).change();



	});



	$('#igst_percent').on('change', function() {



		igst_percent = parseFloat($('#igst_percent').val())||0;



		sub_total = parseFloat($('#sub_total').val())||0;



		fraight_charges = parseFloat($('#fraight_charges').val())||0;



		igst_value = ((sub_total + fraight_charges)*igst_percent)/100;



		$('#igst_value').val(igst_value).change();



	});



	$('#cgst_percent').on('change', function() {



		cgst_percent = parseFloat($('#cgst_percent').val())||0;



		sub_total = parseFloat($('#sub_total').val())||0;



		fraight_charges = parseFloat($('#fraight_charges').val())||0;



		cgst_value = ((sub_total + fraight_charges)*cgst_percent)/100;



		$('#cgst_value').val(cgst_value).change();



	});



	$('#sgst_percent').on('change', function() {



		sgst_percent = parseFloat($('#sgst_percent').val())||0;



		sub_total = parseFloat($('#sub_total').val())||0;



		fraight_charges = parseFloat($('#fraight_charges').val())||0;



		sgst_value = ((sub_total + fraight_charges)*sgst_percent)/100;



		$('#sgst_value').val(sgst_value).change();



	});



	$('#sub_total, #igst_value, #cgst_value, #sgst_value, #fraight_charges').on('input change', function() {



		subtotal = parseFloat($('#sub_total').val())||0;



		igst = parseFloat($('#igst_value').val())||0;



		cgst = parseFloat($('#cgst_value').val())||0;



		sgst = parseFloat($('#sgst_value').val())||0;



		fraight_charges = parseFloat($('#fraight_charges').val())||0;



		$('#total').val(subtotal+igst+cgst+sgst+fraight_charges);	



	});



});



</script> 

