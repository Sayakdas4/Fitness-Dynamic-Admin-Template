<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Product_category extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_category_model');
        // $this->load->model('product_categorydetails_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function product_category_listing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->product_category_model->product_category_listing_count($searchText);

            $returns = $this->paginationCompress ( "product_category_listing/", $count, 10 );
            
            $data['product_categories'] = $this->product_category_model->product_category_listing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Mil Paints : product_category Listing';
            
            $this->loadViews("product_category/product_category_listing", $this->global, $data, NULL);
        }
    }
    function addproduct_category()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('product_category_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New product_category';

            $this->loadViews("product_category/addproduct_category", $this->global, NULL);
        }
    }
    function addproduct_categoryConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('product_category_title','Title','trim|required');
            $this->form_validation->set_rules('product_category_description','Description','trim|required');
            // $this->form_validation->set_rules('product_category_image','Image','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addproduct_category();
            }
            else
            {
                $product_category_title = $this->input->post('product_category_title');
                $product_category_description = $this->input->post('product_category_description');
                $product_category_image = $this->input->post('product_category_image');

                $data = array(); 
                if(!empty($_FILES['product_category_image'])){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '10000'; // max_size in kb 
                    $config['file_name'] = $_FILES['product_category_image']['name']; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('product_category_image')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        $data['response'] = 'successfully uploaded '.$filename; 
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                     $data['response'] = 'failed'; 
                } 
                // load view 
                $this->load->view('product_category/addproduct_category',$data);

                $product_categoryInfo = array('product_category_title'=>$product_category_title, 'product_category_description'=>$product_category_description, 'product_category_image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('product_category_model');
                $result = $this->product_category_model->addproduct_category($product_categoryInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('product_category_listing');
            }
        }
    }
    function editproduct_category($product_category_id = NULL)
    {
        if($this->isAdmin() == TRUE && $product_category_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($product_category_id == null)
            {
                redirect('product_category_listing');
            }
            $data['product_categoryInfo'] = $this->product_category_model->getproduct_categoryInfo($product_category_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit product_category';
            
            $this->loadViews("product_category/editproduct_category", $this->global, $data, NULL);
        }
    }
    function editproduct_categoryConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $product_category_id = $this->input->post('product_category_id');
            
            $this->form_validation->set_rules('product_category_title','Title','trim|required');
            $this->form_validation->set_rules('product_category_description','Description','trim|required');
            // $this->form_validation->set_rules('image','Image','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editproduct_category($product_category_id);
            }
            else
            {
                $product_category_title = $this->input->post('product_category_title');
                $product_category_description = $this->input->post('product_category_description');
                $product_categoryInfo = array('product_category_title'=>$product_category_title, 'product_category_description'=>$product_category_description, 'updated_at'=>date('Y-m-d H:i:s'));
                $data = array(); 
                if($_FILES['product_category_image']['name']!=""){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '100000'; // max_size in kb 
                    $config['file_name'] = $_FILES['product_category_image']['name']; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('product_category_image')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        $data['response'] = 'successfully uploaded '.$filename; 
                        $product_categoryInfo['product_category_image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->product_category_model->editproduct_category($product_categoryInfo, $product_category_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('product_category_listing');
            }
        }
    }
    function deleteproduct_category($product_category_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->product_category_model->deleteInfo($product_category_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('product_category_listing');
        }
    }
}
?>