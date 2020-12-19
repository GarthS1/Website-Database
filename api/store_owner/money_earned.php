<?php

// retrieves information regarding money earned on a specific month
// user input
$in = file_get_contents("php://input");
$data = json_decode($in);

// make connection with database
$mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");

if($mysqli) {
    // get money earned in a specific month
    // we where unable to use a stored procude after trying all possibilities 
    // so instead we are passing the sql query
    // parameters are   year - int
    //                  month - int
    //                  type - "earned"
    $call = $mysqli->prepare("Select SUM(Item.Price) FROM Item, Customer_Purchase, Customer_Buys WHERE Customer_Purchase.PurchaseId = Customer_Buys.purchaseId and Customer_Buys.ItemId = Item.ItemID and YEAR(Customer_Purchase.TimeofPurchase)=? and MONTH(Customer_Purchase.TimeofPurchase)=?");
    
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