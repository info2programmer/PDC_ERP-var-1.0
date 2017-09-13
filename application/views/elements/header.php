<section id="topbar">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h2 style="font-family: 'Oswald', sans-serif;" class="spacing"><i class="fa fa-university"></i> PAKUAHAT DEGREE COLLEGE</h2>
        <h4 style="font-family: 'Oswald', sans-serif;" class="spacing">ERPPRO - Student Management Software</h4>
      </div>
      <div class="col-md-3" style="padding-top:15px;">
        <h4 style="font-family: 'Oswald', sans-serif; text-align:right;" class="spacing">Version 2.0</h4>
        <h4 style="font-family: 'Oswald', sans-serif; text-align:right;" class="spacing"><i class="fa fa-user"></i> Welcome <?php echo $this->session->userdata('username');?></h4>
      </div>
    </div>
  </div>
</section>
<!-------------------Topbar ----------------------------------------------------------------->
<section id="logobar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-findcond ">
          <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-left">
              <li class="navlitxt"><a href="<?php echo base_url();?>user/change_password" class="dropdown-toggle" role="button">Account Settings</a></li>
              <li class="navlitxt"><a href="studentmanagement.php" class="dropdown-toggle" role="button">Student Management</a></li>
              <li class="navlitxt"><a href="idcardmanagement.php" class="dropdown-toggle" role="button">Id Card Management</a></li>
              <li class="navlitxt"><a href="librarycardmanagement.php" class="dropdown-toggle" role="button">Library Card Management</a></li>
              <li class="navlitxt"><a href="<?php echo base_url();?>user/logout" class="dropdown-toggle" role="button">Log Out</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-------------------Menubar ---------------------------------------------------------------->
