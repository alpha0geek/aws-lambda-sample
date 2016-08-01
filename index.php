<?php

define('DB_SERVER', 'lamdadb.cwzhqacjpnfs.ap-southeast-2.rds.amazonaws.com:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'snsmess321');
define('DB_DATABASE', 'lambdaDB');


    $body = '';
    while (FALSE !== ($line = fgets(STDIN))) {
		$body.= $line;
    }
	
	
 	//$body = file_get_contents('mess.txt');
	
    $data = json_decode($body,true);
	$message = $data['Records'][0]['Sns']["Message"];
	
	echo "Sns Message Received: " . $message;
	//flush();
	//print_r( $data);

	

	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
			
	$sql = "INSERT INTO messages (id, message) VALUES (NULL, '" . $message . "')";

	if ($conn->query($sql) === TRUE) {
	    echo "New SNS message recorded in RDS DB.";
	} else {
	    echo "Error: " . $sql . " -> " . $conn->error;
	}

	$conn->close();

	
?>