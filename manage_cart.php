<?php 
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST") //if from submitted by post then add
{ 
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {  
            $myitems=array_column( $_SESSION['cart'],'Item_name');
            if(in_array($_POST['Item_name'],$myitems))
            {
                echo"
                <script>
                alert('Item Alredy Added ');
                window.location.href='buyer_page.php';
                </script>";
            }
            else
            {
                 $count=count($_SESSION['cart']);
                 $_SESSION['cart'][$count]=array('Item_name'=>$_POST['Item_name'],'price'=>$_POST['price'],'Quantity'=>$_SESSION['inputValue']);
                 echo"
                <script>
                alert('Item Added ');
                window.location.href='buyer_page.php';
                </script>";

            }
         
        }
        else{
            $_SESSION['cart'][0]=array('Item_name'=>$_POST['Item_name'],'price'=>$_POST['price'],'Quantity'=>$_SESSION['inputValue']);
            echo"
                <script>
                alert('Item Added ');
                window.location.href='buyer_page.php';
                </script>";
        }
    }
    if(isset($_POST['Remove_Item']))
    {
      foreach($_SESSION['cart'] as $key=>$value)
      {
        if($value['Item_name']==$_POST['Item_name'])
        {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart']=array_values($_SESSION['cart']);
        echo"
        <script>
        alert('Item Removed');
        window.location.href='mycart.php';
        </script>
        ";
        }
      }
    }
  
     if (isset($_POST["selectedValue"])) {
        // Get the selected value
        $selectedValue = $_POST["selectedValue"];
        $_SESSION['SelectedValue']=$_POST["selectedValue"];
        echo"
        <script>
        alert('Item Selected');
        window.location.href='products.php';
        </script>
        ";

    } else {
        // Handle the case when "selectedValue" is not set
        echo "No value selected";
    }

    if(isset($_POST['buy']))
    {
include("connection.php");

// Get user_id based on the current user's session
$user_id = $_SESSION['username'];

// Loop through cart items and insert into the database
foreach ($_SESSION['cart'] as $key => $value) {
    $item_name = $value['Item_name'];
    $price = $value['price'];
    $quantity = $value['Quantity'];

    // Insert data into the user_purchases table
    $query = "INSERT INTO user_purchases (user_id, item_name, price, quantity) VALUES ('$user_id', '$item_name', '$price', '$quantity')";
    mysqli_query($con1, $query);
}

// Clear the user's cart after inserting into user_purchases
   unset($_SESSION['cart']);
echo"
        <script>
        alert('Order successfull');
        window.location.href='mycart.php';
        </script>
        ";
            
    }
    
}
?>