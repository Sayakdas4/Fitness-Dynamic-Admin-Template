<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Application extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function application_listing()
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
            
            $count = $this->application_model->application_listing_count($searchText);

            $returns = $this->paginationCompress ( "application_listing/", $count, 10 );
            
            $data['applications'] = $this->application_model->application_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : application Listing';
            
            $this->loadViews("application/application_listing", $this->global, $data, NULL);
        }
    }
    function addapplication()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('application_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New application';

            $this->loadViews("application/addapplication", $this->global, NULL);
        }
    }
    function addapplicationConfig()
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
                $this->addapplication();
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
                $this->load->view('application/addapplication',$data);

                $applicationInfo = array('title'=>$title, 'description'=>$description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('application_model');
                $result = $this->application_model->addapplication($applicationInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('application_listing');
            }
        }
    }
    function editapplication($application_id = NULL)
    {
        if($this->isAdmin() == TRUE && $application_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($application_id == null)
            {
                redirect('application_listing');
            }
            $data['applicationInfo'] = $this->application_model->getapplicationInfo($application_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit application';
            
            $this->loadViews("application/editapplication", $this->global, $data, NULL);
        }
    }
    function editapplicationConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $application_id = $this->input->post('application_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('image','Image','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editapplication($application_id);
            }
            else
            {
                $title = $this->input->post('title');
                $description = $this->input->post('description');

                $applicationInfo = array('title'=>$title, 'description'=>$description, 'updated_at'=>date('Y-m-d H:i:s'));

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
                        $applicationInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                // print_r($applicationInfo); die;
                $result = $this->application_model->editapplication($applicationInfo, $application_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('application_listing');
            }
        }
    }
    function deleteapplication($application_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->application_model->deleteInfo($application_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('application_listing');
        }
    }
}
?>