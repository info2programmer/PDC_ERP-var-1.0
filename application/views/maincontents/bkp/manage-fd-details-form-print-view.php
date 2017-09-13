<section id="mainbody">
  <div class="container">
    <div class="row">
      <p class="bodyheading text-center"><i class="fa fa-print"></i> PRINT DEPOSIT FORM</p>
      <hr class="style5">
      <br />
      <span style="margin-left: 38%;padding: 13px 8px;color: #168c09;">
      <?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
      </span>
      <form action="<?php echo base_url();?>manage_fd_details/form_print" method="post" enctype="multipart/form-data">
      
        
          <input type="hidden" name="mode" value="deposit" />
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Date</div>
        <div class="col-md-2">
          <input type="date" name="date" id="date" class="form-control"  required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bank Name</div>
        <div class="col-md-2">
          <input type="text" name="bank_name" id="createdon" class="form-control"  required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Invest Amount (RS)</div>
        <div class="col-md-2">
          <input type="text" name="invest_amt" id="fdamount" class="form-control"  required autofocus>
        </div>
        <br />
        <br />
        <br />
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bank Address</div>
        <div class="col-md-2">
          <input type="text" name="bank_address" id="fdslno" class="form-control" required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">FD Period (yr)</div>
        <div class="col-md-2">
          <input type="text" name="fd_period" id="bankname" class="form-control" required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Branch</div>
        <div class="col-md-2">
          <input type="text" name="branch" id="acno" class="form-control" required autofocus>
        </div>
        <br />
        <br />
        <br />
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Current A/C No</div>
        <div class="col-md-2">
          <input type="text" name="current_acc_no" id="bankadd" class="form-control" required autofocus>
        </div>
        <div class="col-md-6 spacing">
          <button type="submit" class="btn btn-success ">Print</button>
        </div>        
        <br />
        <br />
        <br />
        
        
      </form>
      <br />

    </div>
    
    <div class="row">
    	<hr class="style5">
      <p class="bodyheading text-center"><i class="fa fa-print"></i> PRINT WITHDRAWL FORM</p>
      <hr class="style5">
      <br />
      <span style="margin-left: 38%;padding: 13px 8px;color: #168c09;">
      <?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>
      </span>
      <form action="<?php echo base_url();?>manage_fd_details/form_print" method="post" enctype="multipart/form-data">
      
        
          <input type="hidden" name="mode" value="withdrawl" />
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">FD Number</div>
        <div class="col-md-2">
          <input type="text" name="fd_no" id="fd_no" class="form-control"  required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">FD Amount</div>
        <div class="col-md-2">
          <input type="text" name="fd_amt" id="fd_amt" class="form-control"  required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">FD Created on</div>
        <div class="col-md-2">
          <input type="date" name="fd_created_date" id="fd_created_date" class="form-control"  required autofocus>
        </div>
        <br />
        <br />
        <br />
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Account No</div>
        <div class="col-md-2">
          <input type="text" name="acc_no" id="acc_no" class="form-control" required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bank Name</div>
        <div class="col-md-2">
          <input type="text" name="bank_name" id="bank_name" class="form-control" required autofocus>
        </div>
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bank Address</div>
        <div class="col-md-2">
          <input type="text" name="bank_address" id="bank_address" class="form-control" required autofocus>
        </div>
        <br />
        <br />
        <br />
        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Branch</div>
        <div class="col-md-2">
          <input type="text" name="branch" id="branch" class="form-control" required autofocus>
        </div>        
        <div class="col-md-6 spacing">
          <button type="submit" class="btn btn-success ">Print</button>
        </div>        
        <br />
        <br />
        <br />
        
        
      </form>
      <br />
      <br />
      <br />
    </div>
    
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
		$('#fd_no').on('blur', function(){
			fd_no = $('#fd_no').val();
			$.ajax({
				url: "<?php echo base_url(); ?>manage_fd_details/ajax_fetch_value",
				data: {fd_no:fd_no},
				method:'POST',
				type:'JSON',
				success: function(result){
					var data = $.parseJSON(result);
					$('#fd_amt').val(data.fd_amt);
					$('#fd_created_date').val(data.created_on);
					$('#acc_no').val(data.acc_no);
					$('#bank_name').val(data.bank_name);
					$('#bank_address').val(data.bank_address);
					$('#branch').val(data.branch_name);
			}});
		});
});
</script>
