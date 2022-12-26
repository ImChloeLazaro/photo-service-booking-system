<?php include_once '../includes/header.php'?>
<?php include_once '../controller/User.php'?>
<div class="container-fluid wrapper">
    <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card-glass" style="width: 23rem; height: 26rem">
            <h3 class="text-light m-3 text-center">Welcome</h3>
            <p class="text-center text-light">To Browse our services, please login to your account.</p>
            <?php $user->Login()?>
                <form method="post">
                    <div class="form-group mx-3">
                        <label class="mt-1" for="username">Email</label>
                        <input type="text" name="email" class="form-control">
                        
                        <label class="mt-1" for="password">Password</label>
                        <input type="text" name="password" class="form-control">
                        
                        <button class="btn btn-glass text-light fw-bold mt-4" type="submit" name="login">Login</button>
                    </div>
                </form>
                <a href="register.php" class="text-light mx-3 mt-4">You don't have account yet? Register</a>
            </div>
        </div>
    </div>
</div>
<?php include_once '../includes/footer.php'?>