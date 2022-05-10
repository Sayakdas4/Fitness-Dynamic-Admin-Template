<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Coaching_includes extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('coaching_includes_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function coaching_includes_listing()
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
            
            $count = $this->coaching_includes_model->coaching_includes_listing_count($searchText);

            $returns = $this->paginationCompress ( "coaching_includes_listing/", $count, 10 );
            
            $data['coaching_includess'] = $this->coaching_includes_model->coaching_includes_listing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Mil Paints : coaching_includes Listing';
            
            $this->loadViews("coaching_includes/coaching_includes_listing", $this->global, $data, NULL);
        }
    }
    function addcoaching_includes()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('coaching_includes_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New coaching_includes';

            $this->loadViews("coaching_includes/addcoaching_includes", $this->global, NULL);
        }
    }

    function addcoaching_includesConfig()
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
                $this->addcoaching_includes();
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
                $this->load->view('coaching_includes/addcoaching_includes',$data);

                $coaching_includesInfo = array('type'=>$type, 'image'=>$filename, 'left_top'=>$left_top, 'left_bottom'=>$left_bottom, 'right_top'=>$right_top, 'right_bottom'=>$right_bottom, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($coaching_includesInfo);

                $this->load->model('coaching_includes_model');
                $result = $this->coaching_includes_model->addcoaching_includes($coaching_includesInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Creation successful!');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Creation failed');
                }
                
                redirect('addcoaching_includes');
            }
        }
    }
    function editcoaching_includes($coaching_includes_id = NULL)
    {
        if($this->isAdmin() == TRUE && $coaching_includes_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($coaching_includes_id == null)
            {
                redirect('coaching_includes_listing');
            }
            $data['coaching_includesInfo'] = $this->coaching_includes_model->getcoaching_includesInfo($coaching_includes_id);
            
            $this->global['pageTitle'] = 'Mil Paints : Edit coaching_includes';
            
            $this->loadViews("coaching_includes/editcoaching_includes", $this->global, $data, NULL);
        }
    }
    function editcoaching_includesConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $coaching_includes_id = $this->input->post('coaching_includes_id');
            
            $this->form_validation->set_rules('type','type','trim|required');
            $this->form_validation->set_rules('left_top','left_top','trim|required');
            $this->form_validation->set_rules('left_bottom','left_bottom','trim|required');
            $this->form_validation->set_rules('right_top','right_top By','trim|required');
            $this->form_validation->set_rules('right_bottom','right_bottom','trim|required');


            if($this->form_validation->run() == FALSE)
            {
                $this->editcoaching_includes($coaching_includes_id);
            }
            else
            {
                $type = $this->input->post('type');
                $left_top = $this->input->post('left_top');
                $left_bottom = $this->input->post('left_bottom');
                $right_top = $this->input->post('right_top');
                $right_bottom = $this->input->post('right_bottom');
                $coaching_includesInfo = array('type'=>$type, 'left_top'=>$left_top, 'left_bottom'=>$left_bottom, 'right_top'=>$right_top, 'right_bottom'=>$right_bottom, 'updated_at'=>date('Y-m-d H:i:s'));
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
                        $coaching_includesInfo['image']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                }

                
                $result = $this->coaching_includes_model->editcoaching_includes($coaching_includesInfo, $coaching_includes_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', '<i data-feather="check-circle" class="w-6 h-6 mr-2"></i>Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', '<i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>Updation failed');
                }
                
                redirect('editcoaching_includes/'.$coaching_includes_id);
            }
        }
    }

    function coaching_includes_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $coaching_includes_id= $this->input->post('coaching_includes_id');
            $data = $this->coaching_includes_model->getcoaching_includesInfo($coaching_includes_id);
            echo json_encode($data);
        }
    }

    function deletecoaching_includes($coaching_includes_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->coaching_includes_model->deleteInfo($coaching_includes_id);   
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('coaching_includes_listing');
        }
    }
}
?>