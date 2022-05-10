<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model
{
    //Addition
    function cms_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('cms as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        // $this->db->where('BaseTbl.cms_id !=', 4);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function cms_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('cms as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        // $this->db->where('BaseTbl.cms_id !=', 5);
        // $this->db->where('BaseTbl.cms_id !=', 4);
        // $this->db->where('BaseTbl.cms_id !=', 3);
        // $this->db->where('BaseTbl.cms_id !=', 4);
        $this->db->order_by('BaseTbl.cms_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addcms($cmsInfo)
    {
        $this->db->trans_start();
        $this->db->insert('cms', $cmsInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editcms($cmsInfo, $cms_id)
    {
        $this->db->where('cms_id', $cms_id);
        $this->db->update('cms', $cmsInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getcmsInfo($cms_id)
    {
        $this->db->select('*');
        $this->db->from('cms');
        // $this->db->where('isDeleted', 0);
        $this->db->where('cms_id', $cms_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($cms_id)
    {
        $sql = "UPDATE cms SET isdeleted = 1 WHERE cms_id='$cms_id';";
        $result = $this->db->query($sql);               
    }

    function check_url($page_slug) {
        $this->db->where('page_slug', $page_slug);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get('cms');
        $check=$query->num_rows();
        return $check; 
    }

    function get_all_cms(){
        $this->db->select('*');
        $this->db->from('cms');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}