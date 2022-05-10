<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home_management_model extends CI_Model
{
    //Addition
    function home_management_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('home_management as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function home_management_listing($searchText = '', $limit = 3, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('home_management as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.home_management_id', 'ASC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addhome_management($home_managementInfo)
    {
        $this->db->trans_start();
        $this->db->insert('home_management', $home_managementInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function edithome_management($home_managementInfo, $home_management_id)
    {
        $this->db->where('home_management_id', $home_management_id);
        $this->db->update('home_management', $home_managementInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function gethome_managementInfo($home_management_id)
    {
        $this->db->select('*');
        $this->db->from('home_management');
        // $this->db->where('isdeleted', 0);
        $this->db->where('home_management_id', $home_management_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($home_management_id)
    {
        $sql = "UPDATE home_management SET isdeleted = 1 WHERE home_management_id='$home_management_id';";
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

    function get_all_home_management(){
        $this->db->select('*');
        $this->db->from('home_management');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}