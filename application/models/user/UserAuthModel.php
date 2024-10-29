<?php
class UserAuthModel extends CI_Model
{

	public function login($email,$password){
        $data=array(
            'email'=>$email,
            'Password'=>$password
        );
        $query=$this->db->where($data);
        $login=$this->db->get('users');
        if($login!=NULL){
            return $login->row();
        } 
        return false;
    }
}