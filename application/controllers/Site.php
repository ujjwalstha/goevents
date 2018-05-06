<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct() {
		parent::__construct();

		ini_set("date.timezone", "Asia/Katmandu");

		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","465");


		$helper = array('url', 'form', 'security', 'captcha');
		$this->load->helper($helper);

		$library = array('form_validation', 'session', 'upload', 'image_lib', 'email');
        $this->load->library($library);

		$this->load->model('site_model'); 
       
	}


	public function index()
	{
		return $this->home();
	}


	public function home()
	{
		// $this->load->view(TEMPPATH);
		$data['title'] = "GoEvents | Home";
		$data['getEventType']  = $this->site_model->getEventType();
		$data['getEvents'] = $this->site_model->getEvents();
		$data['eventCount'] = $this->site_model->eventCount();

		$this->load->view('site/templates/header', $data);
		$this->load->view('site/home', $data);
		$this->load->view('site/templates/footer');
	}

	public function account()
	{
		if($this->session->userdata('userid') == ''):

			$data['title'] = "GoEvents | Account";

			// $capdata = array(
			// 	'img_path'      => './public/captcha/',
		 //        'img_url'       =>  base_url('public/captcha/'),
		 //        'img_width'     => '150',
		 //        'img_height'    => '30',
			// );

			// $data['captcha'] = create_captcha($capdata);

			$this->load->view('site/templates/header', $data);
			$this->load->view('site/account');
			$this->load->view('site/templates/footer');

		else:   
        	redirect('site/home');    
        endif;
	}


	public function signup()
	{
		$data['title'] = "GoEvents | Account";

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_user_detail.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]'); //
        $this->form_validation->set_rules('termscheck', 'Terms and Conditions', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('site/templates/header', $data);
			$this->load->view('site/account');
			$this->load->view('site/templates/footer');

        } else {

        	$data = array(
				"firstname" 	=> $this->input->post('firstname'),
				"lastname"		=> $this->input->post('lastname'),
				"email"			=> $this->input->post('email'),
				"password"		=> sha1($this->input->post('password')),
				"status"		=> 1
			);

        	$userRegister = $this->site_model->userRegister($data);

        	if ($userRegister) {
        		$message = 'User registered successfully';
	            $this->session->set_flashdata('register_success', $message);
	            redirect('site/account');

        	} else {
	            $message = 'Failed to register user';
	            $this->session->set_flashdata('register_fail', $message);
	            redirect('site/account');
        	}           
        } 
	}

	public function contact()
	{
		$data['title'] = 'GoEvents | Contact';

   		$this->load->view('site/templates/header', $data);
		$this->load->view('site/contact');
		$this->load->view('site/templates/footer');

		
	}

	public function customerfeedback()
	{
		$name 		= $this->input->post('name');;
		$to 		= 'ujjwalshrestha1996@gmail.com';
		$from 		= $this->input->post('email');
		$sub 		= $this->input->post('subject');
		$subject 	= 'Customer Feedback '.'('.ucfirst($sub).')';
		$message 	= $this->input->post('message');

		$data = array(
			'name'		=>	$name,	
			'email'		=>	$from,	
			'subject'	=>	$sub,
			'message'	=> 	$message
		);

		$this->site_model->insertUserMsg($data);

		$sendmail = $this->sendmail($to, $from, $subject, $message, null);

		if ($sendmail) {
			$message = 'Thank you for your feedback!';
            $this->session->set_flashdata('feedback_success', $message);
            redirect('site/contact');
		}

	}

	public function sendmail($to, $from, $subject, $message, $attachment=null)
	{
		$config = Array(
			        'protocol' 	=> 'smtp',
			        'smtp_host' => 'smtp.gmail.com',
			        'smtp_port' =>	587,
			        'smtp_user' => 'noreply.micheck@gmail.com',
			        'smtp_pass' => 'rldvyjrclcqczpta',
			        'mailtype'  => 'html', 
			        'charset'   => 'iso-8859-1'
			    );
	   
	    $this->email->initialize($config);
	    $this->email->set_newline("\r\n");

		// $subject = "Global-Demat Password Recovery"; 
		// $from    = 'jiwanbayalkoti@gmail.com';
		// $from = "no-reply@sanimacapital.com";

		// $to 	=  $checkBoidEmail->email;
		// $name 	=  $checkBoidEmail->name;
		// $boid 	=  $checkBoidEmail->boid;

		// $message = "Dear ".ucwords($name).",<br><br>

		// 	Your password has been successfully reset. Your new password is ".$newpassgen.".<br><br>

		// 	Thank you, <br>
		// 	Global IME Capital.<br><br><br><br>

		//    <b><i>This is an auto generated mail, please do not reply to this mail.</i></b>";

		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($attachment) {
			$this->email->attach($attachment);
		}
	 	$this->email->send();
	}

	 public function login()
    {
        $this->form_validation->set_rules('uemail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('upassword', 'Password', 'required');

        if ($this->form_validation->run()) {
            $email 		= $this->input->post('uemail');
            $password 	= $this->input->post('upassword');

            $userLogin = $this->site_model->userLogin($email, $password);

            if ($userLogin) {

            	$status = $userLogin->status;

            	if ($status == 1) {
            		$session_data = array(
	                    'email' 		=> $email,
	                    'welcome' 		=> "Welcome ".ucwords($userLogin->firstname), //setting name in session
	                    'userid' 		=> $userLogin->id,
	                );

	                $this->session->set_userdata($session_data);
	                redirect(base_url());
            	
            	} else {
            		$this->session->set_flashdata('status_error', 'Your account has been deactivated. Please contact admin for furthur detail.');
                	redirect('site/account');
            	}               

            } else {
                $this->session->set_flashdata('login_error', 'Username or password incorrect.');
                redirect('site/account');
            }

        } else {
            $this->account();
        }
    }


    public function logout()
    {
    	$unset = array('email', 'userid');

        $this->session->unset_userdata($unset);
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_success', 'Logged out successfully.');
        redirect('site/account');
    }


    public function profile()
    {
    	if($this->session->userdata('userid') != ''):

			$data['title'] = 'GoEvents | Profile';
			$data['userProfile'] = $this->site_model->getProfile();

	   		$this->load->view('site/templates/header', $data);
			$this->load->view('site/profile', $data);
			$this->load->view('site/templates/footer');

		else:   
			redirect('site/home');    
		endif;

    }


    public function editprofile()
    {
    	if($this->session->userdata('userid') != ''):

			$data['title'] = 'GoEvents | Edit Profile';
			$data['userProfile'] = $this->site_model->getProfile();

			$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
	        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
	        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			if ($this->form_validation->run() === FALSE) {

	            $this->load->view('site/templates/header', $data);
				$this->load->view('site/editprofile');
				$this->load->view('site/templates/footer');

	        } else {

	        	$data = array(
		            'firstname' => $this->input->post('firstname'),
		            'lastname' 	=> $this->input->post('lastname'),
		            'email' 	=> $this->input->post('email'),
	        	);

	            $updateProfile = $this->site_model->updateProfile($data);

	            if ($updateProfile) {
	            	$message = 'Profile updated successfully.';
		            $this->session->set_flashdata('profileupdate_success', $message);
		            redirect('site/editprofile');

	            } else {
	            	$message = 'Profile update failed.';
		            $this->session->set_flashdata('profileupdate_fail', $message);
		            redirect('site/editprofile');
	            }   
	        }

        else:   
			redirect('site/home');    
		endif;
    }

    public function editpassword()
    {
		$data['title'] = 'GoEvents | Edit Password';
		$data['userProfile'] = $this->site_model->getProfile();

		$this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|min_length[5]'); 
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[newpassword]');

       if ($this->form_validation->run() === FALSE) {

	        $this->load->view('site/templates/header', $data);
			$this->load->view('site/editprofile', $data);
			$this->load->view('site/templates/footer');

        } else {

        	$oldpassword = $this->input->post('oldpassword');
        	$checkOldPassword = $this->site_model->checkOldPassword($oldpassword);

        	if ($checkOldPassword == true ) {
        		$data = array(
	           		'password' => sha1($this->input->post('newpassword')),
        		);

	            $updateProfile = $this->site_model->updateProfile($data);

	            if ($updateProfile) {
	            	$message = 'Password updated successfully.';
		            $this->session->set_flashdata('passUpdate_success', $message);
		            redirect('site/editprofile');

	            } else {
	            	$message = 'Password update failed.';
		            $this->session->set_flashdata('passUpdate_fail', $message);
		            redirect('site/editprofile');
	            }

        	} else {
        		$message = 'Old password did not match.';
	            $this->session->set_flashdata('passMatch_fail', $message);
	            redirect('site/editprofile');
        	}  	
        }	
    }

    public function eventjoined()
    {
    	if($this->session->userdata('userid') != ''):

			$data['title'] = 'GoEvents | Events Joined';
			$data['getJoinedEvent'] = $this->site_model->getJoinedEvent();

	   		$this->load->view('site/templates/header', $data);
			$this->load->view('site/eventjoined', $data);
			$this->load->view('site/templates/footer');

		else:   
			redirect('site/home');    
		endif;
    }


    public function gettingstarted()
    {
		$data['title'] = 'GoEvents | Getting Started';

   		$this->load->view('site/templates/header', $data);
		$this->load->view('site/gettingstarted');
		$this->load->view('site/templates/footer');
    }


    public function sortevent()
    {
    	if ($this->input->is_ajax_request()) {

    		try {
    			$eventtype = $this->input->post('eventtype');
    			$data['getEvents'] = $getEvents = $this->site_model->getSortEvent($eventtype);
    			// $data['eventCount'] = count($getEvents);

    			//var_dump($data['eventCount']);exit;
    			$view = $this->load->view('site/searcheventcontent', $data, TRUE);

    			// var_dump($view);exit;

    			$response = array(
    				'status' => 'success',
    				'data'	 =>	$view
    			);

    		} catch (Exception $e) {
    			$response = array(
    				'status' 	=> 'error',
    				'message'	=> $e->getMessage()	
    			);
    		} 

    		header("Content-Type: application/json");
    		echo json_encode($response);

    	} else {
    		exit("No direct script allowed");
    	}
    }

     public function searchevent()
    {
    	if ($this->input->is_ajax_request()) {

    		try {
    			$search = $this->input->post('search');
    			$data['getEvents'] = $getEvents = $this->site_model->getSearchEvent($search);
    			// $data['eventCount'] = count($getEvents);

    			//var_dump($data['eventCount']);exit;
    			$view = $this->load->view('site/searcheventcontent', $data, TRUE);

    			// var_dump($view);exit;

    			$response = array(
    				'status' => 'success',
    				'data'	 =>	$view
    			);

    		} catch (Exception $e) {
    			$response = array(
    				'status' 	=> 'error',
    				'message'	=> $e->getMessage()	
    			);
    		} 

    		header("Content-Type: application/json");
    		echo json_encode($response);

    	} else {
    		exit("No direct script allowed");
    	}
    }


    public function joinevent()
    {
    	if ($this->session->userdata('userid') != ''){

	    	$userid = $this->session->userdata('userid');
	    	$eventid = $this->input->post('eventid');

	    	$insertdata = array(
				"user_id"		=> $userid,	
				"event_id" 		=> $eventid,
			);

			$insertjointevent = $this->site_model->insertjointevent($insertdata);

			if ($insertdata) {
				$message = 'An event joined successfully.';
				$this->session->set_flashdata('eventjoin_success', $message);
				redirect('site/home');

			} else {
				$message = 'Failed to join event.';
				$this->session->set_flashdata('eventjoin_fail', $message);
				redirect('site/home');
			}

	    } else {
			$message = 'Sorry. You need to login first to join any events.';
			$this->session->set_flashdata('loginfirst', $message);
			redirect('site/account');
	    }

    }

    public function removejoinevent()
    {
    	$eventjoinid = $this->input->post('eventjoinid');
    	$deljointevent = $this->site_model->deljointevent($eventjoinid);

    	if ($deljointevent) {
    		$message = 'An event has been removed.';
			$this->session->set_flashdata('joinedeventdelete_success', $message);
			redirect('site/eventjoined');

    	} else {
    		$message = 'Failed to remove event.';
			$this->session->set_flashdata('joinedeventdelete_fail', $message);
			redirect('site/eventjoined');
    	}
    }




	
}
