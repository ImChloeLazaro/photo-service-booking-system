<?php

if (isset($_SESSION['user']['id'])) :
    header('location: login.php');
endif;

?>
<?php include_once '../includes/header.php' ?>
<?php include_once '../controller/User.php'?>
<?php 
    $user->SetBooking();
?>

<div class="container-fluid">
    <div class="row">

        <?php include_once '../includes/nav.php' ?>

        <div class="col-12 wrapper w-100 d-flex flex-column justify-content-center align-items-center">
            <h1 class="text-light fw-bold">ARE YOU LOOKING FOR THE BEST SHOOT AT FAIR PRICE?</h1>
            <button class="btn btn-glass w-25 mt-2 text-light" data-bs-toggle="modal" data-bs-target="#booknow">Book Now</button>
        </div>
        <div class="col-12 mb-3" id="Gallery">
            <h4 class="text-center mt-2">Our Gallery</h4>
            <p class="text-secondary text-center">We offer the best photo shoot in any occasion.</p>
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-evenly">
                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/wedding.JPG" class="img-fluid h-100" alt="...">
                    <h6 class="text-center fw-bold">Wedding</h6>
                </div>
                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/prenup.jpg" class="img-fluid h-100" alt="...">
                    <h6 class="text-center fw-bold">Prenup</h6>
                </div>
                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/debut.jpg" class="img-fluid h-100" alt="...">
                    <h6 class="text-center fw-bold">Debut</h6>
                </div>
                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/trees.jpg" class="img-fluid h-100" alt="...">
                    <h6 class="text-center fw-bold">Trees</h6>
                </div>
                <div class="col-12 col-md-12 col-lg-2 my-2 my-lg-0 card" style="height: 20rem;">
                    <img src="../public/image/flowers.jpg" class="img-fluid h-100" alt="...">
                    <h6 class="text-center fw-bold">Flowers</h6>
                </div>
            </div>
        </div>
        <div class="col-12 bg-light" id="Services">
            <h4 class="text-center mt-3">Our Services</h4>
            <p class="text-secondary text-center">We offer the best photo shoot in any occasion.</p>

            <div class="d-lg-flex">
                <div class="text-center card p-2 col-12 col-md-2 border-0 bg-light">
                    <i class="fa-solid fa-heart mt-2" style="font-size: 3rem; color: var(--header)"></i>
                    <p class="text-secondary fw-bold mt-1">Wedding</p>
                    <small class="text-muted fst-italic p-0">Perfect for dream wedding.</small>
                </div>
                <div class="text-center card p-2 col-12 col-lg-2 border-0 bg-light">
                    <i class="fa-solid fa-cross mt-2" style="font-size: 3rem; color: var(--header)"></i>
                    <p class="text-secondary fw-bold mt-1">Burial</p>
                    <small class="text-muted fst-italic p-0">We will make the last moment perfect.</small>
                </div>
                <div class="text-center card p-2 col-12 col-lg-2 border-0 bg-light">
                    <i class="fa-solid fa-cake-candles mt-2" style="font-size: 3rem; color: var(--header)"></i>
                    <p class="text-secondary fw-bold mt-1">Birthdays</p>
                    <small class="text-muted fst-italic p-0">We will make your special day happy.</small>
                </div>
                <div class="text-center card p-2 col-12 col-lg-2 border-0 bg-light">
                    <i class="fa-solid fa-layer-group mt-2" style="font-size: 3rem; color: var(--header)"></i>
                    <p class="text-secondary fw-bold mt-1">Wood Lamination</p>
                    <small class="text-muted fst-italic p-0">We have Wood Lamination Available.</small>
                </div>
                <div class="text-center card p-2 col-12 col-lg-2 border-0 bg-light">
                    <i class="fa-solid fa-sheet-plastic mt-2" style="font-size: 3rem; color: var(--header)"></i>
                    <p class="text-secondary fw-bold mt-1">Plastic Lamination</p>
                    <small class="text-muted fst-italic p-0">We have Plastic Lamination Available.</small>
                </div>
                <div class="text-center card p-2 col-12 col-lg-2 border-0 bg-light">
                    <i class="fa-sharp fa-solid fa-image mt-2" style="font-size: 3rem; color: var(--header)"></i>
                    <p class="text-secondary fw-bold mt-1">Frame</p>
                    <small class="text-muted fst-italic p-0">All types of Frame are available.</small>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- modals -->
<div class="modal fade" id="booknow" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content card-glass">
            <div class="d-flex justify-content-between m-2">
                <h5 class="text-light m-2">Booking</h5>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" class="m-2">
                <div class="form-group">
                    <label for="">Occasion's Location</label>
                    <input type="text" class="form-control" name="location">
                </div>

                <div class="form-group">
                    <label for="">Occasion's Date</label>
                    <input type="datetime-local" class="form-control" name="date">
                </div>

                <div class="form-group">
                    <label for="">Service</label>
                    <select name="service" class="form-select text-light" style="background: transparent;">
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
                    <label for="">Package</label>
                    <select name="package" class="form-select text-light" style="background: transparent;">
                        <option class="bg-dark" value="">--Select Package--</option>
                        <option class="bg-dark" value="Service Charge">Service Charge</option>
                        <option class="bg-dark" value="Photo Service">Photo Service - 5,000</option>
                        <option class="bg-dark" value="Video Service">Video Service - 6,000</option>
                        <option class="bg-dark" value="Photo and Video Service">Photo and Video Service - 11,000</option>
                        <option class="bg-dark" value="Classic">Classic - 18,000</option>
                    </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
                <button class="btn btn-success mt-2 w-100 fw-bold" name="booking">Book Now!</button>
            </form>
        </div>
    </div>
</div>


<?php include_once '../includes/footer.php' ?>