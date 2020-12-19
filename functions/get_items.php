<?php

// retrieves all items information and returns array of items (or -1 if failed)
function getItems() {
    // make connection with database
    $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
    $response = array();
    
    if($mysqli) {
        // get all items
        $result = mysqli_query($mysqli,"CALL GetItems");
        if($result) {
            
            $i = 0;
            // print the result into a JSON file
            while($row = mysqli_fetch_assoc($result)) {
                $response[$i]['Price'] = $row['Price'];
                $response[$i]['Name'] = $row['Name_of_Item'];
                $response[$i]['ItemID'] = $row['ItemID'];
                $i++;
            }
            return $response;
        }
        else {
            echo "could not retrieve items";
            return -1;
        }
    }
    else {
        echo "could not retrieve items";
        return -1;
    }
}

?>