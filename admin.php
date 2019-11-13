<?php session_start();?>
<?php include('Dbconnect.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>admin</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<section>



    <nav class="nav nav-bar nav-exapand-sm bg-dark fixed-top">
        <h3 class="text-white">Welcome to admin panel</h3>
        <div class="collapse navbar-collapse">
            <ul class="nav ml-auto">
                <li>
                    <a href="logout.php">Logout </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row card">
         <br>
        <div class="card-body">
        <form  method="post">
            <div class="row card">
                <div class="card-header">
                    <p><b>ENTER USER NAME TO SEARCH FOR USER DETAILS</b></p>
                </div>
                <div class="card-body">
                    User Name : <input type="text" id = "username" class="username" name =" username"> <br><br>&nbsp;
                </div>
                <div class="card-footer">
                     <input type="submit" class="btn btn-outline-primary submit" name="submit" value="Click here to search"><br><br>
                </div>
            </div>
            </form>
            <div class="inner">
                    <table border="0" cellpadding="5" cellspacing="0" class="table">
                        <thead class="bg-secondary">
                            <tr>
                                <th  width="1%">User Name</th>
                                <th  width="1%">Date</th>
                                <th  width="1%">Project Name</th>
                                <th  width="1%">Bugs </th>
                                <th  width="1%">Comments</th>
                               
                            </tr>
                        </thead>

            <?php 
              $con = DBconnect();
              if(isset($_POST['username'])){
                 $query_select = "SELECT * FROM work_details WHERE username = '".$_POST['username']."' ";
                 $query_execute = mysqli_query($con,$query_select) or die(mysqli_error($con));
                 if(mysqli_affected_rows($con)>0)
                 {
                    while($row = mysqli_fetch_array($query_execute)){
                        echo "<tr>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['project']."</td>";
                        echo "<td>".$row['bugs']."</td>";
                        echo "<td>".$row['comments']."</td>";
                        
                        echo "</tr>";
                    }
                 }
              }
   
              echo "</table>";
              mysqli_close($con); 
            ?>
        </div>
        
    </div>
</div>
</section>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom"> </nav>
</body>
</html>
