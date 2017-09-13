<div class="container-fluid"> 
  <!-- Main content starts -->
  <div > 
    <!-- Row Starts -->
    <div class="row">
    <div class="col-sm-12 p-0">
      <div class="main-header">
        <h4>Manage Brand</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item"> <a href="<?php echo base_url();?>user"> <i class="icofont icofont-home"></i> </a> </li>
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>manage_brand">Manage Brand</a></li>
          <li class="breadcrumb-item"><?php echo $action;?> Brand</li>
        </ol>
      </div>
    </div>
  </div>
    <!-- Row end --> 
    <!-- Row start -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-header-text">Manage Brand</h5>
          </div>
          <div class="card-block">
            <!--<form id="main" class="form-horizontal" action="<?php echo base_url();?>user/change_password" method="post" novalidate>-->
             <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
             <?php
				if(isset($row))
				{  
				$brand_name = $row->brand_name;
				}
				else
				{
				$brand_name = '';
				}
			?>
              <input type="hidden" name="mode" value="tab" />
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($brand_name!='') {?> md-valid<?php } ?>"  name="brand_name" id="brand_name" value="<?php if($action == 'Edit'){echo $brand_name;} else {echo set_value('brand_name');} ?>">
                  <label>Enter Brand Name</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('brand_name'); ?></span> </div>
              </div>              
              <div class="md-input-wrapper">
                <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $action;?> Brand</button>
              </div>
            <!--</form>-->
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid ends -->