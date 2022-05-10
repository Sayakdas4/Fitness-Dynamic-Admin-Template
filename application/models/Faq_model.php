<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends CI_Model
{
    //Addition
    function faq_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('faq as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function faq_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('faq as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.faq_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addfaq($faqInfo)
    {
        $this->db->trans_start();
        $this->db->insert('faq', $faqInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editfaq($faqInfo, $faq_id)
    {
        $this->db->where('faq_id', $faq_id);
        $this->db->update('faq', $faqInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getfaqInfo($faq_id)
    {
        $this->db->select('*');
        $this->db->from('faq');
        // $this->db->where('isDeleted', 0);
        $this->db->where('faq_id', $faq_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($faq_id, $title)
    {
        $sql = "UPDATE faq SET isdeleted = 1 WHERE faq_id='$faq_id';";
        $this->db->where('title', $title);
        $result = $this->db->query($sql);               
    }

    function get_faqid_title($faq_id, $title)
    {
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where(array('faq_id'=>$faq_id, 'title'=>$title));
        $query = $this->db->get();
        
        return $query->row();
    }

    function get_title($title)
    {
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('isdeleted', 0);
        $this->db->where('title', $title);
        // $this->db->group_by('title', $title);
        $query = $this->db->get();
        return $query->row();
    }

    function get_faq_by_title($title){
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('title', $title);
        $this->db->where('isdeleted', 0);
        $this->db->order_by('faq_id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_all_faq(){
        $this->db->select('*');
        $this->db->from('faq');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}