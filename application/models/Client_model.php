<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model
{
    //Addition
    function client_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('client as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function client_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('client as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.client_id', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addclient($clientInfo)
    {
        $this->db->trans_start();
        $this->db->insert('client', $clientInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editclient($clientInfo, $client_id)
    {
        $this->db->where('client_id', $client_id);
        $this->db->update('client', $clientInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getclientInfo($client_id)
    {
        $this->db->select('*');
        $this->db->from('client');
        // $this->db->where('isDeleted', 0);
        $this->db->where('client_id', $client_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($client_id)
    {
        $sql = "UPDATE client SET isdeleted = 1 WHERE client_id='$client_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_client(){
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}