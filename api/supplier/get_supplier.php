<?php

// retrieves all supplier information and prints in a JSON format

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
$response = array();

if($mysqli) {
    // get all suppliers
    $result = mysqli_query($mysqli,"CALL GetSuppliers");
    if($result) {
        
        header("Content-Type: JSON");
        $i = 0;
        // print the result into a JSON file
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['Name_of_Supplier'] = $row['Name_of_Supplier'];
            $response[$i]['Address'] = $row['Address'];
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