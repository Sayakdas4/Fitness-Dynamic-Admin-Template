<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Signin_model extends CI_Model
{
    // This function used to check the login credentials of the user
    function sign_in_me($email, $password)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        
        $user = $query->row();
        
        if(!empty($user)){
            if(verifyHashedPassword($password, $user->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    function get_user_info_id($user_id){
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    function check_email($email) {
        $this->db->where('email', $email);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get('user_login');
        $check=$query->num_rows();
        return $check; 
    }

    function hash($string) 
    {
        return hash("sha512", $string . config_item("encryption_key"));
    }

    function get_email_id($email){
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    function update_user_login($user_loginInfo, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('user_login', $user_loginInfo);
        
        return TRUE;
    }

    function insert_reset($resetInfo){
        $this->db->trans_start();
        $this->db->insert('reset', $resetInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    function get_single_reset($array=NULL){
        if($array != NULL) {
            $this->db->select()->from('reset')->where($array);
            $query = $this->db->get();
            return $query->row();
        } else {
            $this->db->select()->from('reset')->order_by('reset_id', 'DESC');
            $query = $this->db->get();
            return $query->result();
        }
    }

    function delete($reset_id){
        $this->db->where('reset_id', $reset_id);
        $this->db->delete("reset");
        return true;
    }
}