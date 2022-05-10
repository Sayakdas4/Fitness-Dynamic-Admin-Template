<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Certifications extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('certifications_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function certifications_listing()
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
            
            $count = $this->certifications_model->certifications_listing_count($searchText);

            $returns = $this->paginationCompress ( "certifications_listing/", $count, 10 );
            
            $data['certificationss'] = $this->certifications_model->certifications_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : certifications Listing';
            
            $this->loadViews("certifications/certifications_listing", $this->global, $data, NULL);
        }
    }
    function addcertifications()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('certifications_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New certifications';

            $this->loadViews("certifications/addcertifications", $this->global, NULL);
        }
    }
    function addcertificationsConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('image','Image','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addcertifications();
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
                // load view 
                $this->load->view('certifications/addcertifications',$data);

                $certificationsInfo = array('title'=>$title, 'description'=>$description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('certifications_model');
                $result = $this->certifications_model->addcertifications($certificationsInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('certifications_listing');
            }
        }
    }
    function editcertifications($certifications_id = NULL)
    {
        if($this->isAdmin() == TRUE && $certifications_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($certifications_id == null)
            {
                redirect('certifications_listing');
            }
            $data['certificationsInfo'] = $this->certifications_model->getcertificationsInfo($certifications_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit certifications';
            
            $this->loadViews("certifications/editcertifications", $this->global, $data, NULL);
        }
    }
    function editcertificationsConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $certifications_id = $this->input->post('certifications_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('image','Image','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editcertifications($certifications_id);
            }
            else
            {
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $certificationsInfo = array('title'=>$title, 'description'=>$description, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $certificationsInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->certifications_model->editcertifications($certificationsInfo, $certifications_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('certifications_listing');
            }
        }
    }
    function deletecertifications($certifications_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->certifications_model->deleteInfo($certifications_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('certifications_listing');
        }
    }
}
?>