<?php
define("CART_FILE", "../../api/cart/");
    // code for adding a getting customers cart
    // parameters are   phone - int
    //                  name - String
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include (CART_FILE . 'get_cartitems.php');
    }
    // code for adding/removing an item in cart
    // parameters are   phone - int
    //                  name - String
    //                  itemID - int (only for add)
    //                  type - "add" or "remove"
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // user input
        $in = file_get_contents("php://input");
        $data = json_decode($in);
        
        if($data[0]->type === "add")
            include(CART_FILE . 'add_cartitems.php');
        if($data[0]->type === "remove")
            include(CART_FILE . 'remove_from_cart.php');
        
    }
    
?>

