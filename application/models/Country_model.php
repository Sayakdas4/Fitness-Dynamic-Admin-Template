<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model
{
    //Addition
    function country_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_country as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function country_listing($searchText = '', $limit = 3, $offset = 0)
    {
        $this->db->select('*');
        $this->db->from('tbl_country as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.country_id', 'ASC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addcountry($countryInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_country', $countryInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editcountry($countryInfo, $country_id)
    {
        $this->db->where('country_id', $country_id);
        $this->db->update('tbl_country', $countryInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getcountryInfo($country_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_country');
        // $this->db->where('isdeleted', 0);
        $this->db->where('country_id', $country_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($country_id)
    {
        $sql = "UPDATE tbl_country SET isdeleted = 1 WHERE country_id='$country_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_country(){
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}