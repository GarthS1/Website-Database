<?php

// retrieves information regarding monthly cost on a specific month
// user input
// parameters are   year - int
//                  month - int
//                  type - "monthly cost"
$in = file_get_contents("php://input");
$data = json_decode($in);

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if($mysqli) {
    // we were unable to use a stored procude after trying all possibilities 
    // so instead we are passing the sql query
    // parameters are   year - int
    //                  month - int
    $call = $mysqli->prepare("Select NetIncome.Monthly_Operating_Cost FROM NetIncome WHERE NetIncome.Year=? and NetIncome.Month=?");
    $call->bind_param("ii", $data[0]->year, $data[0]->month);
    $call->execute();
    
    $call->bind_result($result);
    
    while ($call->fetch()) {
        echo ($result);
    }
}
else {
    echo "<p>Database Connection Failed</p>";
}

?>