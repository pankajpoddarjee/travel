<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendController extends CI_Controller {

	public function __construct() {
		parent::__construct(); 
		$this->load->model('FrontendModel', 'front');
	 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['posts'] = $this->front->get_all_post();
		$data['title'] = ucfirst('Home'); 
		$data['content'] = $this->load->view('welcome_message', $data, true);
        // Load the layout template
        $this->load->view('layout', $data);
	}
	public function postDetails($slug)
	{
		//$data['posts'] = $this->front->get_all_post();
		$data['post'] = $this->front->get_one_post($slug);

		//print_r($data['posts']);
		$data['title'] = ucfirst('Post Detail'); 
		$data['content'] = $this->load->view('post_detail', $data, true);
        // Load the layout template
        $this->load->view('layout', $data);
	}

	public function categotyPost($slug)
	{
		$data['post_type'] = $this->front->get_one_post_type($slug);

		$data['posts'] = $this->front->get_all_post_by_category($data['post_type']->id);
		$data['title'] = ucfirst('Home'); 
		$data['content'] = $this->load->view('category_post', $data, true);
        // Load the layout template
        $this->load->view('layout', $data);
	}

	public function suggestions() {
        $query = $this->input->get('search_query');
        if (!empty($query)) {
            // Perform your search logic here, e.g., querying the database
            $results = $this->front->searchSuggestions($query);

            // Return results as HTML or JSON
            foreach ($results as $result) {
                echo "<div>{$result->title}</div>"; // Adjust as needed
            }
        }
    }
}
