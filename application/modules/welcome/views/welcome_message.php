<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<h1>Welcome to CodeIgniter + HMVC</h1>

	<hr>
	
	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:<br>
			<code>application/modules/welcome/views/welcome_message.php</code>
		</p>

		<p>The corresponding controller for this page is found at:<br>
			<code>application/modules/welcome/controllers/Welcome.php</code>
		</p>
		
		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="http://www.codeigniter.com/user_guide/" target="_blank">CodeIgniter's User Guide</a>.</p>
	</div>
	
	<hr>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'SynIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>