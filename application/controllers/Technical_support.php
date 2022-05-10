<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Technical_support extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('technical_support_model');
        // $this->load->model('technical_supportdetails_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function technical_support_listing()
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
            
            $count = $this->technical_support_model->technical_support_listing_count($searchText);

            $returns = $this->paginationCompress ( "technical_support_listing/", $count, 10 );
            
            $data['technical_supports'] = $this->technical_support_model->technical_support_listing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Mil Paints : technical_support Listing';
            
            $this->loadViews("technical_support/technical_support_listing", $this->global, $data, NULL);
        }
    }
    function addtechnical_support()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('technical_support_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New technical_support';

            $this->loadViews("technical_support/addtechnical_support", $this->global, NULL);
        }
    }
    function addtechnical_supportConfig()
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
                $this->addtechnical_support();
            }
            else
            {
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
                $this->load->view('technical_support/addtechnical_support',$data);

                $technical_supportInfo = array('page_slug'=>$page_slug, 'title'=>$title, 'description'=>$description, 'short_description'=>$short_description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('technical_support_model');
                $result = $this->technical_support_model->addtechnical_support($technical_supportInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('technical_support_listing');
            }
        }
    }
    function edittechnical_support($technical_support_id = NULL)
    {
        if($this->isAdmin() == TRUE && $technical_support_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($technical_support_id == null)
            {
                redirect('technical_support_listing');
            }
            $data['technical_supportInfo'] = $this->technical_support_model->gettechnical_supportInfo($technical_support_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit technical_support';
            
            $this->loadViews("technical_support/edittechnical_support", $this->global, $data, NULL);
        }
    }
    function edittechnical_supportConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $technical_support_id = $this->input->post('technical_support_id');
            
            $this->form_validation->set_rules('page_slug','Page Slug','trim|required');
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            $this->form_validation->set_rules('short_description','Short Description','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->edittechnical_support($technical_support_id);
            }
            else
            {
                $page_slug = $this->input->post('page_slug');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $short_description = $this->input->post('short_description');
                $technical_supportInfo = array('page_slug'=>$page_slug, 'title'=>$title, 'description'=>$description, 'short_description'=>$short_description, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $technical_supportInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->technical_support_model->edittechnical_support($technical_supportInfo, $technical_support_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('technical_support_listing');
            }
        }
    }
    function deletetechnical_support($technical_support_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->technical_support_model->deleteInfo($technical_support_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('technical_support_listing');
        }
    }
}
?>