<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Technical_support_model extends CI_Model
{
    //Addition
    function technical_support_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('technical_support as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function technical_support_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('technical_support as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.technical_support_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addtechnical_support($technical_supportInfo)
    {
        $this->db->trans_start();
        $this->db->insert('technical_support', $technical_supportInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function edittechnical_support($technical_supportInfo, $technical_support_id)
    {
        $this->db->where('technical_support_id', $technical_support_id);
        $this->db->update('technical_support', $technical_supportInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function gettechnical_supportInfo($technical_support_id)
    {
        $this->db->select('*');
        $this->db->from('technical_support');
        // $this->db->where('isDeleted', 0);
        $this->db->where('technical_support_id', $technical_support_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($technical_support_id)
    {
        $sql = "UPDATE technical_support SET isdeleted = 1 WHERE technical_support_id='$technical_support_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_technical_support(){
        $this->db->select('*');
        $this->db->from('technical_support');
        $this->db->where('isdeleted', 0);
        // $this->db->limit(4);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}