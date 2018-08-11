<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author	Harshana Jayarathna
 * @link	https://codeigniter.com/user_guide/helpers/url_helper.html
 */
// ------------------------------------------------------------------------
class Recaptcha_helper {
    
    
    public $server_secret;
    public $remoteip;
    
    
    
    
            
    
    function google_recaptcha($str){
        
        
        
    }
    
    
    

    function hjupload($path, $allowtypes = "", $maxsize = "", $maxwidth = "", $maxheight = "", $inputname) {

        $CI = & get_instance();

        $config['upload_path'] = $path;

        if ($allowtypes != "") {
            $config['allowed_types'] = $allowtypes;
        }
        if ($maxsize != "") {
            $config['max_size'] = $maxsize;
        }
        if ($maxwidth != "") {
            $config['max_width'] = $maxwidth;
        }
        if ($maxheight != "") {
            $config['max_height'] = $maxheight;
        }

        $config['encrypt_name'] = TRUE;

        $CI->load->library('upload', $config);

        if (!$CI->upload->do_upload($inputname)) {
            $data = array('status' => 'fail', 'upload_data' => $CI->upload->display_errors());
        } else {
            $data = array('status' => 'pass', 'upload_data' => $CI->upload->data());
        }

        return $data;
    }

//---------------------------------------------------------------------------------------------------------
}
