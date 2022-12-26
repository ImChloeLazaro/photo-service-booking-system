<?php include_once '../includes/header.php' ?>
<?php include_once '../controller/User.php' ?>
<?php
$user->EditBooking();
$user->CancelBooking();
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
                <h4 class="mt-5 text-light">My Bookings</h4>
                <table class="table text-light">
                    <thead>
                        <tr>
                            <th class="col-md-2">Location</th>
                            <th class="col-md-2">Date</th>
                            <th class="col-md-2">Services</th>
                            <th class="col-md-2">Package</th>
                            <th class="col-md-2">Status</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = $_SESSION['user']['id'] ?>
                        <?php
                        foreach ($user->ShowBooking($id) as $booking) :
                        ?>
                            <tr>
                                <td data-title="Location"><?php echo $booking['location'] ?></td>
                                <td data-title="Date"><?php echo $booking['date'] ?></td>
                                <td data-title="Services"><?php echo $booking['services'] ?></td>
                                <td data-title="Package"><?php echo $booking['package'] ?></td>
                                <td data-title="Status"><?php echo $booking['status'] ?></td>
                                <td data-title="Action" class="d-lg-flex">
                                    <button class="btn btn-success fw-bold text-light mt-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $booking['id'] ?>">Re-Schedule</button>
                                    <form method="post" class="mx-1">
                                        <input type="hidden" name="booking_id" value="<?php echo $booking['id']?>">
                                        <button class="btn btn-danger fw-bold text-light mt-1" name="cancelbooking">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit<?php echo $booking['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content card-glass">
                                        <div class="d-flex justify-content-between p-2">
                                            <h5 class="text-light">Edit Booking</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" type="submit"></button>
                                        </div>
                                        <div class="p-1">
                                            <form method="post" class="m-2">
                                                <div class="form-group">
                                                    <label for="">Occasion's Location</label>
                                                    <input type="text" class="form-control" name="location"  required value="<?php echo $booking['location']?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Occasion's Date</label>
                                                    <input type="datetime-local" class="form-control" name="date" required value="<?php echo $booking['date']?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Service</label>
                                                    <select name="service" class="form-select text-light" style="background: transparent;" required>
                                                        <option class="bg-dark" value="">--Select Service--</option>
                                                        <option class="bg-dark" value="Wedding">Wedding</option>
                                                        <option class="bg-dark" value="Burial">Burial</option>
                                                        <option class="bg-dark" value="Birthdays">Birthdays</option>
                                                        <option class="bg-dark" value="Wood Lamination">Wood Lamination</option>
                                                        <option class="bg-dark" value="Plastic Lamination">Plastic Lamination</option>
                                                        <option class="bg-dark" value="Frame">Frame</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Service</label>
                                                    <select name="package" class="form-select text-light" style="background: transparent;" required>
                                                        <option class="bg-dark" value="">--Select Package--</option>
                                                        <option class="bg-dark" value="Service Charge">Service Charge</option>
                                                        <option class="bg-dark" value="Photo Service">Photo Service - 5,000</option>
                                                        <option class="bg-dark" value="Video Service">Video Service - 6,000</option>
                                                        <option class="bg-dark" value="Photo and Video Service">Photo and Video Service - 11,000</option>
                                                        <option class="bg-dark" value="Classic">Classic - 18,000</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="booking_id" value="<?php echo $booking['id'] ?>">
                                                <button class="btn btn-success mt-2 w-100 fw-bold" name="editbooking">Edit Booking</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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