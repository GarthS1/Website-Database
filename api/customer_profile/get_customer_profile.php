<?php

// retrieves all customer profile information and prints in a JSON format

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
$response = array();

if($mysqli) {
    // get all customer_profiles
    $result = mysqli_query($mysqli,"CALL GetCustomerProfiles");
    if($result) {
        
        header("Content-Type: JSON");
        $i = 0;
        // print the result into a JSON file
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['Phone_Number'] = $row['Phone_Number'];
            $response[$i]['CName'] = $row['CName'];
            $response[$i]['Address'] = $row['Address'];
            $response[$i]['Card_Num'] = $row['Card_Num'];
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