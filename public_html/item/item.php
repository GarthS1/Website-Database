<?php

define("CART_FILE", "../../api/item/");
    // code for retrieving item.
    // outputs into a JSON format
    // this is get all and no parameter is required for get
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include (CART_FILE . 'get_item.php');
    }
    
    
    // code for adding an item
    // parameters are   itemID - int
    //                  price - int
    //                  name - String
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include(CART_FILE . 'add_item.php');
    
    }
    
?>
