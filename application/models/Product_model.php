<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    //Addition
    function product_listing_count($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('product as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isdeleted', 0);
        $query = $this->db->get();
        
        return $query->num_rows();
    }
    // This function is used to get the user listing count
    function product_listing($searchText = '', $category_id)
    {
        $this->db->select('*');
        $this->db->from('product as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->join('product_category', 'product_category.product_category_id = BaseTbl.category_id');
        $this->db->where('BaseTbl.category_id', $category_id);
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.product_id', 'ASC');
        // $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function all_product_listing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('product as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->join('product_category', 'product_category.product_category_id = BaseTbl.category_id');
        // $this->db->where('BaseTbl.category_id', $category_id);
        $this->db->where('BaseTbl.isdeleted', 0);
        $this->db->order_by('BaseTbl.product_id', 'ASC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }

    function addproduct($productInfo)
    {
        $this->db->trans_start();
        $this->db->insert('product', $productInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    function editproduct($productInfo, $product_id)
    {
        $this->db->where('product_id', $product_id);
        $this->db->update('product', $productInfo);
        
        return TRUE;
    }


    // This function used to get user information by id
    function getproductInfo($product_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        // $this->db->where('isDeleted', 0);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        
        return $query->row();
    }
    public function deleteInfo($product_id)
    {
        $sql = "UPDATE product SET isdeleted = 1 WHERE product_id='$product_id';";
        $result = $this->db->query($sql);               
    }

    function get_all_product(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('isdeleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function get_product_by_product($category_id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('product_category', 'product_category.product_category_id = product.category_id');
        $this->db->where('product.category_id', $category_id);
        $this->db->where('product.isdeleted', 0);
        $query = $this->db->get();    
        return $query->result();
    }
}