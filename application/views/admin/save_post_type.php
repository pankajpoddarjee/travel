<div class="container-fluid">

    <div class="row gx-3">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title"><?php echo !empty($post_type->id)?"Edit":"Add New" ?> Post Type</h5>
                </div>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')){?>
                    <p class="success-msg"><?php  echo $this->session->flashdata('success');?></p>	
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){?>
                    <p class="error-msg"><?php  echo $this->session->flashdata('error');?></p>	
                    <?php } ?>
                    <!-- Row start -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/savePostType') ?>">
                    <input type="hidden" name="post_type_id" value="<?php echo !empty($post_type->id)?$post_type->id:Null ?>">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Post Type Name<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="post_type_name" id="post_type_name" placeholder="Enter Post Type Name" value="<?php echo !empty($post_type->post_type_name)?$post_type->post_type_name:set_value('post_type_name') ?>">
                            <?php $post_type_name = form_error('post_type_name'); if(isset($post_type_name)) { ?>
                            <span style="color:red"><?php echo $post_type_name; ?></span>
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