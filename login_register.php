<?php
require('connection.php');
session_start();






#for FARMER login
if(isset($_POST['farmer-login']))
{
    $query="SELECT * FROM `farmer` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result=mysqli_query($con1,$query);
     
    if($result)
    {
        if(mysqli_num_rows($result)> 0)
        {
             $result_fetch=mysqli_fetch_assoc($result);
             if(password_verify($_POST['password'],$result_fetch['password']))
             { #if  password matched
               $_SESSION['farmer_logged_in']=true;
               $_SESSION['username']=$result_fetch['username'];
               header('location:farmer_page.php');
             }
             else
             { #if password not matched
                echo"<script>
               alert('Incorrect Password');
               window.location.href='index.php';
               </script>";
             }
        }
        else
        {
            echo"<script>
               alert('Email or Username not registered');
               window.location.href='index.php';
               </script>";
        }

    }
    else
    {
        echo"<script>
               alert('Cannot Run Query');
               window.location.href='index.php';
               </script>";
    
    }
}




#for FARMER registration
if(isset($_POST['farmer_register']))
{
    $user_exist_query="SELECT * FROM `farmer` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result=mysqli_query($con1,$user_exist_query);

    if($result)
    {
       if(mysqli_num_rows($result)>0)#it will be executed if username or email is already taken
        {
            $result_fetch=mysqli_fetch_assoc($result);
            //if any user has take username or email so ready exist
            if($result_fetch['username']==$_POST['username'])
            {    
              //username same
                echo"<script>
                alert('$result_fetch[username] - Username already Taken');
                window.location.href='index.php';
                </script>";
            }
            else
            {    
               //email same
                echo"<script>
                alert('$result_fetch[email] - Email already Taken');
                window.location.href='index.php';
                </script>";
            }
        }
        else // if both pass then create account
        {    
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $query="INSERT INTO `farmer`(fullname,username, email, password) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
            if(mysqli_query($con1,$query))
            {
                echo"<script>
                alert('FARMER Registered Succesfully');
                window.location.href='index.php';
                </script>";  
            }else
            {
                echo"<script>
               alert('Cannot Run Query');
               window.location.href='index.php';
               </script>";
            }
        }
    }else
    {
     echo"<script>
     alert('Cannot Run Query');
     window.location.href='index.php';
     </script>";
    }
}


?>