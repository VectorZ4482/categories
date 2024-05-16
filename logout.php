<?php 
session_start();

if(isset($_POST['logout'])){



    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    header('Location: login.php');
    $_SESSION['status'] = "LOGGED OUT SUCCESSFULLY";
    $_SESSION['status_code'] = "success";
 
  
    
 exit();
 }
?>