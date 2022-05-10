<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Product extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('product_category_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    // public function product_listing($category_id = 0)
    // {
    //     if($this->isAdmin() == TRUE)
    //     {
    //         $this->loadThis();
    //     }
    //     else
    //     {
    //         $searchText = $this->security->xss_clean($this->input->post('searchText'));
    //         $data['searchText'] = $searchText;

    //         // $this->load->library('pagination');
    //         // $count = $this->product_model->product_listing_count($searchText);
    //         // $returns = $this->paginationCompress ( "product_listing/", $count, 10 );

    //         $category = $this->product_category_model->get_all_product_category();
    //         $data['category'] = pluck($category, 'obj', 'product_category_id');
    //         // dd($data['category']);
    //         if (!$category_id && $category) {
    //             $category_id = $category[0]->product_category_id;
    //         }
    //         $data['products'] = pluck_multi_array($this->product_model->product_listing(), 'obj', 'category_id');
    //         // dd($data['products']);

    //         $this->global['pageTitle'] = 'Mil Paints : product Listing';
    //         $this->loadViews("product/product_listing", $this->global, $data, NULL);
    //     }
    // }
    public function product_listing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $category_id = htmlentities(escapeString($this->uri->segment(3)));
            if((int)$category_id) {
                $searchText = $this->security->xss_clean($this->input->post('searchText'));
                $data['searchText'] = $searchText;
                $this->load->library('pagination');
                $count = $this->product_model->product_listing_count($searchText);
                // $returns = $this->paginationCompress ( "product_listing/", $count, 10 );
                $data['set'] = $category_id;
                $data['category'] = $this->product_category_model->get_all_product_category();
                $data['products'] = $this->product_model->product_listing($searchText, $category_id);
                // dd($data['products']);
                $this->global['pageTitle'] = 'Mil Paints : Product Listing';
                $this->loadViews("product/product_listing", $this->global, $data, NULL);
            } else {
                $searchText = $this->security->xss_clean($this->input->post('searchText'));
                $data['searchText'] = $searchText;
                $this->load->library('pagination');
                $count = $this->product_model->product_listing_count($searchText);
                $returns = $this->paginationCompress ( "product_listing/", $count, 10 );
                $data['set'] = $category_id;
                $data['category'] = $this->product_category_model->get_all_product_category();
                $data['products'] = $this->product_model->all_product_listing($searchText, $returns["page"], $returns["segment"]);
                $this->global['pageTitle'] = 'Mil Paints : Product Listing';
                $this->loadViews("product/product_listing", $this->global, $data, NULL);
            }
        }
    }
    public function product_list_by_category() {
        $category_id = $this->input->post('category_id');
        if((int)$category_id) {
            $string = base_url("product/product_listing/$category_id");
            echo $string;
        } else {
            redirect(base_url("product/product_listing"));
        }
    }
    function addproduct()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('product_model');
            $data['category'] = $this->product_category_model->get_all_product_category();
            $this->global['pageTitle'] = 'Mil Paints : Add New product';
            $this->loadViews("product/addproduct", $this->global, $data, NULL);
        }
    }
    function addproductConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('page_slug','Page Slug','trim|required');
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            $this->form_validation->set_rules('short_description','Short Description','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addproduct();
            }
            else
            {
                $category_id = $this->input->post('category_id');
                $page_slug = $this->input->post('page_slug');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $image = $this->input->post('image');
                $short_description = $this->input->post('short_description');

                $data = array(); 
                if(!empty($_FILES['image'])){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '10000'; // max_size in kb 
                    $config['file_name'] = $_FILES['image']['name']; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('image')){ 
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
                $this->load->view('product/addproduct',$data);

                $productInfo = array('category_id'=>$category_id, 'page_slug'=>$page_slug, 'title'=>$title, 'description'=>$description, 'short_description'=>$short_description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $result = $this->product_model->addproduct($productInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('product_listing');
            }
        }
    }
    function editproduct($product_id = NULL)
    {
        if($this->isAdmin() == TRUE && $product_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($product_id == null)
            {
                redirect('product_listing');
            }
            $data['productInfo'] = $this->product_model->getproductInfo($product_id);
            $data['category'] = $this->product_category_model->get_all_product_category();
            $this->global['pageTitle'] = 'Mil Paints : Edit product';
            
            $this->loadViews("product/editproduct", $this->global, $data, NULL);
        }
    }
    function editproductConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $product_id = $this->input->post('product_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('page_slug','Page Slug','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            $this->form_validation->set_rules('short_description','Short Description','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editproduct($product_id);
            }
            else
            {
                $category_id = $this->input->post('category_id');
                $page_slug = $this->input->post('page_slug');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $short_description = $this->input->post('short_description');
                $productInfo = array('category_id'=>$category_id, 'page_slug'=>$page_slug, 'title'=>$title, 'description'=>$description, 'short_description'=>$short_description, 'updated_at'=>date('Y-m-d H:i:s'));
                $data = array(); 
                if($_FILES['image']['name']!=""){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png'; 
                    $config['max_size'] = '100000'; // max_size in kb 
                    $config['file_name'] = $_FILES['image']['name']; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('image')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        $data['response'] = 'successfully uploaded '.$filename; 
                        $productInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                // dd($productInfo);
                $result = $this->product_model->editproduct($productInfo, $product_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('product_listing');
            }
        }
    }
    function deleteproduct($product_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->product_model->deleteInfo($product_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('product_listing');
        }
    }
}
?>