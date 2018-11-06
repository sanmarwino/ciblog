<?php
	class User_model extends CI_Model {

		public function register($enc_password) {
			$data = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
			);

			return $this->db->insert('users',$data);
		}
		
		public function login($username, $password) {
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1) {
				return $result->row(0)->id;
			} else {
				return false;
			}
		}

		public function check_username_exists($username) {
			$query = $this->db->get_where('users',array('username' => $username));

			if(empty($query->row_array())) { 
				return true;
			} else {
				return false;
			}
		}

		public function update_pw($enc_cur_password){
			$data = array ( // get data from create from
                'password' => md5($this->input->post('password')),
			);
			$this->db->where('username', $this->input->post('user'));
            $this->db->update('users', $data); // update data base //update('<table name>',$data)
		}

		// check_cur_pw_correct
		public function check_cur_pw_correct($enc_cur_pw) {
			$query = $this->db->get_where('users',array('username' =>  $this->input->post('user')));
			$query_order= $query->row_array();
			
			// return $query_order['password'];
			if ($enc_cur_pw==$query_order['password']) {
				return true;
			} else {
				return false;
			}
			
		}

	}