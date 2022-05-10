<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Razorpay_model extends CI_Model
{
    //Addition
    function razorpay_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('razorpay as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function razorpay_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('razorpay as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.razorpay_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addrazorpay($razorpayInfo)
    {
        $this->db->trans_start();
        $this->db->insert('razorpay', $razorpayInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editrazorpay($razorpayInfo, $razorpay_id)
    {
        $this->db->where('razorpay_id', $razorpay_id);
        $this->db->update('razorpay', $razorpayInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getrazorpayInfo($razorpay_id)
    {
        $this->db->select('*');
        $this->db->from('razorpay');
        // $this->db->where('isDeleted', 0);
        $this->db->where('razorpay_id', $razorpay_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($razorpay_id)
    {
        $sql = "UPDATE razorpay SET isdeleted = 1 WHERE razorpay_id='$razorpay_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_razorpay(){
        $this->db->select('*');
        $this->db->from('razorpay');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_razorpay_by_user($userID){
        $this->db->select('*');
        $this->db->from('razorpay');
        $this->db->where('userID', $userID);
        $this->db->where('status', 1);
        $this->db->order_by('razorpay_id', 'DESC');
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }


    function get_all_razorpay_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('razorpay as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->join('user_login', 'user_login.user_id = BaseTbl.userID');
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function get_all_razorpay_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('razorpay as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->join('user_login', 'user_login.user_id = BaseTbl.userID');
        $this->db->order_by('BaseTbl.razorpay_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
}