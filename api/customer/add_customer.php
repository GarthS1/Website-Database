<?php

// add a customer to database

// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// Create connection
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$call = $mysqli->prepare("CALL AddCustomer(?, ?, ?)");
$call->bind_param("iss", $data[0]->phone, $data[0]->name, $data[0]->email);
$call->execute();

if($call->affected_rows > 0)
    echo "added customer successfully";
else
    echo "failed to customer";
    
?>