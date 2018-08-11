<?php
/*
| You can get all values for following configuration items from https://www.google.com/recaptcha/admin
| and register your website, choose "reCAPTCHA V2" 
*/

/*
|--------------------------------------------------------------------------
| Google Secret Key
|--------------------------------------------------------------------------
|
| Secret key is provided by Google
| Use this for communication between your site and Google. Be sure to keep it a secret.
*/
$config['GOOGLE_SECRET_KEY'] = '6Ld-3GYUAAAAAKx3WI55WJ_8RChY2Wk7nowD7U_S';

/*
|--------------------------------------------------------------------------
| Google Site Key
|--------------------------------------------------------------------------
|
| Site key is provided by Google
| Use this in the HTML code your site serves to users.
*/
$config['GOOGLE_SITE_KEY'] = '6Ld-3GYUAAAAAF_OjBvlDkD29gSMDdUIbKzJ1Del';

/*
|--------------------------------------------------------------------------
| Google Site Verify URL
|--------------------------------------------------------------------------
|
| This is provided by Google
| When your users submit the form where you integrated reCAPTCHA, you'll get as part of the payload 
| a string with the name "g-recaptcha-response". In order to check whether Google has verified that user,
| send a POST request with these parameters:
*/
$config['GOOGLE_SITE_VERIFY_URL'] = 'https://www.google.com/recaptcha/api/siteverify';

/*
|--------------------------------------------------------------------------
| Google Client API
|--------------------------------------------------------------------------
|
| This is provided by Google
| Use this Api end point in HTML view to generate Google recaptcha
*/
$config['GOOGLE_CLIENT_API'] = 'https://www.google.com/recaptcha/api.js';



