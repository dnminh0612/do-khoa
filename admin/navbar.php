<?php
  if (isset($_POST['logOut'])) {
    logout();
  }
  function logout() {
    $_SESSION['isLoged'] = false;
    $_SESSION['userSession'] = "";
    $_SESSION['level'] = '';
    header('location:../index.php');
    exit;
  }
?>
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.php" class="nav-link">Trang chủ website</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="indexAdmin.php?page=list_account" class="nav-link">Quản trị tài khoản</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="indexAdmin.php" class="nav-link"><i class="fas fa-undo"></i> Trở lại</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="indexAdmin.php?page=doi_mk">
            <button class="btn btn-warning btn-sm">Đổi mật khẩu</button>
          </a>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <form action="" method="post">
            <a class="nav-link">
              <button type="submit" name="logOut" class="btn btn-sm">Đăng xuất</button>
            </a>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->