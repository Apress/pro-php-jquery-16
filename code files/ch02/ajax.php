<?php

echo '<p class="ajax">This paragraph was loaded with AJAX.</p>',
		'<pre>GET variables: ', print_r($_GET, TRUE), '</pre>',
		'<pre>POST variables: ', print_r($_POST, TRUE), '</pre>';

?>
