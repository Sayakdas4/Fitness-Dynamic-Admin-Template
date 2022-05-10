<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Team extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('team_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function team_listing()
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
            
            $count = $this->team_model->team_listing_count($searchText);

            $returns = $this->paginationCompress ( "team_listing/", $count, 10 );
            
            $data['teams'] = $this->team_model->team_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : team Listing';
            
            $this->loadViews("team/team_listing", $this->global, $data, NULL);
        }
    }
    function addteam()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('team_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New team';

            $this->loadViews("team/addteam", $this->global, NULL);
        }
    }

    // function check_username()
    // {
    //     $team_id = $this->input->post("team_id");
    //     $username = $this->input->post("username");

    //     if(empty($team_id)){
    //         $result = $this->team_model->check_username($username);
    //     } else {
    //         $result = $this->team_model->check_username($username, $team_id);
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
        $exists = $this->team_model->check_username($username);

        $data = count($exists);
        echo json_encode($data);
        if (empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    function addteamConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('username','User Name','trim|required');
            $this->form_validation->set_rules('designation','Designation','trim|required');
            $this->form_validation->set_rules('education_short','Education','trim|required');
            $this->form_validation->set_rules('certified_by','Certified By','trim|required');
            $this->form_validation->set_rules('education','Education','trim|required');
            $this->form_validation->set_rules('about','About','trim|required');
            $this->form_validation->set_rules('certifications','Certifications','trim|required');
            $this->form_validation->set_rules('industry_experience','Industry Experience','trim|required');
            $this->form_validation->set_rules('clients_coached','Clients Coached','trim|required');
            $this->form_validation->set_rules('current_location','Current Location','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addteam();
            }
            else
            {
                $title = $this->input->post('title');
                $username = $this->input->post('username');
                $designation = $this->input->post('designation');
                $education_short = $this->input->post('education_short');
                $certified_by = $this->input->post('certified_by');
                $image = $this->input->post('image');
                $education = $this->input->post('education');
                $about = $this->input->post('about');
                $certifications = $this->input->post('certifications');
                $industry_experience = $this->input->post('industry_experience');
                $clients_coached = $this->input->post('clients_coached');
                $current_location = $this->input->post('current_location');
                $fb_link = $this->input->post('fb_link');
                $twitter_link = $this->input->post('twitter_link');
                $instagram_link = $this->input->post('instagram_link');
                $linkedin_link = $this->input->post('linkedin_link');

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
                $this->load->view('team/addteam',$data);

                $teamInfo = array('title'=>$title, 'username'=>$username, 'designation'=>$designation, 'education_short'=>$education_short, 'certified_by'=>$certified_by, 'image'=>$filename, 'education'=>$education, 'about'=>$about, 'certifications'=>$certifications, 'industry_experience'=>$industry_experience, 'clients_coached'=>$clients_coached, 'current_location'=>$current_location, 'fb_link'=>$fb_link, 'twitter_link'=>$twitter_link, 'instagram_link'=>$instagram_link, 'linkedin_link'=>$linkedin_link, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($teamInfo);

                $this->load->model('team_model');
                $result = $this->team_model->addteam($teamInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addteam');
            }
        }
    }
    function editteam($team_id = NULL)
    {
        if($this->isAdmin() == TRUE && $team_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($team_id == null)
            {
                redirect('team_listing');
            }
            $data['teamInfo'] = $this->team_model->getteamInfo($team_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit team';
            
            $this->loadViews("team/editteam", $this->global, $data, NULL);
        }
    }
    function editteamConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $team_id = $this->input->post('team_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');
            $this->form_validation->set_rules('username','User Name','trim|required');
            $this->form_validation->set_rules('designation','Designation','trim|required');
            $this->form_validation->set_rules('education_short','Education','trim|required');
            $this->form_validation->set_rules('certified_by','Certified By','trim|required');
            $this->form_validation->set_rules('education','Education','trim|required');
            $this->form_validation->set_rules('about','About','trim|required');
            $this->form_validation->set_rules('certifications','Certifications','trim|required');
            $this->form_validation->set_rules('industry_experience','Industry Experience','trim|required');
            $this->form_validation->set_rules('clients_coached','Clients Coached','trim|required');
            $this->form_validation->set_rules('current_location','Current Location','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editteam($team_id);
            }
            else
            {
                $title = $this->input->post('title');
                $username = $this->input->post('username');
                $designation = $this->input->post('designation');
                $education_short = $this->input->post('education_short');
                $certified_by = $this->input->post('certified_by');
                $education = $this->input->post('education');
                $about = $this->input->post('about');
                $certifications = $this->input->post('certifications');
                $industry_experience = $this->input->post('industry_experience');
                $clients_coached = $this->input->post('clients_coached');
                $current_location = $this->input->post('current_location');
                $fb_link = $this->input->post('fb_link');
                $twitter_link = $this->input->post('twitter_link');
                $instagram_link = $this->input->post('instagram_link');
                $linkedin_link = $this->input->post('linkedin_link');
                $teamInfo = array('title'=>$title, 'username'=>$username, 'designation'=>$designation, 'education_short'=>$education_short, 'certified_by'=>$certified_by, 'education'=>$education, 'about'=>$about, 'certifications'=>$certifications, 'industry_experience'=>$industry_experience, 'clients_coached'=>$clients_coached, 'current_location'=>$current_location, 'fb_link'=>$fb_link, 'twitter_link'=>$twitter_link, 'instagram_link'=>$instagram_link, 'linkedin_link'=>$linkedin_link, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $teamInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->team_model->editteam($teamInfo, $team_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editteam/'.$team_id);
            }
        }
    }

    function team_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $team_id= $this->input->post('team_id');
            $data = $this->team_model->getteamInfo($team_id);
            echo json_encode($data);
        }
    }

    function deleteteam($team_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->team_model->deleteInfo($team_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('team_listing');
        }
    }
}
?>