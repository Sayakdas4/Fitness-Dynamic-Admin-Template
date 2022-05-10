<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Contact_query_model extends CI_Model
{
	function contact_query_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_mail as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        // $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    function contact_query_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_mail as BaseTbl');
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

    function get_all_contact_query(){
        $this->db->select('*');
        $this->db->from('tbl_mail');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}