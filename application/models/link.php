<?php
	class link extends CI_Model {

		public $short;
		public $full;

		public function get_url() 
		{
			$query = $this->db->get_where('query', array('short' => $_GET['url']));

			return $query->result();
		}

		public function insert() 
		{
			$this->short 	= $_POST['short'];
			$this->full 	= $_POST['full'];

			$query = $this->db->get_where('query', array('short' => $this->short));
			if ($query->result() != null)
				return false;	

			$this->db->insert('query', $this);
			return true;	
		}

	}