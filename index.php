<?php

require dirname( __FILE__ ) . '/vendor/autoload.php';

use Aws\Sns\SnsClient;
use Aws\Sns\Message;
use Aws\Sns\MessageValidator;


    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }

 
 	//$body = file_get_contents('mess.txt');
    $data = json_decode($body,true);
	
	print_r( $data);
	//exit;
	
try {
	
	$message = new Message($mess);
	
	$validator = new MessageValidator();
	if ($validator->isValid($message)) {
		echo $message->get('Message');	   
	}
		
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}


?>