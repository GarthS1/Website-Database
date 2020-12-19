<?php
    include("../functions/finance.php");
?>
<!DOCTYPE html>
<html lang="en-US">
    <meta charset="UTF-8">
    <head>
        <title>Financial Report</title>
        <link rel="stylesheet" href="css/report-style.css">
    </head>
    <body>
        <div class="report-box">
            <div class="report">
                <div class="header">
                    <?php
                    echo '<h1>', $_GET['Year'], ' Report</h1>';
                    ?>
                </div>
                <div class="report-data">
                    <div class="earned">
                        <?php
                        // print money earned in the given month
                            $earned = moneyEarned($_GET['Year'], $_GET['Month']);
                            echo "money earned in ";
                            echo $_GET['Year'];
                            echo "-";
                            echo $_GET['Month'];
                            echo " is: $";
                            echo $earned;
                        ?>
                    </div>
                    <div class="spent">
                        <?php
                        // print money spent in the given month
                            $spent = moneySpent($_GET['Year'], $_GET['Month']);
                            echo "money spent in ";
                            echo $_GET['Year'];
                            echo "-";
                            echo $_GET['Month'];
                            echo " is: $";
                            echo $spent;
                        ?>
                    </div>
                </div>
                <br>
                <a href="index.php">
                    <button class="submit">
                        Log Out
                    </button>
                </a>
            </div>
        </div>
    </body>
</html>