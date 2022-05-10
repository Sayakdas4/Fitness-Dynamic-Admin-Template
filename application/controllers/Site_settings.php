<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Site_settings extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('site_settings_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function site_settings_listing()
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
            
            $count = $this->site_settings_model->site_settings_listing_count($searchText);

            $returns = $this->paginationCompress ( "site_settings_listing/", $count, 10 );
            
            $data['site_settingss'] = $this->site_settings_model->site_settings_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : site_settings Listing';
            
            $this->loadViews("site_settings/site_settings_listing", $this->global, $data, NULL);
        }
    }

    function addsite_settings()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('site_settings_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New site_settings';

            $this->loadViews("site_settings/addsite_settings", $this->global, NULL);
        }
    }
    function addsite_settingsConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('description','Description','trim|required');
            // $this->form_validation->set_rules('image','Page Slug','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addsite_settings();
            }
            else
            {
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $image = $this->input->post('image');

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

                $site_settingsInfo = array('title'=>$title, 'description'=>$description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('site_settings_model');
                $result = $this->site_settings_model->addsite_settings($site_settingsInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                redirect('site_settings_listing');
            }
        }
    }
    function editsite_settings($site_settings_id = NULL)
    {
        if($this->isAdmin() == TRUE && $site_settings_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($site_settings_id == null)
            {
                redirect('site_settings_listing');
            }
            $data['site_settingsInfo'] = $this->site_settings_model->getsite_settingsInfo($site_settings_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit site_settings';
            
            $this->loadViews("site_settings/editsite_settings", $this->global, $data, NULL);
        }
    }
    function editsite_settingsConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $site_settings_id = $this->input->post('site_settings_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('description','Description','trim|required');
            // $this->form_validation->set_rules('image','Page Slug','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editsite_settings($site_settings_id);
            }
            else
            {
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $image = $this->input->post('image');

                $site_settingsInfo = array('title'=>$title, 'description'=>$description, 'updated_at'=>date('Y-m-d H:i:s'));

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
                        $site_settingsInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                     $data['response'] = 'failed'; 
                }

                $result = $this->site_settings_model->editsite_settings($site_settingsInfo, $site_settings_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }

                if($site_settings_id == 5){
                    redirect('editsite_settings/5');
                } if($site_settings_id == 4){
                    redirect('editsite_settings/4');
                } if($site_settings_id == 3){
                    redirect('editsite_settings/3');
                } else {
                    redirect('site_settings_listing');
                }
            }
        }
    }
    function deletesite_settings($site_settings_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->site_settings_model->deleteInfo($site_settings_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('site_settings_listing');
        }
    }
}
?>