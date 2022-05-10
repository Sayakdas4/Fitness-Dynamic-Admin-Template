<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Exercise_video extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('exercise_video_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function exercise_video_listing()
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
            
            $count = $this->exercise_video_model->exercise_video_listing_count($searchText);

            $returns = $this->paginationCompress ( "exercise_video_listing/", $count, 10 );
            
            $data['exercise_videos'] = $this->exercise_video_model->exercise_video_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : exercise_video Listing';
            
            $this->loadViews("exercise_video/exercise_video_listing", $this->global, $data, NULL);
        }
    }
    function addexercise_video()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('exercise_video_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New exercise_video';
            $data['body_parts'] = $this->exercise_video_model->get_all_body_part();
            $data['equipments'] = $this->exercise_video_model->get_all_equipment();
            $data['levels'] = $this->exercise_video_model->get_all_level();

            $this->loadViews("exercise_video/addexercise_video", $this->global, $data, NULL);
        }
    }

    function addexercise_videoConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addexercise_video();
            }
            else
            {
                $body_partID = $this->input->post('body_partID');
                $equipmentID = $this->input->post('equipmentID');

                $exelevelID = $this->input->post('exelevelID[]');

                $title = $this->input->post('title');
                $image = $this->input->post('image');
                $description = $this->input->post('description');

                $data = array(); 
                if(!empty($_FILES['image'])){ 
                     // Set body_part 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|mp4'; 
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
                $this->load->view('exercise_video/addexercise_video',$data);

                $exercise_videoInfo = array('body_partID'=>$body_partID, 'equipmentID'=>$equipmentID, 'title'=>$title, 'image'=>$image, 'description'=>$description, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($exercise_videoInfo);

                $this->load->model('exercise_video_model');
                $result = $this->exercise_video_model->addexercise_video($exercise_videoInfo);
                // dd($result);
                if($exelevelID){
                    foreach($exelevelID as $lid){
                        $check_boxdata = array(
                            'exercise_videoID' => $result,
                            'check_boxID' => $lid
                        );
                        // dd($check_boxdata);
                        $check_box_result = $this->exercise_video_model->addexercise_video_check_box($check_boxdata);
                    } 
                }
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addexercise_video');
            }
        }
    }
    function editexercise_video($exercise_video_id = NULL, $exercise_video_check_box_id = NULL)
    {
        if($this->isAdmin() == TRUE && $exercise_video_id == 1 && $exercise_video_check_box_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($exercise_video_id == null && $exercise_video_check_box_id == null)
            {
                redirect('exercise_video_listing');
            }
            $data['exercise_videoInfo'] = $this->exercise_video_model->getexercise_videoInfo($exercise_video_id);

            $getexercise_video_check_boxInfo = $this->exercise_video_model->getexercise_video_check_boxInfo($exercise_video_id);
            $data['getexercise_video_check_boxInfo'] = $getexercise_video_check_boxInfo;

            $array_exelevelID = array();
            foreach($getexercise_video_check_boxInfo as $exelevelID){
                $check_boxID = $exelevelID->check_boxID;
                array_push($array_exelevelID, $check_boxID);
            }
            $data['array_exelevelID'] = $array_exelevelID;

            $data['body_parts'] = $this->exercise_video_model->get_all_body_part();
            $data['equipments'] = $this->exercise_video_model->get_all_equipment();
            $data['levels'] = $this->exercise_video_model->get_all_level();

            $this->global['pageTitle'] = 'Mil Paints : Edit exercise_video';
            
            $this->loadViews("exercise_video/editexercise_video", $this->global, $data, NULL);
        }
    }
    function editexercise_videoConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $exercise_video_id = $this->input->post('exercise_video_id');
            $exercise_video_check_box_id = $this->input->post('exercise_video_check_box_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editexercise_video($exercise_video_id);
            }
            else
            {
                $body_partID = $this->input->post('body_partID');
                $equipmentID = $this->input->post('equipmentID');

                $exelevelID = $this->input->post('exelevelID[]');

                $title = $this->input->post('title');
                $image = $this->input->post('image');
                $description = $this->input->post('description');
                $exercise_videoInfo = array('body_partID'=>$body_partID, 'equipmentID'=>$equipmentID, 'title'=>$title, 'image'=>$image, 'description'=>$description, 'updated_at'=>date('Y-m-d H:i:s'));
                $data = array(); 
                if($_FILES['image']['name']!=""){ 
                     // Set body_part 
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
                        $exercise_videoInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->exercise_video_model->editexercise_video($exercise_videoInfo, $exercise_video_id);
                // dd($result);

                if($exelevelID){
                    $this->exercise_video_model->deleteexercise_video_check_boxInfo($exercise_video_id);
                    foreach($exelevelID as $lid){
                        $check_boxdata = array(
                            'exercise_videoID' => $exercise_video_id,
                            'check_boxID' => $lid
                        );
                        
                        $check_box_result = $this->exercise_video_model->addexercise_video_check_box($check_boxdata);
                    } 
                }
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editexercise_video/'.$exercise_video_id);
            }
        }
    }

    function exercise_video_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $exercise_video_id= $this->input->post('exercise_video_id');
            $data = $this->exercise_video_model->getexercise_videoInfo($exercise_video_id);
            echo json_encode($data);
        }
    }

    function deleteexercise_video($exercise_video_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->exercise_video_model->deleteInfo($exercise_video_id);
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('exercise_video_listing');
        }
    }
}
?>