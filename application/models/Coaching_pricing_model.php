<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Coaching_pricing_model extends CI_Model
{
    //Addition
    function coaching_pricing_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('coaching_pricing as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function coaching_pricing_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('coaching_pricing as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.coaching_pricing_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addcoaching_pricing($coaching_pricingInfo)
    {
        $this->db->trans_start();
        $this->db->insert('coaching_pricing', $coaching_pricingInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editcoaching_pricing($coaching_pricingInfo, $coaching_pricing_id)
    {
        $this->db->where('coaching_pricing_id', $coaching_pricing_id);
        $this->db->update('coaching_pricing', $coaching_pricingInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getcoaching_pricingInfo($coaching_pricing_id)
    {
        $this->db->select('*');
        $this->db->from('coaching_pricing');
        // $this->db->where('isDeleted', 0);
        $this->db->where('coaching_pricing_id', $coaching_pricing_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($coaching_pricing_id)
    {
        $sql = "UPDATE coaching_pricing SET isdeleted = 1 WHERE coaching_pricing_id='$coaching_pricing_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_coaching_pricing(){
        $this->db->select('*');
        $this->db->from('coaching_pricing');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function getcoaching_pricingInfo_by_id($coaching_pricing_id)
    {
        $this->db->select('*');
        $this->db->from('coaching_pricing');
        // $this->db->where('isDeleted', 0);
        $this->db->where('coaching_pricing_id', $coaching_pricing_id);
        $query = $this->db->get();
        
        return $query->row();
    }
}