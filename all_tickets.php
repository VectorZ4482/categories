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
                    <h1 class="m-0">Tickets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Tickets</li>
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
                            <h3 class="card-title">Tickets</h3>
                            <a href="add_tickets.php" class="btn btn-primary btn-sm float-right" >Book Ticket</a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>TICKET ID</th>
                                        <th>Passenger Name</th>
                                        <th>Passenger Phone</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Bus Number</th>
                                        <th>Ticket Status</th>
                                        <th>Created At</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php  
                                $sql = "SELECT tickets.ticket_id, passenger.name, passenger.phone, tickets.ticket_from, tickets.ticket_to, tickets.bus_number, tickets.ticket_status, tickets.created_at FROM tickets JOIN passenger ON tickets.passenger_name = passenger.name;";
                                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful");

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td><?php echo $row['ticket_id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['ticket_from']; ?></td>
                                        <td><?php echo $row['ticket_to']; ?></td>
                                        <td><?php echo $row['bus_number']; ?></td>
                                        <td><?php echo $row['ticket_status']; ?></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td>
                                            <!-- Add action links here if needed -->
                                        </td>
                                    </tr>
                                <?php 
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
