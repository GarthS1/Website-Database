<?php

// add net income to database 

// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// Create connection
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$call = $mysqli->prepare("CALL AddNetIncome(?, ?, ?)");
$call->bind_param("iii", $data[0]->year, $data[0]->month, $data[0]->monthlyCost);
$call->execute();

if($call->affected_rows > 0)
    echo "added net income";
else
    echo "failed to add net income";
    
?>