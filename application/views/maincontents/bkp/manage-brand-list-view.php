<!-- Container-fluid starts -->
<div class="container-fluid"> 
  <!-- Row Starts -->
  <div class="row">
    <div class="col-sm-12 p-0">
      <div class="main-header">
        <h4>Manage Brand</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item"> <a href="<?php echo base_url();?>user"> <i class="icofont icofont-home"></i> </a> </li>
          <!--<li class="breadcrumb-item"><a href="#">Tables</a></li>-->
          <li class="breadcrumb-item">Manage Brand</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-header-text">Brand List</h5>
        </div>
        <div class="card-header">          
          <a href="<?php echo base_url();?>manage_brand/add" class="btn btn-flat flat-info txt-info waves-effect waves-light " data-toggle="tooltip" data-placement="top" title="Add Brand">Add Brand</a>
        </div>
        <div class="card-block">
        <?php if($this->session->flashdata('error_message')) { ?>
              <h6 style="color:red;"><?php echo $this->session->flashdata('error_message'); ?></h6>
        <?php } ?>
        <?php if($this->session->flashdata('success_message')) { ?>
              <h6 style="color:green;"><?php echo $this->session->flashdata('success_message'); ?></h6>
        <?php } ?>
          <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
            <thead>
              <tr>
              	<th>Sl No.</th>
                <th>Brand Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              	<th>Sl No.</th>
                <th>Brand Name</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
            <?php if($rows) { $i=1; foreach($rows as $row) {?>
              <tr>
              	<td><?php echo $i++; ?></td>
                <td><?php echo $row->brand_name; ?></td>            
                <td>
                	<a href="<?php echo base_url();?>manage_brand/edit/<?php echo $row->brand_id; ?>" onclick="return confirm('Are you sure ?');"><i class="fa fa-pencil" aria-hbrand_idden="true"></i></a>
                	<a href="<?php echo base_url();?>manage_brand/confirmDelete/<?php echo $row->brand_id; ?>" onclick="return confirm('Are you sure ?');"><i class="fa fa-trash" aria-hbrand_idden="true"></i></a>
					<?php if($row->published==1) { ?>
                        <a href="<?php echo base_url();?>manage_brand/deactive/<?php echo $row->brand_id; ?>" onclick="return confirm('Are you sure ?');"><div class="label-main"><label class="label bg-success">Active</label></div></a>
                    <?php } else { ?>    
                    <a href="<?php echo base_url();?>manage_brand/active/<?php echo $row->brand_id; ?>" onclick="return confirm('Are you sure ?');"><div class="label-main"><label class="label bg-danger">Deactive</label></div></a>
                	<?php } ?>   
                </td>
              </tr>
            <?php } } else { ?>
            	<tr>
                	<td colspan="5" style="text-align:center">No records found</td>
                </tr>
            <?php } ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid ends -->