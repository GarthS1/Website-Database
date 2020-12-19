<?php

define("CART_FILE", "../../api/net_income/");
    // code for retrieving net income.
    // parameters are   year - int
    //                  month - int
    //                  monthlyCost - int
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include(CART_FILE . 'add_net_income.php');
    
    }
    
?>