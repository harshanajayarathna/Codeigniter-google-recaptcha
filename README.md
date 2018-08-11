# Codeigniter-google-recaptcha
CodeIgniter library used for Google's reCAPTCHA V2

## Content 
<ul>
  <li>How to Install & Configure</li>
  <li>How to Validate</li>
  <li>Example</li>
</ul>

## How to Install & Configure
<ol>
  <li>Download the project into your computer</li>
  <li>Copy libraries/Google_recaptcha.php in to folder application/libraries and config/google_recaptcha.php in to folder application/config</li>
  <li>Go to <code>https://www.google.com/recaptcha/admin</code> and register under reCAPTCHA V2 </li>
  <li>Get the Secret key and Site key</li>
  <li>Put them appropriate places in <code>application/config/google_recaptcha.php</code> file </li>
  <li>Load <code>application/config/google_recaptcha.php</code> and <code>application/libraries/Google_recaptcha.php</code> inside your controller </li>
  <li>In your view import; 
  Add this <pre lang="no-highlight"><code><script src='<?php echo $this->config->item('GOOGLE_CLIENT_API'); ?>'></script></code></pre> after the jquery (Because in here use ajax form submission) <br/>
  Add this 
    <pre lang="no-highlight"><code><div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('GOOGLE_SITE_KEY'); ?>"></div></code></pre> 
    inside form
  </li>
  <li>Then Submit form as ajax post
  </li>
  
</ol>

