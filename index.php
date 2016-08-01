<?php

require dirname( __FILE__ ) . '/vendor/autoload.php';

use Aws\Sns\SnsClient;
use Aws\Sns\Message;
use Aws\Sns\MessageValidator;


    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }

    $data = json_decode($body,true);
	
	
	$message = new Message($data);
	echo $message->get('Message');
		
	//if ($message) 
	{
		
	//	print_r( $message );
	}


?>