<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Shades_model extends CI_Model
{
    //Addition
    function shades_listing_count_1($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('shades as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type', 1);
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    function shades_listing_count_2($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('shades as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type', 2);
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    function shades_listing_count_3($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('shades as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type', 3);
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function shades_listing_1($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('shades as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type', 1);
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.shades_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function shades_listing_2($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('shades as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type', 2);
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.shades_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function shades_listing_3($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('shades as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type', 3);
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.shades_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addshades($shadesInfo)
    {
        $this->db->trans_start();
        $this->db->insert('shades', $shadesInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editshades($shadesInfo, $shades_id)
    {
        $this->db->where('shades_id', $shades_id);
        $this->db->update('shades', $shadesInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getshadesInfo($shades_id)
    {
        $this->db->select('*');
        $this->db->from('shades');
        // $this->db->where('isDeleted', 0);
        $this->db->where('shades_id', $shades_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($shades_id, $type)
    {
        $sql = "UPDATE shades SET isdeleted = 1 WHERE shades_id='$shades_id'";
        $this->db->where('type', $type);
        $result = $this->db->query($sql);               
    }

    public function check_card($code){
        $this->db->where('code', $code);
        $query = $this->db->get('shades');
        // dd($this->db->last_query());
        return $query->row(); 
    }

    public function check_type($type){
        $this->db->where('type', $type);
        $query = $this->db->get('shades');
        // dd($this->db->last_query());
        return $query->row(); 
    }

    // function get_shades_by_type1(){
    //     $this->db->select('*');
    //     $this->db->from('shades');
    //     $this->db->where('type', 1);
    //     $this->db->where('isDeleted', 0);
    //     $query = $this->db->get();
    //     $result = $query->result();        
    //     return $result;
    // }

    // function get_shades_by_type2(){
    //     $this->db->select('*');
    //     $this->db->from('shades');
    //     $this->db->where('type', 2);
    //     $this->db->where('isDeleted', 0);
    //     $query = $this->db->get();
    //     $result = $query->result();        
    //     return $result;
    // }

    // function get_shades_by_type3(){
    //     $this->db->select('*');
    //     $this->db->from('shades');
    //     $this->db->where('type', 3);
    //     $this->db->where('isDeleted', 0);
    //     $query = $this->db->get();
    //     $result = $query->result();        
    //     return $result;
    // }
}