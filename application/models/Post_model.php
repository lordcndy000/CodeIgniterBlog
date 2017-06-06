<?php

	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('posts_tbl.id', 'DESC');
				$this->db->join('categ_tbl', 'categ_tbl.c_id = posts_tbl.c_id');
				$query = $this->db->get('posts_tbl');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts_tbl', array('slug' => $slug));
			return $query->row_array();

		}

		public function create_post($post_image){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'c_id' => $this->input->post('category_id'),
				'user_id' => $this->session->userdata('user_id'), 
				'post_image' => $post_image
			);

			return $this->db->insert('posts_tbl', $data);
		}

		public function delete_post($id){
			$image_file_name = $this->db->select('post_image')->get_where('posts_tbl', array('id' => $id))->row()->post_image;
			$cwd = getcwd(); // save the current working directory
			$image_file_path = $cwd."\\assets\\img\\uploads";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd);
			$this->db->where('id', $id);
			$this->db->delete('posts_tbl');
			return true;
		}

		public function update_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'c_id' => $this->input->post('category_id')
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts_tbl', $data);
		}

		public function get_categories(){
			$this->db->order_by('c_name');
			$query = $this->db->get('categ_tbl');
			return $query->result_array();
		}

		public function get_posts_by_category($category_id){
			$this->db->order_by('posts_tbl.id', 'DESC');
			$this->db->join('categ_tbl', 'categ_tbl.c_id = posts_tbl.c_id');
			$query = $this->db->get_where('posts_tbl', array('posts_tbl.c_id' => $category_id));
			return $query->result_array();
		}

	}

?>