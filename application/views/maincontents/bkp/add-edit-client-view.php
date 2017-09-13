<div class="container-fluid"> 
  <!-- Main content starts -->
  <div > 
    <!-- Row Starts -->
    <div class="row">
    <div class="col-sm-12 p-0">
      <div class="main-header">
        <h4>Manage Client</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item"> <a href="<?php echo base_url();?>user"> <i class="icofont icofont-home"></i> </a> </li>
          <li class="breadcrumb-item"><a href="<?php echo base_url();?>manage_client">Manage Client</a></li>
          <li class="breadcrumb-item"><?php echo $action;?> Client</li>
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
            <h5 class="card-header-text">Manage Client</h5>
          </div>
          <div class="card-block">
             <?php 	$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); echo form_open_multipart('',$attributes); ?>
             <?php
				if(isset($row))
				{  
				$client_name = $row->client_name;
				$client_phone = $row->client_phone;
				$client_address = $row->client_address;
				$client_email = $row->client_email;
				}
				else
				{
				$client_name = '';
				$client_phone = '';
				$client_address = '';
				$client_email = '';
				}
			?>
              <input type="hidden" name="mode" value="tab" />
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($client_name!='') {?> md-valid<?php } ?>"  name="client_name" id="client_name" value="<?php if($action == 'Edit'){echo $client_name;} else {echo set_value('client_name');} ?>">
                  <label>Enter Client Name</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('client_name'); ?></span> </div>
              </div>  
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="number" class="md-form-control<?php if($client_phone!='') {?> md-valid<?php } ?>"  name="client_phone" id="client_phone" value="<?php if($action == 'Edit'){echo $client_phone;} else {echo set_value('client_phone');} ?>">
                  <label>Enter Client Phone</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('client_phone'); ?></span> </div>
              </div>
              
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="text" class="md-form-control<?php if($client_address!='') {?> md-valid<?php } ?>"  name="client_address" id="client_address" value="<?php if($action == 'Edit'){echo $client_address;} else {echo set_value('client_address');} ?>">
                  <label>Enter Client Address</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('client_address'); ?></span> </div>
              </div>
              
              <div class="md-group-add-on p-relative"> <span class="md-add-on"> </span>
                <div class="md-input-wrapper">
                  <input type="email" class="md-form-control<?php if($client_email!='') {?> md-valid<?php } ?>"  name="client_email" id="client_email" value="<?php if($action == 'Edit'){echo $client_email;} else {echo set_value('client_email');} ?>">
                  <label>Enter Client Email</label>
                  <span class="messages" style="color:#F00;"><?php echo form_error('client_email'); ?></span> </div>
              </div>            
              <div class="md-input-wrapper">
                <button type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $action;?> Client</button>
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