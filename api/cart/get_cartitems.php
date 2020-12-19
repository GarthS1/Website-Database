<?php

// retrieves all cart items from the associated phone and name
// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if($mysqli) {
    // get all customer
    // we where unable to use a stored procude after trying all possibilities 
    // so instead we are passing the sql query 
    $call = $mysqli->prepare("Select ItemID From In_Cart Where Cust_Phone_Number = ? and Cust_Name = ?;");
    $call->bind_param("is", $data[0]->phone, $data[0]->name);
    $call->execute();
    
    $call->bind_result($itemID);
    
    print("Item id's in the cart: ");
    while ($call->fetch()) {
        print ($itemID);
        print (" ");
    }
}
else {
    echo "<p>Database Connection Failed</p>";
}

?>