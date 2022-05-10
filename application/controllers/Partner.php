<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Partner extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('partner_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function partner_listing()
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
            
            $count = $this->partner_model->partner_listing_count($searchText);

            $returns = $this->paginationCompress ( "partner_listing/", $count, 10 );
            
            $data['partners'] = $this->partner_model->partner_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : partner Listing';
            
            $this->loadViews("partner/partner_listing", $this->global, $data, NULL);
        }
    }
    function addpartner()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('partner_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New partner';

            $this->loadViews("partner/addpartner", $this->global, NULL);
        }
    }
    function addpartnerConfig()
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
                $this->addpartner();
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
                $this->load->view('partner/addpartner',$data);

                $partnerInfo = array('title'=>$title, 'description'=>$description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('partner_model');
                $result = $this->partner_model->addpartner($partnerInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('partner_listing');
            }
        }
    }
    function editpartner($partner_id = NULL)
    {
        if($this->isAdmin() == TRUE && $partner_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($partner_id == null)
            {
                redirect('partner_listing');
            }
            $data['partnerInfo'] = $this->partner_model->getpartnerInfo($partner_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit partner';
            
            $this->loadViews("partner/editpartner", $this->global, $data, NULL);
        }
    }
    function editpartnerConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $partner_id = $this->input->post('partner_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('image','Image','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editpartner($partner_id);
            }
            else
            {
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $partnerInfo = array('title'=>$title, 'description'=>$description, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $partnerInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->partner_model->editpartner($partnerInfo, $partner_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('partner_listing');
            }
        }
    }
    function deletepartner($partner_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->partner_model->deleteInfo($partner_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('partner_listing');
        }
    }
}
?>