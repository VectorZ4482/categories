<?php 

session_start();

if(!isset($_SESSION['auth'])){
    

    header("Location: login.php");
    $_SESSION['status'] = "LOGIN TO ACCES DASHBOARD";
    $_SESSION['status_code'] = "warning";

    exit();
}else{


    if($_SESSION['auth'] == "1"){



    }
    else{
        $_SESSION['status'] = "YOU ARE NOT AUTHERIZED AS ADMIN CONTACT SUPPORT!";
        $_SESSION['status_code'] = "warning";
        header("Location: userui.php");

   
    exit();
    }
}


?>