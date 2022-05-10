<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Featured_in extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('featured_in_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function featured_in_listing()
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
            
            $count = $this->featured_in_model->featured_in_listing_count($searchText);

            $returns = $this->paginationCompress ( "featured_in_listing/", $count, 10 );
            
            $data['featured_ins'] = $this->featured_in_model->featured_in_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : featured_in Listing';
            
            $this->loadViews("featured_in/featured_in_listing", $this->global, $data, NULL);
        }
    }
    function addfeatured_in()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('featured_in_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New featured_in';

            $this->loadViews("featured_in/addfeatured_in", $this->global, NULL);
        }
    }
    function addfeatured_inConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            // $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            // $this->form_validation->set_rules('image','Image','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addfeatured_in();
            }
            else
            {
                // $title = $this->input->post('title');
                $link = $this->input->post('link');
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
                $this->load->view('featured_in/addfeatured_in',$data);

                $featured_inInfo = array('description'=>$description, 'link'=>$link, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('featured_in_model');
                $result = $this->featured_in_model->addfeatured_in($featured_inInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('featured_in_listing');
            }
        }
    }
    function editfeatured_in($featured_in_id = NULL)
    {
        if($this->isAdmin() == TRUE && $featured_in_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($featured_in_id == null)
            {
                redirect('featured_in_listing');
            }
            $data['featured_inInfo'] = $this->featured_in_model->getfeatured_inInfo($featured_in_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit featured_in';
            
            $this->loadViews("featured_in/editfeatured_in", $this->global, $data, NULL);
        }
    }
    function editfeatured_inConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $featured_in_id = $this->input->post('featured_in_id');
            
            // $this->form_validation->set_rules('title','Description','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            // $this->form_validation->set_rules('image','Image','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editfeatured_in($featured_in_id);
            }
            else
            {
                // $title = $this->input->post('title');
                $link = $this->input->post('link');
                $description = $this->input->post('description');
                $featured_inInfo = array('description'=>$description, 'link'=>$link, 'updated_at'=>date('Y-m-d H:i:s'));
                $data = array(); 
                if($_FILES['image']['name']!=""){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|mp4'; 
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
                        $featured_inInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                $result = $this->featured_in_model->editfeatured_in($featured_inInfo, $featured_in_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('editfeatured_in/'.$featured_in_id);
            }
        }
    }
    function featured_in_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $featured_in_id= $this->input->post('featured_in_id');
            $data = $this->featured_in_model->getfeatured_inInfo($featured_in_id);
            echo json_encode($data);
        }
    }
    function deletefeatured_in($featured_in_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->featured_in_model->deleteInfo($featured_in_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('featured_in_listing');
        }
    }
}
?>