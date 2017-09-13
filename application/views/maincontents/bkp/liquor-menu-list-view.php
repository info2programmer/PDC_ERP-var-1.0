<h4><i class="fa fa-plus-square-o"></i> Liquor Menu Management</h4>
<hr class="style5">
<div class="col-md-12">
<span style="color:#00CC00;">
<?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
</span>
<span style="color:#FF0000;">
<?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); } ?>
</span>
  <h4><i class="fa fa-list-ul"></i> Liquor Menu List</h4>
  <a href="<?php echo base_url();?>manage_hotel/liquor_menu_add/" class="btn btn-success">Add Liquor Menu</a>
  <div class="table-responsive">
    <table width="1143" class="table table-hover">
      <thead>
        <tr>
          <th width="75" align="left" valign="middle">Sl No.</th>
          <th width="148" align="left" valign="middle">Liquor Code</th>
          <th width="70" align="left" valign="middle">Size</th>
          <th width="585" align="left" valign="middle">Liquor Name</th>
          <th width="150" align="left" valign="middle">Liquor Price</th>
          <th width="87" align="left" valign="middle">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php if($rows) { $s=1; foreach($rows as $row) { ?>
        <tr>
          <td align="left" valign="middle"><?php echo $s++; ?></td>
          <td align="left" valign="middle"><?php echo $row->liquor_code; ?></td>
          <td align="left" valign="middle"><?php echo $row->size; ?></td>
          <td align="left" valign="middle"><?php echo $row->liquor_name." ".$row->size."ML"; ?></td>
          <td align="left" valign="middle"><?php echo number_format($row->liquor_price,2); ?></td>
          <td align="left" valign="middle">
          <a href="<?php echo base_url();?>manage_hotel/liquor_menu_edit/<?php echo $row->liquor_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
          &nbsp;&nbsp;
          <a href="<?php echo base_url();?>manage_hotel/liquor_menu_delete/<?php echo $row->liquor_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php } } else { ?>
      	<tr>
        	<td colspan="10" align="center">No records found</td>
        </tr>
      <?php } ?>  
      </tbody>
    </table>
  </div>
</div>
<!-- listing  area ends here ------------------------------->
