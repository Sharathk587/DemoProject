<?php 
 session_start(); 
 error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">
<br>
<form method="POST" align="center">
    <div class="row">
    <div class=" col-md-3 offset-md-4 container">
        <h3> <p class="text-white">Signin</p></h3>
        <br>

        <input type="text" class="form-control UserName" name="UserName" placeholder="Enter your name" required><br>
        
        <input type="password" class="form-control password" name="password" placeholder="Enter your password" required><br>
        
        <input type="submit" class="btn btn-outline-primary submit" name="submit" value="Click here to sigin"><br><br>
        
        <p class="text-white">New User?
        <a href="register1.php"class="text-success">Click here to register</a></p>

    </div>
    </div>
</form>
<script>
$(document).ready(function(){
    document.body.style.backgroundImage = "url('img_tree.png')";
        $('.hide').mouseenter(function(){
            
           $('.hide').hide();
                      
        })
         
        $('.hide').mouseleave(function(){
            
           $('.hide').show();
                  
        })

        $('.submit').click(function(){
            var username = $('.UserName').val();
            var password = $('.password').val();
            if(username == ''){
                alert('user name is required');
            }else{
                if(password == ''){
                alert('password is required');
                $('.password').focus();
            }
        }
        })
       
              
    })


    </script>
    <?php
        include('Dbconnect.php');
        $con = Dbconnect();
        if((isset($_POST['UserName'])) && (isset($_POST['password']))){
            

            $query = "SELECT username,password,role,userid FROM user_details WHERE username='".mysqli_real_escape_string($con,$_POST['UserName'])."'";
            $execute_query = mysqli_query($con,$query) or die(mysqli_error($con));
            if(mysqli_num_rows($execute_query)>0){

                
                $row = mysqli_fetch_assoc($execute_query);

                $uname = $row["username"];

                $password = $row["password"];
                $role = $row["role"];
                $userid = $row["userid"];

                $password_enter = base64_encode($_POST['password']);

                
                    if($password==$password_enter && $uname==$_POST['UserName']){


                        $_SESSION['username'] = $_POST['UserName'];
                        $_SESSION['role'] = $role;
                        $_SESSION['userid'] = $userid;


                        $logintime = date('H:i:s');
                        $date1 = date("Y/m/d");
                        $query_insert = " INSERT INTO userdata(userid,username,logintime,date) VALUES('".$userid."','".$uname."','".$logintime."','".$date1."') ";
                        $query_execute=mysqli_query($con,$query_insert);

                        if($_SESSION['role']=='user'){
                            ?>
                            <script>window.location.href='user.php'</script>
                            <?php
                        }
                        else
                        {
                            ?>
                            <script>window.location.href='admin.php'</script>
                            <?php

                        }
                    }
                    else
                    {
                            if($password_enter!=$password&&$password_enter!=NULL)
                            {
                                echo "<script> alert('Enter valid password'); </script>";
                            }
                            elseif($_POST['UserName']==NULL)
                            {
                                echo "<script> window.location.href='login.php';</script>";
                            }
                       }
                   
                            ?>
                   
                          <?php
       
            }
            else
            {
                ?>
                <script>  alert ('username does not exist'); </script>
                <script>window.location.href='login.php'; </script>
                <?php
                }
           }      
    ?>
  
</body>
</html>