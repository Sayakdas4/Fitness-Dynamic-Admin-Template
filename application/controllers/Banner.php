<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Banner extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function banner_listing()
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
            
            $count = $this->banner_model->banner_listing_count($searchText);

            $returns = $this->paginationCompress ( "banner_listing/", $count, 10 );
            
            $data['banners'] = $this->banner_model->banner_listing($searchText, $returns["page"], $returns["segment"]);
            $data['banner_video'] = $this->banner_model->get_home_banner_by_id();

            $data['home_banner'] = $this->banner_model->get_all_banner_by_home();
            $data['about_us_banner'] = $this->banner_model->get_all_banner_by_about_us();
            $data['service_banner'] = $this->banner_model->get_all_banner_by_service();
            $data['banner_banner'] = $this->banner_model->get_all_banner_by_team();
            $data['contact_us_banner'] = $this->banner_model->get_all_banner_by_contact_us();
            // $this->data['banner_count'] = $this->banner_model->get_all_banner();
            $this->global['pageTitle'] = 'Mil Paints : banner Listing';
            
            $this->loadViews("banner/banner_listing", $this->global, $data, NULL);
        }
    }
    function addbanner()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('banner_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New banner';

            $this->loadViews("banner/addbanner", $this->global, NULL);
        }
    }
    function addbannerConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Section','trim|required');
            // $this->form_validation->set_rules('description_one','Description','trim|required');
            // $this->form_validation->set_rules('description_two','Description','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addbanner();
            }
            else
            {
                $title = $this->input->post('title');
                $link = $this->input->post('link');
                $description_one = $this->input->post('description_one');
                $description_two = $this->input->post('description_two');
                $image = $this->input->post('image');

                $data = array(); 
                if(!empty($_FILES['image'])){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|mp4'; 
                    $config['max_size'] = '100000'; // max_size in kb 
                    $config['file_name'] = $_FILES['image']['name']; 
                    // $config['width']    = 1920;
                    // $config['height']   = 1080;

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
                $this->load->view('banner/addbanner',$data); 

                $bannerInfo = array('title'=>$title, 'link'=>$link, 'description_one'=>$description_one, 'description_two'=>$description_two, 'image'=>$filename, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('banner_model');
                $result = $this->banner_model->addbanner($bannerInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('addbanner');
            }
        }
    }
    function editbanner($banner_id = NULL)
    {
        if($this->isAdmin() == TRUE && $banner_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($banner_id == null)
            {
                redirect('banner_listing');
            }
            $data['bannerInfo'] = $this->banner_model->getbannerInfo($banner_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit banner';
            
            $this->loadViews("banner/editbanner", $this->global, $data, NULL);
        }
    }
    function editbannerConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $banner_id = $this->input->post('banner_id');
            
            $this->form_validation->set_rules('title','Section','trim|required');
            // $this->form_validation->set_rules('description','Description','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editbanner($banner_id);
            }
            else
            {
                $title = $this->input->post('title');
                $link = $this->input->post('link');
                $description_one = $this->input->post('description_one');
                $description_two = $this->input->post('description_two');

                $bannerInfo = array('title'=>$title, 'link'=>$link, 'description_one'=>$description_one, 'description_two'=>$description_two, 'updated_at'=>date('Y-m-d H:i:s'));

                $data = array(); 
                if($_FILES['image']['name']!=""){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|mp4'; 
                    $config['max_size'] = '100000'; // max_size in kb 
                    $config['file_name'] = $_FILES['image']['name'];
                    // $config['create_thumb'] = FALSE;
                    // $config['maintain_ratio'] = FALSE;
                    // $config['width']    = 1920;
                    // $config['height']   = 1080; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
                    // $this->upload->resize();
                     // File upload
                    if($this->upload->do_upload('image')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        $data['response'] = 'successfully uploaded '.$filename; 
                        $bannerInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }
                
                $result = $this->banner_model->editbanner($bannerInfo, $banner_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('editbanner/'.$banner_id);
            }
        }
    }

    function banner_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $banner_id= $this->input->post('banner_id');
            $data = $this->banner_model->getbannerInfo($banner_id);
            echo json_encode($data);
        }
    }

    function deletebanner($banner_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->banner_model->deleteInfo($banner_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('banner_listing');
        }
    }
}
?>