<?php
	class Main_model extends CI_Model {

		public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		public function authenticate($username, $password) {
			$query = $this->db->query("SELECT * FROM users WHERE username = '" . $username . "'");
		
			$row = $query->row_array();

			if (isset($row)) {
				if($row['activated'] == 0){
					$_SESSION['unvertify'] = true;

					return FALSE;
				}
				if($password == $row['password']){
					return TRUE;
				} else{
					echo "<style> #passwordInvalid1{display: block;} </style>";
					return FALSE;
				}
			} else {
				echo "<style> #usernameInvalid{display: block;} </style>";
				return FALSE;
			}
		}

		public function new_account($username, $password, $phone, $email, $address, $suburb, $state, $postcode) {
			$data = array(
				'username' => $username,
				'password' => $password,
				'phoneNumber' => $phone,
				'email' => $email,
				'address' => $address,
				'suburb' => $suburb,
				'state' => $state,
				'postCode' => $postcode
			);
			$userValid = $this->check_signup_username($username);
			$emailValid = $this->check_signup_email($email);
			if($userValid == 2 && $emailValid == 2){
				return $this->db->insert('users', $data);
			}else{
				return 0;
			}
		}


		public function check_signup_username($username){
			$username_query = $this->db->query("SELECT * FROM users WHERE username = '" . $username . "'");
			$row = $username_query->row_array();
			if(isset($row)){
				return 1;
			} else{
				return 2;
			}
		}

		public function check_signup_email($email){
			$email_query = $this->db->query("SELECT * FROM users WHERE email = '" . $email . "'");
			$row = $email_query->row_array();
			if(isset($row)){
				return 1;
			} else{
				return 2;
			}
		}

		public function get_detail_information($username){
			$information_query = $this->db->query("SELECT * FROM users WHERE username = '" . $username . "'");
			return $information_query->row();
		}

		public function change_profile($username, $phone, $email, $address, $suburb, $state, $postcode){
			$dataNew = array(
				'username' => $username,
				'phoneNumber' => $phone,
				'email' => $email,
				'address' => $address,
				'suburb' => $suburb,
				'state' => $state,
				'postCode' => $postcode
			);
			$this->db->where('username', $_SESSION['username']);
			return $this->db->update('users', $dataNew);
		}

		public function check_username_email($preUsername, $preEmail, $username, $email){
			if($preUsername == $username && $preEmail == $email){
				return false;
			}

			$queryUser = $this->db->query("SELECT * FROM users WHERE username = '" . $username . "'");
			$queryEmail = $this->db->query("SELECT * FROM users WHERE email = '" . $email . "'");
			$DuplicateUser = $queryUser->row();
			$DuplicateEmail = $queryEmail->row();

			if(isset($DuplicateUser) && ($username != $preUsername)){
				echo "<style> #invalidUsernameUpdate{display: inline;} </style>";
				return true;
			} else if(isset($DuplicateEmail) && ($email != $preEmail)){
				echo "<style> #invalidEmailUpdate{display: inline;} </style>";
				return true;
			} else if(isset($DuplicateUser) && isset($DuplicateEmail) && $email != $preEmail && $username != $preUsername){
				echo "<style> #invalidUsernameUpdate{display: inline;} </style>";
				echo "<style> #invalidEmailUpdate{display: inline;} </style>";
				return true;
			}
		}

		public function save_profile_image($username, $path){
			$update_query = $this->db->query("UPDATE users SET profileLink = '" . $path. "' WHERE username = '". $username."'");
		}

		public function get_restaurants(){
			$restaurant_query = $this->db->query("SELECT * FROM restaurants");
			return $restaurant_query->result();
		}

		public function get_search($keyword){
			$query = $this->db->query("SELECT * FROM restaurants WHERE (name LIKE '%" . $keyword . "%' OR tags LIKE '%".$keyword."%') ");
			return $query->result();
		}

		public function get_dishes($name){
			$dish_query = $this->db->query("SELECT * FROM meals WHERE Rname ='".$name."'");
			return $dish_query->result();
		}

		public function get_restaurant($name){
			$query = $this->db->query("SELECT * FROM restaurants WHERE name ='".$name."'");
			return $query->row();
		}

		public function add_new_dish($name, $dishName, $dishDescription, $dishPrice, $dishCalories){
			$query = $this->db->query("SELECT * FROM meals WHERE Rname ='".$name."' AND dishName = '".$dishName."'");
			if($query->row()){
				return false;
			} else{
				$data = array(
					'Rname' => $name,
					'dishName' => $dishName,
					'description' => $dishDescription,
					'price' => $dishPrice,
					'calories' => $dishCalories
				);
				$this->db->insert('meals', $data);
				return true;
			}
		}

		public function get_comments($name){
			$query = $this->db->query("SELECT * FROM comments WHERE Rname ='".$name."'");
			return $query->result();
		}

		public function addComment($name, $username, $comment){
			$data = array(
				'Rname' => $name,
				'author' => $username,
				'comment' => $comment
			);
			$this->db->insert('comments', $data);
			return true;
		}

		public function addOrder($user, $restaurant_name, $meal_name){
			$data = array(
				'user' => $user,
				'restaurant' => $restaurant_name,
				'meal' => $meal_name
			);
			$this->db->insert('orders', $data);
			return true;
		}

		public function get_orders($username){
			$query = $this->db->query("SELECT Rname, dishName, price FROM orders, meals WHERE orders.user ='".$username."'".
			"AND orders.restaurant = meals.Rname AND orders.meal = meals.dishName");
			return $query->result();
		}

		public function removeOrder($user, $restaurant_name, $meal_name){
			$this->db->where('user', $user);
			$this->db->where('restaurant', $restaurant_name);
			$this->db->where('meal', $meal_name);
			$this->db->delete('orders');
		}

		public function vertify_account($username){
			$data = array(
       				 'activated' => '1'
			);
			$this->db->where('username', $username);
			$this->db->update('users', $data);
		}
	}

