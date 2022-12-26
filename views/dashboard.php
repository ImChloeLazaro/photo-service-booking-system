<?php include_once '../includes/header.php' ?>
<?php include_once '../controller/User.php' ?>
<?php
$user->Action();
?>

<div class="container-fluid">
    <div class="row">

        <?php include_once '../includes/nav.php' ?>

        <?php

        if (!isset($_SESSION['user'])) :
            header('location: login.php');
        endif;

        ?>

        <style>
            @media only screen and (max-width: 800px) {

                #no-more-tables tbody,
                #no-more-tables tr,
                #no-more-tables td {
                    display: block;
                }

                #no-more-tables thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                #no-more-tables td {
                    position: relative;
                    padding-left: 50%;
                    border: none;
                }

                #no-more-tables td::before {
                    content: attr(data-title);
                    position: absolute;
                    left: 6px;
                    font-weight: 600;
                }

                #no-more-tables tr {
                    border-bottom: 2px solid white;
                }
            }
        </style>
        <div class="col-12 wrapper overflow-auto" style="height: 100vh; width: 100vw;">
            <div class="table-responsive mt-5" id="no-more-tables">
                <h4 class="mt-5 text-light">Customer Bookings</h4>
                <table class="table text-light">
                    <thead>
                        <tr>
                            <th class="col-md-1">User</th>
                            <th class="col-md-1">Address</th>
                            <th class="col-md-1">Phone</th>
                            <th class="col-md-1">Email</th>
                            <th class="col-md-1">Location</th>
                            <th class="col-md-1">Date</th>
                            <th class="col-md-1">Services</th>
                            <th class="col-md-1">Package</th>
                            <th class="col-md-1">Status</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = $_SESSION['user']['id'] ?>
                        <?php
                        foreach ($user->ShowAllBooking() as $booking) :
                        ?>
                            <tr>
                                <td data-title="Location"><?php echo $booking['firstname'] . ' ' . $booking['middlename'] . ' ' . $booking['lastname'] ?></td>
                                <td data-title="Location"><?php echo $booking['address'] ?></td>
                                <td data-title="Location"><?php echo $booking['phone'] ?></td>
                                <td data-title="Location"><?php echo $booking['email'] ?></td>
                                <td data-title="Location"><?php echo $booking['location'] ?></td>
                                <td data-title="Date"><?php echo $booking['date'] ?></td>
                                <td data-title="Services"><?php echo $booking['services'] ?></td>
                                <td data-title="Package"><?php echo $booking['package'] ?></td>
                                <td data-title="Status"><?php echo $booking['status'] ?></td>
                                <td data-title="Action" class="d-lg-flex">
                                    <form method="post" class="mx-1 d-flex">
                                        <input type="hidden" name="booking_id" value="<?php echo $booking['id']?>">
                                        <input type="submit" class="btn btn-success fw-bold text-light mt-1 mx-1" value="Settle" name="settle">
                                        <input type="submit" class="btn btn-danger fw-bold text-light mt-1" value="Decline" name="decline">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once '../includes/footer.php' ?>