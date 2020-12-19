<!DOCTYPE html>
<html lang="en-US">
    <meta charset="UTF-8">
    <head>
        <title>CPSC471 Project</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="login_reg_page">
        <div class="form">
            <form class="register_page">
                <input type="text" placeholder="Name"/>
                <input type="text" placeholder="Email"/>
                <input type="text" placeholder="password"/>
                <input type="text" placeholder="Phone Nnumber"/>
                <button>Create</button>
                <a href="#">Go Back</a>
                
            </form>

            <form class="login_page">
                <h1>Store</h1>
                <input type="text" placeholder="Email"/>
                <input type="text" placeholder="password"/>
                <button>Login</button>
                <p class="message">Not Registered?</p>
                <a href="#">Register</a>
            </form>
        </div>
        </div>
        <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
        <script>
            $('a').click(function(){
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow")
            });
        </script>

    </body>

    
</html>