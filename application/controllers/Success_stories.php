<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Success_stories extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('success_stories_model');
        $this->load->model('team_model');
        $this->load->library(array('upload','image_lib'));
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pagess_title'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function success_stories_listing()
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
            
            $count = $this->success_stories_model->success_stories_listing_count($searchText);

            $returns = $this->paginationCompress ( "success_stories_listing/", $count, 10 );
            
            $data['success_storiess'] = $this->success_stories_model->success_stories_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pagess_title'] = 'Mil Paints : success_stories Listing';
            
            $this->loadViews("success_stories/success_stories_listing", $this->global, $data, NULL);
        }
    }
    function addsuccess_stories()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('success_stories_model');
            $data['teams'] = $this->team_model->get_all_team();            
            $this->global['pagess_title'] = 'Mil Paints : Add New success_stories';            
            $this->loadViews("success_stories/addsuccess_stories", $this->global, $data, NULL);
        }
    }
    function addsuccess_storiesConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            // $this->load->library('form_validation');
            
            // $this->form_validation->set_rules('teamID','Team','trim|required');
            // $this->form_validation->set_rules('ss_title','Title','trim|required');
            // $this->form_validation->set_rules('ss_age','Age','trim|required');
            // $this->form_validation->set_rules('lost_kgs_duration','Lost Kgs Duration','trim|required');
            // $this->form_validation->set_rules('ss_designation','Designation','trim|required');
            // $this->form_validation->set_rules('ss_location','Location','trim|required');
            // $this->form_validation->set_rules('ss_rating','Rating','trim|required');
            // $this->form_validation->set_rules('ss_image','Image','trim|required');
            // $this->form_validation->set_rules('ss_description','Description','trim|required');

            
            // if($this->form_validation->run() == FALSE)
            // {
            //     $this->addsuccess_stories();
            // }
            // else
            // {
                $image_one = $this->input->post('image_one');
                if($_FILES['image_one']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_one'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_one = $image['image_upload']['upload_data']['file_name']; //Image Name
                    }
                }

                $description_one = $this->input->post('description_one');
                $title_one = $this->input->post('title_one');
                $age_one = $this->input->post('age_one');
                $lkd_one = $this->input->post('lkd_one');
                $teamID_one = $this->input->post('teamID_one');


                $image_two = $this->input->post('image_two');
                if($_FILES['image_two']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_two'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_two = $image['image_upload']['upload_data']['file_name']; //Image Name
                    }
                }

                $title_two = $this->input->post('title_two');
                $designation_two = $this->input->post('designation_two');
                $location_two    = $this->input->post('location_two');
                $rating_two = $this->input->post('rating_two');
                $description_two = $this->input->post('description_two');
                $teamID_two = $this->input->post('teamID_two');


                $image_three = $this->input->post('image_three');
                if($_FILES['image_three']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_three'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_three = $image['image_upload']['upload_data']['file_name']; //Image Name
                    }
                }

                $title_three = $this->input->post('title_three');
                $designation_three = $this->input->post('designation_three');
                $location_three = $this->input->post('location_three');
                $teamID_three = $this->input->post('teamID_three');
                $description_three = $this->input->post('description_three');


                $image_four = $this->input->post('image_four');
                if($_FILES['image_four']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_four'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_four = $image['image_upload']['upload_data']['file_name']; //Image Name
                    }
                }

                $title_four = $this->input->post('title_four');
                $designation_four = $this->input->post('designation_four');
                $location_four = $this->input->post('location_four');
                $teamID_four = $this->input->post('teamID_four');
                $description_four = $this->input->post('description_four');
                

                $success_storiesInfo = array('image_one'=>$image_filename_one, 'description_one'=>$description_one, 'title_one'=>$title_one, 'age_one'=>$age_one, 'lkd_one'=>$lkd_one, 'teamID_one'=>$teamID_one, 'image_two'=>$image_filename_two, 'title_two'=>$title_two,'designation_two'=>$designation_two, 'location_two'=>$location_two, 'rating_two'=>$rating_two, 'description_two'=>$description_two, 'teamID_two'=>$teamID_two, 'image_three'=>$image_filename_three, 'title_three'=>$title_three, 'designation_three'=>$designation_three,'location_three'=>$location_three, 'teamID_three'=>$teamID_three, 'description_three'=>$description_three, 'image_four'=>$image_filename_four, 'title_four'=>$title_four, 'designation_four'=>$designation_four, 'location_four'=>$location_four, 'teamID_four'=>$teamID_four,'description_four'=>$description_four,'created_at'=>date('Y-m-d H:i:s'));
                // dd($success_storiesInfo);
                $this->load->model('success_stories_model');
                $result = $this->success_stories_model->addsuccess_stories($success_storiesInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('addsuccess_stories');
            // }
        }
    }
    function editsuccess_stories($success_stories_id = NULL)
    {
        if($this->isAdmin() == TRUE && $success_stories_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($success_stories_id == null)
            {
                redirect('success_stories_listing');
            }
            $data['success_storiesInfo'] = $this->success_stories_model->getsuccess_storiesInfo($success_stories_id);
            $data['teams'] = $this->team_model->get_all_team();            

            $this->global['pageTitle'] = 'Mil Paints : Edit success_stories';
            
            $this->loadViews("success_stories/editsuccess_stories", $this->global, $data, NULL);
        }
    }
    function editsuccess_storiesConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $success_stories_id = $this->input->post('success_stories_id');
            
            //$this->form_validation->set_rules('image_one','Image_one','trim|required');
            //$this->form_validation->set_rules('description_one','Description_one','trim|required');
            //$this->form_validation->set_rules('title_one','Title_one','trim|required');
            //$this->form_validation->set_rules('age_one','Age_one','trim|required');
            //$this->form_validation->set_rules('lkd_one','Lkd_one','trim|required');   
            //$this->form_validation->set_rules('teamID_one','TeamID_one','trim|required');
            

            // if($this->form_validation->run() == FALSE)
            // {
            //     $this->editsuccess_stories($success_stories_id);
            // }
            // else
            // {
                $description_one = $this->input->post('description_one');
                $title_one = $this->input->post('title_one');
                $age_one = $this->input->post('age_one');
                $lkd_one = $this->input->post('lkd_one');
                $teamID_one = $this->input->post('teamID_one');
                $title_two = $this->input->post('title_two');
                $designation_two = $this->input->post('designation_two');
                $location_two = $this->input->post('location_two');
                $rating_two = $this->input->post('rating_two');
                $description_two = $this->input->post('description_two');
                $teamID_two = $this->input->post('teamID_two');
                $title_three = $this->input->post('title_three');
                $designation_three = $this->input->post('designation_three');
                $location_three = $this->input->post('location_three');
                $teamID_three = $this->input->post('teamID_three');
                $description_three = $this->input->post('description_three');
                $title_four = $this->input->post('title_four');
                $designation_four = $this->input->post('designation_four');
                $location_four = $this->input->post('location_four');
                $teamID_four = $this->input->post('teamID_four');
                $description_four = $this->input->post('description_four');
                $success_storiesInfo = array('description_one'=>$description_one, 'title_one'=>$title_one, 'age_one'=>$age_one, 'lkd_one'=>$lkd_one, 'teamID_one'=>$teamID_one,'title_two'=>$title_two,'designation_two'=>$designation_two, 'location_two'=>$location_two, 'rating_two'=>$rating_two, 'description_two'=>$description_two, 'teamID_two'=>$teamID_two, 'title_three'=>$title_three, 'designation_three'=>$designation_three,'location_three'=>$location_three, 'teamID_three'=>$teamID_three, 'description_three'=>$description_three,'title_four'=>$title_four, 'designation_four'=>$designation_four, 'location_four'=>$location_four, 'teamID_four'=>$teamID_four,'description_four'=>$description_four, 'updated_at'=>date('Y-m-d H:i:s'));

                if($_FILES['image_one']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_one'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_one = $image['image_upload']['upload_data']['file_name']; //Image Name
                        $success_storiesInfo['image_one']=$image_filename_one;
                    }
                }
                
                if($_FILES['image_two']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                // 'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_two'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_two = $image['image_upload']['upload_data']['file_name']; //Image Name
                        $success_storiesInfo['image_two']=$image_filename_two;
                    }
                }

                if($_FILES['image_three']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_three'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_three = $image['image_upload']['upload_data']['file_name']; //Image Name
                        $success_storiesInfo['image_three']=$image_filename_three;
                    }
                }

                if($_FILES['image_four']['tmp_name'])
                {
                    $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                                );
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); 
                    
                    if($this->upload->do_upload('image_four'))
                    {
                        $image['image_upload']=array('upload_data' => $this->upload->data()); //Image Upload
                        $image_filename_four = $image['image_upload']['upload_data']['file_name']; //Image Name
                        $success_storiesInfo['image_four']=$image_filename_four;
                    }
                }
                // dd($success_storiesInfo);
                
                $result = $this->success_stories_model->editsuccess_stories($success_storiesInfo, $success_stories_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('editsuccess_stories/'.$success_stories_id);
            // }
        }
    }
    function success_stories_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $success_stories_id= $this->input->post('success_stories_id');
            $data = $this->success_stories_model->getsuccess_storiesInfo($success_stories_id);
            echo json_encode($data);
        }
    }
    function deletesuccess_stories($success_stories_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->success_stories_model->deleteInfo($success_stories_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('success_stories_listing');
        }
    }
}
?>