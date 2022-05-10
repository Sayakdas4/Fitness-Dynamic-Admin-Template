<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model
{
    //Addition
    function state_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_state as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function state_listing($searchText = '', $limit = 3, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('tbl_state as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.state_id', 'ASC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addstate($stateInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_state', $stateInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editstate($stateInfo, $state_id)
    {
        $this->db->where('state_id', $state_id);
        $this->db->update('tbl_state', $stateInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getstateInfo($state_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_state');
        // $this->db->where('isdeleted', 0);
        $this->db->where('state_id', $state_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($state_id)
    {
        $sql = "UPDATE tbl_state SET isdeleted = 1 WHERE state_id='$state_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_state(){
        $this->db->select('*');
        $this->db->from('tbl_state');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}