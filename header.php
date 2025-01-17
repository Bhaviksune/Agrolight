<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>AgroLight</title>
    <style>
    /* body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    } */

    header {
        background-color: green;
        /* color: #ffffff; */
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid #218838;
        z-index:999;
    }

    h2 {
        margin: 0;
        font-size: 1.8rem;
    }

    nav {
        display: flex;
    }

    nav a {
        color: #ffffff;
        margin-right: 15px;
        text-decoration: none;
        font-size: 1rem;
        transition: color 0.3s ease-in-out;
    }

    nav a:hover {
        color: #f8f9fa;
    }

    .user, .sign-in-up {
        color: #ffffff;
        font-size: 1rem;
    }

    .btn-outline-success {
        color: #28a745;
        background-color: white;
        border: 2px solid #28a745;
        padding: 8px 15px;
        margin-left: 10px;
        cursor: pointer;
        text-decoration: none;
        border-radius: 10px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .btn-outline-success:hover {
        background-color: #218838;
        color: #ffffff;
    }
</style>

</head>
<body>
    <header>
        <h2>AgroLight</h2>
        <?php 
     
                if (isset($_SESSION['farmer_logged_in']) && $_SESSION['farmer_logged_in'] == true) { 
                    echo "
                    <nav>
                        <a href='farmer_page.php'>Home</a>
                        <a href='p.php'>SELL</a>
                        <a href='products.php'>BUY</a>
                        <a href='farmer_page.php#contact-us'>CONTACT US</a>
                    </nav>";
                }
           
                else {
                        echo "
                        <nav>
                            <a href='index.php'>Home</a>
                            <a href='#'>BLOG</a>
                            <a href='#'>CONTACT</a>
                            <a href='#'>ABOUT</a>
                        </nav>";
                    }
              
            
        ?>

        <?php 
            if(isset($_SESSION['farmer_logged_in']) && $_SESSION['farmer_logged_in'] == true) {
                echo "
                <div class='user'> 
                    $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
                </div>
                <div>  
                    <a href='mycart.php' class='btn btn-outline-success'>My Cart</a>
                </div>";
            } else {
                echo "
                <div class='sign-in-up'>
                    <button type='button' onclick=\"popup('set-login-popup')\">LOGIN</button>
                    <button type='button' onclick=\"popup('set-register-popup')\">REGISTER</button>
                </div>";
            }
        ?>   
    </header>
</body>
</html>
