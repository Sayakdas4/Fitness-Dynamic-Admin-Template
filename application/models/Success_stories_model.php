<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class success_stories_model extends CI_Model
{
    //Addition
    function success_stories_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('success_stories as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function success_stories_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('success_stories as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.ss_title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.success_stories_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addsuccess_stories($success_storiesInfo)
    {
        $this->db->trans_start();
        $this->db->insert('success_stories', $success_storiesInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editsuccess_stories($success_storiesInfo, $success_stories_id)
    {
        $this->db->where('success_stories_id', $success_stories_id);
        $this->db->update('success_stories', $success_storiesInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getsuccess_storiesInfo($success_stories_id)
    {
        $this->db->select('*');
        $this->db->from('success_stories');
        // $this->db->where('isDeleted', 0);
        $this->db->where('success_stories_id', $success_stories_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($success_stories_id)
    {
        $sql = "UPDATE success_stories SET isdeleted = 1 WHERE success_stories_id='$success_stories_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_success_stories(){
        $this->db->select('*');
        $this->db->from('success_stories');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function addsuccess_stories_image($success_stories_imageInfo)
    {
        $this->db->trans_start();
        $this->db->insert('ss_multi_image', $success_stories_imageInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
}