<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }

        .custom-section {
            padding: 20px;
            /* margin: 20px; */
            /* border: 1px solid #ddd; */
            border-radius: 10px;
            text-align: center;
            position: relative;
        }

        .image-section {
            overflow: hidden;
            text-align: center;
        }

        .custom-image {
            width: 100%; /* Decreased size */
            height: 650px;
            border-radius: 10px;
        }

        .image-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .services-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px; /* Increased space */
        }

        .custom-service {
            width: 40%; /* Increased size */
            height:200px;
            margin: 10px;
            padding: 50px;
            text-align: center;
            background-color: #f4f4f4;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            color: #333;
            outline: none;
        }

        #contact-us {
            text-align: center;
            height:300px;
            padding-top:70px;
        }
    </style>
</head>
<body>
<?php
      include('header.php');
      ?>

    <section class="custom-section image-section">
        <img class="custom-image" src="image/image1.jpg" alt="Welcome to Farm Management System">
        <div class="image-overlay"><h2>Welcome to AgroLight</h2></div>
    </section>

    <section class="custom-section services-section">
        <a href="products.php" class="custom-service">
            <h2>Buy Product</h2>
            <p> farmer can Buy the products on AgroLight </p>
        </a>
    </section>

    <section id="contact-us" class="custom-section">
        <h2>Contact Us</h2>
        <p>Email: info@farmmanagement.com</p>
        <p>Phone: +1 123-456-7890</p>
    </section>
</body>
</html> 