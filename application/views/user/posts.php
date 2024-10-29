<div class="container-fluid">

    <!-- Card start -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-title">Post List <div class="card-title float-md-right" style="float:right"><a class="btn btn-success" href="<?php echo base_url('user/addPost'); ?>">Add Post</a></div></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basicExample" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post Type</th>
                        <th scope="col">Banner Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Sub Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Active</th>
                        <th scope="col">Is New</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($posts) && count($posts)>0){ 
                                $i=1;
                            foreach ($posts as $post) {

                            
                            $delete_style = ($post->is_active == '0')?"color: red":"";
                            $delete_msg = ($post->is_active == '0')?"Active":"Deactive";

                            $is_new_style = ($post->is_new == '0')?"color: red":"";
                            $is_new_msg = ($post->is_new == '0')?"add new":"remove new";
                            
                        ?>
                        <tr >
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $post->post_type_name; ?></td>
                            <td><img src="<?php echo base_url().$post->banner_img; ?>" width="50" height="50"></td>
                            <td><?php 
                            $string = $post->title;
                            if(strlen($string) > 25) $string = substr($string, 0, 25).'...';
                            echo $string;
                            ?></td>
                            <td><?php 
                            $string = $post->sub_title;
                            if(strlen($string) > 25) $string = substr($string, 0, 25).'...';
                            echo $string;
                            ?></td>
                            <td><?php 
                            
                                //echo html_entity_decode($post->description); ?> <?php //echo (strlen($post->description)>30)?"...":""; 

                            $string = strip_tags($post->description);
                            if(strlen($string) > 50) $string = substr($string, 0, 50).'...';
                            echo $string;

                            ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('user/editPost/'.$post->id) ?>"><span class="icon-edit"></span>
                                </a>
                            </td>
                            <td>                                                            
                                <a onclick="return confirm('Are you sure want to <?php echo $delete_msg; ?> this post ?')" href="<?php echo base_url('user/deletePost/'.$post->id) ?>" style="<?php echo  $delete_style; ?>"><span class="icon-trash"></span></a>
                            </td>
                            <td>                                                            
                                <a onclick="return confirm('Are you sure want to <?php echo $is_new_msg; ?> flag ?')" href="<?php echo base_url('user/newFlag/'.$post->id) ?>" style="<?php echo  $is_new_style; ?>"><span class="fs-3 icon-flag1"></span></a>
                            </td>
                        </tr>
                        <?php
                            $i++; }
                        }else{ 
                        ?>
                            <tr>
                            <td colspan="7">No Record Found</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<!-- Card end -->

   
</div>