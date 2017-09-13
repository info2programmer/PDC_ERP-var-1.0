<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4 well" style="padding-bottom:33px;">
    <h4 style="font-family: 'Oswald', sans-serif;">Change Your Password</h4>
    <form class="form-signin" method="post" action="<?php echo base_url();?>user/change_password">
    	<input type="hidden" name="mode" value="change_pass" />
      <h6 class="form-signin-heading" style="color:red;"><i class="fa fa-info-circle"></i> Leave blank if you do not want to change your password</h6>
      <label class="sr-only">Username</label>
      <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" value="<?php echo $this->session->userdata('username');?>" required autofocus readonly="readonly">
      <label>&nbsp;</label>
      
      <label  class="sr-only">Old Password</label>      
      <input type="password" class="form-control" id="old_password"  name="old_password" placeholder="Enter Old Password" autofocus>
      <span style="color:#FF0000;"><?php echo form_error('old_password'); ?></span>
      <label>&nbsp;</label>
      
      <label  class="sr-only">New Password</label>      
      <input type="password" class="form-control" id="new_password"  name="new_password" placeholder="Enter New Password" autofocus>
      <span style="color:#FF0000;"><?php echo form_error('new_password'); ?></span>
      <label>&nbsp;</label>
      
      <label  class="sr-only">Confirm Password</label>      
      <input type="password" class="form-control" id="confirm_password"  name="confirm_password" placeholder="Enter Confirm Password" autofocus>
      <span style="color:#FF0000;"><?php echo form_error('confirm_password'); ?></span>
      <label>&nbsp;</label>
      
      <button class="btn btn-lg btn-success btn-block" type="submit">Update Password</button>
    </form>
  </div>
</div>
