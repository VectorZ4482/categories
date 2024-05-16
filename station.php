<?php
include ('authentication.php');
include ('includes/header.php');
include ('includes/topbar.php');
include ('includes/sidebar.php');
include ('config/dbcon.php');
include ('includes/alert.php'); 

?>

<div class="content-wrapper">
    

<!-- Modal -->
<div class="modal fade" id="AddStation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Station</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="post"> <!-- Update the action with appropriate script -->
                    <div class="form-group">
                        <label for="">Station Name</label>
                        <input type="text" name="station_name" class="form-control" placeholder="Enter Station Name">
                    </div>
                    <div class="form-group">
                        <label for="">Duration</label>
                        <input type="text" name="duration" class="form-control" placeholder="Enter Duration">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addStation" class="btn btn-primary">Add Station</button>
                </form>
            </div>
        </div>
    </div>
</div>





    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registered Stations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered Stations</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Stations</h3>
                <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#AddStation">Add Station</a>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>STATION ID</th>
                      <th>STATION NAME</th>
                      <th>DURATION</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $stations_query = "SELECT * FROM Stations";
                    $stations_result = mysqli_query($conn, $stations_query);
                    if (mysqli_num_rows($stations_result) > 0) {
                      while ($row_station = mysqli_fetch_assoc($stations_result)) {
                        echo "<tr>";
                        echo "<td>" . $row_station['station_id'] . "</td>";
                        echo "<td>" . $row_station['station_name'] . "</td>";
                        echo "<td>" . $row_station['duration'] . "</td>";
                        ?>

<td><a href="station_edit.php?station_id=<?php echo $row_station['station_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
<input type="hidden" class="delete_station_id_value" value="<?php echo $row_station['station_id'] ?>">
                    <a href="javascript:void(0)" class="delete_station_btn btn btn-danger btn-sm">Delete</a></td>
                      
                       
                       
                     

                        <?php
                           echo "</tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include ('includes/footer.php'); ?>
<?php include ('includes/script.php'); ?>





<script>
  $(document).ready(function () {
    $('.delete_station_btn').click(function (e) {
      e.preventDefault();

      var deleteid = $(this).closest("tr").find('.delete_station_id_value').val();

      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              "delete_station_btn_set": 1,
              "delete_station_id": deleteid
            },
            success: function (response) {  
              swal("DATA DELETED SUCCESSFULLY", {
                icon: "success",
              }).then((result) => {
                location.reload();
              });
            }
          });
        }
      });
    });
  });
</script>


