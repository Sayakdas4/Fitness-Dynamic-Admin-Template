<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Home_management extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_management_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function home_management_listing()
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
            
            $count = $this->home_management_model->home_management_listing_count($searchText);

            $returns = $this->paginationCompress ( "home_management_listing/", $count, 10 );
            
            $data['home_managements'] = $this->home_management_model->home_management_listing($searchText);
            
            $this->global['pageTitle'] = 'Mil Paints : home_management Listing';
            
            $this->loadViews("home_management/home_management_listing", $this->global, $data, NULL);
        }
    }
    function addhome_management()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('home_management_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New home_management';

            $this->loadViews("home_management/addhome_management", $this->global, NULL);
        }
    }

    function addhome_managementConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('subtitle_one','Subtitle 1','trim|required');
            // $this->form_validation->set_rules('subtitle_two','Subtitle 2','trim|required');
            // $this->form_validation->set_rules('description','Description','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addhome_management();
            }
            else
            {
                $title = $this->input->post('title');
                $subtitle_one = $this->input->post('subtitle_one');
                $subtitle_two = $this->input->post('subtitle_two');
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
                $this->load->view('home_management/addhome_management',$data);

                $home_managementInfo = array('title'=>$title, 'subtitle_one'=>$subtitle_one, 'subtitle_two'=>$subtitle_two, 'description'=>$description, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($home_managementInfo);

                $this->load->model('home_management_model');
                $result = $this->home_management_model->addhome_management($home_managementInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addhome_management');
            }
        }
    }
    function edithome_management($home_management_id = NULL)
    {
        if($this->isAdmin() == TRUE && $home_management_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($home_management_id == null)
            {
                redirect('home_management_listing');
            }
            $data['home_managementInfo'] = $this->home_management_model->gethome_managementInfo($home_management_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit home_management';
            
            $this->loadViews("home_management/edithome_management", $this->global, $data, NULL);
        }
    }
    function edithome_managementConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $home_management_id = $this->input->post('home_management_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            // $this->form_validation->set_rules('description','Description','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->edithome_management($home_management_id);
            }
            else
            {
                $title = $this->input->post('title');
                $subtitle_one = $this->input->post('subtitle_one');
                $subtitle_two = $this->input->post('subtitle_two');
                $description = $this->input->post('description');
                $home_managementInfo = array('title'=>$title, 'subtitle_one'=>$subtitle_one, 'subtitle_two'=>$subtitle_two, 'description'=>$description, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $home_managementInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->home_management_model->edithome_management($home_managementInfo, $home_management_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('edithome_management/'.$home_management_id);
            }
        }
    }

    function home_management_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $home_management_id= $this->input->post('home_management_id');
            $data = $this->home_management_model->gethome_managementInfo($home_management_id);
            echo json_encode($data);
        }
    }

    function deletehome_management($home_management_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->home_management_model->deleteInfo($home_management_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('home_management_listing');
        }
    }
}
?>