<div class="container-fluid">

    <div class="row gx-3">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title"><?php echo !empty($user->id)?"Edit":"Add New" ?> User</h5>
                </div>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')){?>
                    <p class="success-msg"><?php  echo $this->session->flashdata('success');?></p>	
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){?>
                    <p class="error-msg"><?php  echo $this->session->flashdata('error');?></p>	
                    <?php } ?>
                    <!-- Row start -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/saveUser') ?>">
                        <input type="hidden" name="user_id" value="<?php echo !empty($user->id)?$user->id:Null ?>">
                        <input type="hidden" class="form-control" name="password" id="password"  value="<?php echo !empty($user->password)?$user->password:'12345678' ?>">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Name<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo !empty($user->name)?$user->name:set_value('name') ?>">
                            <?php $name = form_error('name'); if(isset($name)) { ?>
                            <span style="color:red"><?php echo $name; ?></span>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email Id<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email"  value="<?php echo !empty($user->email)?$user->email:set_value('email') ?>">
                            <?php $email_err = form_error('email'); if(isset($email_err)) { ?>
                            <span style="color:red"><?php echo $email_err; ?></span>
                            <?php } ?>

                            <?php if(isset($email_exist_err)){ ?>
                                <span style="color:red"><?php echo $email_exist_err; ?></span>
                            <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Mobile<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" maxlength="10" name="mobile" id="mobile" placeholder="Enter Mobile Number"  value="<?php echo !empty($user->mobile)?$user->mobile:set_value('mobile') ?>">
                            <?php $mobile_err = form_error('mobile'); if(isset($mobile_err)) { ?>
                            <span style="color:red"><?php echo $mobile_err; ?></span>
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