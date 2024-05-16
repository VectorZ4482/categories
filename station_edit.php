<?php 

include ('authentication.php');
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include ('config/dbcon.php');
?>

<div class="content-wrapper">
  <div class="content-header">    
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Station</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Stations</li>
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
              <h3 class="card-title">Edit - Stations</h3>
              <a href="stations.php" class="btn btn-danger btn-sm float-right">Back</a>
            </div>

            <div class="card-body">
              <?php
              if(isset($_GET['station_id'])){
                $station_id = $_GET['station_id'];

                $station_get_query = "SELECT * FROM Stations WHERE station_id = '$station_id' LIMIT 1";

                $station_get_query_result = mysqli_query($conn, $station_get_query) or die("Query Unsuccessful");

                if(mysqli_num_rows($station_get_query_result) > 0){
                  while($row_station = mysqli_fetch_assoc($station_get_query_result)){
              ?>
                    <form action="code.php" method="POST">
                      <div class="form-group">
                        <label for="">Station Name</label>
                        <input type="hidden" name="station_id" class="form-control" value="<?php echo $row_station['station_id']?>">
                        <input type="text" name="station_name" class="form-control" placeholder="Enter Station Name" value="<?php echo $row_station['station_name']?>">
                      </div>
                      <div class="form-group">
                        <label for="">Duration</label>
                        <input type="text" name="duration" class="form-control" placeholder="Enter Duration" value="<?php echo $row_station['duration']?>">
                      </div>
                      <button type="submit" name="editStation" class="btn btn-primary float-right mt-4">Edit Station</button>
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
