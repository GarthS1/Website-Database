<?php
    include('../functions/add_customer.php');
?>

<!DOCTYPE html>
<html lang="en-US">
    <meta charset="UTF-8">
    <head>
        <title>CPSC471 Project</title>
    </head>
    <body>
        <h style="font-family: Arial, Helvetica, sans-serif">
            <?php echo addCustomer($_POST['Phone'], $_POST['Name'], $_POST['Email']); ?>
        <a href="index.php">Go Back</a>
    </body>
</html>