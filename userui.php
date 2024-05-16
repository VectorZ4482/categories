<?php
session_start();
include ('includes/alert.php'); 


?>

<h2>
  Home Page for User
</h2>
<form action="logout.php" method="POST">
    <button type="submit" name="logout" class="dropdown-item">Log Out</button>    
</form>



<?php


?>
