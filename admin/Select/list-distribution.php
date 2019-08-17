<script type="text/javascript">
	function deleleAction(){
		return confirm("Bạn có muốn xóa tin tức này?");
	}
</script>
<?php
    if(isset($_SESSION['DeleteCheck']))
    {
        if($_SESSION['DeleteCheck']){
            echo '<script type="text/javascript">';
            echo "setTimeout(function () { Swal.fire({
                type: 'success',
                title: 'Đã xóa nhà phân phối!',
                showConfirmButton: false,
                timer: 1500
                });";
            echo '}, 1000);</script>';
            $_SESSION['DeleteCheck'] = false;
        }
    }
?>
<!-- Small boxes (Stat box) -->
<div class="row row-responsive">
    <div class="col-lg-3 col-6 col-responsive col-respon-1">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <?php
                $table = query_select("SELECT * FROM nhacungcap");
                $count = $table->rowCount();
                echo '<h3>'.$count.'</h3>';
            ?>

                <p>Nhà phân phối...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-6 col-6 col-responsive col-respon-2">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Nhà phân phối</h3>

                <p>Danh sách nhà phân phối...</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6 col-responsive col-respon-3">
        <!-- small box -->
        <a href="indexAdmin.php?page=them_npp">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Thêm</h3>

                    <p>Thêm nhà phân phối...</p>
                </div>
                <div class="icon">
                    <i class="ion ion-plus"></i>
                </div>
            </div>
        </a>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<!-- list -->
<div class="row">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th class="respon-320">STT</th>
                <!-- <th>Mã nhà phân phối</th> -->
                <th>Tên nhà phân phối</th>
                <th class="respon-600">Địa chỉ</th>
                <th class="respon-400">Mã số thuế</th>
                <th class="respon-1280">Giới thiệu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $table = query_select("SELECT * FROM nhacungcap");
            $count = $table->rowCount();
            $stt = 1;
            if ($count > 0) {
                foreach ($table as $row) {
        ?>

            <tr>
                <td class="respon-320"><?php echo $stt++; ?></td>
                <!-- <td><?php echo $row['MaNCC'] ?></td> -->
                <td><?php echo $row['TenNCC'] ?></td>
                <td class="respon-600"><?php echo $row['Diachi'] ?></td>
                <td class="respon-400"><?php echo $row['MaSoThue'] ?></td>
                <td class="respon-1280"><?php echo $row['Gioithieu'] ?></td>
                <td>
                <a href="?page=sua_npp&id=<?php echo $row['MaNCC']?>">
                        <button type="button" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        </button>
                    </a>&nbsp;
                    <a href="?page=xoa_npp&id=<?php echo $row['MaNCC']?>" onclick='return deleleAction();'>
                    <button type="button" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    </a>
                </td>
            </tr>

            <?php
                }
            }
            else
            {
                echo "<h2>Hiện tại chưa có sản phẩm...</h2>";
            }
        ?>
        </tbody>
    </table><!-- list product -->
</div>

<!-- modal detail -->
<?php include('list-product-detail.php'); ?>