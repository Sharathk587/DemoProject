<?php
    date_default_timezone_set('Asia/Kolkata');

    function Dbconnect(){
       return mysqli_connect('localhost','root','','training','3307');   
    }   
    
?>

