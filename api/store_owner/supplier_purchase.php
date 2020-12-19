<?php

// retrieves information regarding the purchases made from the supplier and prints in a JSON format

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
$response = array();

if($mysqli) {
    // call stored procedure to retrieve how much money the store has made
    $result = mysqli_query($mysqli,"CALL GetSupplierPurchases");
    if($result) {
        
        header("Content-Type: JSON");
        $i = 0;
        // print the result into a JSON file
        // change below 
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['Store location'] = $row['Store_Location'];
            $response[$i]['Invoice number'] = $row['InvoiceNum'];
            $response[$i]['Time of purchase'] = $row['Time_of_Purchase'];
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