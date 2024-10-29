<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserAuth extends CI_Controller {
 
   public function __construct() {
      parent::__construct(); 
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('user/UserAuthModel', 'auth');
 
   }
 
   /*
      Display all records in page
   */
 
  public function index()
  {
    // echo "poddar";die;
    // $data['projects'] = $this->project->get_all();
      $data['title'] = "Login";
    // $this->load->view('layout/header');       
    // $this->load->view('project/index',$data);
    //  $this->load->view('layout/footer');

    $this->load->view('login', $data);
  }
 
  public function login1()
  {
        $username = $this->input->post('username');  
        $password = $this->input->post('password'); 
        if (!empty($user) && !empty($pass))   
        {  
          $result = $this->db->get_where($table, ['username' => $username])->row();
            $this->session->set_userdata(array('user'=>$user));  
            $this->load->view('welcome_view');  
        }  
        else{  
            $data['error'] = 'Your Account is Invalid';  
            $this->load->view('login_view', $data);  
        } 
  }


  public function login(){ 
        //Validation for login form

        //echo "<pre>"; print_r($this->input->post());
      $this->form_validation->set_rules('username','Username','trim|required|valid_email');
      $this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[15]');
          if($this->form_validation->run() == true){
          $username=$this->input->post('username');
          $password=$this->input->post('password');
          
          $validate=$this->auth->login($username,$password);
              if($validate){  
                  $this->session->set_userdata('uid',$validate->id);	
                  $this->session->set_userdata('name',$validate->name);	
                  $this->session->set_userdata('email',$validate->email);	
                  $this->session->set_userdata('mobile',$validate->mobile);	
                  $this->session->set_userdata('isUserLoggedIn',TRUE);	
                  redirect('user/dashboard');
              } else {
                
                  $this->session->set_flashdata('error','Invalid login details.Please try again.');
                  redirect('login');
              }
          } else{ 
            $this->load->view('login');	
          }
    }

    public function signup(){
      //Validation for login form
    $this->form_validation->set_rules('username','Username','trim|required|valid_email');
    $this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[15]');
        if($this->form_validation->run() == true){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
        $validate=$this->auth->login($username,$password);
            if($validate){ 
                $this->session->set_userdata('uid',$validate->id);	
                $this->session->set_userdata('name',$validate->name);	
                $this->session->set_userdata('email',$validate->email);	
                $this->session->set_userdata('mobile',$validate->mobile);	
                $this->session->set_userdata('isUserLoggedIn',TRUE);	
                redirect('user/dashboard');
            } else {
              //echo "ram"; die;
                $this->session->set_flashdata('error','Invalid login details.Please try again.');
                redirect('signup');
            }
        } else{ //echo "dfdsfs"; die;
          $this->load->view('signup');	
        }
  }

   
 
}