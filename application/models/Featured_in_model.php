<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class featured_in_model extends CI_Model
{
    //Addition
    function featured_in_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('featured_in as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function featured_in_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('featured_in as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.featured_in_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addfeatured_in($featured_inInfo)
    {
        $this->db->trans_start();
        $this->db->insert('featured_in', $featured_inInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editfeatured_in($featured_inInfo, $featured_in_id)
    {
        $this->db->where('featured_in_id', $featured_in_id);
        $this->db->update('featured_in', $featured_inInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getfeatured_inInfo($featured_in_id)
    {
        $this->db->select('*');
        $this->db->from('featured_in');
        // $this->db->where('isDeleted', 0);
        $this->db->where('featured_in_id', $featured_in_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($featured_in_id)
    {
        $sql = "UPDATE featured_in SET isdeleted = 1 WHERE featured_in_id='$featured_in_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_featured_in(){
        $this->db->select('*');
        $this->db->from('featured_in');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}