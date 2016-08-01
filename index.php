<?php


    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }
	
	
 	//$body = file_get_contents('mess.txt');
	
    $data = json_decode($body,true);
	$message = $data['Records'][0]['Sns']["Message"];
	
	echo "Sns Message Received: " . $message . PHP_EOL;
	flush();
	//print_r( $data);

?>