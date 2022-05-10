<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Coaching_includes_model extends CI_Model
{
    //Addition
    function coaching_includes_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('coaching_includes as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function coaching_includes_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('coaching_includes as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.coaching_includes_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addcoaching_includes($coaching_includesInfo)
    {
        $this->db->trans_start();
        $this->db->insert('coaching_includes', $coaching_includesInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editcoaching_includes($coaching_includesInfo, $coaching_includes_id)
    {
        $this->db->where('coaching_includes_id', $coaching_includes_id);
        $this->db->update('coaching_includes', $coaching_includesInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getcoaching_includesInfo($coaching_includes_id)
    {
        $this->db->select('*');
        $this->db->from('coaching_includes');
        // $this->db->where('isDeleted', 0);
        $this->db->where('coaching_includes_id', $coaching_includes_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($coaching_includes_id)
    {
        $sql = "UPDATE coaching_includes SET isdeleted = 1 WHERE coaching_includes_id='$coaching_includes_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_coaching_includes(){
        $this->db->select('*');
        $this->db->from('coaching_includes');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}