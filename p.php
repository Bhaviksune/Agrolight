<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Upload</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            width: 50%;
            margin: 50px auto;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.8);
            width: 400px;
            margin: 0 auto 20px;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 20px 0 8px;
            color: #555;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            border: none;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .product-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }

        .product-card img {
            max-width: 100%;
            border-radius: 8px;
            margin-top: 20px;
        }

        p.success-message {
            color: #27ae60;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    
    </style>
</head>
<body>
     <?php
      include('header.php');
      ?>

    <div class="container">
        <form action="upload.php" method="post"  enctype="multipart/form-data">
       <!-- enctype="multipart/form-data"  --- it allow file uploads  -->
            <h2>Upload Product</h2>

            <?php
            // Display success message 
            if (isset($_GET['success'])) {
                
                echo "<p class='success-message'>Product uploaded successfully!</p>";
            }
            ?>

            <label for="productImage">Product Image:</label>
            <input type="file" name="productImage" id="productImage" required>

            <label for="productName">Product Name:</label>
            <input type="text" name="productName" id="productName" required>

            <label for="productPrice">Product Price:</label>
            <input type="number" step="0.01" name="productPrice" id="productPrice" required>

            <label for="productType">Product Type:</label>
            <input type="text" name="productType" id="productType" required>

            <input type="submit" value="Upload Product">
        </form>

        <?php
        // Display product card 
        if (isset($_GET['success'])) {
            echo '<div class="product-card">';
            echo "<h2>{$_POST['productName']}</h2>";
            echo "<p>Price: {$_POST['productPrice']}</p>";
            echo "<p>Type: {$_POST['productType']}</p>";
            echo "<img src='uploads/{$_GET['image']}' alt='Product Image'>";
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>
