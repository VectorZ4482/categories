<?php 
include ('authentication.php');
include('config/dbcon.php');

if(isset($_POST['logout_btn'])){



   unset($_SESSION['auth']);
   unset($_SESSION['auth_user']);


   $_SESSION['status'] = "LOGGED OUT SUCCESSFULLY";
   $_SESSION['status_code'] = "success";
   header('Location: login.php');
exit();
}






if(isset($_POST['check_Emailbtn'])){
   $email = $_POST['email'];
   $checkemail = "SELECT email FROM user WHERE email = '$email' ";
   $checkemail_run = mysqli_query($conn , $checkemail);
   
   if(mysqli_num_rows($checkemail_run) > 0){
      echo "EMAIL ID ALREADY TAKEN";
   } else {
      echo "It's Available";
   }
   exit; // Make sure to exit after echoing the response.
}


// USER ADD

if(isset($_POST['addUser'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $password = $_POST['password'];
   $confirmpassword = $_POST['confirmpassword'];

   if($password == $confirmpassword){


      $checkemail = "SELECT email FROM user WHERE email = '$email' ";
      $checkemail_run = mysqli_query($conn , $checkemail);

      if(mysqli_num_rows($checkemail_run) > 0){
         $_SESSION['status'] = "EMAIL ALREADY EXISTS";
         $_SESSION['status_code'] = "warning";
         header("Location: register.php");

         exit;
      }else{

         $add_query = "INSERT INTO user (name, email, address, password) VALUES ('$name', '$email' , '$address', '$password')";

         $add_query_start = mysqli_query($conn , $add_query);
      
      
         if($add_query_start){
      
          $_SESSION['status'] = "USER ADDED SUCCESSFULLY";
          $_SESSION['status_code'] = "success";
          header("Location: register.php");
         }
      
         else{
      
          $_SESSION['status'] = "USER REGISTERATION FAILED";
          $_SESSION['status_code'] = "error";
          header("Location: register.php");
         };

      };

                           

   }else{
      $_SESSION['status'] = "PASSWROD DOES NOT MATCH";
      $_SESSION['status_code'] = "error";
      header("Location: register.php");


   }


  

}





// USER UPDATE

if(isset($_POST['editUser'])){

   $user_id = $_POST['user_id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $password = $_POST['password'];
   $role_as = $_POST['role_as'];


   $update_query = "UPDATE user SET name = '$name' , email = '$email', address = '$address', password = '$password' , role_as = '$role_as' WHERE id = '$user_id'";
   $update_query_start = mysqli_query($conn, $update_query);



   if($update_query_start){

      $_SESSION['status'] = "USER UPDATED SUCCESSFULLY";
      $_SESSION['status_code'] = "success";
      header("Location: register.php");
     }
   
     else{
   
      $_SESSION['status'] = "USER UPDATE FAILED";
       $_SESSION['status_code'] = "error";
      header("Location: register.php");
     };
}
include ('includes/script.php') ;


if(isset($_POST['delete_btn_set'])){

   $del_id = $_POST['delete_id'];
   $reg_query = "DELETE FROM user WHERE id = '$del_id'";
   $reg_query_run = mysqli_query($conn,$reg_query);
}





// ADD BUSES

if(isset($_POST['addBus'])){
   $bus_number = $_POST['bus_number'];
   $bus_capacity = $_POST['bus_capacity'];
  

   $add_bus = "INSERT INTO bus (bus_number, capacity) VALUES ('$bus_number', '$bus_capacity' )";

   $add_bus_start = mysqli_query($conn , $add_bus);


   if($add_bus_start){
      
      $_SESSION['status'] = "BUS ADDED SUCCESSFULLY";
      $_SESSION['status_code'] = "success";
      header("Location: bus.php");
     }
  
     else{
  
      $_SESSION['status'] = "BUS REGISTERATION FAILED";
      $_SESSION['status_code'] = "error";
      header("Location: bus.php");
     };

}



// BUS UPDATE

if(isset($_POST['editBus'])){

   $bus_id = $_POST['bus_id'];
   $bus_number = $_POST['bus_number'];
   $bus_capacity = $_POST['bus_capacity'];



   $bus_update_query = "UPDATE bus SET bus_number = '$bus_number' , capacity = '$bus_capacity' WHERE bus_id = '$bus_id'";

   $bus_update_query_start = mysqli_query($conn, $bus_update_query);



   if($bus_update_query_start){

      $_SESSION['status'] = "BUS UPDATED SUCCESSFULLY";
      $_SESSION['status_code'] = "success";
      header("Location: bus.php");
     }
   
     else{
   
      $_SESSION['status'] = "BUS UPDATE FAILED";
       $_SESSION['status_code'] = "error";
      header("Location: bus.php");
     };
}


// DELETE BUS

if(isset($_POST['delete_bus_btn_set'])) {
   $bus_id = $_POST['delete_bus_id'];
   $delete_query = "DELETE FROM bus WHERE bus_id = '$bus_id'";
   $delete_query_run = mysqli_query($conn, $delete_query);

   
}






if(isset($_POST['delete_bus_btn_set'])){


   $del_id = $_POST['delete_bus_id'];
   $del_query = "DELETE FROM bus WHERE bus_id = '$del_id'";
   $del_query_run = mysqli_query($conn, $del_query);
}







// ADD STATIONS

if(isset($_POST['addStation'])){
   $station_name = $_POST['station_name'];
   $duration = $_POST['duration'];

   $add_station = "INSERT INTO Stations (station_name, duration) VALUES ('$station_name', '$duration')";

   $add_station_start = mysqli_query($conn, $add_station);

   if($add_station_start){
      $_SESSION['status'] = "Station added successfully";
      $_SESSION['status_code'] = "success";
      header("Location: station.php"); 
   } else {
      $_SESSION['status'] = "Failed to add station";
      $_SESSION['status_code'] = "error";
      header("Location: station.php"); 
   }
}

// STATION UPDATE

if(isset($_POST['editStation'])){
   $station_id = $_POST['station_id'];
   $station_name = $_POST['station_name'];
   $duration = $_POST['duration'];

   $station_update_query = "UPDATE Stations SET station_name = '$station_name', duration = '$duration' WHERE station_id = '$station_id'";

   $station_update_query_start = mysqli_query($conn, $station_update_query);

   if($station_update_query_start){
      $_SESSION['status'] = "Station updated successfully";
      $_SESSION['status_code'] = "success";
      header("Location: station.php"); // Redirect to the page where stations are managed
   } else {
      $_SESSION['status'] = "Failed to update station";
      $_SESSION['status_code'] = "error";
      header("Location: station.php"); // Redirect to the page where stations are managed
   }
}



// STATION DELETE 

if(isset($_POST['delete_station_btn_set'])) {
   // Retrieve station ID to delete
   $station_id = $_POST['delete_station_id'];

   // Perform deletion operation using $station_id
   $delete_query = "DELETE FROM Stations WHERE station_id = '$station_id'";
   $delete_query_run = mysqli_query($conn, $delete_query);

 
}








?>