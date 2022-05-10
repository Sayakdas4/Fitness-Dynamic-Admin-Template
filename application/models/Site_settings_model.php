<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Site_settings_model extends CI_Model
{
    //Addition
    function site_settings_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('site_settings as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->where('BaseTbl.site_settings_id !=', 4);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function site_settings_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('site_settings as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->where('BaseTbl.site_settings_id !=', 5);
        $this->db->where('BaseTbl.site_settings_id !=', 4);
        $this->db->where('BaseTbl.site_settings_id !=', 3);
        // $this->db->where('BaseTbl.site_settings_id !=', 4);
        $this->db->order_by('BaseTbl.site_settings_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addsite_settings($site_settingsInfo)
    {
        $this->db->trans_start();
        $this->db->insert('site_settings', $site_settingsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editsite_settings($site_settingsInfo, $site_settings_id)
    {
        $this->db->where('site_settings_id', $site_settings_id);
        $this->db->update('site_settings', $site_settingsInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getsite_settingsInfo($site_settings_id)
    {
        $this->db->select('*');
        $this->db->from('site_settings');
        // $this->db->where('isDeleted', 0);
        $this->db->where('site_settings_id', $site_settings_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($site_settings_id)
    {
        $sql = "UPDATE site_settings SET isdeleted = 1 WHERE site_settings_id='$site_settings_id';";
        $result = $this->db->query($sql);               
    }

    function check_url($page_slug) {
        $this->db->where(array('page_slug'=>$page_slug, 'isdeleted'=>0));
        $query = $this->db->get('site_settings');
        $check=$query->num_rows();
        return $check; 
    }

    function get_all_site_settings(){
        $this->db->select('*');
        $this->db->from('site_settings');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}