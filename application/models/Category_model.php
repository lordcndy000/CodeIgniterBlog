<?php

	class Category_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_categories(){
			$this->db->order_by('c_name');
			$query = $this->db->get('categ_tbl');
			return $query->result_array();
		}

		public function create_category(){
			$data = array(
				'c_name' => $this->input->post('name'),
				'user_id' => $this->session->userdata('user_id')
			);

			return $this->db->insert('categ_tbl', $data);
		}

		public function get_category($id){
			$query = $this->db->get_where('categ_tbl', array('c_id' => $id));
			return $query->row();
		}

		public function delete_category($id){
			$this->db->where('c_id', $id);
			$this->db->delete('categ_tbl');
			return true;
		}
	}

?>