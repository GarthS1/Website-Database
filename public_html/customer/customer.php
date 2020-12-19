<?php

define("CART_FILE", "../../api/customer/");
    // code for retrieving customer.
    // outputs into a JSON format
    // this is get all and no parameter is required for get
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include (CART_FILE . 'get_customer.php');
    }
    
    
    // code for adding a customer
    // parameters are   phone - String
    //                  name - int
    //                  email - String
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include(CART_FILE . 'add_customer.php');
    
    }
    
?>

