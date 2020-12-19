<?php

//checks customer's credentials
function checkCustomer($name, $phone) {
    
    // make connection with database
    $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
    
    if($mysqli) {
        // get all customer
        $result = mysqli_query($mysqli,"CALL GetCustomers");
        if($result) {
            
            $i = 0;
            // print the result into a JSON file
            while($row = mysqli_fetch_assoc($result)) {
                if($name == $row['Name'] && $phone == $row['Phone_Number'])
                    return true;
                $i++;
            }
        }
        else {
            return -1;
        }
    }
    else {
        echo "<p>Database Connection Failed</p>";
    }
    return -1;
}
?>