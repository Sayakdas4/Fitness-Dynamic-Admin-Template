<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
require_once(APPPATH."libraries/razorpay-php/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Razorpay extends CI_Controller
{
    var $data;
    function  __construct() 
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('signup_model');
        $this->load->model('signin_model');
        $this->load->model('kick_starter_pricing_model');
        $this->load->model('coaching_pricing_model');
        $this->load->model('razorpay_model');
        $this->load->library('session');
        $session_data = $this->session->userdata('logged_in');
        $session_google_data = $this->session->userdata('user_data');
        // $user_id = $session_data['user_id'];
            
        // if(!isset($this->session->userdata['logged_in']['user_id']))
        // {
        //     redirect(base_url('/signin'));
        // }
    }  

    function checkout_kick_starter(){
        if($this->signup_model->check_email(strtolower($this->security->xss_clean($this->input->post('email')))) == FALSE){
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $phone = $this->security->xss_clean($this->input->post('phone'));
            $country = ucwords(strtolower($this->security->xss_clean($this->input->post('country'))));
            $state = ucwords(strtolower($this->security->xss_clean($this->input->post('state'))));
            $address = ucwords(strtolower($this->security->xss_clean($this->input->post('address'))));
            $password = $this->input->post('password');
            $kick_starter_pricing_id = $this->input->post('razorpay_payment_typeID');
            $signupInfo = array('name'=> $name, 'email'=>$email, 'phone'=>$phone, 'country'=>$country, 'state'=>$state, 'address'=>$address, 'password'=>getHashedPassword($password), 'created_at'=>date('Y-m-d H:i:s'));
            $this->load->model('signup_model');
            $result = $this->signup_model->add_new_signup($signupInfo);
        } else {
            $this->session->set_flashdata('error', 'Email Address already exists');
            redirect("home/kick_starter");
        }
            
        if(!empty($result))
        {
            $result_session = $this->signin_model->sign_in_me($email, $password);
            if(!empty($result_session)){
                $session_array = array('user_id'=>$result_session->user_id,                    
                                        'name'=>$result_session->name,
                                        'email'=>$result_session->email,
                                        'phone'=>$result_session->phone,
                                        'country'=>$result->country,
                                        'state'=>$result->state,
                                        'address'=>$result->address,
                                        'kick_starter_pricing_id'=>$kick_starter_pricing_id,
                                        'is_signed_in' => TRUE );
                $this->session->set_userdata('logged_in', $session_array);
                
                redirect('razorpay/payment_kick_starter');
            }
        }
    } 

    function payment_kick_starter($kick_starter_pricing_id = NULL){
        if(isset($this->session->userdata['logged_in']['user_id'])){
            $data = array();
            $user_id = $this->session->userdata['logged_in']['user_id'];
            $name = $this->session->userdata['logged_in']['name'];
            $email = $this->session->userdata['logged_in']['email'];
            $phone = $this->session->userdata['logged_in']['phone'];
            $country = $this->session->userdata['logged_in']['country'];
            $state = $this->session->userdata['logged_in']['state'];
            $address = $this->session->userdata['logged_in']['address'];
            if($this->input->post('pricingID') == NULL){
                $kick_starter_pricing_id = $this->session->userdata['logged_in']['kick_starter_pricing_id'];
            } else{
                $kick_starter_pricing_id = $this->input->post('pricingID');
            }

            $pricingInfo = $this->kick_starter_pricing_model->getkick_starter_pricingInfo_by_id($kick_starter_pricing_id);

            $total_price = $pricingInfo->price;

            $displayCurrency = RAZOR_CURRENCY;
            $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
            $orderData = [
                'receipt'         => $kick_starter_pricing_id,
                'amount'          => $total_price * 100, // 2000 rupees in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];
            $razorpayOrder = $api->order->create($orderData);
            $razorpayOrderId = $razorpayOrder['id'];
            $_SESSION['razorpay_order_id'] = $razorpayOrderId;
            $displayAmount = $amount = $orderData['amount'];
            if ($displayCurrency !== 'INR')
            {
                $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                $exchange = json_decode(file_get_contents($url), true);

                $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
            }
            // $site_info=site_info();
            $data = [
                "key"               => RAZOR_KEY_ID,
                "amount"            => $amount,
                "name"              => $name,
                "description"       => "Kick Starter",
                "image"             => base_url()."fassets/images/razorpay_logo.png",
                "prefill"           => [
                    "name"          => $name,
                    "email"         => $email,
                    "contact"       => $phone,
                ],
                "notes"           => [
                // "address"         => $order_info['billing_address'],
                "merchant_order_id"=> $kick_starter_pricing_id,
                ],
                "theme"             => [
                "color"             => "#1d1d1f"
                ],
                "order_id"          => $razorpayOrderId,
            ];
            if ($displayCurrency !== 'INR')
            {
                $data['display_currency']  = $displayCurrency;
                $data['display_amount']    = $displayAmount;
            }
            $json = json_encode($data);
            $data['json']=$json;
            $data['pricingInfo'] = $pricingInfo;
            // Session
            $user_data = $this->session->userdata['logged_in'];
            $data['user_data'] = $user_data;
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();
            // footer
            $data['contact']=$this->home_model->get_contact();

            $this->load->view("front/razorpay/payment_kick_starter", $data);
        } else {
            $data = array();
            // Main
            $kick_starter_pricing_id = $this->input->post('pricingID');
            $pricingInfo = $this->kick_starter_pricing_model->getkick_starter_pricingInfo_by_id($kick_starter_pricing_id);
            $data['pricingInfo'] = $pricingInfo;
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();
            // footer
            $data['contact']=$this->home_model->get_contact();
            $this->load->view("front/razorpay/checkout_kick_starter", $data);
            
        }
    }

    function checkout_coaching(){
        if($this->signup_model->check_email(strtolower($this->security->xss_clean($this->input->post('email')))) == FALSE){
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $phone = $this->security->xss_clean($this->input->post('phone'));
            $country = ucwords(strtolower($this->security->xss_clean($this->input->post('country'))));
            $state = ucwords(strtolower($this->security->xss_clean($this->input->post('state'))));
            $address = ucwords(strtolower($this->security->xss_clean($this->input->post('address'))));
            $password = $this->input->post('password');
            $coaching_pricing_id = $this->input->post('razorpay_payment_typeID');
            $signupInfo = array('name'=> $name, 'email'=>$email, 'phone'=>$phone, 'country'=>$country, 'state'=>$state, 'address'=>$address, 'password'=>getHashedPassword($password), 'created_at'=>date('Y-m-d H:i:s'));
            $this->load->model('signup_model');
            $result = $this->signup_model->add_new_signup($signupInfo);
        } else {
            $this->session->set_flashdata('error', 'Email Address already exists');
            redirect("home/coaching");
        }
            
            if(!empty($result))
            {
                $result_session = $this->signin_model->sign_in_me($email, $password);
                if(!empty($result_session)){
                    $session_array = array('user_id'=>$result_session->user_id,                    
                                            'name'=>$result_session->name,
                                            'email'=>$result_session->email,
                                            'phone'=>$result_session->phone,
                                            'country'=>$result->country,
                                            'state'=>$result->state,
                                            'address'=>$result->address,
                                            'coaching_pricing_id'=>$coaching_pricing_id,
                                            'is_signed_in' => TRUE );
                    $this->session->set_userdata('logged_in', $session_array);
                    
                    redirect('razorpay/payment_coaching');
                }
            }
    }

    function payment_coaching($coaching_pricing_id = NULL){
        if(isset($this->session->userdata['logged_in']['user_id'])){
            $data = array();
            $user_id = $this->session->userdata['logged_in']['user_id'];
            $name = $this->session->userdata['logged_in']['name'];
            $email = $this->session->userdata['logged_in']['email'];
            $phone = $this->session->userdata['logged_in']['phone'];
            $country = $this->session->userdata['logged_in']['country'];
            $state = $this->session->userdata['logged_in']['state'];
            $address = $this->session->userdata['logged_in']['address'];

            if($this->input->post('pricingID') == NULL){
                $coaching_pricing_id = $this->session->userdata['logged_in']['coaching_pricing_id'];
            } else{
                $coaching_pricing_id = $this->input->post('pricingID');
            }
            
            $pricingInfo = $this->coaching_pricing_model->getcoaching_pricingInfo_by_id($coaching_pricing_id);

            $total_price_coaching = $pricingInfo->price;

            $displayCurrency = RAZOR_CURRENCY;
            $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
            $orderData = [
                'receipt'         => $coaching_pricing_id,
                'amount'          => $total_price_coaching * 100, // 2000 rupees in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];
            $razorpayOrder = $api->order->create($orderData);
            $razorpayOrderId = $razorpayOrder['id'];
            $_SESSION['razorpay_order_id'] = $razorpayOrderId;
            $displayAmount = $amount = $orderData['amount'];
            if ($displayCurrency !== 'INR')
            {
                $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                $exchange = json_decode(file_get_contents($url), true);

                $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
            }
            // $site_info=site_info();
            $data = [
                "key"               => RAZOR_KEY_ID,
                "amount"            => $amount,
                "name"              => $name,
                "description"       => "Coaching",
                "image"             => base_url()."fassets/images/razorpay_logo.png",
                "prefill"           => [
                    "name"          => $name,
                    "email"         => $email,
                    "contact"       => $phone,
                ],
                "notes"           => [
                    // "address"         => $order_info['billing_address'],
                    "merchant_order_id"=> $coaching_pricing_id,
                ],
                "theme"             => [
                "color"             => "#1d1d1f"
                ],
                "order_id"          => $razorpayOrderId,
            ];
            if ($displayCurrency !== 'INR')
            {
                $data['display_currency']  = $displayCurrency;
                $data['display_amount']    = $displayAmount;
            }
            $json = json_encode($data);
            $data['json']=$json;
            $data['pricingInfo'] = $pricingInfo;
            // Session
            $user_data = $this->session->userdata['logged_in'];
            $data['user_data'] = $user_data;
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();
            // footer
            $data['contact']=$this->home_model->get_contact();

            $this->load->view("front/razorpay/payment_coaching", $data);
        } else{
            $data = array();
            // Main
            $coaching_pricing_id = $this->input->post('pricingID');
            $pricingInfo = $this->coaching_pricing_model->getcoaching_pricingInfo_by_id($coaching_pricing_id);
            $data['pricingInfo'] = $pricingInfo;
            // header
            $data['logo'] = $this->home_model->get_logo_by_id();
            // footer
            $data['contact']=$this->home_model->get_contact();
            $this->load->view("front/razorpay/checkout_coaching", $data);
        }
    }

    // callback method
    public function callback() 
    {        
        $success = true;
        $error = "Payment Failed";
        if (empty($_POST['razorpay_payment_id']) === false)
        {
            $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);

            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        //print_r($_POST);
        if ($success === true)
        {
            $razorpay_order_id=$_SESSION['razorpay_order_id'];
            // $razorpay_payment_id=$_POST['razorpay_payment_id'];
            $razorpay_signature=$_POST['razorpay_signature'];
            $razorpay_payment_typeID=$_POST['razorpay_payment_typeID'];
            $plans_pricingID=$_POST['plans_pricingID'];
            $price=$_POST['price'];
            $duration=$_POST['duration'];
            $duration_format=$_POST['duration_format'];
            $userID=$_POST['userID'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $country=$_POST['country'];
            $state=$_POST['state'];
            $address=$_POST['address'];
            $paymentdate = date('Y-m-d H:i:s');

            if($duration_format == 'Days' || $duration_format == 'Days Renewal'){
                $day_count = $duration;
            }
            if($duration_format == 'Month' || $duration_format == 'Month Renewal'){
                $day_count = $duration * 30;
            }
            if($duration_format == 'Year' || $duration_format == 'Year Renewal'){
                $day_count = $duration * 365;
            }
            $date_data = date('Y-m-d',strtotime($paymentdate));
            echo $end_date = date('Y-m-d', strtotime($date_data. ' +'.$day_count.' days'));

            if(isset($razorpay_payment_typeID))
            {
                $razorpayInfo = array(
                    'razorpay_payment_id' => $razorpay_order_id,
                    'razorpay_signature' => $razorpay_signature,
                    'razorpay_payment_typeID' => $razorpay_payment_typeID,
                    'plans_pricingID' => $plans_pricingID,
                    'price' => $price,
                    'duration' => $duration,
                    'duration_format' => $duration_format,
                    'userID' => $userID,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'state' => $state,
                    'country' => $country,
                    'paymentdate' => $paymentdate,
                    'enddate' => $end_date,
                    'status' => 1
                );
                $this->razorpay_model->addrazorpay($razorpayInfo);
                $this->sendpayment_success($razorpayInfo);

                redirect("payment-success/".base64_encode(rand(1, 9999999999).$userID.date('y-m-d h i s').$email), 'refresh');
            }
            else
            {
                redirect("payment-failed", 'refresh');
            }
        }
        else
        {
            $razorpayInfo = array(
                    'razorpay_payment_id' => $razorpay_order_id,
                    'razorpay_signature' => $razorpay_signature,
                    'razorpay_payment_typeID' => $razorpay_payment_typeID,
                    'plans_pricingID' => $plans_pricingID,
                    'price' => $price,
                    'duration' => $duration,
                    'duration_format' => $duration_format,
                    'userID' => $userID,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'state' => $state,
                    'country' => $country,
                    'paymentdate' => $paymentdate,
                    'enddate' => $end_date,
                    'status' => 0
                );
            $this->razorpay_model->addrazorpay($razorpayInfo);
            $this->sendpayment_success($razorpayInfo);

            redirect("payment-failed", 'refresh');
        }
        //echo $html;
    }

// Mail Function For Payment Success
    private function sendpayment_success($razorpayInfo){
        $this->load->library('email');
        $to = array($razorpayInfo['email'], "shrey@thefitchase.com");
        $from = "team@thefitchase.com";
        $fromName = "The Fit Chase";
        $mailSubject = "Payment Confirmation - Successful";
        $mailContent = '
            <div align="center" style="background:#000;padding-top: 50px;padding-bottom: 50px;">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
                <table width="800" border="0" cellspacing="0" cellpadding="10" style="margin:0;background:#282828;">
                    <tr>
                        <td>
                            <a href="https://www.thefitchase.com/" style="width:200px;height: auto;display: block;margin: 10px 0px;">
                                <img src="https://www.thefitchase.com/fassets/images/logo.png" alt="TFC" style="width:100;height:auto;display:block;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:25px 0">
                            <img src="https://www.thefitchase.com/fassets/images/thankyou-icon.png" alt="TFC" style="width:200;height:auto;display:block;"> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:0 0 100px 0">
                            <h2 style="color:#FFF;font-size:32px;margin: 0 0 25px 0;font-family: Poppins, sans-serif;">Order Confirmation</h2>
                            <div style="width: 80%;display: inline-block;margin: 25px 0; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                Dear '.$razorpayInfo['name'].',<br>';
                                if($razorpayInfo['plans_pricingID'] == 1){
                                    $mailContent .= 'Thanks for your interest for Kick Starter program.';
                                }
                                if($razorpayInfo['plans_pricingID'] == 2){
                                    $mailContent .= 'Thanks for your interest for Coaching program.';
                                }
                                $mailContent .= ' Your order has been placed. Below are the details of your transaction.
                            </div>
                            <div style="width: 80%;height: auto; display: inline-block;box-sizing: border-box;padding: 35px;background: #000;">
                                <div style="width: 100%;display: inline-block;margin-bottom: 5px; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                    <label style="margin:0px;width:130px;display: inline-block;">Transaction ID:</label> '.$razorpayInfo['razorpay_payment_id'].'
                                </div>
                                <div style="width: 100%;display: inline-block;margin-bottom: 5px; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                    <label style="margin:0px;width:130px;display: inline-block;">Name:</label> '.$razorpayInfo['name'].'
                                </div>
                                <div style="width: 100%;display: inline-block;margin-bottom: 5px; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                    <label style="margin:0px;width:130px;display: inline-block;">Emaill:</label> '.$razorpayInfo['email'].'
                                </div>
                                <div style="width: 100%;display: inline-block;margin-bottom: 5px; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                    <label style="margin:0px;width:130px;display: inline-block;">Phone No.:</label> '.$razorpayInfo['phone'].'
                                </div>
                                <div style="width: 100%;display: inline-block;margin-bottom: 5px; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                    <label style="margin:0px;width:130px;display: inline-block;">Address:</label> '.$razorpayInfo['address'].', '.$razorpayInfo['state'].', '.$razorpayInfo['country'].'
                                </div>
                                <div style="width: 100%;display: inline-block;margin-bottom: 5px; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                    <label style="margin:0px;width:130px;display: inline-block;">Duration:</label> '.$razorpayInfo['duration'].' '.$razorpayInfo['duration_format'].'
                                </div>
                                <div style="width: 100%;display: inline-block;margin-bottom: 5px; color:#FFF;font-size:16px;font-family: Poppins, sans-serif;text-align: left;">
                                    <label style="margin:0px;width:130px;display: inline-block;">Price:</label> ₹'.$razorpayInfo['price'].'
                                </div>
                                
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        ';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        return $this->email->send()?true:false;
    }

// Mail Function For Payment Failed
    private function sendpayment_failed($razorpayInfo){
        $this->load->library('email');
        $to = array($razorpayInfo['email'], "shrey@thefitchase.com");
        $from = "team@thefitchase.com";
        $fromName = "The Fit Chase";
        $mailSubject = "Payment Confirmation - Failed";
        $mailContent = '
            <h2>Payment Confirmation</h2>
            <p><b>Order Id: </b>'.$razorpayInfo['razorpay_payment_id'].'</p>
            <p><b>Name: </b>'.$razorpayInfo['name'].'</p>
            <p><b>Email: </b>'.$razorpayInfo['email'].'</p>
            <p><b>Phone No: </b>'.$razorpayInfo['phone'].'</p>
            <p><b>Billing Address: </b>'.$razorpayInfo['address'].', '.$razorpayInfo['state'].', '.$razorpayInfo['country'].'</p>
            <p><b>Order Details: </b>'.$razorpayInfo['duration'].' '.$razorpayInfo['duration_format'].'</p>
            <p><b>Price: </b>₹'.$razorpayInfo['price'].'</p>
        ';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        return $this->email->send()?true:false;
    }

// Payment Status
    function payment_success(){
        // Session
        if(!empty($this->session->userdata['logged_in'])){
            $user_data = $this->session->userdata['logged_in'];
            $data['user_data'] = $user_data;
        }
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        $this->load->view("front/razorpay/payment-success", $data);
    }

    function payment_failed(){
        // Session
        if(!empty($this->session->userdata['logged_in'])){
            $user_data = $this->session->userdata['logged_in'];
            $data['user_data'] = $user_data;
        }
        // header
        $data['logo'] = $this->home_model->get_logo_by_id();
        // footer
        $data['contact']=$this->home_model->get_contact();
        $this->load->view("front/razorpay/payment-failed", $data);
    }
}
?>