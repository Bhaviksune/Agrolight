<?php 
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
  <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .border {
            border: 1px solid #dee2e6;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .bg-light {
            background-color: #f8f9fa;
        }

        h1, h4, h5 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: gray;
            color: #fff;
        }

        .p-4 {
            padding: 1.5rem;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
        }

        .btn-primary {
            color: #fff;
            background-color: green;
            border-color: #007bff;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .align-left {
        text-align: left;
    }
    h5 {
  font-size: 2em;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>
            <div class="col-lg-9">
                  <table class="table">
                  <thead class='text-center'>
                        <tr>
                          <th scope="col">serial no</th>
                          <th scope="col">Item name</th>
                          <th scope="col">Item price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Total </th>
                          <th scope="col"> </th>
                        </tr>
                     </thead>
                 <tbody class='text-center'>
                 <?php 
                       if(isset($_SESSION['cart']))
                        {
                        foreach($_SESSION['cart'] as $key => $value)
                        {  $sr=$key+1;
                          
                          echo"
                         <tr>
                          <td>$sr</td>
                          <td>$value[Item_name]</td>
                          <td>$value[price] <input type='hidden' class='iprice' value='$value[price]'></td>
                          <td><input class='text-center iquantity' id='inputValue' name='inputValue'  onchange='subTotal();' type='number' value='$value[Quantity]' min='1' max='10'></td>
                          <td class='itotal'> </td>
                          <td>
                              <form action='manage_cart.php' method='POST'>
                                <button name='Remove_Item'class='btn btn-danger'>Remove</button>
                                <input type='hidden' name='Item_name' value='$value[Item_name]'>
                              </form>  
                          </td>
                    
                          </tr>
                         ";
                        }
                        }
                  ?>
                  </tbody>
                 </table>                 
               </div>
                <div class="col-lg-3 align-left">
                   <div class="border bg-light rounded p-4">
                        <h4>TOTAL:</h4>
                        <h5 class="total-text" id='gTotal'></h5>
                        <br>
                        <form action='manage_cart.php' method="POST" >
                            <button class="btn btn-primary btn-block" name='buy' > Make Purches</button>
                        </form>
                    </div> 
                </div>
        </div>
    </div>
      <script>
   
            function subTotal()
            {  
              gt=0;
              for(i=0;i<iprice.length;i++)
              {
                itotal[i].innerText=(iprice[i].value * iquantity[i].value);
                gt=gt+(iprice[i].value * iquantity[i].value);
              }
              gTotal.innerText=gt;
              updateInputValue();
            }
            subTotal();

      </script>
</body>
</html>
