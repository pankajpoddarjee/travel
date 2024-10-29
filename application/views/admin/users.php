<div class="container-fluid">

    <!-- Card start -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="card-title">Users List</div><div class="card-title text-right"><a class="btn btn-success" href="<?php echo base_url('admin/addUser'); ?>">Add User</a></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basicExample" class="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($users) && count($users)>0){ 
                                $i=1;
                            foreach ($users as $user) {
                            $delete_style = ($user->is_active == '0')?"color: red":"";
                            $delete_msg = ($user->is_active == '0')?"Active":"Deactive";
                        ?>
                        <tr>
                        <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->mobile; ?></td>
                            <td>
                            
                                <a class="btn btn-primary" href="<?php echo base_url('admin/editUser/'.$user->id) ?>"><span class="icon-edit"></span></a>
                                <a style="<?php echo  $delete_style; ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to <?php echo $delete_msg; ?> this user ?')" href="<?php echo base_url('admin/deleteUser/'.$user->id) ?>"><span class="icon-trash"></span></a>
                            </td>
                        </tr>
                        <?php
                            $i++; }
                        }else{ 
                        ?>
                            <tr>
                            <td colspan="6">No Record Found</td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	<!-- Card end -->

   
</div>