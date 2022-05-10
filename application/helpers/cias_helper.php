<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
 if ( !function_exists('assets_url') )
	{
		function assets_url()
	    {
	        $ci=& get_instance();
	        return $ci->config->item('assets_url');
	    }
	}

if ( !function_exists('admin_url') )
	{
		function admin_url()
	    {
	        $ci=& get_instance();
	        return $ci->config->item('admin_url');
	    }
	}	
 
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = PROTOCOL;
        $config['mailpath'] = MAIL_PATH;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['mailpath'] = MAIL_PATH;
        $config['charset'] = 'UTF-8';
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        // pre($detail);
        // die;
        
        $CI = setProtocol();        
        
        $CI->email->from(EMAIL_FROM, FROM_NAME);
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

    function convert_number($number) {
        if (($number < 0) || ($number > 999999999)) {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga) {
            $result .= convert_number($giga) .  "Million";
        }
        if ($kilo) {
            $result .= (empty($result) ? "" : " ") .convert_number($kilo) . " Thousand";
        }
        if ($hecto) {
            $result .= (empty($result) ? "" : " ") .convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) {
                $result .= " and ";
            }
            if ($deca < 2) {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result)) {
            $result = "zero";
        }
        return $result;
    }

    function pluck($array, $value, $key=NULL) {
        $returnArray = array();
        if($array) {
            foreach ($array as $item) {
                if($key != NULL) {
                    $returnArray[$item->$key] = strtolower($value) == 'obj' ? $item : $item->$value;
                } else {
                    $returnArray[] = $item->$value;
                }
            }
        }
        return $returnArray;
    }

    function pluck_multi_array($arrays, $val, $key = NULL) {
        $retArray = array();
        if($arrays) {
            $i = 0;
            foreach ($arrays as $array) {
                if(!empty($key)) {
                    if(strtolower($val) == 'obj') {
                        $retArray[$array->$key][] = $array;
                    } else {
                        $retArray[$array->$key][] = $array->$val;
                    }
                } else {
                    if(strtolower($val) == 'obj') {
                        $retArray[$i][] = $array;
                    } else {
                        $retArray[$i][] = $array->$val;
                    }
                    $i++;
                }
            }
        }
        return $retArray;
    }

    function pluck_bind($array, $value, $concatFirst, $concatLast, $key=NULL) {
        $returnArray = array();
        if(inicompute($array)) {
            foreach ($array as $item) {
                if($key != NULL) {
                    $returnArray[$item->$key] = $concatFirst.$item->$value.$concatLast;
                } else {
                    if($value!=NULL) {
                        $returnArray[] = $concatFirst.$item->$value.$concatLast;
                    } else {
                        $returnArray[] = $concatFirst.$item.$concatLast;
                    }
                }
            }
        }

        return $returnArray;
    }

    if (!function_exists('dd')) {
        function dd($args = '', $die = true)
        {
            echo "<pre>";
            print_r($args);
            echo "</pre>";
            if($die){
                die;
            }
        }
    }

    function escapeString($val) {
        $ci = & get_instance();
        $driver = $ci->db->dbdriver;

        if( $driver == 'mysql') {
            $val = mysql_real_escape_string($val);
        } elseif($driver == 'mysqli') {
            $db = get_instance()->db->conn_id;
            $val = mysqli_real_escape_string($db, $val);
        }

        return $val;
    }

    function rgb2hex2rgb($color){ 
        if(!$color) return false; 
        $color = trim($color); 
        $result = false; 
        if(preg_match("/^[0-9ABCDEFabcdef\#]+$/i", $color)){
            $hex = str_replace('#','', $color);
            if(!$hex) return false;
            if(strlen($hex) == 3):
                $result['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
                $result['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
                $result['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            else:
                $result['r'] = hexdec(substr($hex,0,2));
                $result['g'] = hexdec(substr($hex,2,2));
                $result['b'] = hexdec(substr($hex,4,2));
            endif;
        } elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $color)){ 
            $rgbstr = str_replace(array(',',' ','.'), ':', $color); 
            $rgbarr = explode(":", $rgbstr);
            $result = '#';
            $result .= str_pad(dechex($rgbarr[0]), 2, "0", STR_PAD_LEFT);
            $result .= str_pad(dechex($rgbarr[1]), 2, "0", STR_PAD_LEFT);
            $result .= str_pad(dechex($rgbarr[2]), 2, "0", STR_PAD_LEFT);
            $result = strtoupper($result);
        }else{
            $result = false;
        }
        return $result; 
    }

    function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    function limit_text_team($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    if(!function_exists('active_link')) {
        function activate_menu($controller) {
            $CI = get_instance();
            $class = $CI->router->fetch_class();
            return ($class == $controller) ? 'side-menu--active' : '';
        }
    }

?>