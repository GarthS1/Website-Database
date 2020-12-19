<?php

// retrieves information regarding money spent on a specific month
// user input
// parameters are   year - int
//                  month - int
//                  type - "spent"
$in = file_get_contents("php://input");
$data = json_decode($in);

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if($mysqli) {
    // get money spent in a specific month
    // we where unable to use a stored procude after trying all possibilities 
    // so instead we are passing the sql query
    $call = $mysqli->prepare("SELECT Sum(Item.Price) FROM Item, Supplier_Purchase, Store_Owner_Purchase WHERE Supplier_Purchase.InvoiceNum = Store_Owner_Purchase.InvoiceNum and Store_Owner_Purchase.ItemId = Item.ItemID and YEAR(Supplier_Purchase.Time_of_Purchase)=? and MONTH(Supplier_Purchase.Time_of_Purchase)=?");
    
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