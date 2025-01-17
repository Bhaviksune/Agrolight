<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
            margin-left:20px;
            padding: 80px;
        }

        .card {
            width: 250px; 
            margin: 20px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            background-color: #fff;
            text-align:center;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 250px;
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            color: #6c757d;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        
        .styled-form {
            text-align: center;
            margin-top:50px;
        }

        .styled-label {
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .styled-select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .styled-button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .styled-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
      include('header.php');
      ?>
<!-- choose cateogry of the product -->
<form class="styled-form" action="manage_cart.php" method="POST">
        <label class="styled-label" for="mySelect">Select a value:</label>
        <select class="styled-select" id="mySelect" name="selectedValue">
          <option value="all">ALL</option>
            <option value="fruit">Fruit</option>
            <option value="vegetable">Vegetable</option>
            <option value="grains">Grains</option>
        </select>

        <button class="styled-button" type="submit">Submit</button>
    </form>

<?php  
     require('connection.php');
     if(isset($_SESSION['SelectedValue']))
     {
      $type=$_SESSION['SelectedValue']; //here store value all or any other
      if($_SESSION['SelectedValue']=='all') 
      {
       $sql = "SELECT * FROM product_list";
      $result = $con1->query($sql);
     }else 
     {
      $sql = "SELECT * FROM `product_list` WHERE `type`='$type'";
      $result = $con1->query($sql);
    }
     }
     else{
      $sql = "SELECT * FROM product_list";
      $result = $con1->query($sql);
     }
 ?> 

   
<!-- cards making-->
<div class="container">
        <!-- Repeat the following structure for each product -->
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-lg-3">
                <form action="manage_cart.php" method="POST">
                    <div class="card">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">Price: <?php echo $row['price']; ?></p>
                            <button type="submit" name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                            <input type="hidden" name="Item_name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                        </div>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
   
    </div>
</body>
</html>