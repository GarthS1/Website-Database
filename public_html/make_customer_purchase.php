<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $in = file_get_contents("php://input");
        $data = json_decode($in);
        
        // Create connection
        $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
        
        if ($mysqli -> connect_errno) {
          echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
          exit();
        }
 
        $call = $mysqli->prepare("CALL MakeCustomerPurchase(?, ?, ?)");
        $call->bind_param("sii", $data[0]->name, $data[0]->phone, $data[0]->purchaseID);
        $call->execute();
        
        if($call->affected_rows > 0)
            echo "customer purchase made";
        else
            echo "failed";
    
    }
?>