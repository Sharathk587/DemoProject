<?php
    include('Dbconnect.php');
    session_start();
    $con=Dbconnect();

    $userid = $_SESSION['userid'];
    $logouttime = date('H:i:s');


    $select_query = " SELECT * FROM userdata ORDER BY id DESC LIMIT 1 ";
    $query_execute = mysqli_query($con,$select_query);
      $row = mysqli_fetch_array($query_execute);
      $u = $row['id'];
      
     $query_update = " UPDATE userdata 
                      SET logouttime = '$logouttime'
                      WHERE userid= '$userid' AND id = '$u' ";
    
    $query_execute = mysqli_query($con,$query_update);
    
    
    if(mysqli_affected_rows($con)){
?>
      <script>window.location.href='login.php'</script>
<?php
        session_destroy();
    }
?>