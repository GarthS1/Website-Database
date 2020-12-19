<?php

// retrieves all items information and prints in a JSON format

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
$response = array();

if($mysqli) {
    // get all items
    $result = mysqli_query($mysqli,"CALL GetItems");
    if($result) {
        
        header("Content-Type: JSON");
        $i = 0;
        // print the result into a JSON file
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['ItemID'] = $row['ItemID'];
            $response[$i]['Price'] = $row['Price'];
            $response[$i]['Name_of_Item'] = $row['Name_of_Item'];
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