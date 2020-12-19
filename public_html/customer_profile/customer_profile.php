<?php

define("CART_FILE", "../../api/customer_profile/");
    // code for retrieving customer information.
    // outputs into a JSON format
    // this is get all and no parameter is required for get
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include (CART_FILE . 'get_customer_profile.php');
    }
    
    
    // code for adding a customer information
    // parameters are   phone - int
    //                  cname - String
    //                  address - String
    //                  cardNum - int
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include(CART_FILE . 'add_customer_profile.php');
    
    }
    
?>
