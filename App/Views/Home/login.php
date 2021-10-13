<?php
if (!isset($_SESSION)) {
    ob_start();
    session_start();
}
   
    include dirname(__DIR__) . '..\Layout\header.php';
?>



<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Login</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- xs sm(576) md(768) lg(991) -->
<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php
                    if(isset($message)){
                        echo '<label class="text-danger">
                            '.$message.'
                        </label>';
                    }
                ?>
                <form class="login-form" action="check-login.php" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: center; font-size: 30px; font-weight: 700; color: red;">ĐĂNG NHẬP</p>
                        </div>
                        <div class="col-md-12">
                            <label>Username</label>
                            <input class="form-control" type="text" placeholder="username">
                        </div>
                        <div class="col-md-12">
                            <label>Password</label>
                            <input class="form-control" type="text" placeholder="passwordHash">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

<?php
include dirname(__DIR__) . '..\Layout\footer.php';
?>