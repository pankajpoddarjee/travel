<div class="container-fluid">

    <div class="row gx-3">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Change Password</h5>
                </div>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')){?>
                    <p class="success-msg"><?php  echo $this->session->flashdata('success');?></p>	
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){?>
                    <p class="error-msg"><?php  echo $this->session->flashdata('error');?></p>	
                    <?php } ?>
                    <!-- Row start -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('user/updatePassword') ?>">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Current Password<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Enter Current Password" value="<?=set_value('password')?>">
                                <?php $password_err = form_error('password'); if(isset($password_err)) { ?>
                                <span style="color:red"><?php echo $password_err; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">New Password<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" value="<?=set_value('new_password')?>">
                            <?php $new_password_err = form_error('new_password'); if(isset($new_password_err)) { ?>
                            <span style="color:red"><?php echo $new_password_err; ?></span>
                            <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm New Password<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter New Password" value="<?=set_value('confirm_password')?>">
                            <?php $confirm_password_err = form_error('confirm_password'); if(isset($confirm_password_err)) { ?>
                            <span style="color:red"><?php echo $confirm_password_err; ?></span>
                            <?php } ?>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-success">
                            Save
                        </button>
                    </form>
                    <!-- Row end -->
                </div>
            </div>
        </div>

    </div>

</div>