<?php

	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'full_name' => $this->input->post('name'),
				'zipcode' => $this->input->post('zipcode'),
				'user_name' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $enc_password
			);

			// Insert user
			return $this->db->insert('users_tbl', $data);
		}

		// Login
		public function login($username, $password){
			// Validate
			$this->db->where('user_name', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users_tbl');

			if($result->num_rows() == 1){
				return $result->row(0)->user_id;
			} else {
				return false;
			}
		}

		// Check username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('users_tbl', array('user_name' => $username));

			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users_tbl', array('email' => $email));

			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
	}

?>