<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	Class Main_controller extends CI_Controller{

		public function __construct() {
			parent::__construct();
			$this->load->model('main_model');
			$this->load->helper(array('form','url'));
			$this->data['status'] = "";
		}

		public function index(){
			if(!file_exists(APPPATH.'views/main_page.php')){
				show_404();
			}

			$data['restaurants'] = $this->main_model->get_restaurants();

			$this->load->view('header');
			$this->load->view('main_page', $data);
			$this->load->view('footer');
		}

		public function loadSignin(){
			if(!file_exists(APPPATH.'views/signin.php')){
				show_404();
			}
			$this->load->view('signin');
		}

		public function loadRegistration(){
			if(!file_exists(APPPATH.'views/registration.php')){
				show_404();
			}
			$this->load->view('registration');
		}

		public function loadProfile(){
			if(!file_exists(APPPATH.'views/profile.php')){
				show_404();
			}

			$username = $_SESSION['username'];
			$data['userInformation'] = $this->main_model->get_detail_information($username);
			$_SESSION['email'] = $data['userInformation']->email;
			$this->load->view('profile', $data);
		}

		public function loadRestaurant($name){
			if(!file_exists(APPPATH.'views/restaurant.php')){
				show_404();
			}

			$name = str_replace("%20"," ",$name);
			$data['restaurant'] = $this->main_model->get_restaurant($name);
			$data['dishes'] = $this->main_model->get_dishes($name);
			$data['comments'] = $this->main_model->get_comments($name);
			$this->load->view('header');
			$this->load->view('restaurant', $data);
			$this->load->view('footer');
		}

		public function loadMyOrder(){
			if(isset($_SESSION["username"])){
				$data['orderDetail'] = $this->main_model->get_orders($_SESSION['username']);
			}else{
				$data['orderDetail'] = null;

			}

			$this->load->view('header');
			$this->load->view('myOrder', $data);
			$this->load->view('footer');
		}

		public function login() {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = $this->input->post('remember');

			if ($this->main_model->authenticate($username, $password)) {
				if ($remember) {
					setcookie("username", $_POST["username"], time() + 60*60*24, "/");
					setcookie("password", $_POST["password"], time() + 60*60*24, "/");
				} else {
					delete_cookie('username');
					delete_cookie('password');
				}
				$_SESSION['username'] = $username;
				redirect(base_url());
			} else {
				$this->loadSignin();
			}
        
		}

		public function registration(){
			$usernameNew = $this->input->post('username');
			$passwordNew = $this->input->post('password');
			$phoneNew = $this->input->post('phone');
			$emailNew = $this->input->post('email');
			$addressNew = $this->input->post('address');
			$suburbNew = $this->input->post('suburb');
			$stateNew = $this->input->post('state');
			$postcodeNew = $this->input->post('postcode');

			$newAccount = $this->main_model->new_account($usernameNew, $passwordNew, $phoneNew, $emailNew, $addressNew, $suburbNew, $stateNew, $postcodeNew);
			$_SESSION['registered'] = true;
			$this->sendEmail($usernameNew, $emailNew);
			redirect(base_url() . "Main_controller/loadSignin");
		}

		public function logout() {
			session_destroy();
			redirect(base_url());
		}

		public function signup_username(){
			$signupUsername = $this->input->post('user_name');
			$existUser = $this->main_model->check_signup_username($signupUsername);
			echo $existUser;
		}

		public function signup_email(){
			$signupEmail = $this->input->post('user_email');
			$existEmail = $this->main_model->check_signup_email($signupEmail);
			echo $existEmail;
		}

		public function signup_password(){
			echo "Password should be 8-16 characters include lowercase letters and numbers.";
		}

		public function modify_profile(){
			$username = $this->input->post('usernameUpdate');
			$phone = $this->input->post('phoneUpdate');
			$email = $this->input->post('emailUpdate');
			$address = $this->input->post('addressUpdate');
			$suburb = $this->input->post('suburbUpdate');
			$state = $this->input->post('stateUpdate');
			$postcode = $this->input->post('postcodeUpdate');

			if($updated = $this->main_model->check_username_email($_SESSION['username'], $_SESSION['email'], $username, $email)){
				redirect(base_url() . "Main_controller/loadProfile");
			} else{
				$updated = $this->main_model->change_profile($username, $phone, $email, $address, $suburb, $state, $postcode);
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;
				redirect(base_url() . "Main_controller/loadProfile");
			}
		}

		public function upload_file(){
			$config['upload_path'] = './profile/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 800000;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('profileFile')){
				echo $this->upload->display_errors();
			} else{
				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
				$file_path = "profile/" . $file_name;
				$this->main_model->save_profile_image($_SESSION['username'], $file_path);
				redirect(base_url() . "Main_controller/loadProfile");
			}
		}

		public function search(){
			
			$data['keyword'] = $this->input->post('keyword');
			$data['searched_res'] = $this->main_model->get_search($data['keyword']);

			$this->load->view('header');
			$this->load->view('search', $data);
			$this->load->view('footer');
		}

		public function addDish($name){
			$name = str_replace("%20"," ",$name);
			$dishName = $this->input->post('dishName');
			$dishDescription = $this->input->post('dishDescription');
			$dishPrice = $this->input->post('dishPrice');
			$dishCalories = $this->input->post('dishCalories');

			$add = $this->main_model->add_new_dish($name, $dishName, $dishDescription, $dishPrice, $dishCalories);
			if($add){
				redirect(base_url() . "Main_controller/loadRestaurant/".$name);
			} else{
				$_SESSION['InvalidDish'] = true;
				redirect(base_url() . "Main_controller/loadRestaurant/".$name);
				echo "<style> #dishNameInvalid{display: block;} </style>";
			}
		}

		public function addComment($name){
			$name = str_replace("%20"," ",$name);
			$comment = $this->input->post('comment');
			$this->main_model->addComment($name, $_SESSION['username'], $comment);
			redirect(base_url() . "Main_controller/loadRestaurant/".$name);
		}

		public function addOrder($restaurant_name, $meal_name){
			$restaurant_name = str_replace("%20"," ",$restaurant_name);
			$meal_name = str_replace("%20"," ",$meal_name);
			$this->main_model->addOrder($_SESSION['username'], $restaurant_name, $meal_name);
			redirect(base_url() . "Main_controller/loadRestaurant/".$restaurant_name);
		}

		public function removeOrder($restaurant_name, $meal_name){
			$restaurant_name = str_replace("%20"," ",$restaurant_name);
			$meal_name = str_replace("%20"," ",$meal_name);
			$this->main_model->removeOrder($_SESSION['username'], $restaurant_name, $meal_name);
			redirect(base_url() . "Main_controller/loadMyOrder");
		}

		public function sendEmail($newUser,$newEmail){
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'mailhub.eait.uq.edu.au',
				'smtp_port' => 25,
				'smtp_user' => '', 
				'smtp_pass' => '', 
				'smtp_crypto' => 'tls',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE,
				'newline' => "\r\n"
			);

			$this->load->library('email', $config);
            		$this->email->from('infs3202ggclub@nmsl.info');
			$this->email->to($newEmail);
			$this->email->subject("New Account Registration Confirmation");
			$this->email->message('Please click here to vertify your email: <a href="https://infs3202-35966830.uqcloud.net/Main_controller/vertify_email/'.$newUser.'">Vertify Link</a>');
			$this->email->send();
		}

		public function vertify_email($username){
			$this->main_model->vertify_account($username);
			redirect(base_url() . "Main_controller/loadSignin");
		}
	}

