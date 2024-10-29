<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller {
 
   public function __construct() {
      parent::__construct(); 
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('user/UserAdminModel', 'user');

        if(!$this->session->userdata['isUserLoggedIn'])
        {
            redirect('login');
        }
 
   }
 
 
   public function index()
   {  //echo "ram"; die;
         $data['users'] = $this->user->get_all_users();
         $data['posts'] = $this->user->get_all_post();
         $data['active_users'] = $this->user->get_active_users();
         $data['active_posts'] = $this->user->get_active_post();
         //$this->load->view('admin/dashboard',$data);
 
         $data['title'] = ucfirst('dashboard'); // Capitalize the first letter
         $data['content'] = $this->load->view('user/dashboard', $data, true); // Load view content
 
         // Load the layout template
         $this->load->view('user/layout', $data);
   }

  public function users()
  { 
        $data['users'] = $this->user->get_all_users();
        //$this->load->view('admin/users',$data);

        $data['title'] = ucfirst('Users'); // Capitalize the first letter
        $data['content'] = $this->load->view('admin/users',$data, true); // Load view content

        // Load the layout template
        $this->load->view('admin/layout', $data);
  }

  public function addUser()
  { 
        $this->load->view('admin/save_user');
  }

  public function editUser($id)
  { 
    $data['user'] = $this->user->get_one_user($id);
    $this->load->view('admin/save_user',$data);
  }

  public function deleteUser($id)
  { 
    $record = $this->user->get_one_user($id);
    $status = $record->is_active;

    $updateData['is_active'] = ($status==1)?0:1;
    $delete = $this->user->delete_user($id,$updateData);
    if($delete){
        $this->session->set_flashdata('success', 'Status updated successfully');
    }else{
        $this->session->set_flashdata('error', 'Status not changed');
    } 
    redirect(base_url('admin/users'));
  }

  public function saveUser()
  {     
        if(empty($this->input->post('user_id'))){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','Name','trim|required|min_length[3]|max_length[16]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_user_email');
            $this->form_validation->set_rules('mobile','Mobile','trim|required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]');
           
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admin/save_user');
                
            } else { 
                    $userData['name'] = $this->input->post('name');
                    $userData['email'] = $this->input->post('email');
                    $userData['mobile'] = $this->input->post('mobile');
                    $userData['password'] =  $this->input->post('password');

                    $userData['is_active'] = 1;
                    $inserted_id   =  $this->user->insert_user_data($userData);

                    if($inserted_id){
                        $this->session->set_flashdata('success', 'User saved successfully');
                    }else{
                        $this->session->set_flashdata('error', 'User not saved');
                    } 
                    
                    redirect(base_url('admin/addUser'));
                    
            }
        }else{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name','Name','trim|required|min_length[3]|max_length[16]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_user_email');
            $this->form_validation->set_rules('mobile','Mobile','trim|required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]');
           
            if ($this->form_validation->run() == FALSE)
            {
                $data['user'] = $this->user->get_one_user($this->input->post('user_id'));
                $this->load->view('admin/save_user',$data);
                
            } else { 
                    $userData['name'] = $this->input->post('name');
                    $userData['email'] = $this->input->post('email');
                    $userData['mobile'] = $this->input->post('mobile');
                    $userData['password'] =  $this->input->post('password');  
                   
                    $user_id = $this->input->post('user_id');
                    $is_exist = $this->user->check_email_exist($this->input->post('email'));
                    if($is_exist){
                        $data['email_exist_err'] = 'This email already registered';
                        $this->load->view('admin/save_user'); return;
                    }
                    $updated   =  $this->user->update_user_data($user_id,$userData);
                    
                    
                    if($updated){
                        $this->session->set_flashdata('success', 'User updated successfully');
                    }else{
                        $this->session->set_flashdata('error', 'User not updated');
                    } 
                   
                    redirect(base_url('admin/editUser/'.$user_id));
            }
        }
        
  }

    function check_user_email($email) {        
        if($this->input->post('user_id'))
            $id = $this->input->post('user_id');
        else
            $id = '';
        $result = $this->user->check_unique_user_email($id, $email);
        if($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_user_email', 'Email must be unique');
            $response = false;
        }
        return $response;
    }


    public function postType()
    { 
        $data['post_types'] = $this->user->get_all_post_type_master();
        $data['title'] = ucfirst('Post Type'); 
        $data['content'] = $this->load->view('user/post_type', $data, true); 
        $this->load->view('user/layout', $data);
    }
    public function addPostType()
    { 
        $this->load->view('admin/save_post_type');
    }
    public function editPostType($id)
    {  
        $data['post_type'] = $this->user->get_one_post_type($id);
        $this->load->view('admin/save_post_type',$data);
    }
    public function deletePostType($id)
    { 
        $record = $this->user->get_one_post_type($id);
        $status = $record->is_active;
        $updateData['is_active'] = ($status==1)?0:1;
        $delete = $this->user->delete_post_type($id,$updateData);
        if($delete){
            $this->session->set_flashdata('success', 'Status updated successfully');
        }else{
            $this->session->set_flashdata('error', 'Status not changed');
        } 
        redirect(base_url('admin/postType'));
    }

    public function savePostType()
    {     
        if(empty($this->input->post('post_type_id'))){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('post_type_name','Post Type Name','trim|required|min_length[3]|max_length[16]');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('admin/save_post_type');
                
            } else { 
                    $postTypeData['post_type_name'] = $this->input->post('post_type_name');
                    $postTypeData['is_active'] = 1;
                    $inserted_id   =  $this->user->insert_post_type_data($postTypeData);
                    
                    if($inserted_id){
                        $this->session->set_flashdata('success', 'Post type saved successfully');
                    }else{
                        $this->session->set_flashdata('error', 'Post type not saved');
                    } 
                    redirect(base_url('admin/addPostType'));
                   
            }
        }else{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('post_type_name','Post Type Name','trim|required|min_length[3]|max_length[16]');
            
            if ($this->form_validation->run() == FALSE)
            {
                $data['post_type'] = $this->user->get_one_post_type($this->input->post('post_type_id'));
                $this->load->view('admin/save_post_type',$data);
                
            } else { 
                    $postTypeData['post_type_name'] = $this->input->post('post_type_name');
                    $post_type_id = $this->input->post('post_type_id');
                    $updated   =  $this->user->update_post_type_data($post_type_id,$postTypeData);
                    if($updated){
                        $this->session->set_flashdata('success', 'Post type updated successfully');
                    }else{
                        $this->session->set_flashdata('error', 'Post type not updated');
                    } 
                    redirect(base_url('admin/editPostType/'.$post_type_id));
            }
        }   
            
    }

    public function post()
    { 
            $data['posts'] = $this->user->get_all_post();
            //echo "<pre>";print_r($data); die;
           // $this->load->view('admin/posts', $data);

            $data['title'] = ucfirst('Posts'); // Capitalize the first letter
            $data['content'] = $this->load->view('user/posts', $data, true); // Load view content
    
            // Load the layout template
            $this->load->view('user/layout', $data);
    }

  public function addPost()
  { 
        $data['post_type'] = $this->user->get_all_post_type();
        //$this->load->view('admin/save_post', $data);

        $data['title'] = ucfirst('Add Post'); // Capitalize the first letter
        $data['content'] = $this->load->view('user/save_post', $data, true); // Load view content

        $this->load->view('user/layout', $data);
  }

  public function editPost($id)
  { 
    $data['post'] = $this->user->get_one_post($id);
    $data['post_gallery_image'] = $this->user->get_gallery_image_by_post_id($id);
    $data['post_type'] = $this->user->get_all_post_type();
    //$this->load->view('admin/save_post',$data);

    $data['title'] = ucfirst('Edit Post'); // Capitalize the first letter
    $data['content'] = $this->load->view('user/save_post', $data, true); // Load view content
    $this->load->view('user/layout', $data);
  }

  public function deletePost($id)
  { 
    $record = $this->user->get_one_post($id);
    $status = $record->is_active;

    $updateData['is_active'] = ($status==1)?0:1;
    $delete = $this->user->delete_post($id,$updateData);
    if($delete){
    $this->session->set_flashdata('success', 'Post deleted successfully');
    }else{
        $this->session->set_flashdata('error', 'Post not deleted');
    } 
    redirect(base_url('user/post'));
  }
  public function savePost()
  { 
       
        //if(empty($this->input->post('post_id'))){ //OPEN ADD NEW PROCESS
            $this->load->library('form_validation');
            $this->form_validation->set_rules('post_type','Post Type','trim|required');
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('sub_title','Sub Title','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            // if (empty($_FILES['banner_img']['name']))
            // {
            //     $this->form_validation->set_rules('banner_img', 'Banner Image', 'required');
            // }
            
            if ($this->form_validation->run() == FALSE)
            {
                $data['post_type'] = $this->user->get_all_post_type();
                //$this->load->view('user/save_post',$data);
               
                $title = empty($this->input->post('post_id'))?'Add Post':'Edit Post';
                $data['title'] = ucfirst($title); // Capitalize the first letter
                $data['content'] = $this->load->view('user/save_post',$data, true); // Load view content
                $this->load->view('user/layout', $data);
                
            } else { 
                    if (!empty($_FILES['banner_img']['name'])){ 
                        if(!empty($this->input->post('post_id'))){
                            $postDataByID =  $this->db->get_where('posts', ['id' => $this->input->post('post_id')])->row();
                            if($postDataByID){
                                if (file_exists($postDataByID->banner_img)) {
                                    unlink($postDataByID->banner_img);
                                }
                            }
                        }
                        $uploadPath = "assets/uploads/banner_image/";
                        $config = array(
                            'upload_path' => $uploadPath,
                            'allowed_types' => "jpg|png|jpeg|gif",
                            'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
                            'file_name' => microtime().'-'.$_FILES['banner_img']['name'], 
                            
                        );
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('banner_img')) {
                            //echo $this->upload->data('file_name'); die;
                            $postData['banner_img'] = $uploadPath.$this->upload->data('file_name');
                        }else{
                        echo  $this->upload->display_errors();   die;
                        }
                    }
                    if (!empty($_FILES['attachment']['name'])){ 
                        $attachmentUploadPath = "assets/uploads/attachments/";
                        $config = array(
                            'upload_path' => $attachmentUploadPath,
                            'allowed_types' => "jpg|jpeg|pdf",
                            'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
                            'file_name' => microtime().'-'.$_FILES['attachment']['name'], 
                            
                        );
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('attachment')) {
                            //echo $this->upload->data('file_name'); die;
                            $postData['attachment'] = $attachmentUploadPath.$this->upload->data('file_name');
                        }else{ //echo "poddar"; die;
                            $data['post_type'] = $this->user->get_all_post_type();
                            $data['attachment_err'] =$this->upload->display_errors();
                            //echo $this->upload->display_errors(); die;
                            //print_r($data); die;
                            $this->load->view('user/save_post',$data); return;
                        }
                    }
                    
                    $postData['tags'] = $this->input->post('tags');
                    $postData['post_type'] = $this->input->post('post_type');
                    $postData['title'] = $this->input->post('title');
                    $postData['sub_title'] = $this->input->post('sub_title');
                    $postData['description'] =  $this->input->post('description');
                    $postData['event_date'] =  !empty($this->input->post('event_date')) ? $this->input->post('event_date'):NULL;
                    $postData['publish_date'] =  !empty($this->input->post('publish_date'))?$this->input->post('publish_date'):NULL;
                    $postData['is_new'] =  !empty($this->input->post('is_new'))?$this->input->post('is_new'):NULL;
                    $postData['is_active'] = 1;
                    //echo "<pre>"; print_r($postData); die;
                    

                    if(empty($this->input->post('post_id'))){
                        $post_id   =  $this->user->insert_post_data($postData);
                        $slug =  $this->input->post('slug')."-".$post_id;
                        $this->user->update_slug('posts',$post_id,$slug);
                    }else{
                        $post_id = $this->input->post('post_id');
                        $is_update   =  $this->user->update_post_data($post_id,$postData);
                    }
                    if($post_id){
                        // if (!empty($_FILES['gallery_img']['name'])){ 
                        if (!empty($_FILES['gallery_img']['name'][0]) && isset($_FILES['gallery_img']['name'])){ 
                            if(!empty($this->input->post('post_id'))){
                                // $galleryData= $this->user->get_gallery_image_by_post_id($post_id);
                                // if($galleryData){
                                //     foreach ($galleryData as $gallery) {
                                //         if($gallery->gallery_img){
                                //             if (file_exists($gallery->gallery_img)) {
                                //                 unlink($gallery->gallery_img);
                                //             }
                                //         }
                                //     }
                                // }
                                $this->user->delete_gallery_data($post_id);
                            }

                            $uploadPathGallery = "assets/uploads/gallery_image/";
                            $count = count($_FILES['gallery_img']['name']); 
                            for($i=0;$i<$count;$i++){ 
                                if(!empty($_FILES['gallery_img']['name'][$i])){  
        
                                    $_FILES['file']['name'] = $_FILES['gallery_img']['name'][$i];  
                                    $_FILES['file']['type'] = $_FILES['gallery_img']['type'][$i];  
                                    $_FILES['file']['tmp_name'] = $_FILES['gallery_img']['tmp_name'][$i];  
                                    $_FILES['file']['error'] = $_FILES['gallery_img']['error'][$i];  
                                    $_FILES['file']['size'] = $_FILES['gallery_img']['size'][$i];  
                                    
                                    $config = array(
                                        'upload_path' => $uploadPathGallery,
                                        'allowed_types' => "jpg|png|jpeg|gif",
                                        'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
                                        'file_name' => microtime().'-'.$_FILES['gallery_img']['name'][$i], 
                                    );
                                
                                    $this->load->library('upload', $config);
                                    $this->upload->initialize($config);
                                    if ($this->upload->do_upload('file')) { 
                                        //$postData['gallery_img'][] = $uploadPath.$this->upload->data('file_name');
                                        $data=array(
                                            'gallery_img'=>$uploadPathGallery.$this->upload->data('file_name'),
                                            'post_id'=>$post_id
                                        ); 
                                        $this->user->insert_gallery_data($data);
                                    }else{
                                        
                                        echo  $this->upload->display_errors();  
                                    }
                                }
                            }
                        }

                        $this->session->set_flashdata('success', 'Post saved successfully');
                    }else{
                        $this->session->set_flashdata('error', 'Post not Inserted');
                    } 
                    if(empty($this->input->post('post_id'))){
                        redirect(base_url('user/addPost'));
                    }else{
                        redirect(base_url('user/editPost/'.$this->input->post('post_id')));
                    }
                        
            
            } 
        // }else{  // OPEN EDIT PROCESS 
        //     $post_id = $this->input->post('post_id');
        //     $this->load->library('form_validation');
        //     $this->form_validation->set_rules('title','Title','required');
        //     $this->form_validation->set_rules('sub_title','Sub Title','required');
        //     $this->form_validation->set_rules('description','Description','required');
            
            
        //     if ($this->form_validation->run() == FALSE)
        //     {
        //         $data['post'] = $this->user->get_one_post($post_id);
        //         $data['post_gallery_image'] = $this->user->get_gallery_image_by_post_id($post_id);
        //         $data['post_type'] = $this->user->get_all_post_type();
        //         $this->load->view('user/save_post',$data);
                
        //     } else { 
        //             if (!empty($_FILES['banner_img']['name'])){ 
        //                 $postDataByID =  $this->db->get_where('posts', ['id' => $post_id])->row();
        //                 if($postDataByID){
        //                     unlink($postDataByID->banner_img);
        //                 }
        //                 $uploadPath = "assets/uploads/banner_image/";
        //                 $config = array(
        //                     'upload_path' => $uploadPath,
        //                     'allowed_types' => "jpg|png|jpeg|gif",
        //                     'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
        //                     'file_name' => microtime().'-'.$_FILES['banner_img']['name'], 
                            
        //                 );
        //                 $this->load->library('upload', $config);
        //                 $this->upload->initialize($config);
        //                 if ($this->upload->do_upload('banner_img')) {
        //                     //echo $this->upload->data('file_name'); die;
        //                     $postData['banner_img'] = $uploadPath.$this->upload->data('file_name');
        //                 }else{
        //                 echo  $this->upload->display_errors();   die;
        //                 }
        //             }
        //             if (!empty($_FILES['attachment']['name'])){ 
        //                 $attachmentUploadPath = "assets/uploads/attachments/";
        //                 $config = array(
        //                     'upload_path' => $attachmentUploadPath,
        //                     'allowed_types' => "jpg|jpeg|pdf",
        //                     'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
        //                     'file_name' => microtime().'-'.$_FILES['attachment']['name'], 
                            
        //                 );
        //                 $this->load->library('upload', $config);
        //                 $this->upload->initialize($config);
        //                 if ($this->upload->do_upload('attachment')) {
        //                     //echo $this->upload->data('file_name'); die;
        //                     $postData['attachment'] = $attachmentUploadPath.$this->upload->data('file_name');
        //                 }else{ //echo "poddar"; die;
        //                     $data['post_type'] = $this->user->get_all_post_type();
        //                     $data['attachment_err'] =$this->upload->display_errors();
        //                     //echo $this->upload->display_errors(); die;
        //                     //print_r($data); die;
        //                     $this->load->view('user/save_post',$data); return;
        //                 }
        //             }
        //             $postData['slug'] =  $this->create_slug($this->input->post('title'));
        //             $postData['post_type'] = $this->input->post('post_type');
        //             $postData['title'] = $this->input->post('title');
        //             $postData['sub_title'] = $this->input->post('sub_title');
        //             $postData['description'] =  $this->input->post('description');
        //             $postData['event_date'] =  !empty($this->input->post('event_date')) ? $this->input->post('event_date'):NULL;
        //             $postData['publish_date'] =  !empty($this->input->post('publish_date'))?$this->input->post('publish_date'):NULL;
        //             $postData['is_new'] =  !empty($this->input->post('is_new'))?$this->input->post('is_new'):NULL;
        //             //echo "<pre>"; print_r($postData); die;
        //             $is_update   =  $this->user->update_post_data($post_id,$postData);
        //             if($is_update){ //echo "<pre>";print_r($_FILES['gallery_img']['name']);
        //                 if (!empty($_FILES['gallery_img']['name'][0]) && isset($_FILES['gallery_img']['name'])){  
        //                     $this->user->delete_gallery_data($post_id);
        //                     $uploadPathGallery = "assets/uploads/gallery_image/";
        //                     $count = count($_FILES['gallery_img']['name']); 
        //                     for($i=0;$i<$count;$i++){ 
        //                         if(!empty($_FILES['gallery_img']['name'][$i])){  
        
        //                             $_FILES['file']['name'] = $_FILES['gallery_img']['name'][$i];  
        //                             $_FILES['file']['type'] = $_FILES['gallery_img']['type'][$i];  
        //                             $_FILES['file']['tmp_name'] = $_FILES['gallery_img']['tmp_name'][$i];  
        //                             $_FILES['file']['error'] = $_FILES['gallery_img']['error'][$i];  
        //                             $_FILES['file']['size'] = $_FILES['gallery_img']['size'][$i];  
                                    
        //                             $config = array(
        //                                 'upload_path' => $uploadPathGallery,
        //                                 'allowed_types' => "jpg|png|jpeg|gif",
        //                                 'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
        //                                 'file_name' => microtime().'-'.$_FILES['gallery_img']['name'][$i], 
        //                             );
                                
        //                             $this->load->library('upload', $config);
        //                             $this->upload->initialize($config);
        //                             if ($this->upload->do_upload('file')) { 
        //                                 //$postData['gallery_img'][] = $uploadPath.$this->upload->data('file_name');
        //                                 $data=array(
        //                                     'gallery_img'=>$uploadPathGallery.$this->upload->data('file_name'),
        //                                     'post_id'=>$post_id
        //                                 ); 
        //                                 $this->user->insert_gallery_data($data);
        //                             }else{
                                        
        //                                 echo  $this->upload->display_errors();  
        //                             }
        //                         }
        //                     }
        //                 }

        //                 $this->session->set_flashdata('success', 'Post updated successfully');
        //             }else{
        //                 $this->session->set_flashdata('error', 'Post not updated');
        //             } 
        //             redirect(base_url('user/editPost/'.$post_id));
                        
            
        //     } 
        // }
  }

  public function testimonial()
  { 
        $data['testimonials'] = $this->user->get_all_testimonial();
   
        $this->load->view('admin/testimonial', $data);
  }
  public function ckeditor()
  { 
      $this->load->view('admin/ckeditor');
  }

    public function logout(){ 
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->sess_destroy(); 
        redirect('login'); 
    } 
    public function changePassword(){
        //$this->load->view('admin/change_password');	
        $data['title'] = ucfirst('Change Password'); // Capitalize the first letter
        $data['content'] = $this->load->view('user/change_password', $data, true); // Load view content

        // Load the layout template
        $this->load->view('user/layout', $data);
    }
    public function updatePassword(){
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('new_password','New Password','trim|required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
            if($this->form_validation->run() == true){
                $user_id = $this->session->userdata['uid'];
                $password = $this->input->post('password');

                $validate=$this->user->verify_user_password($user_id,$password);
                if($validate){
                    $data['password'] = $this->input->post('confirm_password');
                    $update=$this->user->update_password($user_id,$data);
                    if($update){ 
                        $this->session->set_flashdata('success','password changed successfully.');
                        redirect('user/changePassword');
                    } else {
                        $this->session->set_flashdata('error','Password not Changed');
                        redirect('user/changePassword');
                    }
                }else{
                    $this->session->set_flashdata('error','Your current password is wrong');
                    redirect('user/changePassword');
                }

            } else{ 
              //$this->load->view('user/change_password');	

                $data['title'] = ucfirst('dashboard'); // Capitalize the first letter
                $data['content'] = $this->load->view('user/change_password', $data, true); // Load view content

                // Load the layout template
                $this->load->view('user/layout', $data);
            }
    }

    public function account()
    { 
            $data['user'] = $this->user->get_one_user($this->session->userdata['uid']);
            //$this->load->view('user/account',$data);

            $data['title'] = ucfirst('Account Detail'); // Capitalize the first letter
            $data['content'] = $this->load->view('user/account', $data, true); // Load view content
    
            // Load the layout template
            $this->load->view('user/layout', $data);
    }
    public function updateAccount()
    { 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required|min_length[3]|max_length[16]');       
        $this->form_validation->set_rules('mobile','Mobile','trim|required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]');
       
        if ($this->form_validation->run() == FALSE)
        {
            $data['user'] = $this->user->get_one_user($this->session->userdata['uid']);
            $data['title'] = ucfirst('Account Detail'); // Capitalize the first letter
            $data['content'] = $this->load->view('user/account', $data, true); // Load view content
    
            // Load the layout template
            $this->load->view('user/layout', $data);
            
        } else { 
                $userData['name'] = $this->input->post('name');
                $userData['mobile'] = $this->input->post('mobile');    
                $user_id = $this->session->userdata['uid'];
                $updated   =  $this->user->update_user_data($user_id,$userData);
               
                
                if($updated){
                    $this->session->set_flashdata('success', 'Account updated successfully');
                }else{
                    $this->session->set_flashdata('error', 'User not saved');
                } 
               
                redirect(base_url('user/account'));
             
        }
           
    }


    public function create_slug($title)
    { 
        $table='posts';    //Write table name
        $field='slug';         //Write field name
        $slug = $title;  //Write title for slug
        $slug = url_title($title);
        $key=NULL;
        $value=NULL;       
        $i = 0;
        $params = array ();
        $params[$field] = $slug;

        if($key)$params["$key !="] = $value;

        while ($this->db->from($table)->where($params)->get()->num_rows())
        {  
            if (!preg_match ('/-{1}[0-9]+$/', $slug ))
            $slug .= '-' . ++$i;
            else
            $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
            $params [$field] = $slug;
        }  

        return $alias=$slug;
    }

    public function newFlag($id)
    { 
      $record = $this->user->get_one_post($id);
      $status = $record->is_new;
  
      $updateData['is_new'] = ($status==1)?0:1;
      $delete = $this->user->update_new_flag($id,$updateData);
      if($delete){
      $this->session->set_flashdata('success', 'New flag updated successfully');
      }else{
          $this->session->set_flashdata('error', 'New flag not updated');
      } 
      redirect(base_url('admin/post'));
    }

    public function settings(){
        //$this->load->view('admin/change_password');	
        $data['title'] = ucfirst('Settings'); // Capitalize the first letter
        $data['content'] = $this->load->view('user/settings', $data, true); // Load view content

        // Load the layout template
        $this->load->view('user/layout', $data);
    }

    public function updateSettings()
    { 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('application_name','Application Name','trim|required|min_length[3]|max_length[16]');       
        $this->form_validation->set_rules('application_slogan','Application Slogan','trim|required');
       
        if ($this->form_validation->run() == FALSE)
        {
            $data['user'] = $this->user->get_one_user($this->session->userdata['uid']);
            $data['title'] = ucfirst('Settings'); // Capitalize the first letter
            $data['content'] = $this->load->view('user/settings', $data, true); // Load view content
    
            // Load the layout template
            $this->load->view('user/layout', $data);
            
        } else { 
                $settingsData = [];
                if (!empty($_FILES['application_logo']['name'])){ 
                    $logo =  $this->input->post('logo');
                    if(!empty($logo)){                        
                        if (file_exists('assets/uploads/images/'.$logo)) {
                            unlink('assets/uploads/images/'.$logo);
                        }
                    }
                    $uploadPath = "assets/uploads/images/";
                    $config = array(
                        'upload_path' => $uploadPath,
                        'allowed_types' => "jpg|png|jpeg|gif",
                        'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
                        'file_name' => microtime().'-'.$_FILES['application_logo']['name'], 
                        
                    );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('application_logo')) {
                        //echo $this->upload->data('file_name'); die;
                       $settingsData['application_logo'] = $this->upload->data('file_name'); 
                    }else{
                    echo  $this->upload->display_errors();   die;
                    }
                }
                if (!empty($_FILES['application_favicon']['name'])){ 
                    $favicon =  $this->input->post('favicon');
                    if(!empty($favicon)){                        
                        if (file_exists('assets/uploads/images/'.$favicon)) {
                            unlink('assets/uploads/images/'.$favicon);
                        }
                    }
                    $uploadPath = "assets/uploads/images/";
                    $config = array(
                        'upload_path' => $uploadPath,
                        'allowed_types' => "jpg|png|jpeg|gif",
                        'max_size' => "1024000", // file size , here it is 1 MB(1024 Kb)
                        'file_name' => microtime().'-'.$_FILES['application_favicon']['name'], 
                        
                    );
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('application_favicon')) {
                        //echo $this->upload->data('file_name'); die;
                       $settingsData['application_favicon'] = $this->upload->data('file_name'); 
                    }else{
                    echo  $this->upload->display_errors();   die;
                    }
                }
                $settingsData['application_name'] = $this->input->post('application_name');
                $settingsData['application_slogan'] = $this->input->post('application_slogan');   
                //$settingsData['application_logo'] = $this->input->post('application_logo');
                //$settingsData['application_favicon'] = $this->input->post('application_favicon');  
                $settingsData['application_email'] = $this->input->post('application_email');
                $settingsData['system_email'] = $this->input->post('system_email');  
                $settingsData['address'] = $this->input->post('address');
                $settingsData['country'] = $this->input->post('country');  
                $settingsData['state'] = $this->input->post('state');
                $settingsData['city'] = $this->input->post('city');  
                $settingsData['zip'] = $this->input->post('zip');
                $settingsData['theme_color'] = $this->input->post('theme_color'); 
                $settingsData['timezone'] = $this->input->post('timezone');   
                //echo "<pre>"; print_r($settingsData);die;
                $updated   =  $this->user->update_settings_data($settingsData);
                if($updated){
                    $this->session->set_flashdata('success', 'Settings saved successfully');
                }else{
                    $this->session->set_flashdata('error', 'Settings not saved');
                } 
                redirect(base_url('user/settings'));
             
        }
           
    }
    
}