# Codeigniter-google-recaptcha
CodeIgniter library used for Google's reCAPTCHA V2

## How to Install & Configure
<ol>
  <li>Download the project into your computer</li>
  <li>Copy libraries/Google_recaptcha.php in to folder application/libraries and config/google_recaptcha.php in to folder application/config</li>
  <li>Go to <code>https://www.google.com/recaptcha/admin</code> and register under reCAPTCHA V2 </li>
  <li>Get the Secret key and Site key</li>
  <li>Put them appropriate places in <code>application/config/google_recaptcha.php</code> file </li>
  <li>Load <code>application/config/google_recaptcha.php</code> and <code>application/libraries/Google_recaptcha.php</code> inside your controller </li>
  <li>Change controllers and views as following examples
  </li>
</ol>

## Example

Controller
<code>

<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package CodeIgniter
 * @subpackage codeigniter-google-recaptcha
 * @author Harshana Jayarathna <harshanajayarathna@gmail.com>
 * @copyright (c) 2018, Harshana Jayarathna 
 */
class Form extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        
        // load config, libraries, helpers, models, etc...
        $this->load->config('google_recaptcha');
        $this->load->library(array('form_validation', 'google_recaptcha'));        
        $this->load->helper('string'); 
        
    }

    /**
     * This is index function, used to load form view with reCaptcha
     */
    public function index() 
    {
        $google_recaptcha = new Google_recaptcha();
        $data['recaptcha'] = $google_recaptcha->generate_google_recaptcha();
        
        $this->load->view('form', $data);
    }
    
    
    public function save()
    {        
        // Validate user inputs         
                       
        $this->form_validation->set_rules('recaptcha','recaptcha','trim|required|callback_validate_recaptcha');
             
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else 
        {
            // TO DO
            echo json_encode(['success' => 'Captcha Validation Success']);
            
        }
    }
    
    
    function validate_recaptcha($str)        
    {      
        // check recaptcha is empty
        if(empty(trim($this->input->post('recaptcha', TRUE))))
        {
          $this->form_validation->set_message('validate_recaptcha', 'The {field} field is required.');
          return FALSE;
        }
        else
        {                                    
            $captchainput = trim($this->input->post('recaptcha', TRUE));
            
            // create Google recaptcha object
            $google_recaptcha = new Google_recaptcha();
            
            // validate google recaptcha
            $json_response = $google_recaptcha->validate_google_recaptcha($captchainput );
            
            if(!$json_response->success)
            {
                $this->form_validation->set_message('validate_recaptcha', 'The {field} field is telling me that you are a robot. Shall we give it another try?');
                return FALSE;                
            }
            else
            {
               return TRUE; 
            }          
        }        

    }

}



</code>
