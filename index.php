<?php

require dirname( __FILE__ ) . '/vendor/autoload.php';

use Aws\Sns\SnsClient;

    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }

    $message = json_decode($body,true);
	
	if ($message) {
		echo $message['Message'];
	}


?>