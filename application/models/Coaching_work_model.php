<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Coaching_work_model extends CI_Model
{
    //Addition
    function coaching_work_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('coaching_work as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function coaching_work_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('coaching_work as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.coaching_work_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addcoaching_work($coaching_workInfo)
    {
        $this->db->trans_start();
        $this->db->insert('coaching_work', $coaching_workInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editcoaching_work($coaching_workInfo, $coaching_work_id)
    {
        $this->db->where('coaching_work_id', $coaching_work_id);
        $this->db->update('coaching_work', $coaching_workInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getcoaching_workInfo($coaching_work_id)
    {
        $this->db->select('*');
        $this->db->from('coaching_work');
        // $this->db->where('isdeleted', 0);
        $this->db->where('coaching_work_id', $coaching_work_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($coaching_work_id)
    {
        $sql = "UPDATE coaching_work SET isdeleted = 1 WHERE coaching_work_id='$coaching_work_id';";
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

    function get_all_coaching_work(){
        $this->db->select('*');
        $this->db->from('coaching_work');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}