<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Kick_starter_pricing_model extends CI_Model
{
    //Addition
    function kick_starter_pricing_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('kick_starter_pricing as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function kick_starter_pricing_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('kick_starter_pricing as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.kick_starter_pricing_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addkick_starter_pricing($kick_starter_pricingInfo)
    {
        $this->db->trans_start();
        $this->db->insert('kick_starter_pricing', $kick_starter_pricingInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editkick_starter_pricing($kick_starter_pricingInfo, $kick_starter_pricing_id)
    {
        $this->db->where('kick_starter_pricing_id', $kick_starter_pricing_id);
        $this->db->update('kick_starter_pricing', $kick_starter_pricingInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getkick_starter_pricingInfo($kick_starter_pricing_id)
    {
        $this->db->select('*');
        $this->db->from('kick_starter_pricing');
        // $this->db->where('isDeleted', 0);
        $this->db->where('kick_starter_pricing_id', $kick_starter_pricing_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($kick_starter_pricing_id)
    {
        $sql = "UPDATE kick_starter_pricing SET isdeleted = 1 WHERE kick_starter_pricing_id='$kick_starter_pricing_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_kick_starter_pricing(){
        $this->db->select('*');
        $this->db->from('kick_starter_pricing');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function getkick_starter_pricingInfo_by_id($kick_starter_pricing_id)
    {
        $this->db->select('*');
        $this->db->from('kick_starter_pricing');
        // $this->db->where('isDeleted', 0);
        $this->db->where('kick_starter_pricing_id', $kick_starter_pricing_id);
        $query = $this->db->get();
        
        return $query->row();
    }
}