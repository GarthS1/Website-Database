<?php
    include("../functions/get_items.php");
    include("../functions/check_customer.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <meta charset="UTF-8">
    <head>
        <title>Customer Page</title>
        <link rel="stylesheet" href="css/cust-style.css">
    </head>
    <body>
        
        <?php
        $check = checkCustomer($_POST['Name'], $_POST['Phone']);
        if($check == 1) : ?>
            <div class="shopping_page">
            <div class="customer-page">
            
                <div class="header">
                    <!--<input type="text" placeholder="Search Item">-->
                    <h1>Store</h1>
                    <a href="confirm-page.php">
                        <img class="cart-icon" src="pay_icon.png">
                    </a>
                </div>
                <div class="item_list">
                <?php
                $array = getItems();
                    
                        foreach($array as &$value){
                            echo '<button id=' . $value["ItemID"] . ' class="item" onclick="selectItem(id)">' . $value["Name"] . '<p>' . '$' . $value["Price"] . '</p>' . '</button>';
                        }
                    ?>
                </div>
            </div>
            </div>
        <?php else: ?>
            <h style="font-family: Arial, Helvetica, sans-serif">
                Incorrect Login Credentials</h><br/>
            <a href="index.php">Go Back</a>    
        <?php endif; ?>
        <script>
            var x = 1;
            function selectItem(btn){
                var property = document.getElementById(btn);
                if(x == 1){
                    property.style.backgroundColor = "black"
                    x = 0;
                }else{
                    property.style.backgroundColor = "rgb(107, 206, 115)"
                    x = 1;
                }
            }
        </script>
    </body>
</html>