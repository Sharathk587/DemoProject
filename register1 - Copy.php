<?php include('Dbconnect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">
<div>
   
        <div class="form-group row">
            <div class="col-md-3 offset-md-4 container"> <br>
            <h2 class="text-white"><b>Register Here</b></h2>
                <form method="POST" align="center"><br>
                    <div>
                         <input type="text" class="form-control userid" placeholder="Enter user Id" name="userid" required><br>
                    </div>
                    
                    <div>
                        <input type="text" class="form-control username" name="username" placeholder="Enter your name" required><br>
                    </div>

                    <div>
                        <input type="text" class="form-control phone" name="phone" placeholder="Enter your phone number" required><br>
                    </div>
          
                    <div>         
                        <select name="role" class="form-control select role">
                            <option value="" style="display:none" selected="selected">Select...</option>
                            <option value="admin"class="admin">admin</option>
                            <option value="user">user</option>
                        </select> <br>
                    </div>
                    
                    <div>
                        <input type="email" class="form-control email" name="email" placeholder="Enter your E-mail"><br>
                    </div>
                
                   <div>      
                        <input type="password"  class="form-control password" name="password" placeholder="Enter password" required><br>
                   </div>
                   
                   <div>
                        <input type="submit" class="btn  btn-sm btn-outline-primary submit" name="submit" value="Click here to Submit" ><br><br>
                   </div>  

                   <div>
                       <input type="button" class="btn btn-sm btn-outline-success button" name="button" value=" Click here to Signin">
</div>

                 
                   
                </form>
            </div>
</div>
        </div>    
</div>
<script>
    $(document).ready(function(){
        $('.select').click(function(){  
            if($('.select').val()=="admin"){
                $('.email').hide();
            }else{
                $('.email').show();
            }         
        })
        $('.button').click(function(){
            window.location.href='login.php';
        })
       
    })

    $(document).ready(function(){
        $('.submit').click(function(){
            var userid = $('.userid').val();
            if(userid == ''){
                alert('user id is empty');
                $('.userid').focus();
            }else{
                var username = $('.username').val();
                if(username ==''){
                    alert('user name is empty');
                    $('.username').focus();
                }else{
                    var phone = $('.phone').val();
                    if(phone == ''){
                        alert('Phone Number is empty');
                        $('.phone').focus();
                    }else{
                        var password = $('.password').val();
                        if(password == ''){
                            alert('Password is empty');
                            $('.password').focus();
                        }

                    }
                }   
            }
        })
       
    })

</script>
<?php
    if(isset($_POST['submit'])){
         
        $con=Dbconnect();
        
        $password=base64_encode($_POST['password']);
        
        if(isset($_POST['userid'])&&isset($_POST['username'])&&isset($_POST['phone'])){
         
            if(!mysqli_error($con)){

                $query="INSERT INTO user_details(userid,username,phone,role,email,password)VALUES('".$_POST['userid']."','".$_POST['username']."','".$_POST['phone']."','".$_POST['role']."','".$_POST['email']."','".$password."')";
                         
                $insert_query=mysqli_query($con,$query) or die(mysqli_error($con));
            
                if(mysqli_affected_rows($con)){
            ?>
                <script>alert('successfully registerd');</script>
               
                <script> window.location.href='register1.php';</script>
            
            <?php
            }
            else
            {
            ?>

            <?php
            }  
        }

    }
}
?>

</body>
</html>