<?php

// add an customer_profile

// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// Create connection
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$call = $mysqli->prepare("CALL AddCustomerProfile(?, ?, ?, ?)");
$call->bind_param("issi", $data[0]->phone, $data[0]->cname, $data[0]->address, $data[0]-> cardNum);
$call->execute();

if($call->affected_rows > 0)
    echo "added to customer profile";
else
    echo "failed to add customer profile";
    
?>