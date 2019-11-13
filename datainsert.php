<?php
    session_start();
    include('Dbconnect.php');
    $con = Dbconnect();
    if(!mysqli_error(($con))){
        $date = $_POST['date'];
        $projectName = $_POST['projectName'];
        $bugs = $_POST['bugs'];
        $fixes = $_POST['fixes'];
        $comments = $_POST['comments'];
        $message = array();
        $flag = 0;

        for($x=0;$x<count($date);$x++){

            $sql_insert = "  INSERT INTO `work_details` (`userid`, `username`, `project`, `bugs`, `fixes`, `comments`, `date`) VALUES ( '".$_SESSION['userid']."', '".$_SESSION['username']."', '".$projectName[$x]."', '".$bugs[$x]."', '".$fixes[$x]."', '".$comments[$x]."', '".$date[$x]."')";
            
            $result = mysqli_query($con,$sql_insert) or die(mysqli_error($con));

            if(mysqli_affected_rows($con)){
                // $message['success'] = true;
                // $message['message'] = 'inserted';
                // echo json_encode($message);
                $flag++;
            }
            else
            {
                // $message['success'] = false;
                // $message['message'] = 'problem in insert';
                // echo json_encode($message);
                $flag=0;
            }
     
        }
        if($flag){
            $message['success'] = true;
                $message['message'] = 'inserted';
                echo json_encode($message);
        }
       
    }
?>