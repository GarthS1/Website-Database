<?php

define("SUPPLIER_FILE", "../../api/supplier/");
    // code for retrieving supplier.
    // outputs into a JSON format
    // this is get all and no parameter is required for get
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include (SUPPLIER_FILE . 'get_supplier.php');
    }
    
    
    // code for adding a supplier
    // parameters are   name - String
    //                  address - String
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include(SUPPLIER_FILE . 'add_supplier.php');
    
    }
    
?>