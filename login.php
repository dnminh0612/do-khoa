<?php
    session_start();
    include("select.php");  
    $user = $password = "";
    $_SESSION['helloTitle']=1;
    if(isset($_SESSION['isLoged']))
    {
        if($_SESSION['isLoged']){
            header("location:admin/indexAdmin.php");
            exit;
        }
    }
    if (isset($_POST["submit"])) {
        if ($_POST['user'] != "" && $_POST['password'] != "") 
        {
            try 
            {    
                $user = $_POST['user'];
                $password = md5($_POST['password']);
                // $password = $_POST['password'];
                $query = query_select("select * from qttk where qttk.TenTK='$user' and qttk.Matkhau='$password'");
                $count = $query->rowCount();
                if($count==0){
                    echo '<script type="text/javascript">';

                    echo "setTimeout(function () { Swal.fire({
                        type: 'error',
                        title: 'Tên tài khoản hoặc mật khẩu sai !',
                        showConfirmButton: false,
                        timer: 1500
                      });";
            
                    echo '}, 500);</script>';
                }
                else
                {
                    foreach($query as $row){
                        $session_id = $row['Quyen'];
                        if( $session_id == 1 || $session_id == 2){
                            $_SESSION['userSession'] = $_POST['user'];
                            $_SESSION['level'] = $row['Quyen'];
                            $_SESSION['ten_taikhoan'] = $row['TenTK'];
                            header("location:admin/indexAdmin.php");
                            die();
                        }
                    }
                    
                }
            } 
            catch (Throwable $th) { }
        } 
        else 
        {
            echo '<script type="text/javascript">';
    
            echo "
            setTimeout(function () { 
                Swal.fire({
                    type: 'error',
                    title: 'Nhập đầy đủ các trường !',
                    showConfirmButton: false,
                    timer: 1500
                });";
            echo '}, 0);</script>';
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <span class="fa fa-envelope form-control-feedback"></span>
                        <input type="text" class="form-control" name="user" placeholder="Nhập tài khoản" required>
                    </div>
                    <div class="form-group has-feedback">
                        <span class="fa fa-lock form-control-feedback"></span>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"
                            required>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign
                                In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.php" class="text-center">Đăng ký thành viên</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="./assets/js/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        })
    })
    </script>
</body>

</html>