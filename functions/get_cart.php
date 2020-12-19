<?php
// retrieves all cart items from the associated phone and name
// required parameters: phone number and name
function get_cart($phone, $name) {
    
    // make connection with database
    $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
    
    if($mysqli) {
        // get all customer
        // we where unable to use a stored procude after trying all possibilities 
        // so instead we are passing the sql query 
        $call = $mysqli->prepare("Select ItemID From In_Cart Where Cust_Phone_Number = ? and Cust_Name = ?;");
        $call->bind_param("is", $phone, $name);
        $call->execute();
        
        $call->bind_result($itemID);
        
        $response = array();
        $i = 0;
        while ($call->fetch()) {
            $response[$i]['id'] = $itemID;
        }
    }
    else {
        echo "<p>Database Connection Failed</p>";
    }
}
?>