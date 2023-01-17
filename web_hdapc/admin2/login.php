<?php
    include '../classes/adminlogin.php';
?>
<?php
    $class= new Adminlogin();
    if($_SERVER ['REQUEST_METHOD'] === 'POST'){
        $adUser = $_POST['adminUser'];
        $adPass=md5($_POST['adminPass']);

        $login_check= $class->lg_ad($adUser,$adPass);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>HDA Admin - Đăng nhập</title>
    
    <link rel="stylesheet" href="../font_awesome\css/all.min.css" >
   <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.min.css">
   <link rel='stylesheet' href='./style/login_stlyle.css'>
</head>
<body id="abc">
     <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN LOGIN
                    <div id="alert">
                        <?php
                            if(isset($login_check))
                            {
                                echo $login_check;
                            }
                        ?>
                    </div>
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" class="form-control"  name="adminUser">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control a1" name="adminPass">
                            </div>

                            <div class="col-lg-12 login-btm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>
</html>
   