<?php

define("FINANCE_FILE", "../../api/store_owner/");
    // code for retrieving store owner finance information.
    // outputs into a JSON format
    // parameters are   type - earned, spent, monthly cost, customer purchase, supplier purchase
    //                  year (required only for earned, spent, monthly cost) - int
    //                  month (required only for earned, spent, monthly cost) - int
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $in = file_get_contents("php://input");
        $data = json_decode($in);
        
        if($data[0]->type == "earned")  // retrieves money earned on a specific month
            include (FINANCE_FILE . 'money_earned.php');
        else if ($data[0]->type == ("spent"))   // retrieves money spent on a specific month
            include (FINANCE_FILE . 'money_spent.php');
        else if($data[0]->type == ("monthly cost")) // retrieves monthly cost on a specific month
            include (FINANCE_FILE . 'get_monthly_cost.php');
        else if($data[0]->type == ("customer purchase"))    // retrieves all customer purchases made
            include (FINANCE_FILE . 'get_customer_purchases.php');
        else if($data[0]->type == ("supplier purchase"))    // retrieves all purchases from supplier
            include (FINANCE_FILE . 'supplier_purchase.php');
        else
            echo "failed";
    }
    

    
?>