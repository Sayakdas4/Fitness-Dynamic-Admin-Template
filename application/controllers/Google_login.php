<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('google_login_model');
        $this->load->model('home_model');
        $this->load->model('signin_model');

        $this->load->library('session');
        // $session_data = $this->session->userdata('logged_in');
    }

    function google_signin()
    {
        include_once APPPATH . "libraries/vendor/autoload.php";

        $google_client = new Google_Client();
        $google_client->setClientId('1064233779046-n09ngfd9pdl8oh13k45ilp8i8qmf17l0.apps.googleusercontent.com'); //Define your ClientID
        $google_client->setClientSecret('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'); //Define your Client Secret Key
        // $google_client->setRedirectUri('http://localhost/tfc/signin'); //Define your Redirect Uri
        $google_client->setRedirectUri('https://srishtiventures.in/thefitchase/tfc/signin'); //Define your Redirect Uri
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if(isset($_GET["code"]))
        {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            if(!isset($token["error"]))
            {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');
                if($this->google_login_model->is_already_register($data['id']))
                {
                    //update data
                    $user_data = array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'typeID' => 2,
                    'updated_at' => $current_datetime
                    );
                    // dd($user_data);
                    $this->google_login_model->update_user_data($user_data, $data['id']);
                }
                else
                {
                    //insert data
                    $user_data = array(
                    'login_oauth_uid' => $data['id'],
                    'name'  => $data['name'],
                    'email'  => $data['email'],
                    'typeID' => 2,
                    'created_at'  => $current_datetime
                    );
                    $this->google_login_model->insert_user_data($user_data);
                }
            $this->session->set_userdata('user_data', $user_data);
            }
        }
        $login_button = '';
        if(!$this->session->userdata('access_token'))
        {
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();

            $login_button = $google_client->createAuthUrl();
            $data['login_button'] = $login_button;
            // footer
            $data['contact']=$this->home_model->get_contact();
            $this->load->view('front/signin', $data);
        }
        else
        {
            // Session
            $user_id = $this->session->userdata('logged_in', 'user_id');
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();
            // Main
            $data['user_data'] = $this->signin_model->get_user_info_id($user_id);
            // dd($data['user_data']);
            // footer
            $data['contact']=$this->home_model->get_contact();
            $this->load->view('front/dashboard', $data);
        }
    }

    function signout()
    {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        redirect('signin');
    }
 
}
?>