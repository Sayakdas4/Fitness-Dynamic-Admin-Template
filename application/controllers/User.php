<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class User extends BaseController
{
    // This is default constructor of the class
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('cms_model');
        $this->load->model('banner_model');
        $this->load->model('featured_in_model');
        $this->load->model('home_management_model');
        $this->load->model('about_us_management_model');
        $this->load->model('team_model');
        $this->load->model('faq_model');
        $this->load->model('contact_query_model');
        $this->isLoggedIn();   
    }
    // This function used to load the first screen of the user
    public function index() 
    {
        $this->data['cms_count'] = $this->cms_model->get_all_cms();
        $this->data['banner_count'] = $this->banner_model->get_all_banner();
        $this->data['featured_in_count'] = $this->featured_in_model->get_all_featured_in();
        $this->data['home_management_count'] = $this->home_management_model->get_all_home_management();
        $this->data['about_us_management_count'] = $this->about_us_management_model->get_all_about_us_management();
        $this->data['team_count'] = $this->team_model->get_all_team();
        $this->data['faq_count'] = $this->faq_model->get_all_faq();
        $this->data['contact_query_count'] = $this->contact_query_model->get_all_contact_query();
        // echo "<pre>"; print_r($this->data['count']); die;
        $this->global['pageTitle'] = 'Mil Paints : dashboard_admin';
        $this->loadViews("profile/dashboard_admin", $this->global, NULL, NULL);
    }
    //This function is used to load the user list
    function userListing()
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
            
            $count = $this->user_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
            
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Caucasus Heritage : User Listing';
            
            $this->loadViews("users", $this->global, $data, NULL);
        }
    }
    // This function is used to load the add new form
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();
			$data['ppages'] = $this->user_model->GetPageListAll();            
            $this->global['pageTitle'] = 'Caucasus Heritage : Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }
    // This function is used to check whether email already exist or not
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }
    // This function is used to add new user to the system
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('empid','Employee Id','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|max_length[128]');
            // $this->form_validation->set_rules('dob','Date of Birth','trim|required|max_length[10]');
            // $this->form_validation->set_rules('password','Password','required|max_length[20]');
            // $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            // $this->form_validation->set_rules('role','Role','trim|required|numeric');
            // $this->form_validation->set_rules('multi_file','Upload Document','required');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                if($this->user_model->checkempid($this->input->post('empid')) == TRUE){
                    $this->session->set_flashdata('error', 'Entered Employee Id is already exist');
                    $this->addNew();
                }
                else{
                    $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                    $email = strtolower($this->security->xss_clean($this->input->post('email')));
                    $address = $this->input->post('address');
                    $empid = $this->input->post('empid');
                    $password = $this->input->post('password');
                    $roleId = $this->input->post('role');
                    $dob = $this->input->post('dob');
                    $mobile = $this->security->xss_clean($this->input->post('mobile'));
                    $fathername = $this->input->post('fathername');
                    //For uploading
                    $data = array(); 
                    if(!empty($_FILES['multi_file'])){ 
                         // Set preference 
                        $config['upload_path'] = 'uploads/';
                        $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                        $config['max_size'] = '10000'; // max_size in kb 
                        $config['file_name'] = $_FILES['multi_file']['name']; 

                         // Load upload library 
                        $this->load->library('upload',$config); 
                   
                         // File upload
                        if($this->upload->do_upload('multi_file')){ 
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
                    $this->load->view('addNew',$data); 
                    
                    $userInfo = array('email'=>$email, 'empid'=>$empid, 'password'=>getHashedPassword($password), 'address'=>$address, 'fathername'=>$fathername, 'dob'=>$dob, 'roleId'=>$roleId, 'name'=> $name, 'mobile'=>$mobile, 'multi_file'=>$filename, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                    
                    $this->load->model('user_model');
                    $result = $this->user_model->addNewUser($userInfo);
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'New User created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'User creation failed');
                    }
                    redirect('addNew');
                }
            }
        }
    }
    // This function is used load user edit information
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            // print_r($data['userInfo']); die;

            $this->global['pageTitle'] = 'Caucasus Heritage : Edit User';
            
            $this->loadViews("profile/editOld", $this->global, $data, NULL);
        }
    }
    // This function is used to edit the user information
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('empid','Employee Id','trim|required|max_length[128]');
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            // $this->form_validation->set_rules('multi_file','Upload Document','required');

            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $empid = $this->input->post('empid');
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = strtolower($this->security->xss_clean($this->input->post('email')));
                $address = $this->input->post('address');
                // $password = $this->input->post('password');
                $dob = $this->input->post('dob');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                $fathername = $this->input->post('fathername');
                
                $userInfo = array();
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'empid'=>$empid, 'roleId'=>$roleId, 'name'=>$name, 'address'=>$address, 'fathername'=>$fathername, 'dob'=>$dob, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'empid'=>$empid, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=>ucwords($name), 'address'=>$address, 'fathername'=>$fathername, 'dob'=>$dob, 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }

                //For uploading
                $data = array(); 
                if($_FILES['multi_file']['name']!=""){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    $config['max_size'] = '10000'; // max_size in kb 
                    $config['file_name'] = $_FILES['multi_file']['name']; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('multi_file')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        $data['response'] = 'successfully uploaded '.$filename; 
                        $userInfo['multi_file']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                } 
                // load view 
                $this->load->view('editOld',$data); 
                
                
                
                $result = $this->user_model->editUser($userInfo, $userId);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
        }
    }
    // This function is used to delete the user using userId
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    // Page not found : error 404
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Caucasus Heritage : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
    // This function used to show login history
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Caucasus Heritage : User Login History';
            
            $this->loadViews("loginHistory", $this->global, $data, NULL);
        }        
    }    

    // This function is used to show users profile
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;
        
        $this->global['pageTitle'] = $active == "details" ? 'Caucasus Heritage : My Profile' : 'Caucasus Heritage : Change Password';
        $this->loadViews("profile/profile", $this->global, $data, NULL);
    }
    // This function is used to update the user details
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');
            
        // $this->form_validation->set_rules('empid','Employee Id','trim|required|max_length[128]');
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]|callback_emailExists');

        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $empid = $this->input->post('empid');
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $dob = $this->input->post('dob');
            $address = $this->input->post('address');
            $fathername = $this->input->post('fathername');
            $multi_file = $this->input->post('multi_file');

            $userInfo = array('name'=>$name, 'empid'=>$empid, 'email'=>$email, 'address'=>$address, 'fathername'=>$fathername, 'dob'=>$dob, 'mobile'=>$mobile, 'multi_file'=>$multi_file, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->editUser($userInfo, $this->vendorId);
            
            if($result == true)
            {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('profile/'.$active);
        }
    }
    // This function is used to change the password of the user
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->profile($active);
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/'.$active);
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }
                
                redirect('profile/'.$active);
            }
        }
    }
    // This function is used to check whether email already exist or not
    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ $return = true; }
        else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
    // function salary($userId = NULL)
    //     // ($userId = NULL)
    // {
    //     if($this->isAdmin() == TRUE)
    //     {
    //         $this->loadThis();
    //     }
    //     else
    //     {
    //         $data = array();
    //         $userId = ($userId == NULL ? 0 : $userId);
    //         $this->load->model('User_model');            
    //         $this->global['pageTitle'] = 'Caucasus Heritage : Salary Configuration';
    //         $data['salaryRecord']=$this->User_model->listing($userId);
    //         $data["userInfo"] = $this->user_model->getUserInfoById($userId);
    //         $this->loadViews("salary", $this->global, $data, NULL);
    //     }
    // }
    function userListing1()
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
            
            $count = $this->user_model->userListingCount1($searchText);

            $returns = $this->paginationCompress ( "userListing1/", $count, 10 );
            
            $data['listing'] = $this->user_model->userListing1($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Caucasus Heritage : User Listing';
            
            $this->loadViews("cms/users", $this->global, $data, NULL);
        }
    }
    function addCon()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            
            $this->global['pageTitle'] = 'Caucasus Heritage : Add New User';
			$data['ppages'] = $this->user_model->GetPageListAll();  

            $this->loadViews("cms/addCon", $this->global, $data, NULL);
        }
    }
    function addConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('page_name','Page Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
            // $this->form_validation->set_rules('multi_file','Upload Document','trim|required|max_length[128]');
            // $this->form_validation->set_rules('description','Description','trim|required|max_length[128]');
            $this->form_validation->set_rules('meta_title','Meta Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('meta_description','meta_description','trim|required|max_length[128]');
            $this->form_validation->set_rules('meta_tag','Meta Tag','trim|required|max_length[128]');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addCon();
            }
            else
            {
				$ppage = $this->input->post('ppage');
				if($ppage==""){ $par_page=0; }else{ $par_page=$ppage; }
                $page_name = $this->input->post('page_name');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $meta_title = $this->input->post('meta_title');
                $meta_description = $this->input->post('meta_description');
                $meta_tag = $this->input->post('meta_tag');
                //For uploading
                $data = array(); 
                if(!empty($_FILES['multi_file'])){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    $config['max_size'] = '10000'; // max_size in kb 
                    $config['file_name'] = $_FILES['multi_file']['name']; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('multi_file')){ 
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
                $this->load->view('cms/addCon',$data); 

                $userInfo1 = array('parent_id'=>$par_page, 'page_name'=>$page_name, 'title'=>$title, 'multi_file'=>$filename, 'description'=>$description, 'createdDtm'=>date('Y-m-d'), 'meta_title'=>$meta_title, 'meta_description'=>$meta_description, 'meta_tag'=>$meta_tag);
                
                $this->load->model('User_model');
                $result = $this->user_model->addConfig($userInfo1);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Creation failed');
                }
                
                redirect('userListing1');
            }
        }
    }
    function editCon($id = NULL)
    {
        if($this->isAdmin() == TRUE || $id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($id == null)
            {
                redirect('cms/editCon');
            }
            $data['userInfo1'] = $this->user_model->getEditInfo($id);
            
            $this->global['pageTitle'] = 'Caucasus Heritage : Edit User';
            
            $this->loadViews("cms/editCon", $this->global, $data, NULL);
        }
    }
    // This function is used to edit the user information
    function editConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $id = $this->input->post('id');
            
            $this->form_validation->set_rules('page_name','Page Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('title','Title','trim|required|max_length[128]');
            // $this->form_validation->set_rules('multi_file','Upload Document','trim|required|max_length[128]');
            // $this->form_validation->set_rules('description','Description','trim|required|max_length[128]');
            $this->form_validation->set_rules('meta_title','Meta Title','trim|required|max_length[128]');
            $this->form_validation->set_rules('meta_description','meta_description','trim|required|max_length[128]');
            $this->form_validation->set_rules('meta_tag','Meta Tag','trim|required|max_length[128]');

            if($this->form_validation->run() == FALSE)
            {
                $this->editCon($id);
            }
            else
            {
                $page_name = $this->input->post('page_name');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $meta_title = $this->input->post('meta_title');
                $meta_description = $this->input->post('meta_description');
                $meta_tag = $this->input->post('meta_tag');

                $userInfo1 = array('page_name'=>$page_name, 'title'=>$title, 'description'=>$description, 'createdDtm'=>date('Y-m-d'), 'meta_title'=>$meta_title, 'meta_description'=>$meta_description, 'meta_tag'=>$meta_tag);
                
                //For uploading
                $data = array(); 
                if($_FILES['multi_file']['name']!=""){ 
                     // Set preference 
                    $config['upload_path'] = 'uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    $config['max_size'] = '10000'; // max_size in kb 
                    $config['file_name'] = $_FILES['multi_file']['name']; 

                     // Load upload library 
                    $this->load->library('upload',$config); 
               
                     // File upload
                    if($this->upload->do_upload('multi_file')){ 
                        // Get data about the file
                        $uploadData = $this->upload->data(); 
                        $filename = $uploadData['file_name']; 
                        $data['response'] = 'successfully uploaded '.$filename; 
                        $userInfo1['multi_file']=$filename;
                    }else{ 
                        $data['response'] = 'failed'; 
                    } 
                }else{ 
                    $data['response'] = 'failed'; 
                } 
                // load view 
                $this->load->view('cms/editCon',$data); 

                $result = $this->user_model->editCon($userInfo1, $id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('userListing1');
            }
        }
    }
    function delete($cms_id = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {         
            $result = $this->user_model->deleteInfo($cms_id);            
            $this->session->set_flashdata('success', 'Deleted successfully');
            redirect('userListing1');
        }
    }
    // function delete()
    // {
    //     if($this->isAdmin() == TRUE)
    //     {
    //         echo(json_encode(array('status'=>'access')));
    //     }
    //     else
    //     {
    //         $id = $this->input->post('id');
    //         $userInfo1 = array('isDeleted'=>1);
            
    //         $result = $this->user_model->deleteInfo($id, $userInfo1);
            
    //         if ($result > 0)
    //         { 
    //             echo(json_encode(array('status'=>TRUE))); 
    //         }
    //         else 
    //         { 
    //             echo(json_encode(array('status'=>FALSE))); 
    //         }
    //     }
    // }

    //Contact
    function contact($contact_id = NULL)
    {
        if($this->isAdmin() == TRUE && $contact_id == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($contact_id == null)
            {
                redirect('dashboard_admin');
            }
            $data['userInfo2'] = $this->user_model->getContactInfo($contact_id);
            
            $this->global['pageTitle'] = 'Caucasus Heritage : Edit User';
            
            $this->loadViews("contact/contact", $this->global, $data, NULL);
        }
    }
    // This function is used to edit the user information
    function editContactConfig()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $contact_id = $this->input->post('contact_id');
            
            $this->form_validation->set_rules('email','Email','trim|required|max_length[128]');
            $this->form_validation->set_rules('phone','Mobile Number','trim|required|max_length[30]');
            $this->form_validation->set_rules('telephone','Telephone Number','trim|required|max_length[20]');
            $this->form_validation->set_rules('address','Full Address','trim|required|max_length[128]');
            $this->form_validation->set_rules('fb_link','Facebook Link','trim|required|max_length[128]');
            $this->form_validation->set_rules('twitter_link','Twitter Link','trim|required|max_length[128]');
            $this->form_validation->set_rules('linkedin_link','LinkedIn Link','trim|required|max_length[128]');
            $this->form_validation->set_rules('instagram_link','Instagram Link','trim|required');

            if($this->form_validation->run() == FALSE)
            {
                $this->contact($contact_id);
            }
            else
            {
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');
                $telephone = $this->input->post('telephone');
                $address = $this->input->post('address');
                $fb_link = $this->input->post('fb_link');
                $twitter_link = $this->input->post('twitter_link');
                $linkedin_link = $this->input->post('linkedin_link');
                $instagram_link = $this->input->post('instagram_link');

                $userInfo2 = array('email'=>$email, 'phone'=>$phone, 'telephone'=>$telephone, 'address'=>$address, 'fb_link'=>$fb_link, 'twitter_link'=>$twitter_link, 'linkedin_link'=>$linkedin_link, 'instagram_link'=>$instagram_link);
                
                // echo "<pre>";
                // print_r($userInfo2); die;

                $result = $this->user_model->editContact($userInfo2, $contact_id);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Updation failed');
                }
                
                redirect('contact/1');
            }
        }
    }
}
?>