<?php

// add a customer to database
// parameters are   phone - int
//                  name - string
//                  email - string
function addCustomer($phone, $name, $email) {
    // Create connection
    $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
    
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $call = $mysqli->prepare("CALL AddCustomer(?, ?, ?)");
    $call->bind_param("iss", $phone, $name, $email);
    $call->execute();
    
    if($call->affected_rows > 0)
        return "successfully registered";
    else
        return "failed to register";
        
}
?>