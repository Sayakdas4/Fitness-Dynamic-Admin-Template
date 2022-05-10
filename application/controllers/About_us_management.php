<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class about_us_management extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('about_us_management_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function about_us_management_listing()
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
            
            $count = $this->about_us_management_model->about_us_management_listing_count($searchText);

            $returns = $this->paginationCompress ( "about_us_management_listing/", $count, 10 );
            
            $data['about_us_managements'] = $this->about_us_management_model->about_us_management_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : about_us_management Listing';
            
            $this->loadViews("about_us_management/about_us_management_listing", $this->global, $data, NULL);
        }
    }
    function addabout_us_management()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('about_us_management_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New about_us_management';

            $this->loadViews("about_us_management/addabout_us_management", $this->global, NULL);
        }
    }

    // function check_username()
    // {
    //     $about_us_management_id = $this->input->post("about_us_management_id");
    //     $username = $this->input->post("username");

    //     if(empty($about_us_management_id)){
    //         $result = $this->about_us_management_model->check_username($username);
    //     } else {
    //         $result = $this->about_us_management_model->check_username($username, $about_us_management_id);
    //     }
    //     if(empty($result)){ 
    //         echo("true"); 
    //     } else { 
    //         echo("false"); 
    //     }
    // }

    function check_username()
    {
        $username = $this->input->post('username');
        $exists = $this->about_us_management_model->check_username($username);

        $data = count($exists);
        echo json_encode($data);
        if (empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    function addabout_us_managementConfig()
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

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addabout_us_management();
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
                $this->load->view('about_us_management/addabout_us_management',$data);

                $about_us_managementInfo = array('title'=>$title, 'description'=>$description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($about_us_managementInfo);

                $this->load->model('about_us_management_model');
                $result = $this->about_us_management_model->addabout_us_management($about_us_managementInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addabout_us_management');
            }
        }
    }
    function editabout_us_management($about_us_management_id = NULL)
    {
        if($this->isAdmin() == TRUE && $about_us_management_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($about_us_management_id == null)
            {
                redirect('about_us_management_listing');
            }
            $data['about_us_managementInfo'] = $this->about_us_management_model->getabout_us_managementInfo($about_us_management_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit about_us_management';
            
            $this->loadViews("about_us_management/editabout_us_management", $this->global, $data, NULL);
        }
    }
    function editabout_us_managementConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $about_us_management_id = $this->input->post('about_us_management_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('description','Description','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editabout_us_management($about_us_management_id);
            }
            else
            {
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $about_us_managementInfo = array('title'=>$title, 'description'=>$description, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $about_us_managementInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }
                // dd($about_us_managementInfo);
                
                $result = $this->about_us_management_model->editabout_us_management($about_us_managementInfo, $about_us_management_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editabout_us_management/'.$about_us_management_id);
            }
        }
    }

    function about_us_management_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $about_us_management_id= $this->input->post('about_us_management_id');
            $data = $this->about_us_management_model->getabout_us_managementInfo($about_us_management_id);
            echo json_encode($data);
        }
    }

    function deleteabout_us_management($about_us_management_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->about_us_management_model->deleteInfo($about_us_management_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('about_us_management_listing');
        }
    }
}
?>