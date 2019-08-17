<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="indexAdmin.php" class="brand-link">
        <img src="./../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
<?php 
            if(isset($_SESSION['level']))
            {
              if($_SESSION['level'] == 1)
              {
                ?>
                <div class="image">
                  <img src="./../assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block">Chào Tuyết</a>
                </div>
              <?php
              }
              else
              {
?>
              <div class="image">
                <img src="./../assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">Chào quản trị viên</a>
              </div>
<?php
              }
            }

?>
          
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  Danh sách
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
              <!-- router -->
<?php if(isset($_GET['page'])) { $page = $_GET['page']; }?>

                <li class="nav-item">
                  <a href="indexAdmin.php" 
                    class="nav-link 
                    <?php if(!isset($_GET['page']) || $page=='them_san_pham' || $page=='upload' ) { echo 'active'; } ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Sản phẩm(DONE)</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a 
                    href="indexAdmin.php?page=loai_sp" 
                    class="nav-link 
                    <?php if($page=='loai_sp' || $page=='them_loai' ) { echo 'active'; } ?> ">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Loại sản phẩm(DONE)</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="indexAdmin.php?page=list_npp" class="nav-link <?php if($page=='list_npp'|| $page=='them_npp') { echo 'active'; } ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Nhà phân phối(DONE)</p>
                  </a>
                </li>
<?php 
            if(isset($_SESSION['level']))
            {
              if($_SESSION['level'] == 1)
              {
?>
                <li class="nav-item">
                  <a href="indexAdmin.php?page=list_km" class="nav-link <?php if($page=='list_km' || $page=='them_km' ) { echo 'active'; } ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Khuyến mãi(DONE)</p>
                  </a>
                </li>
<?php
              }
            }
?>
                
<?php 
            if(isset($_SESSION['level']))
            {
              if($_SESSION['level'] == 1)
              {
?>
                <li class="nav-item">
                  <a href="indexAdmin.php?page=list_ct_km" class="nav-link <?php if($page=='list_ct_km' || $page=='them_ct_km') { echo 'active'; } ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Chương trình KM(D)</p>
                  </a>
                </li>
<?php
              }
            }
?>
                

                <li class="nav-item">
                  <a href="indexAdmin.php?page=list_tin_tuc" class="nav-link <?php if($page=='list_tin_tuc' || $page=='them_tin_tuc' ) { echo 'active'; } ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Quản lý tin tức(DONE)</p>
                  </a>
                </li>

                <!-- Quản lý khách hàng -->

<?php 
            if(isset($_SESSION['level']))
            {
              if($_SESSION['level'] == 1)
              {
?>
                <li class="nav-item">
                  <a href="indexAdmin.php?page=list_kh" class="nav-link <?php if ($page == 'list_kh' || $page == 'them_kh') { echo 'active'; } ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Quản lý khách hàng (D)</p>
                  </a>
                </li>
<?php
              }
            }
?>
                

                <!-- YOUTUBE -->
                <li class="nav-item">
                  <a href="indexAdmin.php?page=list_youtube" class="nav-link <?php if ($page == 'list_youtube' || $page == 'them_youtube') { echo 'active';} ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>LINK YOUTUBE (D)</p>
                  </a>
                </li>

              </ul>
            </li>
          </ul>
        </nav><!-- /.sidebar-menu -->
        
      </div>
      <!-- /.sidebar -->
    </aside>