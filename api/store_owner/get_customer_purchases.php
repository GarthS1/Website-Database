<?php

// retrieves information regarding the purchases made by the customers and prints in a JSON format

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
$response = array();

if($mysqli) {
    // call stored procedure to retrieve information regarding customer purchases
    $result = mysqli_query($mysqli,"CALL GetCustomerPurchases");
    if($result) {
        
        header("Content-Type: JSON");
        $i = 0;
        // print the result into a JSON file
        // change below 
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['Name'] = $row['Name'];
            $response[$i]['Phone number'] = $row['Phone_Number'];
            $response[$i]['Purchase ID'] = $row['PurchaseId'];
            $response[$i]['Time of purchase'] = $row['TimeofPurchase'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
    else {
        echo ("failed query");
    }
}
else {
    echo "<p>Database Connection Failed</p>";
}

?>