<?php

require dirname( __FILE__ ) . '/vendor/autoload.php';

use Aws\Sns\SnsClient;
use Aws\Sns\Message;
use Aws\Sns\MessageValidator;


    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }
	
 	//echo "body" . $body;
	
 	//$body = file_get_contents('mess.txt');
    $data = json_decode($body,true);
	$data = $data['Records'][0]['Sns'];
	
	//print_r( $data); 
	//exit;
	
try {
	
	$message = new Message($data);
	
	/*
	$validator = new MessageValidator();
	if ($validator->isValid($message)) {
		echo "Sns Message Received: " . $message->get('Message'); 
	}
	*/
	
	echo "Sns Message Received: " . $message->get('Message');
	
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}


?>