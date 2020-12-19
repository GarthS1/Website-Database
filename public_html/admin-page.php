<?php
    include("../functions/check_store_owner.php");
?>
<!DOCTYPE html>
<html lang="en-US">
    <meta charset="UTF-8">
    <head>
        <title>CPSC471 Project</title>
        <link rel="stylesheet" href="css/admin-style.css">
    </head>
    <body>
        
        <?php
        $check = checkLogin($_POST['Address'], $_POST['Phone']);
        if($check == 1) : ?>
            <div class="finance">
                <div class="form">
                    <h1>Financial Report</h1>
                    <!--<form id="report-input" class="date" action="report-page.php" method="GET">-->
                    <!--    <input type="number" placeholder="Month" name="Month"/>-->
                    <!--    <input type="number" placeholder="Year" name="Year/>-->
                    <!--    <button class="submit"></button>-->
                    <!--</form>-->
                    <!--<button class="submit">Get Report</button>-->
                    <!--<br>-->
                    <form id="report-input" class="page" action="report-page.php" method="GET">
                        <input type="number" placeholder="Month" name="Month"/>
                        <input type="number" placeholder="Year" name="Year"/>
                        <button class="submit">Report</button> 
                    </form>
                    
                </div>
            </div>
        <?php else: ?>
            <h style="font-family: Arial, Helvetica, sans-serif">
                Incorrect Login Credentials</h><br/>
            <a href="index.php">Go Back</a>    
        <?php endif; ?>
    </body>
</html>



