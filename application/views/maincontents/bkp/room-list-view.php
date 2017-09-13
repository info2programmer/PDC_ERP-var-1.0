<h4><i class="fa fa-plus-square-o"></i> Room Management</h4>
<hr class="style5">
<div class="col-md-12">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<span style="color:#FF0000;">
<?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); } ?>
</span>
  <h4><i class="fa fa-list-ul"></i> Room List</h4>
  <a href="<?php echo base_url();?>manage_hotel/room_add/" class="btn btn-success">Add Room</a>
  <div class="table-responsive">
    <table width="1143" class="table table-hover">
      <thead>
        <tr>
          <th width="208" align="left" valign="middle">Sl No.</th>
          <th width="361" align="left" valign="middle">Room No</th>
          <th width="361" align="left" valign="middle">Floor</th>
          <th width="361" align="left" valign="middle">Room Price</th>
		  <th width="361" align="left" valign="middle">CGST Percent</th>
          <th width="361" align="left" valign="middle">CGST Amount</th>
          <th width="361" align="left" valign="middle">SGST Percent</th>
          <th width="361" align="left" valign="middle">SGST Amount</th>
          <th width="361" align="left" valign="middle">Net Amount</th>
          <th width="361" align="left" valign="middle">Room Type</th>
          <th width="361" align="left" valign="middle">Is AC</th>
          <th width="361" align="left" valign="middle">Bed Type</th>
          <th width="119" align="left" valign="middle">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php if($rows) { $s=1; foreach($rows as $row) { ?>
        <tr>
          <td align="left" valign="middle"><?php echo $s++; ?></td>
          <td align="left" valign="middle"><?php echo $row->room_no; ?></td>
          <td align="left" valign="middle"><?php		   
		  $floor = $this->db->query("select * from td_floor where floor_id='$row->floor_id'")->row();
		  echo $floor->floor_name;
		  ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->room_price,2); ?></td>
		  <td align="left" valign="middle"><?php echo number_format($row->cgst_percent,2); ?> %</td>
          <td align="left" valign="middle"><?php echo number_format($row->cgst_amt,2); ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->sgst_percent,2); ?> %</td>
          <td align="left" valign="middle"><?php echo number_format($row->sgst_amt,2); ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->net_total,2); ?></td>
          <td align="left" valign="middle"><?php echo $row->room_type; ?></td>
          <td align="left" valign="middle"><?php echo $row->is_ac; ?></td>
          <td align="left" valign="middle"><?php echo $row->bed_type; ?></td>
          <td align="left" valign="middle">
          <a href="<?php echo base_url();?>manage_hotel/room_edit/<?php echo $row->room_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
          &nbsp;&nbsp;
          <a href="<?php echo base_url();?>manage_hotel/room_delete/<?php echo $row->room_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="13" align="center">No records found</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<!-- listing  area ends here ------------------------------->
