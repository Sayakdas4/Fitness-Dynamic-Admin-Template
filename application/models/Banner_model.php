<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model
{
    //Addition
    function banner_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('banner as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function banner_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('banner as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.banner_id', 'ASC');
        // $this->db->group_by('BaseTbl.title');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addbanner($bannerInfo)
    {
        $this->db->trans_start();
        $this->db->insert('banner', $bannerInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editbanner($bannerInfo, $banner_id)
    {
        $this->db->where('banner_id', $banner_id);
        $this->db->update('banner', $bannerInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getbannerInfo($banner_id)
    {
        $this->db->select('*');
        $this->db->from('banner');
        // $this->db->where('isDeleted', 0);
        $this->db->where('banner_id', $banner_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($banner_id)
    {
        $sql = "UPDATE banner SET isdeleted = 1 WHERE banner_id='$banner_id';";
        $result = $this->db->query($sql);               
    }
    
    function get_all_banner(){
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_banner_by_home(){
        $this->db->from('banner');
        $this->db->where('title', 1);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        // $result = $query->result();        
        return $query->num_rows();
    }

    function get_all_banner_by_about_us(){
        $this->db->from('banner');
        $this->db->where('title', 2);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        // $result = $query->result();        
        return $query->num_rows();
    }

    function get_all_banner_by_service(){
        $this->db->from('banner');
        $this->db->where('title', 3);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        // $result = $query->result();        
        return $query->num_rows();
    }

    function get_all_banner_by_team(){
        $this->db->from('banner');
        $this->db->where('title', 4);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        // $result = $query->result();        
        return $query->num_rows();
    }

    function get_all_banner_by_contact_us(){
        $this->db->from('banner');
        $this->db->where('title', 5);
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        // $result = $query->result();        
        return $query->num_rows();
    }

    function get_home_banner_by_id(){
        $this->db->from('banner');
        $this->db->where('banner_id', 1);
        $result=$this->db->get();
        return $result->row();
    }
}