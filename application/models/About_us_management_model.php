<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class about_us_management_model extends CI_Model
{
    //Addition
    function about_us_management_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('about_us_management as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function about_us_management_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('about_us_management as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.about_us_management_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addabout_us_management($about_us_managementInfo)
    {
        $this->db->trans_start();
        $this->db->insert('about_us_management', $about_us_managementInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editabout_us_management($about_us_managementInfo, $about_us_management_id)
    {
        $this->db->where('about_us_management_id', $about_us_management_id);
        $this->db->update('about_us_management', $about_us_managementInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getabout_us_managementInfo($about_us_management_id)
    {
        $this->db->select('*');
        $this->db->from('about_us_management');
        // $this->db->where('isdeleted', 0);
        $this->db->where('about_us_management_id', $about_us_management_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($about_us_management_id)
    {
        $sql = "UPDATE about_us_management SET isdeleted = 1 WHERE about_us_management_id='$about_us_management_id';";
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

    function get_all_about_us_management(){
        $this->db->select('*');
        $this->db->from('about_us_management');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}