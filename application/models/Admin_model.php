<?php

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        ini_set("date.timezone", "Asia/Katmandu");

        $helper = array('url', 'form', 'email', 'security');
        $this->load->helper($helper); 

        $library = array('form_validation', 'session', 'upload');
        $this->load->library($library);
      
    }


    public function checkDashboardLogin($username, $password)
    {
    	$where = array('username' => $username, 'password' => sha1($password));
    	$this->db->where($where);
        $result = $this->db->get('tbl_admin_detail');

        if ($result->num_rows() > 0) {
            return $result->row();

        } else {
            return false;
        }
    }


    public function userCount()
    {
        return $this->db->count_all('tbl_user_detail');
    }

    public function eventCount()
    {
        return $this->db->count_all('tbl_events');
    }

    public function eventTypeCount()
    {
        return $this->db->count_all('tbl_event_types');
    }

    public function userMsgCount()
    {
        return $this->db->count_all('tbl_user_msg');
    }

    public function getEventType()
    {
        return $this->db->get('tbl_event_types')->result_array();
    }

    public function getEvents()
    {
    	return $this->db->get('tbl_events')->result_array();
    }

    public function insertEvents($data)
    {
    	return $this->db->insert('tbl_events', $data);
    }

    public function eventDelete($id)
    {
    	$this->db->where('id', $id);
       	return $this->db->delete('tbl_events');
    }


    public function getEventsById($eventid)
    {
    	$where = array('id' => $eventid);
    	$result = $this->db->get_where('tbl_events', $where);

    	if ($result->num_rows() > 0) {
            return $result->row_array();

        } else {
            return false;
        }
    }

    public function updateEvent($eventid, $data)
    {
    	$where = array('id' => $eventid);
    	$this->db->where($where);
    	return $this->db->update('tbl_events', $data);
    }


    public function updateEventImg($eventid, $data)
    {
    	$where = array('id' => $eventid);
    	$this->db->where($where);
    	return $this->db->update('tbl_events', $data);
    }


    public function insertEventType($data)
    {
    	return $this->db->insert('tbl_event_types', $data);
    }


    public function eventTypeDel($id)
    {
    	$this->db->where('typeid', $id);
       	return $this->db->delete('tbl_event_types');
    }


    public function getEventTypeById($typeid)
    {
    	$where = array('typeid' => $typeid);
    	return $this->db->get_where('tbl_event_types', $where)->row_array();
    }


    public function updateEventType($data, $typeid)
    {
    	$where = array('typeid' => $typeid);
    	$this->db->where($where);
    	return $this->db->update('tbl_event_types', $data);
    }

    public function getUsers()
    {
    	return $this->db->get('tbl_user_detail')->result_array();
    }

    public function userActivate($id)
    {
        $this->db->set('status', '1');
        $this->db->where('id', $id);
        $this->db->update('tbl_user_detail');
    }
    public function userDeactivate($id)
    {
        $this->db->set('status', '0');
        $this->db->where('id', $id);
        $this->db->update('tbl_user_detail');
    }

    public function userDelete($id)
    {
    	$this->db->where('id', $id);
       	return $this->db->delete('tbl_user_detail');
    }


    public function getUserMsg()
    {
        return $this->db->get('tbl_user_msg')->result_array();
    }

    public function msgDelete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_user_msg');
    }

     public function updatePassword($data)
    {
        $id = $this->session->userdata('adminid');
        $where  = array('id' => $id);
        $this->db->where($where);
        return $this->db->update('tbl_admin_detail', $data);
    }

    public function checkOldPassword($oldpassword)
    {
        $id = $this->session->userdata('adminid');
        $where = array('password' => sha1($oldpassword), 'id' => $id);
        $this->db->where($where);
        $result = $this->db->get('tbl_admin_detail');

        if ($result->num_rows() > 0) {
            return true;

        } else {
            return false;
        }
    }







}