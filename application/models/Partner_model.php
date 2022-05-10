<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Partner_model extends CI_Model
{
    //Addition
    function partner_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('partner as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function partner_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('partner as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.partner_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addpartner($partnerInfo)
    {
        $this->db->trans_start();
        $this->db->insert('partner', $partnerInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editpartner($partnerInfo, $partner_id)
    {
        $this->db->where('partner_id', $partner_id);
        $this->db->update('partner', $partnerInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getpartnerInfo($partner_id)
    {
        $this->db->select('*');
        $this->db->from('partner');
        // $this->db->where('isDeleted', 0);
        $this->db->where('partner_id', $partner_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($partner_id)
    {
        $sql = "UPDATE partner SET isdeleted = 1 WHERE partner_id='$partner_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_partner(){
        $this->db->select('*');
        $this->db->from('partner');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}