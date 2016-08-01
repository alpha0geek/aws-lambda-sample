<?php

require dirname( __FILE__ ) . '/vendor/autoload.php';

use Aws\Sns\SnsClient;
use Aws\Sns\Message;
use Aws\Sns\MessageValidator;


    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }

    $message = json_decode($body,true);
	
	
	//$message = Message::fromRawPostData();
	echo $message->get('Message');
		
	//if ($message) 
	{
		
	//	print_r( $message );
	}


?>