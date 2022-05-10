<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Knowledge_library extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('knowledge_library_model');
        $this->isLoggedIn();   
    }

    // public function index() 
    // {
    //     $this->global['pageTitle'] = 'Mil Paints : Dashboard';
        
    //     $this->loadViews("dashboard", $this->global, NULL, NULL);
    // }

    public function knowledge_library_listing()
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
            
            $count = $this->knowledge_library_model->knowledge_library_listing_count($searchText);

            $returns = $this->paginationCompress ( "knowledge_library_listing/", $count, 10 );
            
            $data['knowledge_librarys'] = $this->knowledge_library_model->knowledge_library_listing($searchText, $returns["page"], $returns["segment"]);
            // dd($data['knowledge_librarys']);
            $this->global['pageTitle'] = 'Mil Paints : knowledge_library Listing';
            
            $this->loadViews("knowledge_library/knowledge_library_listing", $this->global, $data, NULL);
        }
    }
    function addknowledge_library()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('knowledge_library_model');
            
            $this->global['pageTitle'] = 'Mil Paints : Add New knowledge_library';
            $data['content_preferences'] = $this->knowledge_library_model->get_all_content_preference();
            $data['categoriess'] = $this->knowledge_library_model->get_all_categories();
            $data['levels'] = $this->knowledge_library_model->get_all_level();

            $this->loadViews("knowledge_library/addknowledge_library", $this->global, $data, NULL);
        }
    }

    function addknowledge_libraryConfig()
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
                $this->addknowledge_library();
            }
            else
            {
                $content_preferenceID = $this->input->post('content_preferenceID');

                $catID = $this->input->post('catID[]');
                $exelevelID = $this->input->post('exelevelID[]');

                $title = $this->input->post('title');
                $image_files = $this->input->post('image_files[]');
                $time = $this->input->post('time');
                $preference = $this->input->post('preference');
                $image = $this->input->post('image');
                $description = $this->input->post('description');

                $knowledge_libraryInfo = array('content_preferenceID'=>$content_preferenceID, 'title'=>$title, 'time'=>$time, 'preference'=>$preference, 'image'=>$image, 'description'=>$description, 'created_at'=>date('Y-m-d H:i:s'));
                // dd($knowledge_libraryInfo);

                $this->load->model('knowledge_library_model');
                $result = $this->knowledge_library_model->addknowledge_library($knowledge_libraryInfo);
                // dd($result);

                if($this->input->post('image') == NULL){
                    if($_FILES['image_files']['tmp_name'])
                    {
                        $dataInfo = array();
                        $files = $_FILES;
                        $cpt = count($_FILES['image_files']['name']);
                        // echo $cpt; die;
                        for($i=0; $i<$cpt; $i++)
                        {
                            $_FILES['image_files']['name']= $files['image_files']['name'][$i];
                            $_FILES['image_files']['type']= $files['image_files']['type'][$i];
                            $_FILES['image_files']['tmp_name']= $files['image_files']['tmp_name'][$i];
                            $_FILES['image_files']['error']= $files['image_files']['error'][$i];
                            $_FILES['image_files']['size']= $files['image_files']['size'][$i];    
                            
                            $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg|pdf|mp4",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                            );
                            $this->load->library('upload',$config); 
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('image_files'))
                            {
                                // echo "string"; die;
                                $dataInfo = $this->upload->data();
                                
                                $image_filename=$dataInfo['file_name']; //Image Name
                                
                                $picdata = array(
                                    'knowledge_library_imageID' => $result,
                                    'content_preference_imageID' => $content_preferenceID,
                                    'image_files' => $image_filename
                                );
                                // dd($picdata);
                                $result_set = $this->knowledge_library_model->addknowledge_library_multi_file($picdata);    
                            }
                        }               
                    }
                }

                if($catID){
                    foreach($catID as $cid){
                        $check_boxdata = array(
                            'knowledge_libraryID' => $result,
                            'check_boxID' => $cid
                        );
                        // dd($check_boxdata);
                        $check_box_result = $this->knowledge_library_model->addknowledge_library_check_box($check_boxdata);
                    } 
                }
                if($exelevelID){
                    foreach($exelevelID as $lid){
                        $check_boxdata1 = array(
                            'knowledge_libraryID' => $result,
                            'check_boxID' => $lid
                        );
                        // dd($check_boxdata1);
                        $check_box_result1 = $this->knowledge_library_model->addknowledge_library_level_check_box($check_boxdata1);
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
                
                redirect('addknowledge_library');
            }
        }
    }
    function editknowledge_library($knowledge_library_id = NULL, $knowledge_library_check_box_id = NULL)
    {
        if($this->isAdmin() == TRUE && $knowledge_library_id == 1 && $knowledge_library_check_box_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($knowledge_library_id == null && $knowledge_library_check_box_id == null)
            {
                redirect('knowledge_library_listing');
            }
            $data['knowledge_libraryInfo'] = $this->knowledge_library_model->getknowledge_libraryInfo($knowledge_library_id);

            $getknowledge_library_multi_fileInfo = $this->knowledge_library_model->getknowledge_library_multi_fileInfo($knowledge_library_id);
            $data['getknowledge_library_multi_fileInfo'] = $getknowledge_library_multi_fileInfo;
            $array_multi_file = array();
            foreach($getknowledge_library_multi_fileInfo as $multi_img){
                $image_files = $multi_img->image_files;
                array_push($array_multi_file, $image_files);
            }
            $data['array_multi_file'] = $array_multi_file;


            $getknowledge_library_check_boxInfo = $this->knowledge_library_model->getknowledge_library_check_boxInfo($knowledge_library_id);
            $data['getknowledge_library_check_boxInfo'] = $getknowledge_library_check_boxInfo;
            $array_catID = array();
            foreach($getknowledge_library_check_boxInfo as $catID){
                $check_boxID = $catID->check_boxID;
                array_push($array_catID, $check_boxID);
            }
            $data['array_catID'] = $array_catID;

            $getknowledge_library_level_check_boxInfo = $this->knowledge_library_model->getknowledge_library_level_check_boxInfo($knowledge_library_id);
            $data['getknowledge_library_level_check_boxInfo'] = $getknowledge_library_level_check_boxInfo;
            $array_exelevelID = array();
            foreach($getknowledge_library_level_check_boxInfo as $exelevelID){
                $check_boxID = $exelevelID->check_boxID;
                array_push($array_exelevelID, $check_boxID);
            }
            $data['array_exelevelID'] = $array_exelevelID;

            $data['content_preferences'] = $this->knowledge_library_model->get_all_content_preference();
            $data['categoriess'] = $this->knowledge_library_model->get_all_categories();
            $data['levels'] = $this->knowledge_library_model->get_all_level();

            $this->global['pageTitle'] = 'Mil Paints : Edit knowledge_library';
            
            $this->loadViews("knowledge_library/editknowledge_library", $this->global, $data, NULL);
        }
    }
    function editknowledge_libraryConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $knowledge_library_id = $this->input->post('knowledge_library_id');
            $knowledge_library_check_box_id = $this->input->post('knowledge_library_check_box_id');
            
            $this->form_validation->set_rules('title','Title','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editknowledge_library($knowledge_library_id);
            }
            else
            {
                $content_preferenceID = $this->input->post('content_preferenceID');

                $catID = $this->input->post('catID[]');
                $exelevelID = $this->input->post('exelevelID[]');

                $title = $this->input->post('title');
                $image_files = $this->input->post('image_files[]');
                $time = $this->input->post('time');
                $preference = $this->input->post('preference');
                $image = $this->input->post('image');
                $description = $this->input->post('description');
                $knowledge_libraryInfo = array('content_preferenceID'=>$content_preferenceID, 'title'=>$title, 'preference'=>$preference, 'image'=>$image, 'description'=>$description, 'time'=>$time, 'updated_at'=>date('Y-m-d H:i:s'));
                
                $result = $this->knowledge_library_model->editknowledge_library($knowledge_libraryInfo, $knowledge_library_id);

                if($this->input->post('image') == NULL){
                    if($_FILES['image_files']['tmp_name'])
                    {
                        $dataInfo = array();
                        $files = $_FILES;
                        $cpt = count($_FILES['image_files']['name']);
                        $this->knowledge_library_model->deleteknowledge_library_multi_fileInfo($knowledge_library_id);
                        // echo $cpt; die;
                        for($i=0; $i<$cpt; $i++)
                        {
                            $_FILES['image_files']['name']= $files['image_files']['name'][$i];
                            $_FILES['image_files']['type']= $files['image_files']['type'][$i];
                            $_FILES['image_files']['tmp_name']= $files['image_files']['tmp_name'][$i];
                            $_FILES['image_files']['error']= $files['image_files']['error'][$i];
                            $_FILES['image_files']['size']= $files['image_files']['size'][$i];    
                            
                            $config = array(
                                'upload_path' => "uploads/",
                                'allowed_types' => "gif|jpg|png|jpeg|pdf|mp4",
                                'overwrite' => FALSE,
                                'encrypt_name' => TRUE, 
                                'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
                            );
                            $this->load->library('upload',$config); 
                            $this->upload->initialize($config);
                            if($this->upload->do_upload('image_files'))
                            {
                                // echo "string"; die;
                                $dataInfo = $this->upload->data();
                                
                                $image_filename=$dataInfo['file_name']; //Image Name
                                
                                $picdata = array(
                                    'knowledge_library_imageID' => $knowledge_library_id,
                                    'content_preference_imageID' => $content_preferenceID,
                                    'image_files' => $image_filename
                                );

                                // dd($picdata);
                                $result_set = $this->knowledge_library_model->addknowledge_library_multi_file($picdata);    
                            }
                        }               
                    }
                }

                if($catID){
                    $this->knowledge_library_model->deleteknowledge_library_check_boxInfo($knowledge_library_id);
                    foreach($catID as $cid){
                        $check_boxdata = array(
                            'knowledge_libraryID' => $knowledge_library_id,
                            'check_boxID' => $cid
                        );
                        
                        $check_box_result = $this->knowledge_library_model->addknowledge_library_check_box($check_boxdata);
                    } 
                }

                if($exelevelID){
                    $this->knowledge_library_model->deleteknowledge_library_level_check_boxInfo($knowledge_library_id);
                    foreach($exelevelID as $lid){
                        $check_boxdata1 = array(
                            'knowledge_libraryID' => $knowledge_library_id,
                            'check_boxID' => $lid
                        );
                        
                        $check_box_result1 = $this->knowledge_library_model->addknowledge_library_level_check_box($check_boxdata1);
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
                
                redirect('editknowledge_library/'.$knowledge_library_id);
            }
        }
    }

    function knowledge_library_details(){
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data= array();
            $status= true;
            $html="";
            $knowledge_library_id= $this->input->post('knowledge_library_id');
            $data = $this->knowledge_library_model->getknowledge_libraryInfo($knowledge_library_id);
            echo json_encode($data);
        }
    }

    function deleteknowledge_library($knowledge_library_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->knowledge_library_model->deleteInfo($knowledge_library_id);
            $this->session->set_flashdata('success', 'Deleted successfully'); 
            redirect('knowledge_library_listing');
        }
    }
}
?>