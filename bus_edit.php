<?php 

include ('authentication.php');
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include ('config/dbcon.php')
?>





<div class="content-wrapper">
  <div class="content-header">    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Users</li>
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
              <h3 class="card-title">Edit - Buses</h3>
              <a href="bus.php" class="btn btn-danger btn-sm float-right">Back</a>
            </div>




            <div class="card-body">






            <?php
            
            if(isset($_GET['bus_id'])){
$bus_id = $_GET['bus_id'];

$bus_get_query = "SELECT * FROM bus WHERE bus_id = '$bus_id' LIMIT 1";

$bus_get_query_result  = mysqli_query($conn , $bus_get_query) or die("Query UnSuccesfull");

if(mysqli_num_rows($bus_get_query_result) > 0){
    

while($row_bus = mysqli_fetch_assoc($bus_get_query_result)){?>
              <form action="code.php" method="POST">
                <div class="formgroup">
                  <label for="">Bus Number</label>
                  <input type="hidden" name="bus_id" class="form-control" placeholder="" value="<?php echo $row_bus ['bus_id']?>">
                  <input type="text" name="bus_number" class="form-control" placeholder="Enter Bus Number" value="<?php echo $row_bus ['bus_number']?>">
                </div>
                <div class="formgroup">
                  <label for="">Bus Capacity</label>
                  <input type="text" name="bus_capacity" class="form-control" placeholder="Enter Bus Capacity" value="<?php echo $row_bus ['capacity']?>">
                </div>
              
               
                <button type="submit" name="editBus" class="btn btn-primary float-right mt-4">Edit Bus</button>
              </form>


              <?php 
}
}
            }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>





<?php 


include ('includes/footer.php');
include ('includes/script.php');  
include ('includes/alert.php'); 


?>