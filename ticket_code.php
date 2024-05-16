<?php 

include ('authentication.php');
include('config/dbcon.php');


if(isset($_POST['addTicket'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $bus_number = $_POST['bus_number'];
   
 
    $add_ticket_passenger = "INSERT INTO passenger (name, email, phone) VALUES ('$name', '$email', '$phone')";
    

 
    $add_ticket_passenger_start = mysqli_query($conn , $add_ticket_passenger);

    $add_ticket = "INSERT INTO tickets (ticket_from, ticket_to, passenger_name, bus_number) VALUES ('$from', '$to', '$name', '$bus_number')";


    $add_ticket_start = mysqli_query($conn , $add_ticket);
 
 
    if($add_ticket_passenger_start && $add_ticket_start){
       
       $_SESSION['status'] = "TICKET BOOKED SUCCESSFULLY";
       $_SESSION['status_code'] = "success";
       header("Location: all_tickets.php");
      }
   
      else{
   
       $_SESSION['status'] = "TICKET BOOKING FAILED";
       $_SESSION['status_code'] = "error";
       header("Location: all_tickets.php");
      };
 
 }
?>