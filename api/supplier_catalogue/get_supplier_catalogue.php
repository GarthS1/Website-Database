<?php

// retrieves all supplier catalogue information and prints in a JSON format

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
$response = array();

if($mysqli) {
    // get all supplier catalogue
    $result = mysqli_query($mysqli,"CALL GetSupplierCatalogues");
    if($result) {
        
        header("Content-Type: JSON");
        $i = 0;
        // print the result into a JSON file
        while($row = mysqli_fetch_assoc($result)) {
            $response[$i]['NameSupplier'] = $row['NameSupplier'];
            $response[$i]['ItemID'] = $row['ItemID'];
            $response[$i]['CatID'] = $row['CatID'];
            $response[$i]['Price'] = $row['Price'];
            $response[$i]['NumAvailable'] = $row['NumAvailable'];
            $response[$i]['Name_of_item'] = $row['Name_of_item'];
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