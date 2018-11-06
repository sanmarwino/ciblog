<?php //database
	class Post_model extends CI_Model {

		public function __construct() {
			$this->load->database(); // load the database
		}

		public function get_posts($id = FALSE, $limit = FALSE, $offset = FALSE) {
			if($limit) {
				$this->db->limit($limit, $offset);
			}
			
			if($id === FALSE) {
				$this->db->order_by('posts.id','DESC');
				$this->db->join('posts','categories.id = posts.category_id');
				$this->db->where( 'post_status', 'published');
				$this->db->where( 'deleted_status', '0');
				$query = $this->db->get('categories');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts',array('id'=> $id)); 

			return $query->row_array();
		}

		function count($data) {
			$where = "post_status='$data' OR post_status=''";
			$this->db->where('post_status', $data);
			$query = $this->db->get('posts');

			return count($query->result_array());
		}

		public function create_post($post_image) {
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'user_id' => $this->session->userdata('user_id'),
				'post_image' => $post_image,
				'created_at' => $this->db->query("SELECT NOW();")->row_array()['NOW()'],
				'meta_title' => $this->input->post('title'),
				'meta_description' => $this->input->post('meta_description'),
				'updated_at' => $this->db->query("SELECT NOW();")->row_array()['NOW()'],
				'author' => $this->input->post('author'),
				'post_status' => $this->input->post('post_status')
			);

			return $this->db->insert('posts',$data);
		}

		public function delete_post($id) {
			// $this->db->where('id',$id);
			// $this->db->delete('posts');

			$data = array(
				'deleted_status' => true,
			);

			$this->db->where('id', $id);
            $this->db->update('posts', $data);

			return true;
		}

		public function delete_post_in_db ($id) {// function that delete a row in database

		$del_image = $this->input->post('img_name'); // delete img from form
		$file = "C:/xampp/htdocs/projects/wg_integ3/assets/images/posts/".$del_image; // function that delete image on the folder
		unlink($file);// function that delete file from the source folder

		$this->db->where('id', $id);//perfrom delete
		$this->db->delete('posts');

		return 0;
		}

		public function update_post($post_image) {
			$slug = url_title($this->input->post('slug'));

			if ($post_image!='noimage.jpeg')// check if image was uploaded
            {    
                $del_image = $this->input->post('prev_image'); // del previous image during update
                $file = "C:/xampp/htdocs/projects/wg_integ3/assets/images/posts/".$del_image; // function that delete image on the folder
                unlink($file);// function that delete file from the source folder
            } else {    
                $post_image = $this->input->post('prev_image');
			}

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'updated_at' => $this->db->query("SELECT NOW();")->row_array()['NOW()'],
				'author' => $this->input->post('author'),
				'post_status' => $this->input->post('post_status'),
				'post_image' => $post_image,
			);
			$this->db->where('id', $this->input->post('id'));

			return $this->db->update('posts',$data);
		}

		public function get_categories() {
			$this->db->order_by('name');
			$query = $this->db->get('categories');

			return $query->result_array();
		}

		public function get_posts_by_category($category_id) {
			$this->db->order_by('posts.id','DESC');
			$this->db->join('categories','categories.id = posts.category_id');
			$query = $this->db->get_where('posts',array('category_id'=> $category_id));
			
			return $query->result_array();
		}

		public function check_if_deleted ($id) {

			$this->db->where('id', $id);
			$query = $this->db->get('posts');
			$clean_query = $query->result_array();

			return $clean_query[0]['deleted_status'];
		}

		public function check_post_status ($id) {

			$this->db->where('id', $id);
			$query = $this->db->get('posts');
			$clean_query = $query->result_array();

			return $clean_query[0]['post_status'];
		}

		public function restore($id) {
			$data = array(
				'deleted_status' => false,
			);

			$this->db->where('id', $id);
            $this->db->update('posts', $data);

			return true;
		}
	}