<?php

class Site_model extends CI_Model
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

    public function getEventType()
    {
        return $this->db->get('tbl_event_types')->result_array();
    }

    public function userRegister($data)
    {
        return $this->db->insert('tbl_user_detail', $data);
    }

    public function userLogin($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', sha1($password));

        $result = $this->db->get('tbl_user_detail');

        if ($result->num_rows() == 1) {
            return $result->row();

        } else {
            return false;
        }
    }

    public function getProfile()
    {
        $id     = $this->session->userdata('userid');
        $where  = array('id' => $id);
        $result = $this->db->get_where('tbl_user_detail', $where);

        if ($result->num_rows() > 0) {
            return $result->row();

        } else {
            return false;
        }
    }


    public function updateProfile($data)
    {
        $id = $this->session->userdata('userid');
        $where  = array('id' => $id);
        $this->db->where($where);
        return $this->db->update('tbl_user_detail', $data);
    }

    public function updatePassword($data)
    {
        $id = $this->session->userdata('userid');
        $where  = array('id' => $id);
        $this->db->where($where);
        return $this->db->update('tbl_user_detail', $data);
    }

    public function checkOldPassword($oldpassword)
    {
        $id = $this->session->userdata('userid');
        $where = array('password' => sha1($oldpassword), 'id' => $id);
        $this->db->where($where);
        $result = $this->db->get('tbl_user_detail');

        if ($result->num_rows() > 0) {
            return true;

        } else {
            return false;
        }
    }

    public function insertUserMsg($data)
    {
        return $this->db->insert('tbl_user_msg', $data);
    }


    public function getEvents()
    {
        return $this->db->get('tbl_events')->result_array();
    }

    public function eventCount()
    {
        return $this->db->count_all('tbl_events');
    }

    public function getSortEvent($eventtype)
    {
        if ($eventtype == "all") {
            $sql = "SELECT * FROM `tbl_events` WHERE `flag` LIKE '%1%' ";

        } elseif ($eventtype != "all") {
            $sql = "SELECT * FROM `tbl_events` WHERE `flag` LIKE '%1%' AND `event_type` LIKE '%$eventtype%'";
        }

        $result = $this->db->query($sql);
        // return $rows = $result->num_rows();

        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function getSearchEvent($search)
    {
        $sql = "SELECT * FROM `tbl_events` WHERE `event_type` LIKE '%$search%' OR event_name LIKE '%$search%' OR location LIKE '%$search%' AND `flag` LIKE '%1%'"; 

        $result = $this->db->query($sql);
        // return $rows = $result->num_rows();

        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }


    public function insertjointevent($insertdata)
    {
        return $this->db->insert('tbl_event_join', $insertdata);
    }

    public function getJoinedEvent()
    {
        $userid = $this->session->userdata('userid');
        $sql    = "SELECT tbl_event_join.id,
                          tbl_event_join.user_id,
                          tbl_event_join.event_id,
                          tbl_events.event_name,
                          tbl_events.event_type,
                          tbl_events.location,
                          tbl_events.event_date,
                          tbl_events.event_banner
                          FROM tbl_event_join
                          JOIN tbl_events
                          ON tbl_event_join.event_id = tbl_events.id
                          WHERE tbl_event_join.user_id = $userid";

        $result = $this->db->query($sql);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }

    }

    public function deljointevent($eventjoinid)
    {
        $this->db->where('id', $eventjoinid);
        return $this->db->delete('tbl_event_join');
    }




    // public function countSortEvent($eventtype)
    // {
    //     if ($eventtype == "all") {
    //         $sql = "SELECT * FROM `tbl_events` WHERE `flag` LIKE '%1%' ";

    //     } elseif ($eventtype != "all") {
    //         $sql = "SELECT * FROM `tbl_events` WHERE `flag` LIKE '%1%' AND `event_type` LIKE '%$eventtype%'";
    //     }

    //     $result = $this->db->query($sql);
    //     return $result->num_rows();

    //     // if ($result->num_rows() > 0) {
    //     //     return $result->result_array();
    //     // } else {
    //     //     return false;
    //     // }
    // }







}