<section id="mainbody">

  <div class="container">

    <div class="row">

      <p class="bodyheading text-center"><i class="fa fa-plus-square"></i> ADD FD DETAILS</p>

      <hr class="style5">

      <br />

      <span style="margin-left: 38%;padding: 13px 8px;color: #168c09;">

      <?php if($this->session->flashdata('success_message')) { echo $this->session->flashdata('success_message'); } ?>

      </span>

      <?php  if($update_row) { ?>

      <form action="<?php echo base_url();?>manage_fd_details/edit/<?php echo $update_row->fd_details_id; ?>" method="post" enctype="multipart/form-data">

      <?php } else { ?>

      <form action="<?php echo base_url();?>manage_fd_details" method="post" enctype="multipart/form-data">

        <?php } ?>

        <?php

          if($update_row)

          {

                $date = date_format(date_create($update_row->date), "m/d/Y"); 

                $created_on = $update_row->created_on; 

                $fd_amt = $update_row->fd_amt; 

                $fd_serial_number = $update_row->fd_serial_number; 

                $bank_name = $update_row->bank_name; 

                $acc_no = $update_row->acc_no; 

                $bank_address = $update_row->bank_address;

				$branch_name = $update_row->branch_name;

				$password = $update_row->password;

				$filecopy = $update_row->filecopy;

          }

          else 

          {

                $date = ''; 

                $created_on = ''; 

                $fd_amt = ''; 

                $fd_serial_number = ''; 

                $bank_name = ''; 

                $acc_no = ''; 

                $bank_address = '';

				$branch_name = '';

				$password = '';

				$filecopy = '';

          }

          ?>

          <input type="hidden" name="mode" value="product" />

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Date</div>

        <div class="col-md-2">

          <input type="date" name="date" value="<?php if($update_row) { echo $date; } ?>" id="date" class="form-control"  required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Created On</div>

        <div class="col-md-2">

          <input type="date" name="created_on" value="<?php if($update_row) { echo $created_on; } ?>" id="createdon" class="form-control"  required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">FD Amount (Rs)</div>

        <div class="col-md-2">

          <input type="text" name="fd_amt" value="<?php if($update_row) { echo $fd_amt; } ?>" id="fdamount" class="form-control"  required autofocus>

        </div>

        <br />

        <br />

        <br />

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">FD Serial Number</div>

        <div class="col-md-2">

          <input type="text" name="fd_serial_number" value="<?php if($update_row) { echo $fd_serial_number; } ?>" id="fdslno" class="form-control" required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bank Name</div>

        <div class="col-md-2">

          <input type="text" name="bank_name" value="<?php if($update_row) { echo $bank_name; } ?>" id="bankname" class="form-control" required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Account Number</div>

        <div class="col-md-2">

          <input type="text" name="acc_no" value="<?php if($update_row) { echo $acc_no; } ?>" id="acno" class="form-control" required autofocus>

        </div>

        <br />

        <br />

        <br />

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Bank Address</div>

        <div class="col-md-2">

          <input type="text" name="bank_address" value="<?php if($update_row) { echo $bank_address; } ?>" id="bankadd" class="form-control" required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Branch Name</div>

        <div class="col-md-2">

          <input type="text" name="branch_name" value="<?php if($update_row) { echo $branch_name; } ?>" id="branchname" class="form-control" required autofocus>

        </div>

        <div class="col-md-2 text-right spacing" style="padding-top:5px;">Password</div>

        <div class="col-md-2">

          <input type="password" name="password" value="<?php if($update_row) { echo $password; } ?>" id="password" class="form-control" required autofocus>

        </div>

        <br />

        <br />

        <br />

        <div class="col-md-2">Upload FD Copy</div>

        <div class="col-md-4">

          <input type="file" name="filecopy" id="password" class="form-control">

          <?php if($update_row) { if($update_row->filecopy!='') { echo $update_row->filecopy; } } ?>

          <?php if($this->session->flashdata('error_message')) { echo $this->session->flashdata('error_message'); } ?>

        </div>

        <div class="col-md-6 spacing">

          <button type="submit" class="btn btn-success ">Submit</button>

        </div>

      </form>

      <br />

      <br />

      <br />

      <hr class="style5">

      <p class="bodyheading text-center"><i class="fa fa-th-list"></i> FD DETAIL LIST</p>

      <hr class="style5">

      <br />

      <div class="table-responsive">

        <table width="100%" border="1" bordercolor="#999999" class="table-responsive table">

          <tr>

          	<td width="9%" bgcolor="#EAEAEA"><strong>Sl No.</strong></td>

            <td width="9%" bgcolor="#EAEAEA"><strong>Date</strong></td>

            <td width="10%" bgcolor="#EAEAEA"><strong>Created On</strong></td>

            <td width="15%" bgcolor="#EAEAEA"><strong>FD Amount</strong></td>

            <td width="16%" bgcolor="#EAEAEA"><strong>FD Serial Number</strong></td>

            <td width="16%" bgcolor="#EAEAEA"><strong>Account Number</strong></td>

            <td width="9%" bgcolor="#EAEAEA"><strong>View Doc</strong></td>

            <td width="17%" bgcolor="#EAEAEA"><strong>Status</strong></td>

            <td width="8%" align="center" valign="middle" bgcolor="#EAEAEA"><strong>Action</strong></td>

          </tr>

          <?php

		  if($rows) { $i=1; foreach($rows as $row) { 

		  ?>

          <tr>

          	<td align="left" valign="middle"><?php echo $i++; ?></td>

            <td align="left" valign="middle"><?php echo date_format(date_create($row->date), "d-m-Y"); ?></td>

            <td align="left" valign="middle"><?php echo date_format(date_create($row->created_on), "d-m-Y"); ?></td>

            <td align="left" valign="middle"><?php echo number_format($row->fd_amt,2); ?></td>

            <td align="left" valign="middle"><?php echo $row->fd_serial_number; ?></td>

            <td align="left" valign="middle"><?php echo $row->acc_no; ?></td>

            <td align="left" valign="middle">

            	<a target="_blank" href="<?php echo base_url(); ?>uploads/fd_details/<?php echo $row->filecopy; ?>" target="_blank"><?php echo $row->filecopy; ?></a>

            </td>

            <td align="left" valign="middle"><?php echo $row->status; ?></td>

            <td align="center" valign="middle">

            <a onclick="return confirm('Are you want to edit this ? ');" href="<?php echo base_url();?>manage_fd_details/index/<?php echo $row->fd_details_id; ?>"><i class="fa fa-pencil-square" style="color:#0080C0;"></i></a> | 

            <a onclick="return confirm('Are you want to delete this ? ');" href="<?php echo base_url();?>manage_fd_details/confirmDelete/<?php echo $row->fd_details_id; ?>"><i class="fa fa-window-close" style="color:#FF1C1C;"></i></a>

            </td>

          </tr>

          <?php } } else { ?>

          <tr>

          	<td colspan="9" align="center">No records found</td>

          </tr>

          <?php } ?>

        </table>

      </div>

    </div>

  </div>

</section>

