<div class="container-fluid"> 
  <!-- Main content starts -->
  <div > 
    <!-- Row Starts -->
    <div class="row">
    <div class="col-sm-12 p-0">
      <div class="main-header">
        <h4>Manage Supplier</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item"> <a href="<?php echo base_url();?>user"> <i class="icofont icofont-home"></i> </a> </li>
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>manage_supplier">Manage Supplier</a></li>
          <li class="breadcrumb-item"><?php echo $action;?> Supplier</li>
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
            <h5 class="card-header-text">Manage Supplier</h5>
          </div>
          <div class="card-block">
             <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
             <?php
				if(isset($row))
				{  
				$supplier_name = $row->supplier_name;
				$supplier_phone = $row->supplier_phone;
				$supplier_address = $row->supplier_address;
				$supplier_email = $row->supplier_email;
				}
				else
				{
				$supplier_name = '';
				$supplier_phone = '';
				$supplier_address = '';
				$supplier_email = '';
				}
			?>
              <input type="hidden" name="mode" value="tab" />
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($supplier_name!='') {?> md-valid<?php } ?>"  name="supplier_name" id="supplier_name" value="<?php if($action == 'Edit'){echo $supplier_name;} else {echo set_value('supplier_name');} ?>">
                  <label>Enter Supplier Name</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('supplier_name'); ?></span> </div>
              </div>  
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="number" class="md-form-control<?php if($supplier_phone!='') {?> md-valid<?php } ?>"  name="supplier_phone" id="supplier_phone" value="<?php if($action == 'Edit'){echo $supplier_phone;} else {echo set_value('supplier_phone');} ?>">
                  <label>Enter Supplier Phone</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('supplier_phone'); ?></span> </div>
              </div>
              
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($supplier_address!='') {?> md-valid<?php } ?>"  name="supplier_address" id="supplier_address" value="<?php if($action == 'Edit'){echo $supplier_address;} else {echo set_value('supplier_address');} ?>">
                  <label>Enter Supplier Address</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('supplier_address'); ?></span> </div>
              </div>
              
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="email" class="md-form-control<?php if($supplier_email!='') {?> md-valid<?php } ?>"  name="supplier_email" id="supplier_email" value="<?php if($action == 'Edit'){echo $supplier_email;} else {echo set_value('supplier_email');} ?>">
                  <label>Enter Supplier Email</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('supplier_email'); ?></span> </div>
              </div>            
              <div class="md-input-wrapper">
                <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $action;?> Supplier</button>
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