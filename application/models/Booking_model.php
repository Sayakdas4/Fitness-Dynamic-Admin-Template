<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model
{
	function booking_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('booking as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    function booking_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('booking as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function get_all_booking(){
        $this->db->select('*');
        $this->db->from('booking');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}