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
<div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="code.php" method="post">

            <div class="formgroup">
              <label for="">Bus Number</label>
              <input type="text" name="bus_number" class="form-control" placeholder="Enter Bus Number">
            </div>
            <div class="formgroup">
              <label for="" >Bus Capacity</label>
             <b> <span class = "email_error text-primary  ml-2 mt-1"></span></b>
              <input type="text" name="bus_capacity" class="form-control email_id" placeholder="Enter Bus Capacity">
            </div>
           
            
            


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addBus" class="btn btn-primary">Add Bus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Total Buses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buses</li>
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
                <h3 class="card-title">Registered Users</h3>
                <a href="" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#AddUser">Add
                  Bus</a>
              </div>
              <div class="card-body">
                <?php
                
                $bus = "SELECT * FROM bus";

                $bus_result = mysqli_query($conn, $bus);

                if(mysqli_num_rows($bus_result) > 0){
                
                ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>BUS ID</th>
                      <th>BUS NUMBER</th>
                      <th>BUS CAPACITY</th>  
                      <th>ACTIONS</th>                  
                    </tr>


                  </thead>
                        <?php 
                        
                        while ($row_bus = mysqli_fetch_assoc($bus_result)){
                        
                        
                        
                        ?>
                  <tr>
                    <td><?php echo $row_bus['bus_id'];?></td>
                    <td><?php echo $row_bus['bus_number'];?></td>
                    <td><?php echo $row_bus['capacity'];?></td>
                    <td><a href="bus_edit.php?bus_id=<?php echo $row_bus['bus_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <input type="hidden" class="delete_bus_id_value" value="<?php echo $row_bus['bus_id'] ?>">
                    <a href="javascript:void(0)" class="delete_bus_btn btn btn-danger btn-sm">Delete</a>
                    
                  </tr>

                  <?php }
                  
                }?>
                  <tbody>
                    <!-- Table rows would be generated dynamically here -->
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
    $('.delete_bus_btn').click(function (e) {
      e.preventDefault();

      var deleteid = $(this).closest("tr").find('.delete_bus_id_value').val();

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
              "delete_bus_btn_set": 1, // Change the parameter name accordingly in code.php
              "delete_bus_id": deleteid // Change the parameter name accordingly in code.php
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





