<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Video extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('video_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function video_listing()
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
            
            $count = $this->video_model->video_listing_count($searchText);

            $returns = $this->paginationCompress ( "video_listing/", $count, 10 );
            
            $data['videos'] = $this->video_model->video_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : video Listing';
            
            $this->loadViews("video/video_listing", $this->global, $data, NULL);
        }
    }
    function addvideo()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('video_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New video';


            $this->loadViews("video/addvideo", $this->global, NULL);
        }
    }
    function addvideoConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('link','Link','trim|required');
            if($this->form_validation->run() == FALSE)
            {
                $this->addvideo();
            }
            else
            {
                $title = $this->input->post('title');
                $link = $this->input->post('link');

                $videoInfo = array('title'=>$title, 'link'=>$link, 'created_at'=>date('Y-m-d H:i:s'));
                $this->load->model('video_model');
                $result = $this->video_model->addvideo($videoInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('video_listing');
            }
        }
    }
    function editvideo($video_id = NULL)
    {
        if($this->isAdmin() == TRUE && $video_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($video_id == null)
            {
                redirect('video_listing');
            }
            $data['videoInfo'] = $this->video_model->getvideoInfo($video_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit video';
            
            $this->loadViews("video/editvideo", $this->global, $data, NULL);
        }
    }
    function editvideoConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $video_id = $this->input->post('video_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('link','Link','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editvideo($video_id);
            }
            else
            {
                $title = $this->input->post('title');
                $link = $this->input->post('link');

                $videoInfo = array('title'=>$title, 'link'=>$link, 'updated_at'=>date('Y-m-d H:i:s'));
                $result = $this->video_model->editvideo($videoInfo, $video_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('video_listing');
            }
        }
    }
    function deletevideo($video_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->video_model->deleteInfo($video_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('video_listing');
        }
    }
}
?>