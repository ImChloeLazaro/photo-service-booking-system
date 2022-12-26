<?php include_once '../includes/header.php'?>
<?php include_once '../controller/User.php'?>
<?php include_once '../controller/Session.php'?>
<?php $session = new Session();?>
<div class="container-fluid wrapper">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card-glass" style="width: 25rem; height: auto">
            <h3 href="login.php" class="text-light m-3 text-center"><a href="login.php" class="text-light">JL Photography</a></h3>
            <p class="text-center text-light">To Experience our services, please register account.</p>
            <?php $user->Register();?>
                <form method="post">
                    <div class="form-group mx-3 my-3">
                        <label class="mt-1" for="firstname">Firstname</label>
                        <input type="text" name="firstname" class="form-control" required>
                        
                        <label class="mt-1" for="middlename">Middlename</label>
                        <input type="text" name="middlename" class="form-control">

                        <label class="mt-1" for="lastname">Lastname</label>
                        <input type="text" name="lastname" class="form-control" required>

                        <label class="mt-1" for="address">Address</label>
                        <input type="text" name="address" class="form-control" required>

                        <label class="mt-1" for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" required>

                        <label class="mt-1" for="email">Email</label>
                        <input type="text" name="email" class="form-control" required>
                        
                        <label class="mt-1" for="password">Password</label>
                        <input type="text" name="password" class="form-control" required>

                        <button class="btn btn-success text-light fw-bold mt-4 w-100" type="submit" name="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'?>