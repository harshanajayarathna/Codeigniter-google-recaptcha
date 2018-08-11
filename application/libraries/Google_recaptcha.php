<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This library class is used to get the Google Recaptcha response 
 * @package CodeIgniter
 * @author Harshana Jayarathna <harshanajayarathna@gmail.com>
 * @copyright (c) 2018, Harshana Jayarathna
 */
class Google_recaptcha {

    /**
     * This is the Google Recaptcha server side secret key
     * @var string 
     */
    public $secretkey;
    
    /**
     * This is the Google Recaptcha client side site key
     * @var string
     */
    public $sitekey;
    
    /**
     * This is the server IP
     * @var string
     */
    public $serverip;

    /**
     * This is the Google Recaptcha site verify url
     * @var string
     */
    public $siteverifyurl;

    /**
     * constructor
     * @param string $config
     */
    public function __construct()
    {    
        $this->CI =& get_instance();
        $this->CI->load->config('google_recaptcha');
        
        $this->secretkey = $this->CI->config->item('GOOGLE_SECRET_KEY');
        $this->sitekey = $this->CI->config->item('GOOGLE_SITE_KEY');
        $this->serverip = $_SERVER['REMOTE_ADDR'];
        $this->siteverifyurl = $this->CI->config->item('GOOGLE_SITE_VERIFY_URL');
    }
    
    
    public function generate_google_recaptcha(){
        
        // Check Both keys are set
        if(empty($this->sitekey) && empty($this->secretkey) )
        {
           $g_box =  '<div class="bg-danger text-white" >Both Google keys required.</div>';
        } 
        // Check site key is set
        else if (empty($this->sitekey))
        {
           $g_box =  '<div class="bg-danger text-white" >Google Site key required.</div>';
        }
        // Check secret key is set
        else if (empty($this->secretkey))
        {
           $g_box =  '<div class="bg-danger text-white" >Google Secret key required.</div>';
        }
        // if both keys are set, generate reCaptcha
        else{
            $g_box = '<div class="g-recaptcha" data-sitekey="'.html_escape($this->sitekey).'"></div>';
        }
        return $g_box;
        
    }
    
    
    /**
     * This function is used to submit reCAPTCHA server and get its response
     * @param string $captchainput
     * @return json array()
     */
    public function validate_google_recaptcha($captchainput)
    {
        // create a new cURL resource
        $ch = curl_init();
        
        // set URL and other appropriate options
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->siteverifyurl,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'secret' => $this->secretkey,
                'response' => $captchainput,
                'remoteip' => $this->serverip
            ],
            CURLOPT_RETURNTRANSFER => true
        ]);

        // grab URL and pass it to the browser
        $output = curl_exec($ch);
        
        // close cURL resource, and free up system resources
        curl_close($ch);
        
        // decode the response
        $json_response = json_decode($output);

        // return the decoded response
        return $json_response;
        
    }

}
