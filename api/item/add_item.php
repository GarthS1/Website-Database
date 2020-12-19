<?php

// add an item 

// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// Create connection
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$call = $mysqli->prepare("CALL AddItem(?, ?, ?)");
$call->bind_param("iis", $data[0]->itemID, $data[0]->price, $data[0]->name);
$call->execute();

if($call->affected_rows > 0)
    echo "added item successfully";
else
    echo "failed to add item";
    
?>