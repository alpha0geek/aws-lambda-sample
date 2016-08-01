<?php

    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }

 	//echo "body" . $body;
    $data = json_decode($body,true);
	$message = $data['Records'][0]['Sns']["Message"];
	
	echo "Sns Message Received: " . $message;
	//print_r( $data); 
	exit;
	

?>