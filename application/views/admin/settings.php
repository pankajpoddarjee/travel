<div class="container-fluid">

    <div class="row gx-3">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Settings</h5>
                </div>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')){?>
                    <p class="success-msg"><?php  echo $this->session->flashdata('success');?></p>	
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){?>
                    <p class="error-msg"><?php  echo $this->session->flashdata('error');?></p>	
                    <?php } ?>
                    <!-- Row start -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/updateSettings') ?>">

                        <div class="row gx-3">
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Application Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="application_name" id="application_name" placeholder="Enter Application Name" value="<?php echo !empty(get_settings_value('application_name'))?get_settings_value('application_name'):set_value('application_name') ?>">
                                    <?php $application_name_err = form_error('application_name'); if(isset($application_name_err)) { ?>
                                    <span style="color:red"><?php echo $application_name_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Application Slogan</label>
                                    <input type="text" class="form-control" name="application_slogan" id="application_slogan" placeholder="Enter Application Slogan" value="<?php echo !empty(get_settings_value('application_slogan'))?get_settings_value('application_slogan'):set_value('application_slogan') ?>">
                                    <?php $application_slogan_err = form_error('application_slogan'); if(isset($application_slogan_err)) { ?>
                                    <span style="color:red"><?php echo $application_slogan_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Application Logo</label>
                                    <input type="file" class="form-control" name="application_logo" id="application_logo">
                                    <?php $application_logo_err = form_error('application_logo'); if(isset($application_logo_err)) { ?>
                                    <span style="color:red"><?php echo $application_logo_err; ?></span>
                                    <?php } ?>
                                    <input type="hidden" class="form-control" name="logo" id="logo" value="<?php echo !empty(get_settings_value('application_logo'))?get_settings_value('application_logo'):set_value('application_logo') ?>">
                                </div>
                            </div>   
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Application Favicon</label>
                                    <input type="file" class="form-control" name="application_favicon">
                                    <?php $application_favicon_err = form_error('application_favicon'); if(isset($application_favicon_err)) { ?>
                                    <span style="color:red"><?php echo $application_favicon_err; ?></span>
                                    <?php } ?>
                                    <input type="hidden" class="form-control" name="favicon" id="favicon" value="<?php echo !empty(get_settings_value('application_favicon'))?get_settings_value('application_favicon'):set_value('application_favicon') ?>">
                                </div>
                            </div>   
                            
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Application Email<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="application_email" id="application_email" placeholder="Enter Application Email" value="<?php echo !empty(get_settings_value('application_email'))?get_settings_value('application_email'):set_value('application_email') ?>">
                                    <?php $application_email_err = form_error('application_email'); if(isset($application_email_err)) { ?>
                                    <span style="color:red"><?php echo $application_email_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label"> System Email <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="system_email" id="system_email" placeholder="Enter System Email" value="<?php echo !empty(get_settings_value('system_email'))?get_settings_value('system_email'):set_value('system_email') ?>">
                                    <?php $system_email_err = form_error('system_email'); if(isset($system_email_err)) { ?>
                                    <span style="color:red"><?php echo $system_email_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label"> Address <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="<?php echo !empty(get_settings_value('address'))?get_settings_value('address'):set_value('address') ?>">
                                    <?php $address_err = form_error('address'); if(isset($address_err)) { ?>
                                    <span style="color:red"><?php echo $address_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label"> Country <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" value="<?php echo !empty(get_settings_value('country'))?get_settings_value('country'):set_value('country') ?>">
                                    <?php $country_err = form_error('country'); if(isset($country_err)) { ?>
                                    <span style="color:red"><?php echo $country_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label"> State <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Enter State" value="<?php echo !empty(get_settings_value('state'))?get_settings_value('state'):set_value('state') ?>">
                                    <?php $state_err = form_error('state'); if(isset($state_err)) { ?>
                                    <span style="color:red"><?php echo $state_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label"> City <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="<?php echo !empty(get_settings_value('city'))?get_settings_value('city'):set_value('city') ?>">
                                    <?php $city_err = form_error('city'); if(isset($city_err)) { ?>
                                    <span style="color:red"><?php echo $city_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label"> Zip <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter Zip Code" value="<?php echo !empty(get_settings_value('zip'))?get_settings_value('zip'):set_value('zip') ?>">
                                    <?php $zip_err = form_error('zip'); if(isset($zip_err)) { ?>
                                    <span style="color:red"><?php echo $zip_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label"> Theme Color <span style="color:red">*</span></label>
                                                                        
                                    <input type="color" class="form-control form-control-color" name="theme_color" id="theme_color" value="<?php echo !empty(get_settings_value('theme_color'))?get_settings_value('theme_color'):set_value('theme_color') ?>" title="Choose your color">
                                    
                                    <?php $theme_color_err = form_error('theme_color'); if(isset($theme_color_err)) { ?>
                                    <span style="color:red"><?php echo $theme_color_err; ?></span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label class="form-label">TimeZone <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="timezone" id="timezone" placeholder="Enter timezone Code" value="<?php echo !empty(get_settings_value('timezone'))?get_settings_value('timezone'):set_value('timezone') ?>">
                                    <?php $timezone_err = form_error('timezone'); if(isset($timezone_err)) { ?>
                                    <span style="color:red"><?php echo $timezone_err; ?></span>
                                    <?php } ?>
                                </div>
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