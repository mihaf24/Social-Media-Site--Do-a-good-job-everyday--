<?php 
    include 'includes/db.php';
    session_start();
    //echo $a;
    
    echo $a= $_GET['user_id'];
    echo $b= $_SESSION['user_id'];  


    $noti_query= "INSERT INTO `notification`(`noti_id`, `recipient_id`, `sender_id`) VALUES ('','$a','$b')"; 

    $run_noti_query= mysqli_query($connection,$noti_query);

    
?>