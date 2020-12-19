<?php

define("CART_FILE", "../../api/store_owner/");
    // code for retrieving store owner.
    // outputs into a JSON format
    // this is get all and no parameter is required for get
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include (CART_FILE . 'get_store_owner.php');
    }
    
    
    // code for adding a store owner
    // parameters are   location - String
    //                  name - String
    //                  address - String
    //                  phone - String
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include(CART_FILE . 'add_store_owner.php');
    
    }
    
?>
