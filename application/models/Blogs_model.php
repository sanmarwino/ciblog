<?php
    class Blogs_model extends CI_Model {
        
        function __constructor() { //needed for hmvc
            parent::__constructor();
        }

        public function get_post($slug,$id) {
            $query = $this->db->query("SELECT * FROM posts WHERE slug='$slug' AND id='$id' ORDER BY created_at DESC"); 
            return ($query->result_array());  // pass the array to the controller
        }

        public function get_posts() {
            $this->load->database();
            $query = $this->db->query("SELECT * FROM posts WHERE post_status ='published' && deleted_status = 0  ORDER BY created_at DESC LIMIT 16"); 

            return ($query->result_array());  // pass the array to the controller
        }

        public function get_drafts($slug = FALSE, $limit = FALSE, $offset = FALSE) { 
            if($limit) {
                $this->db->limit($limit, $offset);
            }

            if ($slug === FALSE) { 
                $this->db->order_by('posts.id','DESC');
                $this->db->join('posts','categories.id = posts.category_id');
				$this->db->where( 'post_status', 'draft');
				$this->db->where( 'deleted_status', '0');
                $query = $this->db->get('categories');
                return $query->result_array();

            } else { // if slug name is has a value, query only one row
                $query = $this->db->get_where('posts',array('slug'=> $slug));// you use slug to query the data base
                return $query->row_array(); 
            }

        }

        function count($data) {
            $where = "post_status='$data' OR post_status=''";
            $this->db->where($where);
            $query = $this->db->get('posts');
            return count($query->result_array());
        }

        function count_del() {
            $where = "deleted_status='1'";
            $this->db->where($where);
            $query = $this->db->get('posts');
            return count($query->result_array());
        }

        public function get_deleted($slug = FALSE, $limit = FALSE, $offset = FALSE) { 
            if($limit) {
                $this->db->limit($limit, $offset);
            }

            if ($slug === FALSE) { 
                $this->db->order_by('posts.updated_at','DESC');
                $this->db->join('posts','categories.id = posts.category_id');
                $where = "deleted_status='1'";
                $this->db->where($where);
                $query = $this->db->get('categories');
                return $query->result_array();

            } else { // if slug name is has a value, query only one row
                $query = $this->db->get_where('posts',array('slug'=> $slug));// you use slug to query the data base
                return $query->row_array(); 
            }

        }
    }