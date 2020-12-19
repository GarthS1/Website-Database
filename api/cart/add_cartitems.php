<?php

// add an item to cart (updates the database). Specify customer information and itemID that customer wants to add to cart

// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// Create connection
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
$call = $mysqli->prepare("CALL AddToCart(?, ?, ?)");
$call->bind_param("isi", $data[0]->phone, $data[0]->name, $data[0]->itemID);
$call->execute();

if($call->affected_rows > 0)
    echo "added to cart successfully";
else
    echo "failed to add to cart";
    
?>