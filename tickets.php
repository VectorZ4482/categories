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
            <h1 class="m-0">Registered User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Registered User</li>
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
                  User</a>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>PASSWORD</th>
                      <th>ADDRESS</th>
                      <th>ROLES</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
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