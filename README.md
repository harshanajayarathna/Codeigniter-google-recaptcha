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

<div class="highlight highlight-text-html-php"><pre><span class="pl-pse">&lt;?php</span><span class="pl-s1"></span>
<span class="pl-s1"></span>
<span class="pl-s1"><span class="pl-k">class</span> <span class="pl-en">Form</span> <span class="pl-k">extends</span> <span class="pl-e">CI_Controller</span> {</span>
<span class="pl-s1"></span>
<span class="pl-s1">	<span class="pl-k">public</span> <span class="pl-k">function</span> <span class="pl-en">index</span>()</span>
<span class="pl-s1">	{</span>
<span class="pl-s1">		<span class="pl-c"><span class="pl-c">/*</span></span></span>
<span class="pl-s1"><span class="pl-c">		 Load the reCAPTCHA library.</span></span>
<span class="pl-s1"><span class="pl-c">		 You can pass the keys here by passing an array to the class.</span></span>
<span class="pl-s1"><span class="pl-c">		 Check the "Setting the keys" section for more details</span></span>
<span class="pl-s1"><span class="pl-c">		<span class="pl-c">*/</span></span></span>
<span class="pl-s1">		<span class="pl-smi">$recaptcha</span> <span class="pl-k">=</span> <span class="pl-k">new</span> <span class="pl-c1">Recaptcha</span>();</span>
<span class="pl-s1"></span>
<span class="pl-s1">		<span class="pl-c"><span class="pl-c">/*</span></span></span>
<span class="pl-s1"><span class="pl-c">		 Create the reCAPTCHA box.</span></span>
<span class="pl-s1"><span class="pl-c">		 You can pass an array of attributes to this method.</span></span>
<span class="pl-s1"><span class="pl-c">		 Check the "Creating the reCAPTCHA box" section for more details</span></span>
<span class="pl-s1"><span class="pl-c">		<span class="pl-c">*/</span></span></span>
<span class="pl-s1">		<span class="pl-smi">$box</span> <span class="pl-k">=</span> <span class="pl-smi">$recaptcha</span><span class="pl-k">-&gt;</span>create_box();</span>
<span class="pl-s1"></span>
<span class="pl-s1">		<span class="pl-c"><span class="pl-c">//</span> Check if the form is submitted</span></span>
<span class="pl-s1">		<span class="pl-k">if</span>(<span class="pl-smi">$this</span><span class="pl-k">-&gt;</span><span class="pl-smi">input</span><span class="pl-k">-&gt;</span>post(<span class="pl-s"><span class="pl-pds">'</span>action<span class="pl-pds">'</span></span>) <span class="pl-k">===</span> <span class="pl-s"><span class="pl-pds">'</span>submit<span class="pl-pds">'</span></span>)</span>
<span class="pl-s1">		{</span>
<span class="pl-s1">			<span class="pl-c"><span class="pl-c">/*</span></span></span>
<span class="pl-s1"><span class="pl-c">			 Check if the reCAPTCHA was solved</span></span>
<span class="pl-s1"><span class="pl-c">			 You can pass arguments to the `is_valid` method,</span></span>
<span class="pl-s1"><span class="pl-c">			 but it should work fine without any.</span></span>
<span class="pl-s1"><span class="pl-c">			 Check the "Validating the reCAPTCHA" section for more details</span></span>
<span class="pl-s1"><span class="pl-c">			<span class="pl-c">*/</span></span></span>
<span class="pl-s1">			<span class="pl-smi">$is_valid</span> <span class="pl-k">=</span><span class="pl-smi">$recaptcha</span><span class="pl-k">-&gt;</span>is_valid();</span>
<span class="pl-s1"></span>
<span class="pl-s1">			<span class="pl-k">if</span>(<span class="pl-smi">$is_valid</span>[<span class="pl-s"><span class="pl-pds">'</span>success<span class="pl-pds">'</span></span>])</span>
<span class="pl-s1">			{</span>
<span class="pl-s1">				<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">"</span>reCAPTCHA solved<span class="pl-pds">"</span></span>;</span>
<span class="pl-s1">			}</span>
<span class="pl-s1">			<span class="pl-k">else</span></span>
<span class="pl-s1">			{</span>
<span class="pl-s1">				<span class="pl-c1">echo</span> <span class="pl-s"><span class="pl-pds">"</span>reCAPTCHA not solved/an error occured<span class="pl-pds">"</span></span>;</span>
<span class="pl-s1">			}</span>
<span class="pl-s1">		}</span>
<span class="pl-s1"></span>
<span class="pl-s1">		<span class="pl-smi">$this</span><span class="pl-k">-&gt;</span><span class="pl-smi">load</span><span class="pl-k">-&gt;</span>view(<span class="pl-s"><span class="pl-pds">'</span>form<span class="pl-pds">'</span></span>, [<span class="pl-s"><span class="pl-pds">'</span>recaptcha<span class="pl-pds">'</span></span> <span class="pl-k">=&gt;</span> <span class="pl-smi">$box</span>]);</span>
<span class="pl-s1">	}</span></pre></div>
