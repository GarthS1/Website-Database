<?php

// add an supplier catalogue

// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// Create connection
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$call = $mysqli->prepare("CALL AddSupplierCatalogue(?, ?, ?, ?, ?, ?)");
$call->bind_param("siiiis", $data[0]->name, $data[0]->itemID, $data[0]->catID, $data[0]->price,
 $data[0]->numAva, $data[0]->nameItem);
$call->execute();

if($call->affected_rows > 0)
    echo "added a supplier catalogue";
else
    echo "failed to a supplier catalogue";
    
?>