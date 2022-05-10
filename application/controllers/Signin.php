<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Signin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('cias');
        $this->load->model('home_model');
        $this->load->model('signin_model');
    }

    public function index(){
        $this->is_signed_in();
    }

    function is_signed_in()
    {
        $is_signed_in = $this->session->userdata('is_signed_in');
        
        if(!isset($is_signed_in) || $is_signed_in != TRUE)
        {
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();
            // footer
            $data['contact']=$this->home_model->get_contact();
            $this->load->view("front/signin", $data);
        }
        else
        {
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();
            // footer
            $data['contact']=$this->home_model->get_contact();
            redirect('/dashboard');
        }
    }

    public function signinme()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');
            
            $result = $this->signin_model->sign_in_me($email, $password);
            
            if(!empty($result))
            {
                $session_array = array('user_id'=>$result->user_id,                    
                                        'name'=>$result->name,
                                        'email'=>$result->email,
                                        'phone'=>$result->phone,
                                        'country'=>$result->country,
                                        'state'=>$result->state,
                                        'address'=>$result->address,
                                        'is_signed_in' => TRUE );

                $this->session->set_userdata('logged_in', $session_array);
                
                redirect('/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Email Address or password mismatch');
                
                $this->index();
            }
        }
    }

    function reset(){
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();

        $this->load->view("front/reset", $data);
    }

    function reset_password(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'Email Address', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->reset();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            if($this->signin_model->check_email(strtolower($this->security->xss_clean($this->input->post('email')))) == FALSE){
                $this->session->set_flashdata('error', "Email Address doesn't exist");
                redirect('reset');
            } else{
                $email_data = $this->signin_model->get_email_id($email);
                if($email_data){
                    $rand = rand(1, 9999999999);
                    $reset_key = $this->signin_model->hash($rand.date('y-m-d h i s').$email_data->user_id.$email_data->email);
                    $tmp_url = base_url("signin/resetpassword/".$reset_key);
                    $mailData = array('email' => $email, 'subject' => "Reset Password", 'message' => $tmp_url);
                    $result = $this->signin_model->insert_reset(array('key_id' => $reset_key, 'email' => $email));
                    $send = $this->sendResetLink($mailData);
                    if($result || $send){
                        $this->session->set_flashdata('success', 'Reset email has been sent. Please check your email.');
                    }else{
                        $this->session->set_flashdata('error', 'Some problems occured, please try again.');
                    }
                }
                redirect('reset');
            }
        }
    }

    // Mail Function For Booking Consultation
    private function sendResetLink($mailData){
        $this->load->library('email');
        $to = $mailData['email'];
        $from = "team@thefitchase.com";
        $fromName = "The Fit Chase";
        $mailSubject = $mailData['subject'];
        $mailContent = '
            <h2>Reset Password Link</h2>
            <p><b>Click Here: </b>'.$mailData['message'].'</p>
        ';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        return $this->email->send()?true:false;
    }

    function resetpassword($key = NULL){
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();

        $data['key'] = $key;
        if($key){
            $dbreset = $this->signin_model->get_single_reset(['key_id' => $key]);
            if($dbreset){
                if($this->input->post()){
                    $password = $this->input->post('password');
                    $email = $dbreset->email;
                    $email_data = $this->signin_model->get_email_id($email);
                    if($email_data){
                        $data_password = array('password'=>getHashedPassword($password));
                        $result = $this->signin_model->update_user_login($data_password, $email_data->user_id);
                        if($result == true){
                            $this->session->set_flashdata('success', 'Password reset successful!');
                        }else{
                            $this->session->set_flashdata('error', 'Some problems occured, please try again.');
                        }
                        $this->signin_model->delete($dbreset->reset_id);
                        redirect('/signin');
                    }
                }
            } else{
                $this->session->set_flashdata('error', 'This link is not valid!');
                redirect('/signin');
            }
        }

        $this->load->view("front/resetpassword", $data);
    }
}