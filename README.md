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
  <li>Go to <code> https://www.google.com/recaptcha/admin </code> and register under reCAPTCHA V2 </li>
  <li>Get the Secret key and Site key</li>
  <li>Put them appropriate places in application/config/google_recaptcha.php file </li>
  <li>Load application/config/google_recaptcha.php  and application/libraries/Google_recaptcha.php inside your controller </li>
  <li>In your view import; 
  Add this <code> <script src='<?php echo $this->config->item('GOOGLE_CLIENT_API'); ?>'></script> </code> after the jquery (Because in here use ajax form submission) <br/>
  Add this <code> <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('GOOGLE_SITE_KEY'); ?>"></div> </code> inside form
  </li>
  <li>Then Submit form as ajax post
  </li>
  
</ol>

<pre lang="no-highlight"><code>
<dl>
  <dt>Definition list</dt>
  <dd>Is something people use sometimes.</dd>

  <dt>Markdown in HTML</dt>
  <dd>Does *not* work **very** well. Use HTML <em>tags</em>.</dd>
</dl>
</code></pre>

