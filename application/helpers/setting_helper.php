<?php
function get_settings_value($name){
	$CI = & get_instance();
	$CI->db->select('settings.value ');
	$CI->db->from('settings');
	$CI->db->where("settings.key", $name);
	$CI->db->order_by("settings.id", "asc");
	$query = $CI->db->get()->row_array();
	if(!empty($query)){
		return $query['value'];
	}else{
		return;
	}
}

function get_user_settings_value($name){
	$CI = & get_instance();
	$CI->db->select('user_settings.value ');
	$CI->db->from('user_settings');
	$CI->db->where("user_settings.user_id", $CI->session->userdata['uid']);
	$CI->db->where("user_settings.key", $name);
	$CI->db->order_by("user_settings.id", "asc");
	$query = $CI->db->get()->row_array();
	if(!empty($query)){
		return $query['value'];
	}else{
		return;
	}
}

function get_all_category(){
	$CI = & get_instance();
	$CI->db->select('*');
	$CI->db->from('post_type');
	$CI->db->where("is_active",1);
	$CI->db->order_by("post_type_name", "asc");
	$query = $CI->db->get()->result();
	if(!empty($query)){
		return $query;
	}else{
		return;
	}
}

function get_all_gallery_img_by_post_id($post_id){
	$CI = & get_instance();
	$CI->db->select('*');
	$CI->db->from('gallery');
	$CI->db->where("post_id",$post_id);
	$query = $CI->db->get()->result();
	if(!empty($query)){
		return $query;
	}else{
		return;
	}
}

