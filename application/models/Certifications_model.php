<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Certifications_model extends CI_Model
{
    //Addition
    function certifications_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('certifications as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function certifications_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('certifications as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.certifications_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addcertifications($certificationsInfo)
    {
        $this->db->trans_start();
        $this->db->insert('certifications', $certificationsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editcertifications($certificationsInfo, $certifications_id)
    {
        $this->db->where('certifications_id', $certifications_id);
        $this->db->update('certifications', $certificationsInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getcertificationsInfo($certifications_id)
    {
        $this->db->select('*');
        $this->db->from('certifications');
        // $this->db->where('isDeleted', 0);
        $this->db->where('certifications_id', $certifications_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($certifications_id)
    {
        $sql = "UPDATE certifications SET isdeleted = 1 WHERE certifications_id='$certifications_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_certifications(){
        $this->db->select('*');
        $this->db->from('certifications');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}