<!DOCTYPE html>
<html lang="en-US">
    <meta charset="UTF-8">
    <head>
        <title>CPSC471 Project</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="login_reg_page">
        <div class="form">
            <h1>Store</h1>
            <div id="bt"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login Page</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
                
            <form id="login" class="page" action="customer-page.php" method="POST">
                <input type="text" placeholder="Name" name="Name"/>
                <input type="number" placeholder="Phone Number" name="Phone"/>
                <button class="submit">Login</button>
                <a href="#">Login as Admin</a>     
            </form>

            <form id="register" class="page" action="register.php" method="POST">
                <input type="text" placeholder="Name" name="Name"/>
                <input type="text" placeholder="Email" name="Email"/>
                <input type="number" placeholder="Phone Number" name="Phone"/>
                <button class="submit">Register</button>
            </form>

            <form id="admin_login" class="page" action="admin-page.php" method="POST">
                <input type="text" placeholder="Address" name="Address"/>
                <input type="number" placeholder="Phone Number" name="Phone"/>
                <button class="submit">Login</button> 
                <a href="#">Go Back</a>
            </form>
        </div>
        </div>
        
        <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
        <script>
            $('a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "fast")
            });

            var x = document.getElementById("login");
            var y = document.getElementById("register");

            function register(){
                x.style.left = "-480px";
                y.style.left = "45px";
            }
            function login(){
                y.style.left = "480px";
                x.style.left = "45px";
            }
        </script>

    </body>

    
</html>