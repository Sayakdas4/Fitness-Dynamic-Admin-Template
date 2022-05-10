<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Team_model extends CI_Model
{
    //Addition
    function team_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('team as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function team_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('team as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.team_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addteam($teamInfo)
    {
        $this->db->trans_start();
        $this->db->insert('team', $teamInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editteam($teamInfo, $team_id)
    {
        $this->db->where('team_id', $team_id);
        $this->db->update('team', $teamInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getteamInfo($team_id)
    {
        $this->db->select('*');
        $this->db->from('team');
        // $this->db->where('isDeleted', 0);
        $this->db->where('team_id', $team_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($team_id)
    {
        $sql = "UPDATE team SET isdeleted = 1 WHERE team_id='$team_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_team(){
        $this->db->select('*');
        $this->db->from('team');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    // function check_username($username) {
    //     $this->db->where('username', $username);
    //     $this->db->where('isdeleted', 0);
    //     $query = $this->db->get('team');
    //     $result=$query->num_rows();
    //     return $result;
    //     // if($query->num_rows() >0){
    //     //     return $query->result();
    //     // }else{
    //     //     return $query->result();
    //     //     return false;
    //     // }
    // }

    function check_username($username)
    {
        $this->db->select('*'); 
        $this->db->from('team');
        $this->db->where('username', $username);
        $this->db->where("isdeleted", 0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
}