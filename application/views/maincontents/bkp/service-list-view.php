<h4><i class="fa fa-plus-square-o"></i> Service Management</h4>
<hr class="style5">
<div class="col-md-12">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<span style="color:#FF0000;">
<?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); } ?>
</span>
  <h4><i class="fa fa-list-ul"></i> Service List</h4>
  <a href="<?php echo base_url();?>manage_hotel/service_add/" class="btn btn-success">Add Service</a>
  <div class="table-responsive">
    <table width="1143" class="table table-hover">
      <thead>
        <tr>
          <th width="208" align="left" valign="middle">Sl No.</th>
          <th width="361" align="left" valign="middle">Service Code</th>
          <th width="361" align="left" valign="middle">Service Name</th>
          <th width="361" align="left" valign="middle">Service Description</th>
          <th width="361" align="left" valign="middle">Service Price</th>
          <th width="361" align="left" valign="middle">CGST Percent</th>
          <th width="361" align="left" valign="middle">CGST Amount</th>
          <th width="361" align="left" valign="middle">SGST Percent</th>
          <th width="361" align="left" valign="middle">SGST Amount</th>
          <th width="361" align="left" valign="middle">Net Amount</th>
          <th width="119" align="left" valign="middle">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php if($rows) { $s=1; foreach($rows as $row) { ?>
        <tr>
          <td align="left" valign="middle"><?php echo $s++; ?></td>
          <td align="left" valign="middle"><?php echo $row->service_code; ?></td>
          <td align="left" valign="middle"><?php echo $row->service_name; ?></td>
          <td align="left" valign="middle"><?php echo $row->service_description; ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->service_price,2); ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->cgst_percent,2); ?> %</td>
          <td align="left" valign="middle"><?php echo number_format($row->cgst_amt,2); ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->sgst_percent,2); ?> %</td>
          <td align="left" valign="middle"><?php echo number_format($row->sgst_amt,2); ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->net_total,2); ?></td>
          <td align="left" valign="middle">
          <a href="<?php echo base_url();?>manage_hotel/service_edit/<?php echo $row->service_id; ?>"><i class="fa fa-pencil"></i></a>
          &nbsp;&nbsp;
          <a href="<?php echo base_url();?>manage_hotel/service_delete/<?php echo $row->service_id; ?>"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="11" align="center">No records found</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<!-- listing  area ends here ------------------------------->
