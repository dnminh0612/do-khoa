<!-- header -->
<?php include("header.php"); ?>

<!-- Navbar -->
<?php include("navbar.php"); ?>

<!-- side Bar -->
<?php include("sideBar.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Quản trị viên</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="indexAdmin.php"><i class="fas fa-home"></i> Home Admin</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!-- /.content-header -->
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- set page show -->
<?php 
                include("../select.php");
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                    if($page == 'detail-product')
                    {
                        include("./Detail/detail-product.php");
                    }
                    // ACCOUNT
                    else if($page=='list_account')
                    {
                        include("./Select/list-account.php");
                    }
                    else if($page=='them_account')
                    {
                        include("./Add/add-account.php");
                    }
                    else if($page=='xoa_account')
                    {
                        include("./Delete/delete-account.php");
                    }
                    // NPP
                    else if($page=='list_npp')
                    {
                        include("./Select/list-distribution.php");
                    }
                    else if($page=='them_npp')
                    {
                        include("./Add/add-distribution.php");
                    }
                    else if($page=='sua_npp')
                    {
                        include("./Update/update-distribution.php");
                    }
                    else if($page=='xoa_npp')
                    {
                        include("./Delete/delete-distribution.php");
                    }
                    // PRODUCT
                    else if($page=='them_san_pham')
                    {
                        include("./Add/add-product.php");
                    }
                    else if($page == 'upload')
                    {
                        include("./Upload/upload.php");
                    }
                    // CATEGORY
                    else if($page=='loai_sp')
                    {
                        include("./Select/list-loai-sp.php");
                    }
                    else if($page=='them_loai')
                    {
                        include("./Add/add-category.php");
                    }else if($page=='sua_loai')
                    {
                        include("./Update/update-loai.php");
                    }
                    else if($page=='xoa_loai')
                    {
                        include("./Delete/del_loaiSp.php");
                    }
                    // CTKM
                    else if($page=='list_ct_km')
                    {
                        include("./Select/list-ctkm.php");
                    }
                    else if($page=='them_ct_km')
                    {
                        include("./Add/add-ctkm.php");
                    }
                    else if($page=='sua_ct_km')
                    {
                        include("./Update/update-ctkm.php");
                    }
                    else if($page=='xoa_ct_km')
                    {
                        include("./Delete/delete-ctkm.php");
                    }
                    // DISCOUNT
                    else if($page=='list_km')
                    {
                        include("./Select/list-km.php");
                    }else if($page=='them_km')
                    {
                        include("./Add/add-km.php");
                    }else if($page=='xoa_km')
                    {
                        include("./Delete/del_km.php");
                    }else if($page=='sua_km')
                    {
                        include("./Update/update-kmai.php");
                    }
                    // NEWS - DONE
                    else if($page=='list_tin_tuc')
                    {
                        include("./Select/list-tin-tuc.php");
                    }
                    else if($page=='them_tin_tuc')
                    {
                        include("./Add/add-news.php");
                    }
                    else if($page=='sua_tin_tuc')
                    {
                        include("./Update/update-news.php");
                    }
                    else if($page=='xoa_tin_tuc')
                    {
                        include("./Delete/delete-news.php");
                    }
                    // CHANGE PASSWORD
                    else if($page=='doi_mk')
                    {
                        include("./Update/update-password.php");
                    }
                    // QLKH
                    else if ($page == 'list_kh') {
                        include('./Select/list-kh.php');
                    } else if ($page == 'detail-kh') {
                        include('./Detail/detail-kh.php');
                    }
                    // YOUTUBE
                    else if ($page == 'list_youtube') {
                        include('./Select/list-youtube.php');
                    }
                }
                else
                {
                    include("./Select/list-product.php");
                }
?>
            <!-- END FORM -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Footer -->
<?php include("footer.php"); ?>