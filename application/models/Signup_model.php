<?php

class Signup_model extends CI_Model
{
	function __construct() {
        parent::__construct();
		$this->load->database();
    }

    function checkEmailExists($email, $user_id = 0)
    {
        $this->db->select("email");
        $this->db->from("user_login");
        $this->db->where("email", $email);   
        $this->db->where("isdeleted", 0);
        if($user_id != 0){
            $this->db->where("user_id !=", $user_iId);
        }
        $query = $this->db->get();

        return $query->result();
    }

    function add_new_signup($signupInfo)
    {
        $this->db->trans_start();
        $this->db->insert('user_login', $signupInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function check_email($email) {
        $this->db->where('email', $email);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get('user_login');
        $check=$query->num_rows();
        return $check; 
    }

}