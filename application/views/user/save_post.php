<div class="container-fluid">

    <div class="row gx-3">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title"><?php echo !empty($post->id)?"Edit":"Add New" ?> Post</h5>
                </div>
                <div class="card-body">
                    <?php if($this->session->flashdata('success')){?>
                    <p class="success-msg"><?php  echo $this->session->flashdata('success');?></p>	
                    <?php } ?>
                    <?php if($this->session->flashdata('error')){?>
                    <p class="error-msg"><?php  echo $this->session->flashdata('error');?></p>	
                    <?php } ?>
                    <!-- Row start -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('user/savePost') ?>">
                    <input type="hidden" name="post_id" value="<?php echo !empty($post->id)?$post->id:Null ?>">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Post Type<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <select name="post_type" id="post_type" class="form-control">
                                <option value="">Select</option>
                                <?php if(count($post_type)>0) {
                                    foreach ($post_type as $type) { 
                                        
                                    ?>
                                    
                                        <option value="<?php echo $type->id; ?>" <?php if(isset($post->post_type)){
                                            echo ($type->id == $post->post_type)?"selected":"";
                                        } ?> <?php echo (set_value('post_type')==$type->id)?" selected=' selected'":""?> ><?php echo $type->post_type_name; ?></option>
                                <?php    }
                                }
                                ?>
                                
                            </select>
                            <?php $post_type_err = form_error('post_type'); if(isset($post_type_err)) { ?>
                            <span style="color:red"><?php echo $post_type_err; ?></span>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Banner Image<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="file" class="form-control" id="banner_img" name="banner_img" accept="image/*" >
                                <?php $banner_img_err = form_error('banner_img'); if(isset($banner_img_err)) { ?>
                                <span style="color:red"><?php echo $banner_img_err; ?></span>
                                <?php } ?>
                                <div id="preview_banner">
                                    <?php if(!empty($post->banner_img)){ ?>
                                    <div style="margin-bottom: 20px; margin-right: 20px;"><img src="<?php echo base_url().$post->banner_img ?>" style="height: 100px; display: block;"></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Title<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title Of Post" value="<?php echo !empty($post->title)?$post->title:set_value('title') ?>"  onload="convertToSlug();" onkeyup="convertToSlug();" onblur="convertToTags();" >
                            <?php $title_err = form_error('title'); if(isset($title_err)) { ?>
                            <span style="color:red"><?php echo $title_err; ?></span>
                            <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Sub Title<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Enter Sub Title Of Post" value="<?php echo !empty($post->sub_title)?$post->sub_title:set_value('sub_title') ?>" onblur="convertToTags();">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Description<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <textarea   id="description" name="description" placeholder="Enter description"> <?php echo !empty($post->description)?$post->description:set_value('description') ?></textarea>
                            <?php $description_err = form_error('description'); if(isset($description_err)) { ?>
                            <span style="color:red"><?php echo $description_err; ?></span>
                            <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Event Date<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" name="event_date" id="event_date"  value="<?php echo !empty($post->event_date)?$post->event_date:set_value('event_date') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publish Date<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="date" class="form-control" name="publish_date" id="publish_date"  value="<?php echo !empty($post->publish_date)?$post->publish_date:set_value('publish_date') ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Attachment<span style="color:red">*</span></label>
                            <div class="col-sm-9">                            
                            <input type="file" id="attachment" name="attachment" class="form-control" accept=".jpg, .jpeg, .pdf">
                                                
                            <?php if(isset($attachment_err)) { ?>
                            <span style="color:red"><?php echo $attachment_err; ?></span>
                            <?php } ?>

                                <div class="form-group">
                                    <div id="preview_attachment"> 

                                    <?php if(isset($post->attachment) && !empty($post->attachment)) { ?>
                                    <iframe  src="<?php echo base_url().$post->attachment; ?>" >
                                    </iframe>
                                    <?php } ?>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Is New<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="checkbox" class="form-control form-check-input" name="is_new" id="is_new"  value="1" <?php echo set_checkbox('is_new', '1'); ?>  <?php echo !empty($post->is_new)?"checked":"" ?> >
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Slug<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="slug" id="slug"  value="<?php echo !empty($post->slug)?$post->slug:set_value('slug') ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tags<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" name="tags" id="tags" value="<?php echo !empty($post->tags)?$post->tags:set_value('tags') ?>" data-role="tagsinput" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Gallery Image<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                            <input type="file" class="form-control" name="gallery_img[]" id="gallery_img" accept="image/*" multiple>
                                <div id="preview" style="display: flex;">
                                    <?php if(isset($post_gallery_image)){
                                        foreach ($post_gallery_image as $gimage) {?>
                                        <div style="margin-bottom: 20px; margin-right: 20px;"><img src="<?php echo base_url().$gimage->gallery_img; ?>" style="height: 100px; display: block;"></div>  
                                    <?php    }
                                    } ?>
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
<script>
   $(document).ready(function() {
        $('input[data-role="tagsinput"]').tagsinput();
    });

    function convertToTags() {  

        //tags_with_space();
        //tags_with_hyphen();
        var str ='';
        var title = $('#title').val();
        var sub_title = $('#sub_title').val();


        if(title){
            str += title;
        }
        if(sub_title){
            str += " "+sub_title;;
        }
        //var str = $('#exam_name').val();
        //replace all special characters | symbols with a space
        str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .toLowerCase();

        // trim spaces at start and end of string
        str = str.replace(/^\s+|\s+$/gm,'');

        // replace space with dash/hyphen
        str = str.replace(/\s+/g, ',');   

        str = str.replace(/'/g, '');  
        //document.getElementById("slug-text").innerHTML = str;
        //return str;

        $('#tags').tagsinput('add', str);
    }

    function convertToSlug() { 
        var str = $('#title').val();
        //replace all special characters | symbols with a space
        str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .toLowerCase();
        
        // trim spaces at start and end of string
        str = str.replace(/^\s+|\s+$/gm,'');
        
        // replace space with dash/hyphen
        str = str.replace(/\s+/g, '-');   
        //document.getElementById("slug-text").innerHTML = str;
        //return str;

        $('#slug').val(str);
    }


</script>