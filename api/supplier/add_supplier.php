<?php

// add an supplier 

// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// Create connection
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$call = $mysqli->prepare("CALL AddSupplier(?, ?)");
$call->bind_param("ss", $data[0]->name, $data[0]->address);
$call->execute();

if($call->affected_rows > 0)
    echo "added supplier successfully";
else
    echo "failed to add supplier";
    
?>