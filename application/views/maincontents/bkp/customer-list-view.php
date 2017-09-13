<h4><i class="fa fa-plus-square-o"></i> Customer Management</h4>
<hr class="style5">
<div class="col-md-12">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<span style="color:#FF0000;">
<?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); } ?>
</span>
  <h4><i class="fa fa-list-ul"></i> Customer List</h4>
  <a href="<?php echo base_url();?>manage_customer/customer_add/" class="btn btn-success">Add Customer</a>
  <div class="table-responsive">
    <table width="1143" class="table table-hover">
      <thead>
        <tr>
          <th width="208" align="left" valign="middle">Sl No.</th>
          <th width="361" align="left" valign="middle">Name</th>
          <th width="361" align="left" valign="middle">Code</th>
          <th width="361" align="left" valign="middle">ID Proof</th>
          <th width="361" align="left" valign="middle">Phone</th>
          <th width="361" align="left" valign="middle">DOB</th>
          <!--<th width="361" align="left" valign="middle">File</th>-->
          <th width="119" align="left" valign="middle">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php if($rows) { $s=1; foreach($rows as $row) { ?>
        <tr>
          <td align="left" valign="middle"><?php echo $s++; ?></td>
          <td align="left" valign="middle"><?php echo $row->customer_name; ?></td>
          <td align="left" valign="middle"><?php echo $row->cust_code; ?></td>
          <td align="left" valign="middle">
          <strong>Passport No: </strong><?php echo $row->passport_no; ?><br />
          <strong>Aadhar No: </strong><?php echo $row->aadhar_no; ?><br />
          <strong>Votar Id : </strong><?php echo $row->votarid; ?><br />
          <strong>PAN No. : </strong><?php echo $row->pan; ?><br />
          <strong>GST No : </strong><?php echo $row->gst_no; ?><br />
          </td>
          <td align="left" valign="middle"><?php echo $row->phone1." ".$row->phone2; ?></td>
          <td align="left" valign="middle"><?php echo date_format(date_create($row->dob), "d-m-Y"); ?></td>
          <!--<td align="left" valign="middle">
          <?php if($row->aadhar_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $row->aadhar_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $row->aadhar_file; ?>" class="img-responsive" /></a>	
          <?php } ?>
          <br />
          <?php if($row->pan_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $row->pan_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $row->pan_file; ?>" class="img-responsive" /></a>	
          <?php } ?>
          <br />
          <?php if($row->votar_file!='') { ?>
          <a href="<?php echo base_url(); ?>uploads/customer/<?php echo $row->votar_file; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/customer/<?php echo $row->votar_file; ?>" class="img-responsive" /></a>	
          <?php } ?>
          </td>-->
          <td align="left" valign="middle">
          <a href="<?php echo base_url();?>manage_customer/customer_edit/<?php echo $row->customer_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
          &nbsp;&nbsp;
          <a href="<?php echo base_url();?>manage_customer/customer_delete/<?php echo $row->customer_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="9" align="center">No records found</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<!-- listing  area ends here ------------------------------->
