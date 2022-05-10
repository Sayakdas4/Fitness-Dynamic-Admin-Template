<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Product_category_model extends CI_Model
{
    //Addition
    function product_category_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('product_category as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function product_category_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('product_category as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.product_category_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addproduct_category($product_categoryInfo)
    {
        $this->db->trans_start();
        $this->db->insert('product_category', $product_categoryInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editproduct_category($product_categoryInfo, $product_category_id)
    {
        $this->db->where('product_category_id', $product_category_id);
        $this->db->update('product_category', $product_categoryInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getproduct_categoryInfo($product_category_id)
    {
        $this->db->select('*');
        $this->db->from('product_category');
        // $this->db->where('isDeleted', 0);
        $this->db->where('product_category_id', $product_category_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($product_category_id)
    {
        $sql = "UPDATE product_category SET isdeleted = 1 WHERE product_category_id='$product_category_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_product_category(){
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('isdeleted', 0);
        // $this->db->limit(4);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}