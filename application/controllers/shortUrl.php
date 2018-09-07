<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class shorturl extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('link');
		if (isset($_GET['url']) && $_GET['url'] != null)
		{
			$data = $this->link->get_url();
			if ($data != null)
				header('Location: ' . $data[0]->full);
		}


		$this->load->view('shorturl');
	}

	public function save()
	{
		$this->load->model('link');

		$_POST['short'] = $this->random_str(6);
		
		while(true){
			if($this->link->insert())
				break;	
		}
		
		echo 'http://' . base_url() . '?url=' . $_POST['short'];
	}

	private function random_str($length) {
	 
		$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789=_";
		
		srand((double)microtime()*1000000); 
		
		$random = '';
		
		for ($i = 0; $i < $length; $i++) {  
			$random .= $characters[rand() % strlen($characters)];  
		}
		
		return $random;  
	}
}
