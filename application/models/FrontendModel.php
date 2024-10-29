<?php
class FrontendModel extends CI_Model
{

	public function get_all_post()
	{
		//$result = $this->db->get_where('posts')->result();
       // $result =$this->db->get_where('posts', ['is_active' => 1])->result();
		//return $result;

        $this->db->select("posts.*,post_type.post_type_name");

        $this->db->from("posts");

        $this->db->join("post_type", "posts.post_type=post_type.id");

       // $this->db->where(['posts.is_active' => 1]);

        $qry = $this->db->get();

        $res= $qry->result();

        return $res;
	}

    public function get_one_post($slug)
	{
		//$result = $this->db->get_where('posts')->result();
        $result =  $this->db->get_where('posts', ['slug' => $slug])->row();
		return $result;
	}

    public function get_one_post_type($slug)
	{
		//$result = $this->db->get_where('posts')->result();
        $result =  $this->db->get_where('post_type', ['slug' => $slug])->row();
		return $result;
	}

    public function get_all_post_by_category($post_type_id)
	{
		
        $this->db->select("posts.*,post_type.post_type_name");
        $this->db->from("posts");
        $this->db->join("post_type", "posts.post_type=post_type.id");
        $this->db->where(['posts.is_active' => 1]);
        $this->db->where(['post_type.id' => $post_type_id]);
        $qry = $this->db->get();

        $res= $qry->result();

        return $res;
	}

    public function searchSuggestions($string)
    {
        $this->db->select("posts.*, post_type.post_type_name");
        $this->db->from("posts");
        $this->db->join("post_type", "posts.post_type = post_type.id");
        $this->db->like('posts.title', $string, 'both'); // Match anywhere in the title
        $this->db->where(['posts.is_active' => 1]);
        $this->db->where(['post_type.is_active' => 1]);
        $qry = $this->db->get();

        $res = $qry->result();

        return $res;
    }
}