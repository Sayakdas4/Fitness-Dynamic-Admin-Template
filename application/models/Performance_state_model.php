<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Performance_state_model extends CI_Model
{
    //Addition
    function performance_state_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('performance_state as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function performance_state_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('performance_state as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.performance_state_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addperformance_state($performance_stateInfo)
    {
        $this->db->trans_start();
        $this->db->insert('performance_state', $performance_stateInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editperformance_state($performance_stateInfo, $performance_state_id)
    {
        $this->db->where('performance_state_id', $performance_state_id);
        $this->db->update('performance_state', $performance_stateInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getperformance_stateInfo($performance_state_id)
    {
        $this->db->select('*');
        $this->db->from('performance_state');
        // $this->db->where('isdeleted', 0);
        $this->db->where('performance_state_id', $performance_state_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($performance_state_id)
    {
        $sql = "UPDATE performance_state SET isdeleted = 1 WHERE performance_state_id='$performance_state_id';";
        $result = $this->db->query($sql);               
    }

    function getteamInfo($team_id)
    {
        $this->db->select('*');
        $this->db->from('team');
        // $this->db->where('isdeleted', 0);
        $this->db->where('team_id', $team_id);
        $query = $this->db->get();
        
        return $query->row();
    }

    function get_all_performance_state(){
        $this->db->select('*');
        $this->db->from('performance_state');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}