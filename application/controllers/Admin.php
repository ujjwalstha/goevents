<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();

		ini_set("date.timezone", "Asia/Katmandu");

		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","465");


		$helper = array('url', 'form', 'security', 'captcha');
		$this->load->helper($helper);

		$library = array('form_validation', 'session', 'upload', 'image_lib', 'email');
        $this->load->library($library);

		$this->load->model('admin_model'); 
       
	}

	public function index()
	{
		return $this->dashboardlogin();
	}


	public function dashboardlogin()
	{
        if($this->session->userdata('userid') == ''):
            if($this->session->userdata('adminid') == ''):

        		$data['title'] = 'Dashboard Login';
        	

        		$this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run()) {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $checkDashboardLogin = $this->admin_model->checkDashboardLogin($username, $password);

                    if ($checkDashboardLogin) {
                        $session_data = array(
                            'adminname' => $username, //setting name in session
                            'adminid' 	=> $checkDashboardLogin->id,
                        );

                        $this->session->set_userdata($session_data);
                        redirect('admin/adminpanel');
                        // print_r($session_data)."<br>";
                        // echo "loged in";

                    } else {
                        $this->session->set_flashdata('login_fail', 'Username or password incorrect.');
                        redirect('admin/dashboardlogin');
                        // echo "u and p wrong";
                    }

                } else {
                   	$this->load->view('admin/dashboardlogin', $data);
                }

            else:   
                redirect('admin/adminpanel');    
            endif;
        else:
            redirect('site/home');    
        endif;

	}


	public function adminpanel()
	{
        if($this->session->userdata('adminid') != ''):

            $data['title'] = "Welcome to Dashboard";
            $data['userCount'] = $this->admin_model->userCount();
            $data['eventCount'] = $this->admin_model->eventCount();
            $data['eventTypeCount'] = $this->admin_model->eventTypeCount();
            $data['userMsgCount'] = $this->admin_model->userMsgCount();

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/top-time');
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/adminpanel', $data);
            $this->load->view('admin/templates/footer');

        else:   
            redirect('admin/dashboardlogin');    
        endif;
	}


	public function logout()
    {
    	$unset = array('username', 'adminid');

        $this->session->unset_userdata($unset);
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_success', 'Logged out successfully.');
        redirect('admin/dashboardlogin');
    }


    public function manageevents()
    {
        if($this->session->userdata('adminid') != ''):

        	$data['title'] 			=	'Manage Events';
        	$data['getEvents'] 		=	$this->admin_model->getEvents();	 
        	$data['getEventType'] 	=	$this->admin_model->getEventType();	 

        	$this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/top-time');
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/manageevents', $data);
            $this->load->view('admin/templates/footer');

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }

    public function addevents()
    {
        if($this->session->userdata('adminid') != ''):

        	$config['upload_path']		= './public/uploads/events/';
            $config['allowed_types']    = 'jpg|jpeg|png|gif|';  /**  All file type selected **/
            $config['min_size']         = 50;
            $config['max_size']         = 10000;
            $config['min_width']        = 50;
            $config['max_width']        = 100000;
            $config['min_height']       = 50;
            $config['max_height']       = 100000;

            $this->upload->initialize($config);
         
            # "image" is the field name

    		if ($this->upload->do_upload('banner')) {  

    			$upload_data 	=	$this->upload->data();
    			$imagename 		=	$upload_data['file_name'];

    			
    			$middlestrt = strtotime($this->input->post('eventdate'));        
        		$date       = date('Y-m-d', $middlestrt); 

    			$data = array(
    				'event_name'	=>	$this->input->post('eventname'),
    				'event_type'	=>	$this->input->post('eventtype'),
    				'location'		=>	$this->input->post('location'),
    				'event_date'	=>	$date,
    				'event_banner'	=>	$imagename,
    				'flag'			=>	1
    			);

    			$insertEvents = $this->admin_model->insertEvents($data);

    			if ($insertEvents) {
    				$message = 'Event added successfully.';
    	            $this->session->set_flashdata('addevent_success', $message);
    	            redirect('admin/manageevents');

    			} else {
    				$message = 'Failed to add event.';
    	            $this->session->set_flashdata('addevent_fail', $message);
    	            redirect('admin/manageevents');
    			}

            } else {

            	$error = array('error' => $this->upload->display_errors());
            	print_r($error);

            }

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }

    public function deleteevent()
    {
        if($this->session->userdata('adminid') != ''):

        	$id = $this->input->post('eventid');
            $eventDelete = $this->admin_model->eventDelete($id);

            if ($eventDelete) {
            	$message = 'An event has been removed.';
    	        $this->session->set_flashdata('eventdelete_success', $message);
    	        redirect('admin/manageevents');

            } else {
            	$message = 'Failed to remove event.';
    	        $this->session->set_flashdata('eventdelete_fail', $message);
    	        redirect('admin/manageevents');
            }

        else:   
            redirect('admin/dashboardlogin');    
        endif;
        
    }


    public function editevents()
    {
        if($this->session->userdata('adminid') != ''):

        	$eventid 				= 	urldecode($_GET['eventid']);
    		$data['title'] 			=  	"Edit Events";
        	$data['getEventsById'] 	=	$this->admin_model->getEventsById($eventid);	 
        	$data['getEventType'] 	=	$this->admin_model->getEventType();

        	$this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/top-time');
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/editevents', $data);
            $this->load->view('admin/templates/footer');

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function editeventaction()
    {
        if($this->session->userdata('adminid') != ''):

        	$eventid = $this->input->post('eventid');

        	$data = array(
        		'event_name' 	=>	$this->input->post('eventname'),
        		'event_type' 	=>	$this->input->post('eventtype'),
        		'location' 		=>	$this->input->post('location'),
        		'event_date'	=>	$this->input->post('eventdate')
        	);

        	$updateEvent = $this->admin_model->updateEvent($eventid, $data);

        	if ($updateEvent) {
        		$message = 'An event has been updated.';
    	        $this->session->set_flashdata('eventupdate_success', $message);
    	        redirect('admin/manageevents');

        	} else {
        		$message = 'Failed to update event.';
    	        $this->session->set_flashdata('eventupdate_fail', $message);
    	        redirect('admin/manageevents');
        	} 

        else:   
            redirect('admin/dashboardlogin');    
        endif; 	
    }


    public function editeventimg()
    {
        if($this->session->userdata('adminid') != ''):

        	$eventid = $this->input->post('eventid');

        	$config['upload_path']		= './public/uploads/events/';
            $config['allowed_types']    = 'jpg|jpeg|png|gif|';  /**  All file type selected **/
            $config['min_size']         = 50;
            $config['max_size']         = 10000;
            $config['min_width']        = 50;
            $config['max_width']        = 100000;
            $config['min_height']       = 50;
            $config['max_height']       = 100000;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('banner')) {  

    			$upload_data 	=	$this->upload->data();
    			$imagename 		=	$upload_data['file_name'];

    			$data = array(
    				'event_banner'	=>	$imagename,
    			);

    			$updateEventImg = $this->admin_model->updateEventImg($eventid, $data);

    			if ($updateEventImg) {
    	    		$message = 'An event image has been updated.';
    		        $this->session->set_flashdata('imageupdate_success', $message);
    		        redirect('admin/manageevents');

    	    	} else {
    	    		$message = 'Failed to update event image.';
    		        $this->session->set_flashdata('imageupdate_fail', $message);
    		        redirect('admin/manageevents');
    	    	}  	

    		} else {

    	    	$error = array('error' => $this->upload->display_errors());
    	    	print_r($error);
            }

        else:   
            redirect('admin/dashboardlogin');    
        endif;  
    }


    public function manageeventtypes()
    {
        if($this->session->userdata('adminid') != ''):

    		$data['title'] 			=  	"Manage Event Type";
        	// $data['getEventsById'] 	=	$this->admin_model->getEventsById();	 
        	$data['getEventType'] 	=	$this->admin_model->getEventType();
        	$data['eventTypeCount'] = $this->admin_model->eventTypeCount();

        	$this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/top-time');
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/manageeventtypes', $data);
            $this->load->view('admin/templates/footer');

        else:   
            redirect('admin/dashboardlogin');    
        endif;  
    }


    public function addeventtype()
    {
        if($this->session->userdata('adminid') != ''):

        	$eventtype = $this->input->post('eventtype');

        	$data = array(
        		'eventtype' => $eventtype
        	);

        	$insertEventType = $this->admin_model->insertEventType($data);

        	if ($insertEventType) {
        		$message = 'An event type has been added.';
    	        $this->session->set_flashdata('addeventtype_success', $message);
    	        redirect('admin/manageeventtypes');

        	} else {
        		$message = 'Failed to add event type.';
    	        $this->session->set_flashdata('addeventtype_fail', $message);
    	        redirect('admin/manageeventtypes');
        	}

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }

    public function deleventtype()
    {
        if($this->session->userdata('adminid') != ''):

        	$id = $this->input->post('typeid');
            $eventTypeDel = $this->admin_model->eventTypeDel($id);

            if ($eventTypeDel) {
            	$message = 'An event type has been removed.';
    	        $this->session->set_flashdata('typedelete_success', $message);
    	        redirect('admin/manageeventtypes');

            } else {
            	$message = 'Failed to remove event type.';
    	        $this->session->set_flashdata('typedelete_fail', $message);
    	        redirect('admin/manageeventtypes');
            }

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function editeventtype()
    {
        if($this->session->userdata('adminid') != ''):

        	$typeid 					= 	urldecode($_GET['typeid']);
        	$data['title'] 				=  	"Edit Event Type";	 
        	$data['getEventTypeById'] 	=	$this->admin_model->getEventTypeById($typeid);
        	//$data['eventTypeCount'] 	= 	$this->admin_model->eventTypeCount();

        	$this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/top-time');
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/editeventtype', $data);
            $this->load->view('admin/templates/footer');

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function editeventtypeaction()
    {
        if($this->session->userdata('adminid') != ''):

        	$typeid = $this->input->post('typeid');
        	$eventtype = $this->input->post('eventtype');

        	$data = array(
        		'eventtype'	=>	$eventtype
        	);

        	$updateEventType = $this->admin_model->updateEventType($data, $typeid);

        	if ($updateEventType) {
        		$message = 'An event type has been updated.';
    	        $this->session->set_flashdata('typeupdate_success', $message);
    	        redirect('admin/manageeventtypes');

        	} else {
    			$message = 'Failed to update event type.';
    	        $this->session->set_flashdata('typeupdate_fail', $message);
    	        redirect('admin/manageeventtypes');    		
        	}

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function manageusers()
    {
        if($this->session->userdata('adminid') != ''):

        	$data['title'] 		=  	"Manage Users";	 
        	$data['userCount'] 	= 	$this->admin_model->userCount();
        	$data['getUsers'] 	= 	$this->admin_model->getUsers();

        	$this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/top-time');
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/manageusers', $data);
            $this->load->view('admin/templates/footer');

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function usersstatus()
    {
        $id = $this->input->post('userid');

        $activate = $this->input->post('activate'); //to activate user
        if (isset($activate)) {
            $this->admin_model->userActivate($id);
            $message = 'User has been activated.';
            $this->session->set_flashdata('useractivate_success', $message);
            redirect('admin/manageusers');
        }

        $deactivate = $this->input->post('deactivate'); //to deactivate user
        if (isset($deactivate)) {
            $this->admin_model->userDeactivate($id);
            $message = 'User has been deactivated.';
            $this->session->set_flashdata('userdeactivate_success', $message);
            redirect('admin/manageusers');
        }
    }

    public function deleteuser()
    {
        if($this->session->userdata('adminid') != ''):

        	$id = $this->input->post('userid');
            $userDelete = $this->admin_model->userDelete($id);

            if ($userDelete) {
            	$message = 'An user has been removed.';
    	        $this->session->set_flashdata('userdelete_success', $message);
    	        redirect('admin/manageusers');

            } else {
            	$message = 'Failed to remove user.';
    	        $this->session->set_flashdata('userdelete_fail', $message);
    	        redirect('admin/manageusers');
            }

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function userfeedback()
    {
        if($this->session->userdata('adminid') != ''):

            $data['title']      =   "User's Feedback";  
            $data['userMsgCount']  =   $this->admin_model->userMsgCount();
            $data['getUserMsg']   =   $this->admin_model->getUserMsg();

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/top-time');
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/userfeedback', $data);
            $this->load->view('admin/templates/footer');

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function delfeedback()
    {
        if($this->session->userdata('adminid') != ''):

            $id = $this->input->post('msgid');
            $msgDelete = $this->admin_model->msgDelete($id);

            if ($msgDelete) {
                $message = 'A user feedback has been removed.';
                $this->session->set_flashdata('msgdelete_success', $message);
                redirect('admin/userfeedback');

            } else {
                $message = 'Failed to remove user feedback.';
                $this->session->set_flashdata('msgdelete_fail', $message);
                redirect('admin/userfeedback');
            }

        else:   
            redirect('admin/dashboardlogin');    
        endif;
    }


    public function changepassword()
    {
        if($this->session->userdata('adminid') != ''):

            $data['title']          =   "Change Password";  
            // $data['userMsgCount']   =   $this->admin_model->userMsgCount();
            // $data['getUserMsg']     =   $this->admin_model->getUserMsg();

            $this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|min_length[5]'); 
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[newpassword]');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/top-time');
                $this->load->view('admin/templates/nav');
                $this->load->view('admin/changepassword', $data);
                $this->load->view('admin/templates/footer');

            } else {

                $oldpassword = $this->input->post('oldpassword');
                $checkOldPassword = $this->admin_model->checkOldPassword($oldpassword);

                if ($checkOldPassword == true ) {
                    $data = array(
                        'password' => sha1($this->input->post('newpassword')),
                    );

                    $updatePassword = $this->admin_model->updatePassword($data);

                    if ($updatePassword) {
                        $message = 'Password updated successfully.';
                        $this->session->set_flashdata('passUpdate_success', $message);
                        redirect('admin/changepassword');

                    } else {
                        $message = 'Password update failed.';
                        $this->session->set_flashdata('passUpdate_fail', $message);
                        redirect('admin/changepassword');
                    }

                } else {
                    $message = 'Old password did not match.';
                    $this->session->set_flashdata('passMatch_fail', $message);
                    redirect('admin/changepassword');
                }   
            }

        else:   
            redirect('admin/dashboardlogin');    
        endif;    
    }


}
