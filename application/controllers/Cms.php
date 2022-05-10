<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Cms extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function cms_listing()
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
            
            $count = $this->cms_model->cms_listing_count($searchText);

            $returns = $this->paginationCompress ( "cms_listing/", $count, 10 );
            
            $data['cmss'] = $this->cms_model->cms_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : cms Listing';
            
            $this->loadViews("cms/cms_listing", $this->global, $data, NULL);
        }
    }

    function addcms()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('cms_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New cms';

            $this->loadViews("cms/addcms", $this->global, NULL);
        }
    }
    function addcmsConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('page_slug','Page Slug','trim|required');
            // $this->form_validation->set_rules('image','Page Slug','trim|required');
            // $this->form_validation->set_rules('meta_title','Meta Title','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addcms();
            }
            else
            {
                if($this->cms_model->check_url($this->input->post('page_slug')) == FALSE){
                    $title = $this->input->post('title');
                    $page_slug = $this->input->post('page_slug');
                    $description = $this->input->post('description');
                    $image = $this->input->post('image');
                    $meta_title = $this->input->post('meta_title');
                    $meta_description = $this->input->post('meta_description');
                    $meta_tag = $this->input->post('meta_tag');

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

                    $cmsInfo = array('title'=>$title, 'page_slug'=>$page_slug, 'description'=>$description, 'image'=>$filename, 'meta_title'=>$meta_title, 'meta_description'=>$meta_description, 'meta_tag'=>$meta_tag, 'created_at'=>date('Y-m-d H:i:s'));
                    $this->load->model('cms_model');
                    $result = $this->cms_model->addcms($cmsInfo);

                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Add successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Creation failed');
                    }
                    redirect('addcms');
                } else {
                    $this->session->set_flashdata('error', 'Page Slug already exists');
                    redirect('addcms');
                }
            }
        }
    }
    function editcms($cms_id = NULL)
    {
        if($this->isAdmin() == TRUE && $cms_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($cms_id == null)
            {
                redirect('cms_listing');
            }
            $data['cmsInfo'] = $this->cms_model->getcmsInfo($cms_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit cms';
            
            $this->loadViews("cms/editcms", $this->global, $data, NULL);
        }
    }
    function editcmsConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $cms_id = $this->input->post('cms_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('page_slug','Page Slug','trim|required');
            // $this->form_validation->set_rules('description','Description','trim|required');
            // $this->form_validation->set_rules('image','Page Slug','trim|required');
            // $this->form_validation->set_rules('meta_title','Meta Title','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editcms($cms_id);
            }
            else
            {
                // if($this->cms_model->check_url($this->input->post('page_slug')) == FALSE){
                    $title = $this->input->post('title');
                    $page_slug = $this->input->post('page_slug');
                    $description = $this->input->post('description');
                    $image = $this->input->post('image');
                    $meta_title = $this->input->post('meta_title');
                    $meta_description = $this->input->post('meta_description');
                    $meta_tag = $this->input->post('meta_tag');

                    $cmsInfo = array('title'=>$title, 'page_slug'=>$page_slug, 'description'=>$description, 'meta_title'=>$meta_title, 'meta_description'=>$meta_description, 'meta_tag'=>$meta_tag, 'updated_at'=>date('Y-m-d H:i:s'));

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
                            $cmsInfo['image']=$filename;
                        }else{ 
                            $data['response'] = 'failed'; 
                        } 
                    }else{ 
                        $data['response'] = 'failed'; 
                    }

                    // dd($cmsInfo);

                    $result = $this->cms_model->editcms($cmsInfo, $cms_id);
                    
                    if($result == true)
                    {
                        $this->session->set_flashdata('success', 'Updated successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Updation failed');
                    }
                    redirect('editcms/'.$cms_id);
                // } else {
                //     $this->session->set_flashdata('error', 'Page Slug already exists');
                //     redirect('editcms');
                // }
            }
        }
    }
    function deletecms($cms_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->cms_model->deleteInfo($cms_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('cms_listing');
        }
    }
}
?>