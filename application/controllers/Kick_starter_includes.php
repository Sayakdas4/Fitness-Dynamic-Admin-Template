<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Kick_starter_includes extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kick_starter_includes_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function kick_starter_includes_listing()
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
            
            $count = $this->kick_starter_includes_model->kick_starter_includes_listing_count($searchText);

            $returns = $this->paginationCompress ( "kick_starter_includes_listing/", $count, 10 );
            
            $data['kick_starter_includess'] = $this->kick_starter_includes_model->kick_starter_includes_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : kick_starter_includes Listing';
            
            $this->loadViews("kick_starter_includes/kick_starter_includes_listing", $this->global, $data, NULL);
        }
    }
    function addkick_starter_includes()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('kick_starter_includes_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New kick_starter_includes';

            $this->loadViews("kick_starter_includes/addkick_starter_includes", $this->global, NULL);
        }
    }

    function addkick_starter_includesConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('type','type','trim|required');
            $this->form_validation->set_rules('left_top','left_top','trim|required');
            $this->form_validation->set_rules('left_bottom','left_bottom','trim|required');
            $this->form_validation->set_rules('right_top','right_top By','trim|required');
            $this->form_validation->set_rules('right_bottom','right_bottom','trim|required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addkick_starter_includes();
            }
            else
            {
                $type = $this->input->post('type');
                $image = $this->input->post('image');
                $left_top = $this->input->post('left_top');
                $left_bottom = $this->input->post('left_bottom');
                $right_top = $this->input->post('right_top');
                $right_bottom = $this->input->post('right_bottom');

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
                $this->load->view('kick_starter_includes/addkick_starter_includes',$data);

                $kick_starter_includesInfo = array('type'=>$type, 'image'=>$filename, 'left_top'=>$left_top, 'left_bottom'=>$left_bottom, 'right_top'=>$right_top, 'right_bottom'=>$right_bottom, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($kick_starter_includesInfo);

                $this->load->model('kick_starter_includes_model');
                $result = $this->kick_starter_includes_model->addkick_starter_includes($kick_starter_includesInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addkick_starter_includes');
            }
        }
    }
    function editkick_starter_includes($kick_starter_includes_id = NULL)
    {
        if($this->isAdmin() == TRUE && $kick_starter_includes_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($kick_starter_includes_id == null)
            {
                redirect('kick_starter_includes_listing');
            }
            $data['kick_starter_includesInfo'] = $this->kick_starter_includes_model->getkick_starter_includesInfo($kick_starter_includes_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit kick_starter_includes';
            
            $this->loadViews("kick_starter_includes/editkick_starter_includes", $this->global, $data, NULL);
        }
    }
    function editkick_starter_includesConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $kick_starter_includes_id = $this->input->post('kick_starter_includes_id');
            
            $this->form_validation->set_rules('type','type','trim|required');
            $this->form_validation->set_rules('left_top','left_top','trim|required');
            $this->form_validation->set_rules('left_bottom','left_bottom','trim|required');
            $this->form_validation->set_rules('right_top','right_top By','trim|required');
            $this->form_validation->set_rules('right_bottom','right_bottom','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editkick_starter_includes($kick_starter_includes_id);
            }
            else
            {
                $type = $this->input->post('type');
                $left_top = $this->input->post('left_top');
                $left_bottom = $this->input->post('left_bottom');
                $right_top = $this->input->post('right_top');
                $right_bottom = $this->input->post('right_bottom');
                $kick_starter_includesInfo = array('type'=>$type, 'left_top'=>$left_top, 'left_bottom'=>$left_bottom, 'right_top'=>$right_top, 'right_bottom'=>$right_bottom, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $kick_starter_includesInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->kick_starter_includes_model->editkick_starter_includes($kick_starter_includesInfo, $kick_starter_includes_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editkick_starter_includes/'.$kick_starter_includes_id);
            }
        }
    }

    function kick_starter_includes_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $kick_starter_includes_id= $this->input->post('kick_starter_includes_id');
            $data = $this->kick_starter_includes_model->getkick_starter_includesInfo($kick_starter_includes_id);
            echo json_encode($data);
        }
    }

    function deletekick_starter_includes($kick_starter_includes_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->kick_starter_includes_model->deleteInfo($kick_starter_includes_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('kick_starter_includes_listing');
        }
    }
}
?>