<h4><i class="fa fa-plus-square-o"></i> Floor Management</h4>
<hr class="style5">
<div class="col-md-12">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<span style="color:#FF0000;">
<?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); } ?>
</span>
  <h4><i class="fa fa-list-ul"></i> Floor List</h4>
  <a href="<?php echo base_url();?>manage_hotel/floor_add/" class="btn btn-success">Add Floor</a>
  <div class="table-responsive">
    <table width="1143" class="table table-hover">
      <thead>
        <tr>
          <th width="208" align="left" valign="middle">Sl No.</th>
          <th width="361" align="left" valign="middle">Floor Name</th>
          <th width="119" align="left" valign="middle">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php if($rows) { $s=1; foreach($rows as $row) { ?>
        <tr>
          <td align="left" valign="middle"><?php echo $s++; ?></td>
          <td align="left" valign="middle"><?php echo $row->floor_name; ?></td>
          <td align="left" valign="middle">
          <a href="<?php echo base_url();?>manage_hotel/floor_edit/<?php echo $row->floor_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
          &nbsp;&nbsp;
          <a href="<?php echo base_url();?>manage_hotel/floor_delete/<?php echo $row->floor_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="3" align="center">No records found</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<!-- listing  area ends here ------------------------------->
