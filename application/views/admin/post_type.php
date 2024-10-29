<div class="container-fluid">

    <!-- Card start -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-title">Post Type List <div class="card-title float-md-right" style="float:right"><a class="btn btn-success" href="<?php echo base_url('admin/addPostType'); ?>">Add Post</a></div></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basicExample" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post Type</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($post_types) && count($post_types)>0){ 
                                $i=1;
                            foreach ($post_types as $post_type) {

                            
                            $delete_style = ($post_type->is_active == '0')?"color: red":"";
                            $delete_msg = ($post_type->is_active == '0')?"Active":"Deactive";
                            
                        ?>
                        <tr >
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $post_type->post_type_name; ?></td>
                            <td>
                                <a href="<?php echo base_url('admin/editPostType/'.$post_type->id) ?>"><span class="icon-edit"></span>
                                </a>&nbsp;&nbsp;&nbsp;
                                <a onclick="return confirm('Are you sure want to <?php echo $delete_msg; ?> this post ?')" href="<?php echo base_url('admin/deletePostType/'.$post_type->id) ?>" style="<?php echo  $delete_style; ?>"><span class="icon-trash"></span></a>
                        </td>
                        </tr>
                        <?php
                            $i++; }
                        }else{ 
                        ?>
                            <tr>
                            <td colspan="3">No Record Found</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<!-- Card end -->

   
</div>