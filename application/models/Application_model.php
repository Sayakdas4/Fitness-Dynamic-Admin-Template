<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Application_model extends CI_Model
{
    //Addition
    function application_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('application as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function application_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('application as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.application_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addapplication($applicationInfo)
    {
        $this->db->trans_start();
        $this->db->insert('application', $applicationInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editapplication($applicationInfo, $application_id)
    {
        $this->db->where('application_id', $application_id);
        $this->db->update('application', $applicationInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getapplicationInfo($application_id)
    {
        $this->db->select('*');
        $this->db->from('application');
        // $this->db->where('isDeleted', 0);
        $this->db->where('application_id', $application_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($application_id)
    {
        $sql = "UPDATE application SET isdeleted = 1 WHERE application_id='$application_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_application(){
        $this->db->select('*');
        $this->db->from('application');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}