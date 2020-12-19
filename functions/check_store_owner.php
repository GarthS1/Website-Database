<?php

// function used to check store owner credential

function checkLogin($address, $phone) {

    // make connection with database
    $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
    $response = array();
    
    if($mysqli) {
        // get all store owners 
        $result = mysqli_query($mysqli,"CALL GetStoreOwner");
        if($result) {
            
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $response[$i]['Store_Location'] = $row['Store_Location'];
                $response[$i]['Name'] = $row['Name'];
                $response[$i]['Address'] = $row['Address'];
                $response[$i]['Phone_Number'] = $row['Phone_Number'];
                if($response[$i]['Address'] == $address && $response[0]['Phone_Number'] == $phone) {
                    return true;
                }
                $i++;
            }
            return "failed";
        }
        else {
            return "failed";
        }
    }
    else {
        return "falied";
    }
}

?>