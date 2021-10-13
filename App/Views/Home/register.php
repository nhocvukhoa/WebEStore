<?php 
    include dirname (__DIR__ ) . '..\Layout\header.php';  
?>

   <!-- Breadcrumb Start -->
   <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Register</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <!-- xs sm(576) md(768) lg(991) -->
        <!-- Login Start -->
        <div class="login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10">    
                        <form class="register-form" action="/BanHang/public/check-register.php" method="POST">
                            <div class="row">
                            <?= $error?>
                                <div class="col-md-12">
                                    <p style="text-align: center; font-size: 30px; font-weight: 700; color: red;">ĐĂNG KÍ</p>
                                </div>
                                <div class="col-md-6">
                                    <label>Username</label>
                                    <input class="form-control" name="username" type="text" placeholder="Username...">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="text" placeholder="Password...">
                                </div>
                                <div class="col-md-6">
                                    <label>Confirm password</label>
                                    <input class="form-control" name="confirm" type="text" placeholder="Password...">
                                </div>
                                <div class="col-md-6">
                                    <label>Firstname</label>
                                    <input class="form-control" name="firstname" type="text" placeholder="Firstname...">
                                </div>
                                <div class="col-md-6">
                                    <label>Lastname</label>
                                    <input class="form-control" name="lastname" type="text" placeholder="Lastname...">
                                </div>
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <input class="form-control" name="address" type="text" placeholder="Address...">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobie</label>
                                    <input class="form-control" name="mobie" type="text" placeholder="Mobie...">
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="text" placeholder="Email...">
                                </div>
                                <div class="col-md-12">
                                    <a href="/BanHang/public/check-register.php" name="register" class="btn btn-success">Register now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
    
<?php 
    include dirname (__DIR__ ) . '..\Layout\footer.php'; 
?>