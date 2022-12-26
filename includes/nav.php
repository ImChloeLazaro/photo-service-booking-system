<?php include_once '../controller/Session.php' ?>
<header class="navbar navbar-expand-lg navbar-light" style="z-index: 1;">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            <span class="px-3 text-light fw-bold">JL Photography</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100 d-lg-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="home.php#Gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="" data-bs-toggle="modal" data-bs-target="#package">Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="home.php#Services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="https://web.facebook.com/jenesay.alipante" target="_blank">Contact Us</a>
                </li>
                <li class="nav-item">
                    <?php 
                    if($_SESSION['user']['type'] === "user"):
                        ?>
                            <a class="nav-link text-light" href="mybooking.php" >Bookings</a>
                        <?php
                    else:
                        ?>
                            <a class="nav-link text-light" href="dashboard.php" >Bookings</a>
                        <?php
                    endif;
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Logout <span class="fw-bold"><?php echo $_SESSION['user']['nickname'] ?></span></a>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="modal fade" id="package" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content card-glass text-light">
            <div class="d-flex justify-content-between m-2">
                <h5>Packages</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="m-2">
                <div class="d-flex justify-content-between fw-bold">
                    <p>Photo Service</p>
                    <p>5,000</p>
                </div>
                <div>
                    <p class="p-0">Printed Photo (200 Pcs)</p>
                    <p class="p-0">Ordinary Album</p>
                    <p class="p-0">8x10 Frame</p>
                </div>
            </div>

            <div class="m-2">
                <div class="d-flex justify-content-between fw-bold">
                    <p>Video Service</p>
                    <p>6,000</p>
                </div>
                <p class="p-0">Edited Full Video on CD/DVD</p>
            </div>

            <div class="m-2">
                <div class="d-flex justify-content-between fw-bold">
                    <div>
                        <p>Photo & Video Service</p>
                    </div>
                    <p>11,000</p>
                </div>
                <div>
                    <p class="p-0">Printed Photo (200 Pcs)</p>
                    <p class="p-0">Ordinary Album</p>
                    <p class="p-0">Limited Shoot of Photo</p>
                    <p class="p-0">10x12 Frame</p>
                    <p class="p-0">Prenup Shoot</p>
                    <p class="p-0">All Images Save On CD/USB</p>
                    <p class="p-0">Edited Full Video On DVD</p>
                </div>
            </div>

            <div class="m-2">
                <div class="d-flex justify-content-between fw-bold">
                    <div>
                        <p>Classic</p>
                    </div>
                    <p>18,000</p>
                </div>
                <div>
                    <p class="p-0">Size 8x10 Digital Album with Leather Case 10 Sheets (20pcs 8x10 Photo Lay-Out)</p>
                    <p class="p-0">Limited Shoot of Photo</p>
                    <p class="p-0">11x14 Frame</p>
                    <p class="p-0">11x14 Signature Frame</p>
                    <p class="p-0">Prenup Shoot</p>
                    <p class="p-0">All Images Save On CD/USB</p>
                    <p class="p-0">Edited Full Video On DVD</p>
                </div>
            </div>
        </div>
    </div>
</div>