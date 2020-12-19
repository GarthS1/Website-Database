<?php

define("CART_FILE", "../../api/supplier_catalogue/");
    // code for retrieving customer.
    // outputs into a JSON format
    // this is get all and no parameter is required for get
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include (CART_FILE . 'get_supplier_catalogue.php');
    }
    
    
    // code for adding a customer
    // parameters are   name - String
    //                  itemID - int
    //                  catID - int
    //                  price - int
    //                  numAva - int
    //                  nameItem - String
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include(CART_FILE . 'add_supplier_catalogue.php');
    
    }
    
?>