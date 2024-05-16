<?php
include ('authentication.php');
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include ('config/dbcon.php');
include ('includes/alert.php'); 

?>

<div class="content-wrapper">
  <div class="content-header">    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Make Tickets</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Make Tickets</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Make - Tickets</h3>
              <a href="all_tickets.php" class="btn btn-danger btn-sm float-right">All Tickets</a>
            </div>
            <div class="card-body">
              <form action="ticket_code.php" method="POST">
                <div class="formgroup">
                  <label for="">Passenger Name</label>
                  <input type="hidden" name="id" class="form-control" placeholder="Enter Name" value="">
                  <input type="text" name="name" class="form-control" placeholder="Enter Name" value="">
                </div>
                <div class="formgroup mt-3">
                  <label for="">Passenger Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter Email" value="">
                </div>
                <div class="formgroup mt-3">
                  <label for="">Passenger Phone</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="">
                </div>
                <div class="formgroup mt-3">
                  <label for="">FROM</label>
                  <select name="from" class="form-control" required>
                    <option value="">Select</option>

                    <?php
            
           

            $station1 = "SELECT * FROM stations";

            $result_stations1 = mysqli_query($conn ,$station1) or die ("Query Un Succesfull");

 while($row2 = mysqli_fetch_assoc($result_stations1)){
             ?>
              <option value="<?php echo $row2 ['station_name']; ?>"><?php echo $row2 ['station_name']; ?></option>


                <?php
                               
                
        }
     ?>
           
                    <option value="0">User</option>
                   
                  </select>
                </div>
                <div class="formgroup mt-3">
                  <label for="">TO</label>
                  <select name="to" class="form-control" required>
                    <option value="">Select</option>

                    <?php
            
           

            $station = "SELECT * FROM stations";

            $result_stations = mysqli_query($conn ,$station) or die ("Query Un Succesfull");

 while($row1 = mysqli_fetch_assoc($result_stations)){
             ?>
              <option value="<?php echo $row1 ['station_name']; ?>"><?php echo $row1 ['station_name']; ?></option>


                <?php
                               
                
        }
     ?>
                    
                    
                  </select>
                </div>
                <div class="formgroup mt-3">
                  <label for="">Bus Number</label>
                  <select name="bus_number" class="form-control" required>
                    <option value="">Select</option>

                    
             <?php
            
           

            $sql = "SELECT * FROM bus";

            $result = mysqli_query($conn ,$sql) or die ("Query Un Succesfull");

 while($row = mysqli_fetch_assoc($result)){
             ?>
                <option value="<?php echo $row ['bus_number']; ?>"><?php echo $row ['bus_number']; ?></option>


                <?php
                               
                
        }
     ?>
                    
                    
                  </select>
                </div>
                <button type="submit" name="addTicket" class="btn btn-primary float-right mt-4">Make Ticket</button>
              </form>
            </div>   
          </div>
        </div>
      </div>
    </div>
  </section>
</div>







<?php include ('includes/footer.php'); ?>
<?php include ('includes/script.php'); ?>