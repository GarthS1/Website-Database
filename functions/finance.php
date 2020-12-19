<?php

// retrieves information regarding money earned on a specific month
function moneyEarned($year, $month) {
    
    // make connection with database
    $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
    
    if($mysqli) {
        // get money earned in a specific month
        // we where unable to use a stored procude after trying all possibilities 
        // so instead we are passing the sql query
        // parameters are   year - int
        //                  month - int
        $call = $mysqli->prepare("Select SUM(Item.Price) FROM Item, Customer_Purchase, Customer_Buys WHERE Customer_Purchase.PurchaseId = Customer_Buys.purchaseId and Customer_Buys.ItemId = Item.ItemID and YEAR(Customer_Purchase.TimeofPurchase)=? and MONTH(Customer_Purchase.TimeofPurchase)=?");
        
        $call->bind_param("ii", $year, $month);
        $call->execute();
        
        $call->bind_result($result);
        
        if ($call->fetch()) {
            return $result;
        }
    }
    else {
        return -1;
    }
    return -1;
}


// retrieves information regarding money spent on a specific month
function moneySpent($year, $month) {
    // parameters are   year - int
    //                  month - int
    
    // make connection with database
    $mysqli = new mysqli("localhost","id15457855_cpscfinal","t/bbQ6i%GtT9zkI/","id15457855_grocerystore");
    
    if($mysqli) {
        // get money spent in a specific month
        // we where unable to use a stored procude after trying all possibilities 
        // so instead we are passing the sql query
        $call = $mysqli->prepare("SELECT Sum(Item.Price) FROM Item, Supplier_Purchase, Store_Owner_Purchase WHERE Supplier_Purchase.InvoiceNum = Store_Owner_Purchase.InvoiceNum and Store_Owner_Purchase.ItemId = Item.ItemID and YEAR(Supplier_Purchase.Time_of_Purchase)=? and MONTH(Supplier_Purchase.Time_of_Purchase)=?");
        
        $call->bind_param("ii", $year, $month);
        $call->execute();
        
        $call->bind_result($result);
        
        if ($call->fetch()) {
            return ($result);
        }
    }
    else {
        return -1;
    }
    return -1;

}





?>